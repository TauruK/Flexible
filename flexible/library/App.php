<?php
namespace library;
class App{
	
	//自定义静态加载方法
	public static function k_autoload($className){
		//注意因为在linux下basename函数识别不了'\',所以需要先将windows下的'\'先转成'/'在使用basename以兼容linux
		$baseClassName = basename(str_replace('\\', '/',$className));
		
		if(substr($baseClassName, -10) == 'Controller'){   //确定是否是一个控制器类
			//拼接控制器类文件全路径
			$filePath = APP_PATH.$GLOBALS['p'].'/controller/'.$baseClassName.'.php';
			//引入这个控制器类文件
			require $filePath;
		}elseif(substr($baseClassName, -5) == 'Model'){  //确定是否是一个模型类
			//拼接模型类文件全路径
			$filePath = APP_MODEL_PATH.$baseClassName.'.php';
			//引入这个模型类文件
			require $filePath;
			
		}elseif(substr($baseClassName, -4) == 'Tool'){  //确定是否是一个模型类
			//拼接工具类文件全路径
			$filePath = PLUGINS_PATH.$baseClassName.'.class.php';
			//引入这个工具类文件
			require $filePath;
			
		}
			
	}
	
	
	
}
