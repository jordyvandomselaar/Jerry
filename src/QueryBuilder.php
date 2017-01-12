<?php
/**
 * Created by PhpStorm.
 * User: jordy
 * Date: 20-12-2016
 * Time: 16:58
 */


namespace Qlib;
use Qlib\Query\Query;


/**
 * Class QueryBuilder
 * @package Qlib
 */


class QueryBuilder
{
    private $host;
    private $username;
    private $password;
    private $database;
    private $query;
    private $connection;
    static private $instance;

    /**
     * Set settings
     * @param $host
     * @param $username
     * @param $password
     * @param $database
     */
    private function configure($host, $database, $username, $password = null) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
        return $this;
    }

    /**
     * @return \PDO
     */
    private function getPDO()
    {
        $dns = "mysql:host=$this->host;dbname=$this->database";
        if(!$this->connection) $this->connection = new \PDO($dns, $this->username, $this->password);
        return $this->connection;
    }

    /**
     * @param string $name
     * @param array $arguments
     */
    function __call($name, $arguments)
    {
        if(method_exists($this, $name)) return call_user_func_array([$this, $name], $arguments);

        return call_user_func_array([$this->getQuery(), $name], $arguments);
    }

    /**
     * @param string $name
     * @param array $arguments
     */
    static function __callStatic($name, $arguments)
    {
        $queryBuilder = self::getInstance();
        return $queryBuilder->__call($name, $arguments);

    }

    /**
     *
     */
    function __clone()
    {
        // We won't be doing anything here, it's just to prevent multiple instances
    }

    /**
     * @return Query
     */
    private function getQuery()
    {
        if(!$this->query) $this->query = new Query();
        return $this->query;
    }

    static private function getInstance(){
        if(!self::$instance) self::$instance = new QueryBuilder();
        return self::$instance;
    }




}