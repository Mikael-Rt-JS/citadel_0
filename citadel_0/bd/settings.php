<?php
$driver="mysql";
$servername="localhost";
$username="root";
$password="secret";
$database="test";//db_name
$charset="utf8";
// $options=[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
$options=[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC];
?>