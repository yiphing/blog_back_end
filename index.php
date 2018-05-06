<?php

//Step1. 获取json输入
$json_data = file_get_contents("php://input");

//Step2. 将json输入进行解码
$datas = json_decode($json_data);

//Step3. 使用json数据

echo json_encode($datas);