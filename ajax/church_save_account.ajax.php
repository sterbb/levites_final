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

        $answer = (new ControllerAccounts)->ctrAddChurchAccounts($data);

    }


}

$save_church_accounts = new registerAccount();

$save_church_accounts -> user_username = $_POST["user_username"];

$save_church_accounts -> user_password = $_POST["user_password"];

$save_church_accounts -> user_email = $_POST["user_email"];

$save_church_accounts -> registerUserAccount();





?>