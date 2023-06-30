<?php 

class ControllerLogin{

    static public function ctrAuthenticateLogin($data){
        return $answer = (new ModelLogin)->Login($data);
    }

    static public function ctrForgotPassword($data){
		return $answer = (new ModelLogin)->mdlForgotPassword($data);
	}

    static public function ctrResetPassword($data){
		return $answer = (new ModelLogin)->mdlResetPassword($data);
	}

}

?>