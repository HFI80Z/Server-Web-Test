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

    public static function findAll()
    {
        $pdo = Database::getPDO();
        $sql = "SELECT * FROM product";
        $statement = $pdo->query($sql);
        $results = $statement->fetchAll(PDO::FETCH_CLASS, self::class);
        return $results;
    }

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

    // Getters / Setters...
    public function getName() { return $this->name; }
    public function getDescription() { return $this->description; }
    public function getPrice() { return $this->price; }
    public function getBrandId() { return $this->brand_id; }
    public function getTypeId() { return $this->type_id; }
    public function getCategoryId() { return $this->category_id; }
}
