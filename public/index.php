<?php
//设置时区
ini_set('date.timezone','Asia/Shanghai');
//定义网站根目录,注意因为在linux下dirname函数识别不了'\',所以需要先将windows下的'\'先转成'/'在使用dirname以兼容linux
define('DOCUMENT_ROOT', dirname(str_replace('\\', '/',__DIR__)));    //E:/mvc02  先用str_replace函数把\替换为/

//引入smarty模版类
require DOCUMENT_ROOT."/flexible/smarty/Smarty.class.php";
//引入控制器类
require DOCUMENT_ROOT."/application/admin/controller/TestController.php";

//定义三大参数 1.平台参数$p   2.模块参数$m  3.动作参数$a
$GLOBALS['p'] = $p = isset($_GET['p'])?$_GET['p']:'admin';    //默认选择后台
$GLOBALS['m'] = $m = isset($_GET['m'])?ucfirst(strtolower($_GET['m'])):'Test';       //默认选择测试控制器
$GLOBALS['a'] = $a = isset($_GET['a'])?strtolower($_GET['a']):'test';         //默认选择测试方法



//构建控制器类名   如：app\admin\controller\NewsController
$className = 'app\\'.$p.'\\controller\\'.$m.'Controller';

$flexible = new $className();
$flexible->$a();
