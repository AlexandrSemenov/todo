<?php

namespace App\core;



class App
{

    /**
     * метод и контроеллер которые используются по умолчанию
     * @var string
     */
    protected $controller = 'home';
    protected $action = 'index';

    /**
     * массив с параметрами
     * @var array
     */
    protected $params = [];


    public function __construct()
    {
        $url = $this->parsUrl();

        if(file_exists("../app/controllers/" . $url[0] . "Controller.php"))
        {
            $this->controller = $url[0];
            unset($url[0]);
        }

        /**
         * создавем объект класса Controller
         */
        $controllerClass = 'App\\controllers\\' . $this->controller . "Controller";
        $this->controller = new $controllerClass;

        /**
         * проверяем есть ли у контроллера action
         */
        if(isset($url[1]))
        {
            if(method_exists($this->controller, $url[1]))
            {
                $this->action = $url[1];
                unset($url[1]);
            }
        }

        /**
         * записываем параметры в массив params
         */
        $this->params = $url ? array_values($url) : '';

        /**
         * вызываем action контроллера с параметрами
         */
        call_user_func([$this->controller, $this->action], $this->params);
    }


    /**
     * разбиваем строку запроса
     * @return array
     */
    public function parsUrl()
    {

        if(isset($_GET['url']))
        {
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }
}