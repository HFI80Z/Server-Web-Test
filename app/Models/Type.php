<?php
// app/Models/Type.php
namespace App\Models;

use App\Utils\Database;
use PDO;

class Type extends CoreModel
{
    private $name;

    public static function findAll()
    {
        $pdo = Database::getPDO();
        $sql = "SELECT * FROM type";
        $statement = $pdo->query($sql);
        $results = $statement->fetchAll(PDO::FETCH_CLASS, self::class);
        return $results;
    }

    // ...
    public function getName() { return $this->name; }
}
