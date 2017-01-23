<?php
/**
* Do calculation
*
* Calculate stuff in general :)
*
* This is an example just to see how this works, we have a file in the main
* folder doers, with all the post get delete put and so on methods, and we can
* extend from wherever we want like in this case from this customstuff folder
* with this extra method to check some info.
*
* Example calls:
* https://localhost/calculations/add?do=[1,20,33,4,50,66,7,80,99,100]
* 
* https://localhost/calculations/subtract?do=[1,20,33,4,50,66,7,80,99,100]
* 
* PHP 7.0
*
* Copyright 2017_?
*
* @location /doers/calculations.php
* @created 2017-01-22
*/

namespace doers;

//will use extended class for this example
use customstuff\bigbrother as bb;

class calculations extends bb {

    //default return array
    public $return = array("error" => "0", "message" => "");
    
    //we sum stuff in this function
    public function add($params = array()) : array {
        if ( !$this->check($params) ) return $this->return;
        $result = 0;
        foreach(json_decode($params['do'], true) as $key=>$value) {
            $result += (int)$value;
        }
        $this->return["message"] = $result;
        return $this->return;
    }

    //subtract info coming
    public function subtract($params = array()) : array {
        if ( !$this->check($params) ) return $this->return;
        $result = 0;
        foreach(json_decode($params['do'], true) as $key=>$value) {
            $result -= (int)$value;
        }
        $this->return["message"] = $result;
        return $this->return;
    }

    //doing multiplication
    public function multiply($params = array()) : array {
        if ( !$this->check($params) ) return $this->return;
        $result = 1;
        foreach(json_decode($params['do'], true) as $key=>$value) {
            $result *= (int)$value;
        }
        $this->return["message"] = $result;
        return $this->return;
    }

    //diving our bunch of values
    public function divide($params = array()) : array {
        if ( !$this->check($params) ) return $this->return;
        $result = 1;
        foreach(json_decode($params['do'], true) as $key=>$value) {
            $result /= (int)$value;
        }
        $this->return["message"] = $result;
        return $this->return;
    }
    
}
