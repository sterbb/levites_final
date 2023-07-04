<?php
require_once "../controllers/superuser.controller.php";
require_once "../models/superuser.model.php";
class ChurchAccept{

    public $church_id;
    public function acceptChurch(){
      $church_id = $this->church_id;

       $data = array("church_id"=> $church_id);
       $answer = (new ControllerSuperuser)->ctrAcceptChurch($data);
       echo json_encode($answer);
    }
}
 

  $getDetails = new ChurchAccept();
  $getDetails -> church_id = $_POST["church_id"];
  $getDetails -> acceptChurch();
