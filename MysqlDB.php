<?php



class MysqlDB 
{
    private $_connection;
    private $_host = 'localhost';
    private $_username = 'admin';
    private $_password = 'mysql_admin';
    private $_database = 'app-stay';

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
        if(!$this->_connection){
            $this->connection = new self();
        }

        if($this->_connection instanceof PDO)
        {
            return $this->_connection;
        }
        
    }
}

