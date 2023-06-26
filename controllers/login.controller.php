<?php 

class ControllerLogin{

    static public function ctrAuthenticateLogin($data){
        return $answer = (new ModelLogin)->Login($data);
    }
}

?>