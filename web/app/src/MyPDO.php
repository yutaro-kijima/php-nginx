<?php

namespace MyPDO;

use PDO;

class MyPDO extends PDO
{
    public function __construct()
    {
       $this->init();
    }

    public function init()
    {
        $dsn = 'mysql:host=mysql;dbname=ameba_blog;charset=utf8;port=3306';
        return new PDO($dsn, 'dev', 'dev');
    }

}

