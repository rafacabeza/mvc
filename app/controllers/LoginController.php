<?php
namespace App\Controllers;

use \App\Models\User;
use FontLib\Table\Type\head;

class LoginController  
{
    public function __construct()
    {
        # code...
    }

    public function index()
    {
        if (isset($_SESSION['user'])) {
            header('Location: /home');
        } else {
            include ('../views/login.php');
        }
    }

    public function acceder()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // $user = \App\Models\User::findByEmail($email);
        $user = User::findByEmail($email);
        
        // if ($password == 'secret') {
        // if (isset($user) && $user->passwordVerify($password)) {
        if ($user && $user->passwordVerify($password)) {
            $_SESSION['user'] = $user;
            header('Location: /home');
        } else {
            $_SESSION['error'] = 'Credenciales incorrectas';
            header('Location: /login');
        }        
    }

    public function cerrar()
    {
        session_destroy();
        header('Location: /login');
    }
}
