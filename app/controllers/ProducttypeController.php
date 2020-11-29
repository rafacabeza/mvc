<?php
namespace App\Controllers;

// require_once('../app/models/Producttype.php');
use \App\Models\ProductType;

use App\Controllers\ProductController;

class ProducttypeController  
{
    public function index()
    {
        $producttypes = ProductType::all();
        
        include('../views/producttype/index.php');
    }
    public function show($arguments)
    {
        $id = $arguments[0];
        $productType = ProductType::find($id);
        include('../views/producttype/show.php');
    }
}
