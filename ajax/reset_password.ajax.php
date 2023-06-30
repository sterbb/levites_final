<?php

require_once "../controllers/login.controller.php";
require_once "../models/login.model.php";


class resetAccount {

    public $new_password;

    public function resetPassword(){
        $new_password = $this -> new_password;

        $data = array("new_password"=>$new_password);

        return $answer = (new ControllerLogin)->ctrResetPassword($data);
     
    }


}

$reset = new resetAccount();

$reset -> new_password = $_POST["forgot_password"];

$reset -> resetPassword();





?>