<?php
require_once "../controllers/collaboration.controller.php";
require_once "../models/collaboration.model.php";
class RejectMember{

  public $mshipID;
  public $acc_id;
  public $acc_name;
    
    public function rejectMember(){
      $mshipID = $this->mshipID;
      $acc_id = $this->acc_id;
      $acc_name = $this->acc_name;

       $data = array("mshipID"=> $mshipID,
       "acc_id"=> $acc_id,
       "acc_name"=> $acc_name);
       $answer = (new CollaborationController)->ctrMemberReject($data);
       echo json_encode($answer);
    }
}
 

  $getDetails = new RejectMember();
  $getDetails -> mshipID = $_POST["mshipID"];
  $getDetails -> acc_id = $_POST["acc_id"];
  $getDetails -> acc_name = $_POST["acc_name"];
  $getDetails -> rejectMember();
