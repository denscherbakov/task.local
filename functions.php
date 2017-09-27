<?php

/**
 * How in Laravel :)
 * @param $data
 */
function dd($data){
    echo '<pre>' . print_r($data) . '</pre>';
    die;
}