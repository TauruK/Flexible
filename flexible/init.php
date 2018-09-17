<?php
//设置时区
ini_set('date.timezone','Asia/Shanghai');

//引入目录常量
require DOCUMENT_ROOT."flexible/define.php";
//引入smarty模版类
require SMARTY_PATH."Smarty.class.php";
//引入核心类
require Library_PATH."App.php";
//注册自动加载类
spl_autoload_register('\library\App::k_autoload');

//定义三大参数 1.平台参数$p   2.模块参数$m  3.动作参数$a
$GLOBALS['p'] = $p = isset($_GET['p'])?$_GET['p']:'admin';    //默认选择后台
$GLOBALS['m'] = $m = isset($_GET['m'])?ucfirst(strtolower($_GET['m'])):'Test';       //默认选择测试控制器
$GLOBALS['a'] = $a = isset($_GET['a'])?strtolower($_GET['a']):'test';         //默认选择测试方法



//构建控制器类名   如：app\admin\controller\NewsController
$className = 'app\\'.$p.'\\controller\\'.$m.'Controller';

$flexible = new $className();
$flexible->$a();
