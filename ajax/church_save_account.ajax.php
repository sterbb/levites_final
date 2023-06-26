<?php

require_once "../controllers/register.church.controller.php";
require_once "../models/register.church.model.php";


class saveChurchAccounts {

    public $trans_type;
    public $username;

    public $password;

    public $email;

    public $churchName;

    public $religion;
    public $churchAddress;

    public $city;

    public $telnum;

    public $country;

    public $profleg;

    public $agree;

    public $churchID;

    public function saveChurchAccountsRecord(){
        $trans_type = $this -> trans_type;
        $username = $this -> username;
        $password = $this -> password;
        $email = $this -> email;
        $churchName = $this -> churchName;
        $religion = $this -> religion;
        $churchAddress = $this -> churchAddress;
        $city = $this -> city;
        $telnum = $this -> telnum;
        $country = $this -> country;
        $profleg = $this -> profleg;
        $agree = $this -> agree;
        $churchID = $this -> churchID;


        $hashpass = password_hash($password, PASSWORD_DEFAULT);



        $data = array("username"=>$username,
        "password"=>$hashpass,
        "email"=>$email,
        "churchName"=>$churchName,
        "religion"=>$religion,
        "churchAddress"=>$churchAddress,
        "city"=>$city,
        "telnum"=>$telnum,
        "profleg"=>$profleg,
        "agree"=>$agree,
        "churchID"=>$churchID,
        "country"=>$country);


        if ($trans_type == 'New'){
            $answer = (new ControllerAccounts)->ctrAddChurchAccounts($data);
          }else{
            $answer = (new ControllerAccounts)->ctrEditChurchAccounts($data);
          }
    }


}

$save_church_accounts = new saveChurchAccounts();
$save_church_accounts -> trans_type = $_POST["trans_type"];

$save_church_accounts -> username = $_POST["username"];

$save_church_accounts -> password = $_POST["password"];

$save_church_accounts -> email = $_POST["email"];

$save_church_accounts -> churchName = $_POST["churchName"];

$save_church_accounts -> religion = $_POST["religion"];

$save_church_accounts -> churchAddress = $_POST["churchAddress"];

$save_church_accounts -> city = $_POST["city"];

$save_church_accounts -> telnum = $_POST["telnum"];

$save_church_accounts -> country = $_POST["country"];

$save_church_accounts -> profleg = $_POST["profleg"];

$save_church_accounts -> agree = $_POST["agree"];

$save_church_accounts -> churchID = $_POST["churchID"];

$save_church_accounts -> saveChurchAccountsRecord();





?>