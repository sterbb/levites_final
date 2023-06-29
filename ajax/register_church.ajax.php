<?php

require_once "../controllers/registration.controller.php";
require_once "../models/registration.model.php";


class registerChurch {

    public $church_username;
    public $church_password;
    public $church_email;
    public $church_proof;
    public $user_proof;


    public function registerChurchAccount(){
        $church_username = $this -> church_username;
        $church_password = $this -> church_password;
        $church_email = $this -> church_email;
        $church_proof = $this -> church_proof;
        $user_proof = $this -> user_proof;



        // $hashpass = password_hash($password, PASSWORD_DEFAULT);

        $data = array("church_username"=>$church_username,
        "church_password"=>$church_password,
        "church_email"=>$church_email,
        "church_proof"=>$church_proof,
        "user_proof"=>$user_proof);

        return $answer = (new ControllerRegistration)->ctrRegisterChurch($data);
     
    }


}

$register = new registerChurch();

$register -> church_username = $_POST["church_username"];

$register-> church_password = $_POST["church_password"];

$register-> church_email = $_POST["church_email"];

$register-> church_proof = $_POST["church_proof"];

$register-> user_proof = $_POST["user_proof"];

$register -> registerChurchAccount();





?>