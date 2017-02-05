<?php

namespace App\controllers;
use App\core\Controller;
use App\models\User;
use App\models\Task;

class AdminController extends Controller
{
    public function index($params = '')
    {
        if($_SESSION['auth'] == true)
        {
            $task = new Task();

            if(isset($params[0]) && $params[0] == 'orderby')
            {
                $tasks = $task->query("select * from Tasks order by $params[1] $params[2]");
            }else{
                $tasks = $task->query("select * from Tasks");
            }

            return $this->view('admin/index', ['tasks' => $tasks]);
        }else{
            header("Location: /login");
        }
    }

    public function delete($params = '')
    {
        echo "Admin controller action delete run ";
    }

    public function setAdmin()
    {
        $user = new User();
        $user->query('INSERT INTO Users (login, password) VALUES (:login, :password)', array('login' => 'admin', 'password' => password_hash('123', PASSWORD_BCRYPT)));
        echo "admin добавлен";
    }

    public function getadmin()
    {
        $user = new User();
        $result = $user->query("select * from Users where login = :admin", array('admin' => 'admin'));

    }
}