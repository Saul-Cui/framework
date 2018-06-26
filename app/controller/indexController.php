<?php

namespace app\controller;

use core\lib\conf;
use core\lib\model;

class indexController extends \core\framwork
{
	public function index()
	{
		dump('It is index Controller index Action.');
        $model = new model();
        $data = $model->select("t_score", "*");
        dump($data);
        die();
		
		//模型类调用
		$model = new \core\lib\model();
		$sql = 'SELECT * FROM t_score';
		$ret = $model->query($sql);
		$res = $ret->fetchall();
		dump($res);

		$temp = \core\lib\conf::get('CONTROLLER', 'route');
		dump($temp);

		//视图类调用
		$title = '视图文件';
		$data = 'Hello World.';

		$this->assign('title', $title);
		$this->assign('data', $data);
		$this->display('index.html');
		return ;
	}
}
