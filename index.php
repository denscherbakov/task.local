<?php
session_start();
error_reporting(-1);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
require_once __DIR__ . '/autoload.php';

//Вспомогательные функции
require_once __DIR__ . '/functions.php';

$parts = explode('/', $_SERVER['REQUEST_URI']);

$ctrlRequest = !empty($parts[1]) ? $parts[1] . 'Controller' : 'IndexController';
$ctrlClassName = '\App\Controllers\\' . ucfirst($ctrlRequest);

if (!file_exists(__DIR__ . '/App/Controllers/' . $ctrlRequest . '.php')){
    $ctrl = new \App\Controllers\IndexController();
    $ctrl->actionPage404();
    die;
}

$ctrl = new $ctrlClassName;

$actRequest = !empty($parts[2]) ? $parts[2] : 'Index';

$idRequest = !empty($parts[3]) ? $parts[3] : null;

$actMethodName = $ctrl->action($actRequest);
$ctrl->$actMethodName($idRequest);
