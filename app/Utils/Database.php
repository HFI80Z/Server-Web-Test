<?php
// app/Utils/Database.php
namespace App\Utils;

use PDO;
use PDOException;

class Database
{
    private static $dbh;

    public static function getPDO()
    {
        if (empty(self::$dbh)) {
            // Lecture du fichier config.ini (sans section)
            $config = parse_ini_file(__DIR__ . '/../config.ini');

            // On s’attend à trouver DB_HOST, DB_NAME, DB_USER, DB_PASS
            $dsn = 'mysql:host='.$config['DB_HOST'].';dbname='.$config['DB_NAME'].';charset=utf8';
            $user = $config['DB_USER'];
            $pass = $config['DB_PASS'];

            try {
                self::$dbh = new PDO($dsn, $user, $pass);
                self::$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $exception) {
                die('Erreur de connexion : ' . $exception->getMessage());
            }
        }
        return self::$dbh;
    }
}
