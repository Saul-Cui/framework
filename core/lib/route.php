<?php
namespace core\lib;
use core\lib\conf;
class route
{
	public $controller = null;
	public $action = null;

	public function __construct()
	{
		/**
		  * 隐藏index.php
		  * 获取url中的参数部分
		  * 返回对应的控制器和方法
		  */

		$path = $_SERVER['REQUEST_URI'];
		if (isset($path) && $path != '/')
		{
			$patharr = explode('/', trim($path, '/'));
			$this->controller = $patharr[0];
		
			unset($patharr[0]);
			if (isset($patharr[1])) {
				$this->action = $patharr[1];
				unset($patharr[1]);
			} else {
				$this->action = conf::get('ACTION', 'route');
			}

			$i = 2;
			$count = count($patharr) + 2;
			$Get = array();
			while ($i < $count)
			{
				if (isset($patharr[$i + 1]))
				{
					$Get[$patharr[$i]] = $patharr[$i + 1];		
				}
				$i += 2;
			}
		} else {
			$this->controller = conf::get('CONTROLLER', 'route');
			$this->action = conf::get('ACTION', 'route');

		}

	}
}
