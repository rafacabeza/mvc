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
}
