<?php
namespace library;
class Route{
	
	//路由映射表
	protected static $routeMap = [];
	
	
	//test      =>       admin/test/test
	//路由注册方法
	public static function register($route_data){
		self::$routeMap = $route_data;
	}
	
	//路由验证方法
	public static function checkRoute(){
		//获取请求的url，并分解url
		$resolve_url = explode('/', $_SERVER['REQUEST_URI'],3);
		
		//如果www.flexible.com 这样访问,$resolve_url[1]为空，需要为'/'定义路由规则
		if(!empty($resolve_url[1])){
			//判断是否隐藏了index.php，未隐藏
			if($resolve_url[1]=='index.php'){
				//获取路由名
				/*这里如果在未隐藏index.php的情况下www.flexible.com/index.php这样访问
				 * 则$resolve_url[2]会提示为未定义，所以也要为'/'定义路由规则
				 * 即保持www.flexible.com 与 www.flexible.com/index.php访问是一样的
				 */
				$route_url = isset($resolve_url[2])?$resolve_url[2]:'/';
				
			}else{
				//开启了重写隐藏了index.php
				//获取请求的url，并分解url,这里因为隐藏了index.php所以explode只要分解成2个元素就好
				$resolve_url = explode('/', $_SERVER['REQUEST_URI'],2);
				//echo '重写';
				//获取路由名,这里如果隐藏了index.php，获取路由名为$resolve_url[1]而不在是$resolve_url[2]
				$route_url = $resolve_url[1];
				
			}
		}else{
			
			//如$resolve_url[1]为空表示/访问：即www.flexible.com 这样访问
			$route_url = '/';
		}
		
		//对url中的?做处理，从遇到的第一个?地方开始截断成两个元素
		$route_url = explode('?', $route_url,2)[0];
		
		//判断量是否定义路由
		if(!isset(self::$routeMap[$route_url])){
			exit($route_url.'路由未定义');
		}
		//验证通过，返回当前路由对应的请求地址
		return self::$routeMap[$route_url];
		
	}
	
	
	//模式0 普通模式url访问 
	public static function pattern_0(){
		//定义三大参数 1.平台参数$p   2.模块参数$m  3.动作参数$a
		$GLOBALS['p'] = $p = isset($_GET['p'])?$_GET['p']:'admin';    //默认选择后台
		$GLOBALS['m'] = $m = isset($_GET['m'])?ucfirst(strtolower($_GET['m'])):'Test';       //默认选择测试控制器
		$GLOBALS['a'] = $a = isset($_GET['a'])?strtolower($_GET['a']):'test';         //默认选择测试方法
		
	}
	
	//模式1 路由模式
	public static function pattern_1(){
		
		//判断路由文件是否存在
		if(file_exists(C('route_file'))){
			//self::pattern_0();
			//引入定义的路由文件
			require APP_PATH."route.php";
			//注册路由
			Route::register($route);
			//验证路由,并获取路由对应的url地址
			$url = self::checkRoute();
			//解析地址
			$url = explode('/', $url);
			//定义三大参数 
			$GLOBALS['p'] = $p = $url[0];
			$GLOBALS['m'] = $m = $url[1];
			$GLOBALS['a'] = $a = $url[2];
			
		}else{
			//不存在route路由文件
			exit('路由文件未找到');
		}
		
	}
	
	//路由运行方法
	public static function run(){
		//先判断路由模式
		switch (C('route_pattern')){
			
			//普通模式
			case 0:
				//启用普通模式
				self::pattern_0();
				//echo '普通模式';
				break;
				
				
			//路由模式	
			case 1:
				//启用路由模式
				self::pattern_1();
				//echo '路由模式<br/><pre>';
				break;
				
		}

	}
	
	
	
	
}
?>