<?php

class Database
{
    private $host;
    private $dbName;
    private $user;
    private $password;
    private $charset;

    function __construct()
    {
        $this->host = constant('HOST');
        $this->dbName = constant('DBNAME');
        $this->user = constant('USER');
        $this->password = constant('PASSWORD');
        $this->charset = constant('CHARSET');
    }

    function connect()
    {
        try {
            $dsn = "mysql:host=$this->host;dbname=$this->dbName;charset=$this->charset";

            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            ];

            $connection = new PDO($dsn, $this->user, $this->password, $options);

            error_log('DATABASE::=>Conect successfuly');

            return $connection;
            
        } catch (PDOException $err) {
            error_log(("DATABASE::=> $err"));
        }
    }
}
