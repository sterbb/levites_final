<?php

require_once "../controllers/registration.controller.php";
require_once "../models/registration.model.php";


class registerChurch {

    public $church_fname;
    public $church_lname;
    public $church_designation;
    public $church_telnum;

    public $church_name;
    public $church_address;
    public $church_religion;
    public $church_city;
    public $church_cotnum;

    public $church_username;
    public $church_password;
    public $church_email;
    public $church_proof;
    public $user_proof;


    public function registerChurchAccount(){
        $church_fname = $this -> church_fname;
        $church_lname = $this -> church_lname;
        $church_designation = $this -> church_designation;
        $church_telnum = $this -> church_telnum;

        $church_name = $this -> church_name;
        $church_address = $this -> church_address;
        $church_religion = $this -> church_religion;
        $church_city = $this -> church_city;
        $church_cotnum = $this -> church_cotnum;


        $church_username = $this -> church_username;
        $church_password = $this -> church_password;
        $church_email = $this -> church_email;
        $church_proof = $this -> church_proof;
        $user_proof = $this -> user_proof;



        // $hashpass = password_hash($password, PASSWORD_DEFAULT);

        $data = array("church_fname"=>$church_fname,
        "church_lname"=>$church_lname,
        "church_designation"=>$church_designation,
        "church_telnum"=>$church_telnum,


        "church_name"=>$church_name,
        "church_address"=>$church_address,
        "church_city"=>$church_city,
        "church_religion"=>$church_religion,
        "church_cotnum"=>$church_cotnum,


        "church_username"=>$church_username,
        "church_password"=>$church_password,
        "church_email"=>$church_email,
        "church_proof"=>$church_proof,
        "user_proof"=>$user_proof);

        return $answer = (new ControllerRegistration)->ctrRegisterChurch($data);
     
    }


}

$register = new registerChurch();

$register -> church_fname = $_POST["church_fname"];

$register -> church_lname = $_POST["church_lname"];

$register -> church_designation = $_POST["church_designation"];

$register -> church_telnum = $_POST["church_telnum"];



$register -> church_name = $_POST["church_name"];

$register -> church_address = $_POST["church_address"];

$register -> church_city = $_POST["church_city"];

$register -> church_religion = $_POST["church_religion"];

$register -> church_cotnum = $_POST["church_cotnum"];



$register -> church_username = $_POST["church_username"];

$register-> church_password = $_POST["church_password"];

$register-> church_email = $_POST["church_email"];

$register-> church_proof = $_POST["church_proof"];

$register-> user_proof = $_POST["user_proof"];

$register -> registerChurchAccount();





?>
Write to Jajajo
