<?php
require_once "../controllers/account.controller.php";
require_once "../models/account.model.php";

class UserAccount {

    public $memID;
    public $restriction;
    public $account_type;

    


    public function memberUserAccount(){
        $memID = $this -> memID;
        $restriction = $this -> restriction;
        $account_type = $this -> account_type;
     

        $data = array("memID"=>$memID,
        "restriction"=>$restriction,
        "account_type"=>$account_type);

        return $answer = (new ControllerUserAccount)->ctrAddSubMember($data);
     
    }


}

$user = new UserAccount();

$user -> memID = $_POST["memID"];

$user-> restriction = $_POST["restriction"];

$user-> account_type = $_POST["account_type"];


$user -> memberUserAccount();
