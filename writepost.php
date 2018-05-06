<?php

//Step1. 连接收据库
include("db.php");

//Step2. 接收json输入
$data = file_get_contents("php://input");
$json_data = json_decode($data);

if(isset($_COOKIE["username"]) && isset($_COOKIE["userid"])){
    var_dump($json_data);
}
else{
    echo json_encode(
        array(
            "msg"=>"you are not logined"
        )
    );
}