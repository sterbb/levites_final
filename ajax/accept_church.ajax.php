<?php
require_once "../controllers/superuser.controller.php";
require_once "../models/superuser.model.php";
class ChurchAccept{

    public $church_id;
    public $church_name;

    public function acceptChurch(){
      $church_id = $this->church_id;
      $church_name = $this->church_name;

       $data = array("church_id"=> $church_id,
       "church_name"=> $church_name);
       $answer = (new ControllerSuperuser)->ctrAcceptChurch($data);
       echo json_encode($answer);
    }
}
 

  $getDetails = new ChurchAccept();
  $getDetails -> church_id = $_POST["church_id"];
  $getDetails -> church_name = $_POST["church_name"];
  $getDetails -> acceptChurch();
