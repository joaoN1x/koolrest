<?php
/**
* koolREST home place
*
* index which processes incoming endpoint calls and json answers
*
* PHP 7.0
*
* Copyright 2017_?
*
* @location /index.php
* @created 2017-04-22
*/

//get main vars used in different files, and core kickoff
require_once('core.php');
require_once('handlers/way.php');

//applying right encoding from this point on
header("Content-Type: application/json; charset=utf-8");

//default return data, which will be json encoded
$returnData     = array("error" => "0", "message" => "");

//sanitizing all headers data
$params         = sanitize();

//class build handling handling
$className      = explode("/", trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), "/"));
if ( count($className) === 2 ) { 
    $methodName             = $className[1];
    //all controllers should be inside doers folder
    $className              = "doers\\" . $className[0];
    $do                     = new $className;
    $returnData["error"]    = "ER_00050";
    $returnData["message"]  = "Method does not exist";
    //checking if method exists
    if (method_exists($className, $methodName)) {
        $returnData = $do->{$methodName}($params);
    }
    //checking as well method _ request method like get, put, delete and so on
    $methodName     .= "_" . strtolower($_SERVER['REQUEST_METHOD']);
    if (method_exists($className, $methodName)) {
        $returnData = $do->{$methodName}($params);
    }   
} else {
    //there is not enough args to go on
    $returnData["error"]    = "ER_00100";
    $returnData["message"]  = "Invalid method call";    
}

//write out rest stuff result
print json_encode($returnData);
