<?php
require_once "../controllers/membership.controller.php";
require_once "../models/membership.model.php";

class CancelMembership{

    public $membershipID;

    public function cancelChurchMembership(){

      $membershipID = $this->membershipID;


       $data = array("membershipID"=> $membershipID);
       return $answer = (new ControllerMembership)->ctrcancelMembership($data);

    }
}
 

$churchMembership = new CancelMembership();

$churchMembership -> membershipID = $_POST["membershipID"];

$churchMembership -> cancelChurchMembership();