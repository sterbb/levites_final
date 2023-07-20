<?php
require_once "../controllers/collaboration.controller.php";
require_once "../models/collaboration.model.php";
class CollabAccept{

    public $collabID;
    public function acceptCollab(){
      $collabID = $this->collabID;

       $data = array("collabID"=> $collabID);
       $answer = (new CollaborationController)->ctrAcceptCollab($data);
       echo json_encode($answer);
    }
}
 

  $getDetails = new CollabAccept();
  $getDetails -> collabID = $_POST["collabID"];
  $getDetails -> acceptCollab();
