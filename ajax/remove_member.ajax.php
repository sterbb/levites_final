<?php
require_once "../controllers/collaboration.controller.php";
require_once "../models/collaboration.model.php";
class RemoveMember{

    public $mshipID;
    
    public function removeMember(){
      $mshipID = $this->mshipID;

       $data = array("mshipID"=> $mshipID);
       $answer = (new CollaborationController)->ctrMemberRemove($data);
       echo json_encode($answer);
    }
}
 

  $getDetails = new RemoveMember();
  $getDetails -> mshipID = $_POST["mshipID"];
  $getDetails -> removeMember();
