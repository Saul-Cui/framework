<?php

namespace app\models;

use core\lib\model;
class t_scoreModel extends model
{
    private $table = 't_score';

    public function lists()
    {
        return $this->select($this->table, '*');
    }
}