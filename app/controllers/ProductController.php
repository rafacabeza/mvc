<?php
namespace App\Controllers;

use \App\Models\Product;

class ProductController  
{
    public function __construct()
    {
        echo "en ProductController<br>";
    }
    public function index()
    {
        $products = Product::all();
        
        include('../views/product/index.php');
    }
}
