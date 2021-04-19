<?php
namespace App\Controllers;

require_once('../app/models/Product.php');
require_once('../app/models/ProductType.php');
use \App\Models\Product;
use App\Models\ProductType;

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

    public function create()
    {
        //necesito la lista de tipos para el select:
        $types = ProductType::all();
        // echo "<pre>";
        // var_dump($types);
        // exit();

        include '../views/product/create.php';
    }

    public function store()
    {
        //crear objeto
        $product = new Product;
        //asignarle valores de $_POST
        $product->name = $_POST['name'];
        $product->type_id = $_POST['type_id'];
        $product->price = $_POST['price'];
        //guardar el objeto en BBDD
        $product->insert();
        //reenviar al index o al show
        // echo "<pre>";
        // var_dump($product);
        
        header("Location: /product/show/$product->id");
    }

    public function edit($arguments)
    {
        //mezcla de show y de create:
        $id = $arguments[0];
        $product = Product::find($id);
        $types = ProductType::all();

        include('../views/product/edit.php');
    }

    public function update($arguments)
    {
        //buscar el producto
        $id = $arguments[0];
        $product = Product::find($id);
        
        //tomar los datos del formulario y modificar el objeto
        $product->name = $_POST['name'];
        $product->type_id = $_POST['type_id'];
        $product->price = $_POST['price'];

        //guardar en la bbdd
        $product->save();

        //reenviar al show o al index
        header('Location: /product/show/' . $product->id);
    }
    public function favorito($arguments)
    {
        $id = $arguments[0];
        $product = Product::find($id);
        $_SESSION['favorito'] = serialize($product);
        
        header('Location:/product/index');
    }
}
