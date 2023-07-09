<?php

require_once "../controllers/registration.controller.php";
require_once "../models/registration.model.php";


class registerAccount {

    public $user_username;
    public $user_password;
    public $user_email;
    public $user_fname;
    public $user_lname;
    public $user_religion;
    


    public function registerUserAccount(){
        $user_username = $this -> user_username;
        $user_password = $this -> user_password;
        $user_email = $this -> user_email;
        $user_fname = $this -> user_fname;
        $user_lname = $this -> user_lname;
        $user_religion = $this -> user_religion;




        // $hashpass = password_hash($password, PASSWORD_DEFAULT);



        $data = array("user_username"=>$user_username,
        "user_password"=>$user_password,
        "user_fname"=>$user_fname,
        "user_lname"=>$user_lname,
        "user_religion"=>$user_religion,
        "user_email"=>$user_email);

        return $answer = (new ControllerRegistration)->ctrRegisterAccount($data);
     
    }


}

$register = new registerAccount();

$register -> user_username = $_POST["user_username"];

$register-> user_password = $_POST["user_password"];

$register-> user_fname= $_POST["user_fname"];

$register-> user_lname = $_POST["user_lname"];

$register-> user_religion = $_POST["user_religion"];

$register-> user_email = $_POST["user_email"];

$register -> registerUserAccount();





?>

