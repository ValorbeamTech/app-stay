<?php



class Db 
{
    protected static $instance;

    protected function __construct() {}

    public static function getInstance()
    {
        if(empty(self::$instance)){
            $db_info = array(
                
            );
        }
    }

}