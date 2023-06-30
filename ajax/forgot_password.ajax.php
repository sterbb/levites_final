<?php

require_once "../controllers/login.controller.php";
require_once "../models/login.model.php";


class forgotAccount {

    public $forgot_email;

    public function forgotPassword(){
        $forgot_email = $this -> forgot_email;

        $data = array("forgot_email"=>$forgot_email);

        return $answer = (new ControllerLogin)->ctrForgotPassword($data);
     
    }


}

$verify = new forgotAccount();

$verify -> forgot_email = $_POST["forgot_email"];

$verify -> forgotPassword();





?>