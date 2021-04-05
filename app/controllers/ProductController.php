<?php
namespace App\Controllers;

require_once('../app/models/Product.php');
use \App\Models\Product;

class ProductController  
{
    public function __construct()
    {
        // echo "en ProductController<br>";
    }
    public function index()
    {
        // echo "En método index<br>";
        //buscar datos
        $products = Product::all();
        //autorizar (no lo haremos)
        //generar la vista
        include('../views/product/index.php');
        unset($_SESSION['message']);
    }

    public function show($arguments)
    {
        $id = $arguments[0];        
        $product = Product::find($id);
        include ('../views/product/show.php');
    }

    public function delete($arguments)
    {
        $id = $arguments[0];        
        $product = Product::find($id);
        $product->delete();
        //redirigir navegador. No mostrar vista
        $_SESSION['message'] = "El producto $product->name se ha borrado con éxito";
        header('Location: /product/index');
    }
    public function nueva()
    {
        echo "En método 'nueva'";
    }
}
