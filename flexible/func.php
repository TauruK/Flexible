<?php
/**  
* 函数的含义说明 
* C函数，用于获取配置项的值
* @access public 
* @param string $str 要获取的配置项参数  格式如：PDO.type
* @return string      获取到的配置项值
*/ 
function C($str){
	$arr = explode('.', $str);
	$c = $GLOBALS['config'];    //将配置项数组赋给$c
	foreach($arr as $v){        //循环遍历获取到最后要取得的配置项
		$c = $c[$v];
	}
	return $c;    //返回取得的配置项
}