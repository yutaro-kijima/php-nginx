<?php

namespace Dao;

use PDO;

class UserDao
{

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    private $pdo;

    public function getUserById($id)
    {
        $query = $this->pdo->prepare("select * from User where id= ?");
        $query->execute([$id]);
    }

    public function create($name, $password, $birthday, $gender)
    {
        $query = $this->pdo->prepare("insert into User(name, password, birthday, gender) 
            values (?, ?, ?, ?)");
        $query->execute([$name, $password, $birthday, $gender]);
    }
}

