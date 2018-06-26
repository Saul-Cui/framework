<?php

namespace core;

class framwork
{
	public static $classMap = array();
	public $assign = null;
	static public function run()
	{
		\core\lib\log::init();

		\core\lib\log::log('test');

		$route = new \core\lib\route();
		$ctrlClass = $route->controller;
		$action = $route->action;
		$ctrlfile = APP.'/controller/'.$ctrlClass.'Controller.php';
		$controllerClass = '\\'.MODULE.'\\controller\\'.$ctrlClass.'Controller';
		if (is_file($ctrlfile))
		{
			include $ctrlfile;
			$controller = new $controllerClass();
			$result = $controller->$action();
			dump($result);

		} else {
			throw new \Exception("找不到可用的Controller：".$ctrlClass);
		}
		return ;
	}

	//自动加载类
	static public function load($class)
	{
		// new \core\route();
		// $class = '\core\route';
		//

		if (isset($classMap[$class]))
		{
			return true;
		} else {
		
			$class = str_replace("\\", '/', $class);
			$file = FRAMWORK.'/'.$class.'.php';
			if (is_file( $file ))
			{
				include $file;
				self::$classMap[$class] = $class;

			} else {
				return false;
			}
		}
	}

    //分配变量
	public function assign($name, $value)
	{
		$this->assign[$name] = $value;
	}

    //视图展示
	public function display($file)
	{
        //base example
		//$filename = APP.'/views/'.$file;
		//if(is_file($filename))
		//{
		//	extract($this->assign);
		//	include $filename;
		//}

        //twig example
        $filename = APP.'/views/'.$file;
        if(is_file($filename))
        {
            $loader = new \Twig_Loader_Array(array(
                'index' => 'Hello {{ name }}!',
            ));
            $twig = new \Twig_Environment($loader);

            echo $twig->render('index', $this->assign);
        }

	}
}
