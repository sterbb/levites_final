<?php
require_once "../controllers/collaboration.controller.php";
require_once "../models/collaboration.model.php";
class CollabReject{

    public $collabID;
    public function rejectCollab(){
      $collabID = $this->collabID;

       $data = array("collabID"=> $collabID);
       $answer = (new CollaborationController)->ctrRejectCollab($data);
       echo json_encode($answer);
    }
}
 

  $getDetails = new CollabReject();
  $getDetails -> collabID = $_POST["collabID"];
  $getDetails -> rejectCollab();
