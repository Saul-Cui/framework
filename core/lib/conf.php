<?php
namespace core\lib;

class conf
{
	public static $confMap = null;

	public static function get($name, $file)
	{
		/**
		  *1/判断配置文件是否存在
		  *2/判断配置是否存在
		  *3/判断配置是否已读取， 缓存配置
		  */

		$path = FRAMWORK.'/core/config/'.$file.'.php';
		if (isset(self::$confMap[$file]))
		{
			return self::$confMap[$file][$name];
		} else {
			if (is_file($path))
			{
				$conf = include $path;
				if (isset($conf[$name]))
				{
					self::$confMap[$file] = $conf;
					return $conf[$name];	
				} else {
					throw new \Exception ("配置不存在".$name);
				}
			} else {
				throw new \Exception ("配置文件不存在".$file);
			}
		}
	}

	public static function all($file)
	{
		$path = FRAMWORK.'/core/config/'.$file.'.php';
		if (isset(self::$confMap[$file]))
		{
			return self::$confMap[$file];
		} else {
			if (is_file($path))
			{
				$conf = include $path;
				self::$confMap[$file] = $conf;
				return self::$confMap[$file];
			} else {
				throw new \Exception ("配置文件不存在".$file);
			}
		}
		
	}
}
