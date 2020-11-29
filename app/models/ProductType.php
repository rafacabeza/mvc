<?php
namespace App\Models;

use PDO;
use PDOException;

class ProductType
{
    public function __construct()
    {
        # code...
    }

    public static function all()
    {
        $db = ProductType::db();
        $statement = $db->query('SELECT * FROM product_types');
        $producttypes = $statement->fetchAll(PDO::FETCH_CLASS, ProductType::class);

        return $producttypes;        
    }

    public static function find($id)
    {
        $db = ProductType::db();

        $statement = $db->prepare('SELECT * FROM product_types WHERE id=:id');
        $statement->execute(array(':id' => $id));        
        $statement->setFetchMode(PDO::FETCH_CLASS, ProductType::class);
        $producttype = $statement->fetch(PDO::FETCH_CLASS);
        return $producttype;
    }

    protected static function db()
    {
        $dsn = 'mysql:dbname=mvc;host=db';
        $usuario = 'root';
        $contraseña = 'password';
        try {
            $db = new PDO($dsn, $usuario, $contraseña);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Falló la conexión: ' . $e->getMessage();
        }
        return $db;
    }
}
