<?php

//入口文件
//定义常量
//加载函数库
//启动框架

define('FRAMWORK', realpath('./'));
define('CORE', FRAMWORK.'/core');
define('APP', FRAMWORK.'/app');
define('MODULE', 'app');

define('DEBUG', true);

include "vendor/autoload.php";

if (DEBUG)
{
    $whoops = new \Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register(); 
	ini_set("display_error", "On");
} else {
	ini_set("display_error", "Off");
}

//iiiiisss();  //测试whoops错误打印
//dump($_SERVER); //syfony/dumper test

include CORE.'/common/function.php';
include CORE.'/framwork.php';

spl_autoload_register('\core\framwork::load');
\core\framwork::run();


