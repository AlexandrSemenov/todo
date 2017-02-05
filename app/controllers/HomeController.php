<?php

namespace App\controllers;
use App\core\Controller;
use App\models\Task;

class HomeController extends Controller
{

    /**
     * action выводит все задачи
     * @param string $params
     */
    public function index($params = '')
    {
        $task = new Task();

        if(isset($params[0]) && $params[0] == 'orderby')
        {
            $tasks = $task->query("select * from Tasks order by $params[1] $params[2]");
        }else{
            $tasks = $task->query("select * from Tasks");
        }

        return $this->view('home/index', ['tasks' => $tasks]);
    }
}