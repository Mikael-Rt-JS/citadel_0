<?php
$signupStatus='';
$errMsg=[];
$errLength;


if($_SERVER['REQUEST_METHOD']==='POST'){
    $err=[];
    $email=trim($_POST['email']);
    $password=trim($_POST['password']);

    if($email === ''){
        $err['email']="Fill the field!";
    }

    if($password === ''){
        $err['password']="Fill the field!";
    }

    $errLength=count($err);

    if($errLength){
        $errMsg=$err;
    }else{
        //проверяет существует ли пользователь с такой почтой в базе данных
        $existence=selectOne('users',['email'=>$email]);
        if($existence && $existence['password']==$password){
            $email="";
            $_SESSION['client']['id']=$existence['id'];
            $_SESSION['client']['username']=$existence['username'];
            $_SESSION['client']['admin']=$existence['admin'];
            
            if($existence['admin']==="1"){
                header("Location: ". MAIN_PATH."/main");
            }else{
                header("Location: ". MAIN_PATH."/client");
            }

        }else{
            $err['auth']='Email or password entered is incorrect';
            $errMsg=$err;
        }
    }
    
}else{
    // GET
    $email="";
}
?>
