<?php
// app/Models/Category.php
namespace App\Models;

use App\Utils\Database;
use PDO;

class Category extends CoreModel
{
    private $name;

    /**
     * Récupérer toutes les catégories
     */
    public static function findAll()
    {
        $pdo = Database::getPDO();
        $sql = "SELECT * FROM category";
        $statement = $pdo->query($sql);
        $results = $statement->fetchAll(PDO::FETCH_CLASS, self::class);
        return $results;
    }

    /**
     * Récupérer une catégorie par son id
     */
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

    // Getter / Setter
    public function getName()
    {
        return $this->name;
    }
}
