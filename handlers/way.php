<?php
/**
* koolREST handlers to get on the way :P
*
* Defining needed stuff in general
*
* PHP 7.0
*
* Copyright 2017_?
*
* @location /handlers/way.php
* @created 2017-01-22
*/

//smart autoloader to check right files for class usage
spl_autoload_register(function ($className) : bool {
    $className 	= str_replace('\\', DIRECTORY_SEPARATOR, $className);
    $file	= DIR_ROOT . "/{$className}.php";
    if (is_readable($file)) {
        require_once($file);
        return true;
    }
    return false;
});

//check get method sent info
function sanitize() : array {
    if ( $_SERVER['REQUEST_METHOD'] === "GET" && !empty($_GET) ) {
        return filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING) ?? array();
    }else {
        if ( !empty($_POST) ) {
            return filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING) ?? array();
        }else {
            $tocheck = json_decode(file_get_contents("php://input"), true) ?? array();
            foreach($tocheck as $key=>$value) {
                $tocheck[$key] = filter_var($value, FILTER_SANITIZE_STRING);
            }
            return $tocheck;
        }
    }
}
