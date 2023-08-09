<?php
require_once "../controllers/collaboration.controller.php";
require_once "../models/collaboration.model.php";
class CollabReject{

    public $collabID;
    public $churchID;
    public $church_name;
    public function rejectCollab(){
      $collabID = $this->collabID;
      $churchID = $this->churchID;
      $church_name = $this->church_name;
       $data = array("collabID"=> $collabID,
                     "churchID"=> $churchID,
                     "church_name"=> $church_name);
       $answer = (new CollaborationController)->ctrRejectCollab($data);
       echo $answer;
    }
}
 

  $getDetails = new CollabReject();
  $getDetails -> collabID = $_POST["collabID"];
  $getDetails -> churchID = $_POST["churchID"];
  $getDetails -> church_name = $_POST["church_name"];
  $getDetails -> rejectCollab();
