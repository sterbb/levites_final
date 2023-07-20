<?php
require_once "../controllers/collaboration.controller.php";
require_once "../models/collaboration.model.php";
class AcceptMember{

    public $mshipID;
    
    public function acceptMember(){
      $mshipID = $this->mshipID;

       $data = array("mshipID"=> $mshipID);
       $answer = (new CollaborationController)->ctrMemberAccept($data);
       echo json_encode($answer);
    }
}
 

  $getDetails = new AcceptMember();
  $getDetails -> mshipID = $_POST["mshipID"];
  $getDetails -> acceptMember();
