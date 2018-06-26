<?php

namespace core\lib\drive\log;

use core\lib\conf;

class file
{
	public $path = null;

	public function __construct()
	{
		$conf = conf::get('OPTION', 'log');
		$this->path = $conf['PATH'];
	}

	public function log($message, $file = 'log')
	{
		//判断日志文件及目录是否存在，不存在这创建
		//写入日志

		if (!is_dir($this->path))
		{
			mkdir($this->path, '0777', true);
		}
		
		$message = date('Y-m-d H:i:s').'\\t'.json_encode($message).PHP_EOL;

		return file_put_contents($this->path.date('Ymd').'-'.$file.'.log', $message, FILE_APPEND);
	}

}
