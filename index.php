<?php
session_start();
require_once __DIR__ . '/autoload.php';

//Вспомогательные функции
require_once __DIR__ . '/functions.php';

$parts = explode('/', $_SERVER['REQUEST_URI']);

$ctrlRequest = !empty($parts[1]) ? $parts[1] . 'Controller' : 'IndexController';
$ctrlClassName = '\App\Controllers\\' . ucfirst($ctrlRequest);

$ctrl = new $ctrlClassName;

$actRequest = !empty($parts[2]) ? $parts[2] : 'Index';

$idRequest = !empty($parts[3]) ? $parts[3] : null;


try {
    $actMethodName = $ctrl->action($actRequest);
    $ctrl->$actMethodName($idRequest);
} catch (Exception $e){
    dd(111);
}