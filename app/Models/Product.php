<?php
namespace App\Models;

use App\Utils\Database;
use PDO;

class Product extends CoreModel
{
    protected $id;
    protected $name;
    protected $description;
    protected $price;
    protected $brand_id;
    protected $type_id;
    protected $category_id;

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


    public function getId()          { return $this->id; }
    public function getName()        { return $this->name; }
    public function getDescription() { return $this->description; }
    public function getPrice()       { return $this->price; }
    public function getBrandId()     { return $this->brand_id; }
    public function getTypeId()      { return $this->type_id; }
    public function getCategoryId()  { return $this->category_id; }

    public function setName($name)        { $this->name = $name; }
    public function setDescription($desc) { $this->description = $desc; }
    public function setPrice($price)      { $this->price = $price; }
    public function setBrandId($brandId)  { $this->brand_id = $brandId; }
    public function setTypeId($typeId)    { $this->type_id = $typeId; }
    public function setCategoryId($catId) { $this->category_id = $catId; }
}
