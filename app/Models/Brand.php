<?php
// app/Models/Brand.php
namespace App\Models;

use App\Utils\Database;
use PDO;

class Brand extends CoreModel
{
    private $name;

    public static function findAll()
    {
        $pdo = Database::getPDO();
        $sql = "SELECT * FROM brand";
        $statement = $pdo->query($sql);
        $results = $statement->fetchAll(PDO::FETCH_CLASS, self::class);
        return $results;
    }

    // ...
    public function getName() { return $this->name; }
}
