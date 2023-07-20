<?php
require_once "../controllers/collaboration.controller.php";
require_once "../models/collaboration.model.php";
class RejectMember{

    public $mshipID;
    
    public function rejectMember(){
      $mshipID = $this->mshipID;

       $data = array("mshipID"=> $mshipID);
       $answer = (new CollaborationController)->ctrMemberReject($data);
       echo json_encode($answer);
    }
}
 

  $getDetails = new RejectMember();
  $getDetails -> mshipID = $_POST["mshipID"];
  $getDetails -> rejectMember();
