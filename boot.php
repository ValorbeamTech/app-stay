<?php
// get a database class
require_once('MysqlDB.php');
require_once('models/User.php');

// initialize a database connection
$db = new MysqlDB();

// get a datatabase connection
$db->getConnection();

$user = new User(2, $db->getConnection());

// $params['firstname'] = 'Joseph update';
// $params['middlename'] = 'Ernest update';
// $params['lastname'] = 'Tawete';
// $params['email'] = 'example@sample.com';
// $params['username'] = 'jtawete';
// $params['phone'] = 722186944;
// $params['birthdate'] = '1980-02-01';
// $params['created_by'] = 7;
// $params['visible'] = 1;
// $params['status'] = 'on duty';
// $params['role'] = 'admin';

// echo $user->createUser($params);

// print_r($user->getUserData());

// $user->updateUser($params);

// var_dump($user->queryUser("SELECT username, email FROM users WHERE visible = :visible ", ['visible'=>1]));



