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

    public function insert()
    {
        $db = self::db();
        $statement = $db->prepare('INSERT INTO products(`name`, `type_id`, `price`) VALUES(:name, :type_id, :price)');
        $data = [
            ':name' => $this->name,
            ':type_id' => $this->type_id,
            ':price' => $this->price
        ];
        $statement->execute($data);
        $this->id = $db->lastInsertId();
        return;
    }

    public function save()
    {
        $db = self::db();
        $statement = $db->prepare('UPDATE products SET `name`=:name, `type_id`=:type_id, `price`=:price WHERE id=:id');
        $data = [
            ':id' => $this->id,
            ':name' => $this->name,
            ':type_id' => $this->type_id,
            ':price' => $this->price
        ];
        return $statement->execute($data);
    }

    public function type()
    {
        $db = self::db();

        //primero preparamos
        $statement = $db->prepare('SELECT * FROM product_types WHERE id=:type_id');
        //después mapeamos parametros y ejecutamos:
        //posibilidad 1, ambas cosas en una sentencia
        $statement->execute(array(':type_id' => $this->type_id));    
        //posibilidad 2, bindValue + execute. Ver apuntes
        //posibilidad 3, bindParam + execute. Ver apuntes

        $statement->setFetchMode(PDO::FETCH_CLASS, ProductType::class);
        $type = $statement->fetch(PDO::FETCH_CLASS);
        return $type;
    }

    public function __get($atributoDesconocido)
    {
        // return "atributo $atributoDesconocido desconocido";
        if (method_exists($this, $atributoDesconocido)) {
            $this->$atributoDesconocido = $this->$atributoDesconocido();
            return $this->$atributoDesconocido;
            // echo "<hr> atributo $x <hr>";
        }
    }    

    public function __toString()
    {
        return "$this->id: $this->name";
    }
}
