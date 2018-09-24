<?php
namespace app\admin\controller;
use library\Route;
class TestController{
	
	public function test(){
		

		$ali = new \Ali();
		
		$ali->test();

		
		
		
		$smarty = new \Smarty();
		//构造smarty模版目录
		$tmplateDir = 'E:/Flexible/application/'.$GLOBALS['p'].'/view/';
		$smarty->setTemplateDir($tmplateDir);
		
		//构造smarty编译缓存目录
		$complieDir = 'E:/Flexible/application/'.$GLOBALS['p'].'/view_c/';
		$smarty->setCompileDir($complieDir);
		
		$smarty->assign('smarty','哈哈');
		$smarty->display('test/test.html');
	}
	
}
?>