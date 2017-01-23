<?php
/**
* Check stuff for calculations
*
* Could format and check numbers and stuff like that
*
* This is an example just to see how this works, we have a file in the main
* folder doers, with all the post get delete put and so on methods, and we can
* extend from wherever we want like in this case from this customstuff folder
* with this extra method to check some info.
*
* 
* PHP 7.0
*
* Copyright 2017_?
*
* @location /doers/calculations.php
* @created 2017-01-22
*/

namespace customstuff;

//our bigbrother class above calculations one
class bigbrother {

    //lets see if there is info coming or not
    public function check($params) : bool {
        if (empty($params)) {
            $this->return = array("error" => "ERBB_00020", "message" => "no data to compute :P");
            return false;
        }
        return true;
    }
    
}
