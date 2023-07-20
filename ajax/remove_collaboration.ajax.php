<?php
require_once "../controllers/collaboration.controller.php";
require_once "../models/collaboration.model.php";
class CollabRemove{

    public $collabID;
    public function removeCollab(){
      $collabID = $this->collabID;

       $data = array("collabID"=> $collabID);
       $answer = (new CollaborationController)->ctrRemoveCollab($data);
       echo json_encode($answer);
    }
}
 

  $getDetails = new CollabRemove();
  $getDetails -> collabID = $_POST["collabID"];
  $getDetails -> removeCollab();
