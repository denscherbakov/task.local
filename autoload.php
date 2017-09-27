<?php

function __autoload($className)
{
    $className = str_replace('\\', '/', $className);
    $filename = __DIR__ . '/' . $className . '.php';
    require $filename;
}