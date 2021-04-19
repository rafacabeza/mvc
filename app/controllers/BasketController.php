<?php

namespace App\Controllers;

require_once('../app/models/Product.php');
use App\Models\Product;

class BasketController  
{
    public function index()
    {
        // echo "aquí los productos de la cesta:";
        // echo "<pre>";
        // print_r(unserialize($_SESSION['basket']));
        $basket = unserialize($_SESSION['basket']);
        include ('../views/basket/index.php');
    }
    public function add($arguments)
    {
        //qué hay que meter en sesión?
        $id = $arguments[0];
        $product = Product::find($id);
        //qué hay en la sesión?
        if (isset($_SESSION['basket'])) {
            $basket = unserialize($_SESSION['basket']);
        } else {
            $basket = [];
            // $basket = array();
        }
        
        //lo metemos al array
        //si existe el producto ya en la cesta, sumamos 1
        if (isset($basket[$product->id])) {
            $basket[$product->id]->cantidad ++;
        } else {
            $product->cantidad=1;
            $basket[$product->id] = $product;
        }
        //si no cantidad = 1 y lo metemos
        // //lo metemos al array
        // $basket[] = $product;
        // //luego para ver si existe el producto:
        // foreach($basket as $item) {

        // }
        //serializamos y a sesión:
        $_SESSION['basket'] = serialize($basket);
        //reenviamos
        header('Location: /basket');
    }
    public function remove($arguments)
    {
        
    }

    public function empty()
    {
        unset($_SESSION['basket']);
        header('Location: /basket');
    }
}
