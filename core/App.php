<?php
namespace Core;

class App
{
    public function __construct()
    {
        // unset($_SESSION['favorito']);
        session_start();
        // echo "construyo App<br>";

        if (isset($_GET['url'])) {
            $url = $_GET['url'];
        } else {
            $url = 'home';
        }

        $arguments = explode('/', trim($url, '/')); 
        // echo $url;
        // echo "<hr>";       
        
        
        // print_r($arguments);
        // echo "<hr>";
        $controllerName = array_shift($arguments);
        // print_r($arguments);
        // echo "<hr>";
        $controllerName = ucwords($controllerName) . "Controller";        

        if (count($arguments)) {
            $method =  array_shift($arguments);
            // print_r($arguments);
            // echo "<hr>";
    
        } else {
            $method = "index";
        }

        $file = "../app/controllers/$controllerName" . ".php";
        if (file_exists($file)) {
            require_once $file;
        } else {
            header("HTTP/1.0 404 Not Found");
            echo "No encontrado";
            die();
        }    
        
        $controllerName = "\App\Controllers\\$controllerName";

        $controllerObject = new $controllerName;
        if (method_exists($controllerName, $method)) {
            $controllerObject->$method($arguments);
        } else {
            header("HTTP/1.0 404 Not Found");
            echo "No encontrado";
            die();
        }
        
        
        // echo $url . "<br>";
        // echo $controllerName . "<br>";
        // echo $method . "<br>";
        // echo "<pre>";
        // var_dump($arguments);

    }
}
