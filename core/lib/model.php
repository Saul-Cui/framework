<?php

namespace core\lib;
use core\lib\conf;
use Medoo\Medoo;

//base example
/**
class model extends \PDO
{
	public function __construct()
	{
		$database = conf::all('database');

		try 
		{
			parent::__construct($database['dsn'], $database['username'], $database['passwd']);
		} catch (\PDOException $e)
		{
			dump($e->getMessage());
		}
	}

}
*/



//medoo example
class model extends Medoo
{
	public function __construct()
	{
		$option = conf::all('database');
		parent::__construct($option);
	}

}
