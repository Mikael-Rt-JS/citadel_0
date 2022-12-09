<?php
// include './pdo.php';

function testGetOneRows($anyData){
    echo '<pre>';
    print_r($anyData);
    echo '</pre>';
}
function testGetAll($anyData){
    echo '<pre>';
    print_r($anyData);
    echo '</pre>';
}
//================================================ УНИКАЛЬНЫЕ ФУНКЦИИ

//================================================ проверяем запрос к SQL
function dbCheckError($query){
    $errInfo=$query->errorInfo();

    if($errInfo[0] !== PDO::ERR_NONE){
        echo $errInfo[2];
        exit();
    }
    return true;
}

//================================================ получаем все данные с SQL одной таблицы
function selectAll($table,$params=[]){
    global $pdo;
    $sql="SELECT * FROM $table";
    if(!empty($params)){
        $i=0;
        foreach($params as $key=>$value){
            if(!is_numeric($value)){
                $value="'".$value."'";
            }
            if($i===0){
                $sql=$sql." WHERE $key=$value";
            }else{
                $sql=$sql." AND $key=$value";
            }
            $i++;
        }
    }
    $query=$pdo->prepare($sql);
    $query->execute();

    dbCheckError($query);
    return $query->fetchAll();
}

//================================================ получаем одну строку из с SQL одной таблицы
function selectOne($table,$params=[]){
    global $pdo;
    $sql="SELECT * FROM $table";
    if(!empty($params)){
        $i=0;
        foreach($params as $key=>$value){
            if(!is_numeric($value)){
                $value="'".$value."'";
            }
            if($i===0){
                $sql=$sql." WHERE $key=$value";
            }else{
                $sql=$sql." AND $key=$value";
            }
            $i++;
        }
    }
    // ставим ограничение данных только 1-гл совпадение
    // $sql=$sql." LIMIT 1";

    $query=$pdo->prepare($sql);
    $query->execute();

    dbCheckError($query);
    return $query->fetch();
}

//================================================ запись в таблицу БД
function insert($table,$params){
    global $pdo;
    $i=0;
    $coll='';
    $mask='';
    foreach($params as $key=>$value){
        if($i===0){
            $coll=$coll.$key;
            if(!is_numeric($value)){
                $value="'".$value."'";
            }
            $mask=$mask.$value;
        }else{
            $coll=$coll.", $key";
            $mask=$mask.", '"."$value"."'";
        }
        $i++;
    }
    $sql="INSERT INTO $table ($coll) VALUES ($mask)";

    $query=$pdo->prepare($sql);
    $query->execute();

    dbCheckError($query);
    return $pdo->lastInsertId();
}
//================================================ Обновление данных в БД
function update($table,$id,$params){
    global $pdo;
    $i=0;
    $str='';
    foreach($params as $key=>$value){
        if($i===0){
            $str=$str.$key."='".$value."'";
        }else{
            $str=$str.", ".$key."='".$value."'";
        }
        $i++;
    }
    $sql="UPDATE $table SET $str WHERE id=$id";

    $query=$pdo->prepare($sql);
    $query->execute();

    dbCheckError($query);
}
//================================================ удаление строки из БД
function delete($table,$id){
    global $pdo;
    $sql="DELETE FROM $table WHERE id=$id";

    $query=$pdo->prepare($sql);
    $query->execute();

    dbCheckError($query);
}
//================================================ ставьте свои подключения
?>

