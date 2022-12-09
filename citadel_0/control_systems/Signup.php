<?php
$signupStatus='';
$errMsg=[];
$errLength;


if($_SERVER['REQUEST_METHOD']==='POST'){
    $err=[];
    $admin='0';
    $username=trim($_POST['username']);
    $email=trim($_POST['email']);
    $password=trim($_POST['password']);
    $repeat_password=trim($_POST['repeat_password']);

    if($username === ''){
        $err['username']="Fill the field!";
    }else if(mb_strlen($username,'UTF8')<2){
        $err['username']="Must be more than 2 characters!";
    }
    if($email === ''){
        $err['email']="Fill the field!";
    }
    if($password === ''){
        $err['password']="Fill the field!";
    }else if(mb_strlen($password,'UTF8')<6){
        $err['password']="Must be more than 6 characters!";
    }else if($password !== $repeat_password){
        $err['repeat_password']="Passwords do not match, please repeat your password in the field";
    }

    $errLength=count($err);

    if($errLength){
        $errMsg=$err;
    }else{
        $existence=selectOne('users',['email'=>$email]);
        if($existence){
            if($existence['email']==$email){
                $err['email']="Such a user exists!";
                $errMsg=$err;
            }else{
                $post=[
                    'admin'=>$admin,
                    'username'=>$username,
                    'email'=>$email,
                    'password'=>$password
                ];
                $id=insert('users',$post);
                
                header("Location: ". MAIN_PATH."/");

            }
        }else{
            $post=[
                'admin'=>$admin,
                'username'=>$username,
                'email'=>$email,
                'password'=>$password
            ];
                $id=insert('users',$post);
                $client=selectOne('users',['id'=>$id]);
                
                $_SESSION['id']=$client['id'];
                $_SESSION['username']=$client['username'];
                $_SESSION['admin']=$client['admin'];
                header("Location: ". MAIN_PATH."/");
        }
        
        
    }
}else{
    // GET
    $username='';
    $email="";
}
?>
