<?php

//定义网站根目录,注意因为在linux下dirname函数识别不了'\',所以需要先将windows下的'\'先转成'/'在使用dirname以兼容linux
define('DOCUMENT_ROOT', dirname(str_replace('\\', '/',__DIR__)).'/');    //E:/mvc02/  先用str_replace函数把\替换为/

//引入初始化文件
require DOCUMENT_ROOT."/flexible/init.php";



