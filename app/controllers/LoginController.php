<?php

namespace App\controllers;
use App\core\Controller;
use App\models\User;

class LoginController extends Controller
{
    public function index()
    {
        return $this->view('login/index');
    }

    public function auth()
    {
        $user = new User();
        $result = $user->query("select * from Users where login = :login", array('login' => $_POST['login']));

        if(password_verify($_POST['password'],$result[0]['password']))
        {
            $_SESSION['auth'] = true;
            header('Location: /admin');
        }else{
            $_SESSION['error'] = "Неверный логин или пароль";
            header('Location: /login');
        }
    }

    public function logout()
    {
        $_SESSION['auth'] = false;
        header('Location: /login');
    }
}