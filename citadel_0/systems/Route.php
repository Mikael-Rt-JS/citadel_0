<?php
class Route{
  public $routePage=[
    'client'=>[
        'filesCss'=>[],
        'filesBlock'=>[],
        'filesJS'=>[]
    ],
    'home'=>[
        'filesCss'=>["global.css",'home/header.css',"burger.css"],
        'filesBlock'=>['home/header.php'],
        'filesJS'=>['var.js','burger.js']
    ],
    'main'=>[
        'filesCss'=>["global.css","burger.css"],
        'filesBlock'=>['burger.php'],
        'filesJS'=>['var.js','burger.js']
    ],
    'signin'=>[
        'filesCss'=>["global.css","burger.css","signin_page/forms.css"],
        'filesBlock'=>['burger.php','signin_page/signin_form.php'],
        'filesJS'=>['var.js','burger.js']
    ],
    'signup'=>[
        'filesCss'=>["global.css","burger.css","signup_page/forms.css"],
        'filesBlock'=>['burger.php','signup_page/signup_form.php'],
        'filesJS'=>['var.js','burger.js']
    ]
  ];
  public $globalFileCSS=[
    'filesCss'=>["global.css","burger.css"]
  ];
  public $globalFileBlock=[
    'filesBlock'=>['burger.php'],
  ];
  public $globalFileJS=[
    'filesJS'=>['var.js','burger.js']
  ];

  //переадреацию на страницу введённая в поисковика браузера
  // а так же отображает текущие страницы либо переход по ссылкам страниц
  public function checkPage($urlCutData,$pages,$url){
    $pages=scandir($pages);
    if($urlCutData==='signup' || $urlCutData==='signin'){
      if(isset($_SESSION['client'])){
        if($_SESSION['client']['admin']==="0"){
          $urlCutData='client';
        }else if($_SESSION['client']['admin']==="1"){
          $urlCutData='main';
        }
      }
    }else{
      if(!isset($_SESSION['client'])){
        if($urlCutData==='main' || $urlCutData==='client'){
          $urlCutData='signin';
        }
      }else if(isset($_SESSION['client'])){
        if($_SESSION['client']['admin']==="0"){
          $urlCutData='client';
        }else if($_SESSION['client']['admin']==="1"){
          $urlCutData='main';
        }
      }
    }


    if(in_array($urlCutData.'.php',$pages)){
      include './pages/'.$urlCutData.'.php';
    }else if(in_array($urlCutData.'.html',$pages)){
      include './pages/'.$urlCutData.'.html';
    }else if($url[2]==='logout'){
      include './systems/'.$url[2].'.php';
    }else{
      include './pages/404.php';
    }
  }
}
?>
