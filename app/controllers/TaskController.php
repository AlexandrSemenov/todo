<?php

namespace App\controllers;
use App\core\Controller;
use App\models\Task;
use App\service\Upload;

class TaskController extends Controller
{
    public function index()
    {
        header("Location: /home");
    }

    public function create()
    {
        return $this->view('tasks/create');
    }

    public function save()
    {
        $upload = new Upload();
        $upload->uploadImage($_FILES["image"]);

        $task = new Task();
        $task->query("INSERT INTO Tasks(name, email, description, image_path) VALUES (:name,:email,:description,:image_path)",
            array("name" => $_POST['name'], "email" => $_POST['email'], "description" => $_POST['description'], "image_path" => "assets/image/" . $_FILES['image']['name']));

        header("Location: /");
    }

    public function edit($params = '')
    {
        $task = new Task();
        $task = $task->query("SELECT * FROM Tasks WHERE id = :id", array('id' => $params[0]));

        return $this->view('tasks/edit', ['task' => $task]);
    }

    public function update($params = '')
    {
        $task = new Task();
        $task->query("UPDATE Tasks SET name = :name, email = :email, description = :description, done = :done WHERE id = :id",
            array('name' => $_POST['name'], 'email' => $_POST['email'], 'description' => $_POST['description'], 'done' => isset($_POST['done'])? '1':"0",
                'id' => $params[0]));
        header("Location: /admin");
    }

    public function delete($params = '')
    {
        $task = new Task();
        $task->query("DELETE FROM Tasks WHERE id = :id", array('id' => $params[0]));
        header("Location: /admin");
    }
}