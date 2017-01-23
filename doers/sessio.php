<?php
/**
* Fun with sessions
*
* Full CRUD with user session :)
*
* This is an example to check how to make use of RESTfull header methods.
* Based in what's coming, get, post, put, delete, the right method will 
* be executed.
*
* Example calls with rawdata sent as json:
* [as POST] https://localhost/sessio/data | {"id": "101", "name": "The Name"}
* [as PUT] https://localhost/sessio/data | {"id": "101", "name": "The Changed One"}
* [as GET] https://localhost/sessio/data
* [as DELETE] https://localhost/sessio/data | {"id": "101"}
* 
* PHP 7.0
*
* Copyright 2017_?
*
* @location /doers/sessio.php
* @created 2017-01-22
*/

namespace doers;

class sessio {

    //default return array
    public $return = array("error" => "0", "message" => "");
    
    //return info from data"base"
    public function data_get($params = array()) : array {
        $this->return["message"] = $_SESSION['sessio'] ?? array();
        return $this->return;
    }

    //add info to data"base"
    public function data_post($params = array()) : array {
        if ( !empty($params) ) { 
            $_SESSION['sessio'][]   = $params;
            $this->return["message"]= "Added OK";
        } else {
            $this->return["error"]  = "ERSESS_00025";
            $this->return["message"]= "Empty data, not added";
        }
        return $this->return;
    }

    //update info in the data"base"
    public function data_put($params = array()) : array {
        if ( !empty($params) ) {
            foreach($_SESSION['sessio'] as $key=>$value) {
                if ( key($value) === key($params) ) {
                    $_SESSION['sessio'][$key][array_keys($params)[1]] = $params[array_keys($params)[1]];
                }
            }
            $this->return["message"]= "Change OK";
        } else {
            $this->return["error"]  = "ERSESS_00065";
            $this->return["message"]= "Empty search field, not updated";
        }
        return $this->return;
    }
    
    //remove info from the data"base"
    public function data_delete($params = array()) : array {
        if ( !empty($params) ) {
            foreach($_SESSION['sessio'] as $key=>$value) {
                //unset($_SESSION['sessio'][$key][key($params)]);
                if ( !empty($value[key($params)]) ) {
                    if (key($value) === key($params)
                            && $value[key($value)] === $params[key($params)]) {
                        unset($_SESSION['sessio'][$key]);
                    }
                }
            }
            $this->return["message"]= "Removed OK";
        } else {
            $this->return["error"]  = "ERSESS_00065";
            $this->return["message"]= "Empty search field, not removed";
        }
        return $this->return;
    }
    
}

