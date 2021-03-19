<?php
namespace App\Controllers;

class UsuarioController
{
    public function index()
    {
        echo "index de Usuario";
    }
    public function crear()
    {
        // echo "crear usuario";
        include "../views/usuario/crear.php";
    }

    public function mostrar()
    {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $sexo = $_POST['sexo'];

        if (isset($_POST['aficiones'])) {
            $aficiones = $_POST['aficiones'];
        } else {
            $aficiones = array();
            // $aficiones = []; //equivalente
        }

        include "../views/usuario/mostrar.php";

    }
}
