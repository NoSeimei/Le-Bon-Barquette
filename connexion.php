<?php
try{


$host = "localhost";
$dbname = "bonbarquette";
$user = "root";
$pass = "";

$db = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}catch(Exception $ex)
{
    echo $ex;
}
?>
