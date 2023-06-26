<?php

require_once "../controllers/registration.controller.php";
require_once "../models/registration.model.php";


class registerAccount {

    public $user_username;
    public $user_password;
    public $user_email;


    public function registerUserAccount(){
        $user_username = $this -> user_username;
        $user_password = $this -> user_password;
        $user_email = $this -> user_email;



        // $hashpass = password_hash($password, PASSWORD_DEFAULT);



        $data = array("user_username"=>$user_username,
        "user_password"=>$user_password,
        "user_email"=>$user_email);

        return $answer = (new ControllerRegistration)->ctrRegisterAccount($data);
     
    }


}

$register = new registerAccount();

$register -> user_username = $_POST["user_username"];

$register-> user_password = $_POST["user_password"];

$register-> user_email = $_POST["user_email"];

$register -> registerUserAccount();





?>