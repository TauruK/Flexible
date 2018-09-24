<?php
namespace app\admin\controller;
use QQ\SendMessage;
class IndexController{
	
	public function index(){
		
		$qq = new SendMessage();
		$qq->send();
		
	}
	
}



?>