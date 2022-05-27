<?php



class Db 
{
    private $_connection;
    private static $_instance; // single instance
    private $_host = 'localhost';
    private $_username = 'admin';
    private $_password = 'mysql_admin';
    private $_database = 'app-stay';

    private function getInstance()
    {
        if(!self::$_instance){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function __construct()
    {
        try
        {
            $this->_connection = new PDO('mysql:host='.$this->_host.';dbname='.$this->_database, $this->_username, $this->_password);
            $this->_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->_connection;

        }catch(PDOException $e){

            die("Database error ".$e->getMessage());

        }

    }

    private function __clone(){}

    public function getConnection()
    {
        return $this->getInstance();
    }
}

