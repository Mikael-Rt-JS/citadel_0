<?php
try{
    $pdo=new PDO($driver.":host=".$servername.";dbname=".$database.";charset=".$charset,$username,$password,$options);
}catch(PDOException $i){
    die('Ошибка подключение');
}
?>