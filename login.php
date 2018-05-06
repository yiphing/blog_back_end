<?php

//Step1. 包含数据库连接信息
include("db.php");

//Step2. 接收json输入
$data = file_get_contents("php://input");
$json_data = json_decode($data);

if(isset($json_data->username) && isset($json_data->password) && $json_data->username !="" && $json_data->password != ""){
    //Step3.1 根据用户名和密码去查询
    $sql = "select * from users where username='%s' and password='%s'";
    $query_sql = sprintf($sql,$json_data->username,$json_data->password);
    $result = mysql_query($query_sql);
    if($result == FALSE){
        echo json_encode(
            array("error"=>"query failed")
        );
    }
    else{
        //MYSQL_ASSOC
        //返回结果会是
        //username=>'xiaomi'
        //password=>'123456'
        $query_result = mysql_fetch_array($result,MYSQL_ASSOC);
        if($query_result == FALSE){
            echo json_encode(
                array("msg"=>"login failed","status_code"=>0)
            );
        }
        else{
            setcookie("userid",$query_result["Id"]);
            setcookie("username",$query_result["username"]);
            echo json_encode(
                array("msg"=>"login successfully","status_code"=>1)
            );
        }
    }
}
else{
    //Step3.2 用户名或者密码为空
    echo json_encode(
        array("error"=>"username or password not set")
    );
}