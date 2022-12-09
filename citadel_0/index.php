<?php
include './systems/session.php';
//подключается БД
// include './bd/db.php';
include './bd/settings.php';
include './bd/pdo.php';
include './bd/db.php';
//подключается БД конец подключение
//подключение роутера
include './systems/Route.php';

$route=new Route();

$url=explode("/", $_SERVER['REQUEST_URI']);
$length=count($url);
$lengthGet=count($_GET);
$urlCutData="";

// какую страницу будет отображать пользователю
if($lengthGet){
    if(isset($url[3])){
        $urlCutData=$url[2];
    }else{
        $urlCutData=stristr($url[2], '?',true);//[1]
    }
}else{
    $urlCutData=$url[2];//[1]
}
if($urlCutData==""){
    include './pages/home.php';
}else{
    $route->checkPage($urlCutData,'./pages/',$url);
}
?>