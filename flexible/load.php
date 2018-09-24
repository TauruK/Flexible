<?php
//引入系统框架配置文件
$ori_config = require (FLEXIBLE_PATH."config.php");

//引入应用配置文件
$app_config = [];
if(file_exists(APP_PATH."config.php")){
	$app_config = require (APP_PATH."config.php");
}

//合并两个配置文件
$config = array_merge($ori_config,$app_config);