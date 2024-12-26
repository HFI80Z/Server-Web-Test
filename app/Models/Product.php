<?php
// app/Models/Product.php
namespace App\Models;

use App\Utils\Database;
use PDO;

class Product extends CoreModel
{
    private $name;
    private $description;
    private $price;
    private $brand_id;
    private $type_id;
    private $category_id;

    /**
     * Récupère tous les produits
     */
    public static function findAll()
    {
        $pdo = Database::getPDO();
        $sql = "SELECT * FROM product";
        $statement = $pdo->query($sql);
        $results = $statement->fetchAll(PDO::FETCH_CLASS, self::class);
        return $results;
    }

    /**
     * Récupère un produit par son id
     */
    public static function find($id)
    {
        $pdo = Database::getPDO();
        $sql = "SELECT * FROM product WHERE id = :id";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $statement->fetch();
    }

    /**
     * Récupère tous les produits d'une même catégorie
     */
    public static function findByCategory($categoryId)
    {
        $pdo = Database::getPDO();
        $sql = "SELECT * FROM product WHERE category_id = :categoryId";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(':categoryId', $categoryId, PDO::PARAM_INT);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_CLASS, self::class);
        return $results;
    }

    // Getters / Setters
    public function getName()        { return $this->name; }
    public function getDescription() { return $this->description; }
    public function getPrice()       { return $this->price; }
    public function getBrandId()     { return $this->brand_id; }
    public function getTypeId()      { return $this->type_id; }
    public function getCategoryId()  { return $this->category_id; }
}
