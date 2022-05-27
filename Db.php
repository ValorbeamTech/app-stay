<?php



class Db 
{
    private $_connection;
    private static $_instance; // single instance
    private $_host = '127.0.0.1';
    private $_username = 'root';
    private $_password = '';
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
        $this->_connection = new mysqli($this->_host, $this->_username, $his->_password, $this->_database);
        if($this->_connection->connect_errno)
        {
            trigger_error("Failed to connect to the Database ".$this->_connection->connect_error, E_USER_ERROR);
            return;
        }

    }

    private function __clone(){}

    public function getConnection()
    {
        return $this->getInstance();
    }
}