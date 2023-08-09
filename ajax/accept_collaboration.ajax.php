<?php
require_once "../controllers/collaboration.controller.php";
require_once "../models/collaboration.model.php";
class CollabAccept{

    public $collabID;
    public $churchID;
    public $church_name;
    public function acceptCollab(){
      $collabID = $this->collabID;
      $churchID = $this->churchID;
      $church_name = $this->church_name;

       $data = array("collabID"=> $collabID,
       "churchID"=> $churchID,
       "church_name"=> $church_name);
       $answer = (new CollaborationController)->ctrAcceptCollab($data);
       echo ($answer);
    }
}
 

  $getDetails = new CollabAccept();
  $getDetails -> collabID = $_POST["collabID"];
  $getDetails -> churchID = $_POST["churchID"];
  $getDetails -> church_name = $_POST["church_name"];
  $getDetails -> acceptCollab();
