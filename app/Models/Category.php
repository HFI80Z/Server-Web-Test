<?php
namespace App\Models;

use App\Utils\Database;
use PDO;

class Category extends CoreModel
{
    private $name;

    public static function findAll()
    {
        $pdo = Database::getPDO();
        $sql = "SELECT * FROM category";
        $statement = $pdo->query($sql);
        $results = $statement->fetchAll(PDO::FETCH_CLASS, self::class);
        return $results;
    }

    public static function find($id)
    {
        $pdo = Database::getPDO();
        $sql = "SELECT * FROM category WHERE id = :id";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $statement->fetch();
    }

    public function getName()
    {
        return $this->name;
    }
}
