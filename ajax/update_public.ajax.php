<?php
require_once "../controllers/public.controller.php";
require_once "../models/public.model.php";

class PublicUpdate {

    public $public_username;
    public $public_password;
    public $public_email;

    public $public_fname;
    public $public_lname;
    public $public_religion;
    public $public_contact;


    


    public function publicUserUpdate(){
        $public_username = $this -> public_username;
        $public_password = $this -> public_password;
        $public_email = $this -> public_email;

        $public_fname = $this -> public_fname;
        $public_lname = $this -> public_lname;
        $public_religion = $this -> public_religion;
        $public_contact = $this -> public_contact;


     
        // $hashpass = password_hash($password, PASSWORD_DEFAULT);


        $data = array("public_username"=>$public_username,
        "public_password"=>$public_password,
        "public_email"=>$public_email,
        "public_fname"=>$public_fname,
        "public_lname"=>$public_lname,
        "public_religion"=>$public_religion,
        "public_contact"=>$public_contact
    
        );

        return $answer = (new ControllerPublic)->ctrUpdatePublic($data);
     
    }


}

$publicEdit = new PublicUpdate();

$publicEdit -> public_username = $_POST["public_username"];

$publicEdit-> public_password = $_POST["public_password"];

$publicEdit-> public_email = $_POST["public_email"];

$publicEdit-> public_fname = $_POST["public_fname"];

$publicEdit-> public_lname = $_POST["public_lname"];

$publicEdit-> public_religion = $_POST["public_religion"];

$publicEdit-> public_contact = $_POST["public_contact"];




$publicEdit -> publicUserUpdate();
