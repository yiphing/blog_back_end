<?php
//Step1. 连接mysql数据库
//参考:http://www.php.net/manual/zh/function.mysql-connect.php
$link = mysql_connect("127.0.0.1","root","root");
if($link == FALSE){
    die("mysql connect error!");
}

//Step2. 
$result = mysql_select_db("api");
if($result == FALSE){
    die("mysql select db error");
}

?>