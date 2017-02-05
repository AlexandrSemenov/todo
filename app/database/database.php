<?php

namespace App\database;


class DataBase
{
    /**
     * объект PDO
     * @obj
     */
    private $pdo;

    /**
     * объект запроса
     * @obj
     */
    private $statementQuery;

    /**
     * настройки базы данных
     * @array
     */
    private $settings;

    /**
     * подключение к базе данных
     * @bool
     */
    private $connected = false;

    /**
     * парметры SQL запроса
     * @array
     */
    private $parameters;

    public function __construct()
    {
        $this->Connect();
        $this->parameters = array();
    }

    /**
     * метод который осуществляет подключение к базе данных
     */

    private function Connect()
    {
        $this->settings = parse_ini_file('settings.ini');

        try{
            $this->pdo = new \PDO('mysql:host='.$this->settings['host'].';dbname='.$this->settings['dbname'], $this->settings['user'], $this->settings['password']);
            $this->connected = true;
        }catch (\PDOException $e)
        {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }

    }

    /**
     * @param $query
     * @param $parameters
     * Методо который выполняет SQL запрос
     */

    private function Init($query, $parameters = "")
    {
        /**
         * если не подключены к базе данных
         */
        if(!$this->connected)
        {
            $this->Connect();
        }
        try{

            /**
             * подготовка SQL запроса
             */
            $this->statementQuery = $this->pdo->prepare($query);

            /**
             * добавить парметры в массив
             */
            $this->bindMore($parameters);

            /**
             * связываем параметры
             */

            if(!empty($this->parameters))
            {

                foreach($this->parameters as $param => $value)
                {
                    if(is_int($value['1']))
                    {
                        $type = \PDO::PARAM_INT;
                    }elseif(is_bool($value['1'])){
                        $type = \PDO::PARAM_BOOL;
                    }elseif(is_null($value['1'])){
                        $type = \PDO::PARAM_BOOL;
                    }else{
                        $type = \PDO::PARAM_STR;
                    }

                    $this->statementQuery->bindValue($value[0], $value[1], $type);
                }
            }

            /**
             * выполняем SQL запрос
             */
            $this->statementQuery->execute();


        }catch(\PDOException $e){
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }

        /**
         * очищаем массив с параметрами
         */
        $this->parameters = array();

    }

    /**
     * добавить параметры в массив
     */
    public function bind($param, $value)
    {
        $this->parameters[count($this->parameters)] = [":".$param, $value ];
    }

    /**
     * добавить больше параметров в массив
     */
    public function bindMore($paramsArray)
    {
        if(empty($this->parameters) && is_array($paramsArray))
        {
            $columns = array_keys($paramsArray);
            foreach ($columns as $key => &$column)
            {
                $this->bind($column, $paramsArray[$column]);
            }
        }
    }

    /**
     * если SQl  запрос содержит блок SELECT или SHOW тогда метод вернет массив с результатами, а если содержит блоки DELETE, INSERT
     * тогда вернет колво измененных строк
     * @param  string $query
     * @param  array  $params
     * @param  int $fetchmode
     * @return mixed
     *
     */

    public function query($query, $params = null, $fetchmode = \PDO::FETCH_ASSOC)
    {
        $query = trim(str_replace('\r', '', $query));

        $this->Init($query, $params);

        $rawStatement = explode(" ", preg_replace("/\s+|\t+|\n+/", " ", $query));

        $statement = strtolower($rawStatement[0]);

        if($statement === 'select' || $statement === 'show')
        {
            return $this->statementQuery->fetchAll($fetchmode);
        }elseif($statement === 'insert' || $statement === 'delete' || $statement === 'update'){
            return $this->statementQuery->rowCount();
        }else{
            return Null;
        }
    }

}