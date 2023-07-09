<?php
require_once "../controllers/account.controller.php";
require_once "../models/account.model.php";

class UserAccount {

    public $user_name;
    public $user_password;
    


    public function memberUserAccount(){
        $user_name = $this -> user_name;
        $user_password = $this -> user_password;
     
        // $hashpass = password_hash($password, PASSWORD_DEFAULT);


        $data = array("user-name"=>$user_name,
        "user-password"=>$user_password);

        return $answer = (new ControllerUserAccount)->ctrAddUserAccount($data);
     
    }


}

$user = new UserAccount();

$user -> user_name = $_POST["user-name"];

$user-> user_password = $_POST["user-password"];


$user -> memberUserAccount();
