<?php
namespace App\Models;

require_once '../core/Model.php'; # preparo el acceso a otro fichero

use PDO;
use Core\Model; # sigo preparando mediante use.

class Product extends Model
{
    private $table = 'products';

    public static function all()
    {
        $db = self::db();        
        $statement = $db->query('SELECT * FROM products');
        $products = $statement->fetchAll(PDO::FETCH_CLASS, self::class);        
        
        return $products;
    }    

    public static function find($id)
    {
        $db = self::db();

        //primero preparamos
        $statement = $db->prepare('SELECT * FROM products WHERE id=:id');
        //después mapeamos parametros y ejecutamos:
        //posibilidad 1, ambas cosas en una sentencia
        $statement->execute(array(':id' => $id));    
        //posibilidad 2, bindValue + execute. Ver apuntes
        //posibilidad 3, bindParam + execute. Ver apuntes

        $statement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $product = $statement->fetch(PDO::FETCH_CLASS);
        return $product;
    }    
    
    public function delete()
    {
        $db = self::db();
        $statement = $db->prepare('DELETE FROM products WHERE id=:id');        
        return $statement->execute([':id' => $this->id]);        
    }

}
