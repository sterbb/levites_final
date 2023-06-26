<?php

require_once "../controllers/registration.controller.php";
require_once "../models/registration.model.php";


class verifyAccount {

    public $code;

    public function verifyRegistration(){
        $code = $this -> code;

        $data = array("code"=>$code);

        return $answer = (new ControllerRegistration)->ctrVerifyRegisteration($data);
     
    }


}

$verify = new verifyAccount();

$verify -> code = $_POST["code"];

$verify -> verifyRegistration();





?>