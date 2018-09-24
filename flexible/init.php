<?php
//设置时区
ini_set('date.timezone','Asia/Shanghai');

//引入目录常量
require DOCUMENT_ROOT."flexible/define.php";

//引入装载配置文件
require FLEXIBLE_PATH."load.php";

//引入公共函数文件
require FLEXIBLE_PATH."func.php";
//引入smarty模版类
require SMARTY_PATH."Smarty.class.php";
//引入核心类
require Library_PATH."App.php";
require Library_PATH."Route.php";
//注册自动加载类
spl_autoload_register('\library\App::k_autoload');

//运行app
library\App::run();




