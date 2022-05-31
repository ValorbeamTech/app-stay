<?php


class Application
{
    public function isAdmin($username, $password)
    {
        if($username == 'admin' && $password == '$sysdev0'){
            return true;
        }
        return false;
    }
}