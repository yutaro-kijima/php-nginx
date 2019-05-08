<?php

namespace App\Dao;

use PDO;

class ArticleDao
{

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    private $pdo;

    public function read()
    {
        return $this->pdo->query(
            "select * from article order by created desc limit 50");
    }

    public function create($userName, $title, $text)
    {
        $query = $this->pdo->prepare(
            "insert into article(user_name,title, text) values(?,?,?,?)");
        $query->execute([$userName, $title, $text]);
    }

    public function delete($id)
    {
        $query = $this->pdo->prepare("DELETE from article where id= ?");
        $query->execute([$id]);
    }

    public function update($id, $text)
    {
        $query = $this->pdo->prepare(
            "UPDATE ARTICLE set text=? where id=?");
        $query->execute([$text, $id]);
    }
}
