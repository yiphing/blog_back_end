<?php

//Step1. 包含连接Mysql的db.php文件
include("db.php");

//Step2. 获取注册信息
$data = file_get_contents("php://input");
$json_data = json_decode($data);

if(isset($json_data->username) && isset($json_data->password) && $json_data->username !="" && $json_data->password != ""){
    //Step3.1 用户和密码都不为空
    //echo "username:" . $json_data->username . " password:" . $json_data->password;
    $sql = "insert into users (username,password) values ('%s','%s')";
    $insert_sql = sprintf($sql,$json_data->username,$json_data->password);
    $result = mysql_query($insert_sql);
    if($result == FALSE){
        echo json_encode(
            array("error"=>"register failed!")
        );
    }
    else{
        //执行成功，插入一条数据
        echo json_encode(
            array("erorr"=>"","success"=>"register successfully!")
        );
    }
}
else{
    //Step3.2 用户名或者密码为空
    echo json_encode(
        array("error"=>"username or password not set")
    );
}
