<?php

class Auth
{
    public function __construct($model)
    {
        $this->model = $model;
    }
    
    public function authenticate($username, $password)
    {
        $user = $this->model->getUserData();
    }

    public function login($token)
    {

    }

    public function logout()
    {

    }
}