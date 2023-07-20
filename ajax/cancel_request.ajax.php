<?php
require_once "../controllers/collaboration.controller.php";
require_once "../models/collaboration.model.php";
class CancelRequest{

    public $collabID;
    public function cancelReq(){
      $collabID = $this->collabID;

       $data = array("collabID"=> $collabID);
       $answer = (new CollaborationController)->ctrCancelRequest($data);
       echo json_encode($answer);
    }
}
 

  $getDetails = new CancelRequest();
  $getDetails -> collabID = $_POST["collabID"];
  $getDetails -> cancelReq();
