<?php
require_once "../controllers/superuser.controller.php";
require_once "../models/superuser.model.php";
class ChurchReject{

    public $church_id;
    public $church_name;
    public function rejectChurch(){
      $church_id = $this->church_id;
      $church_name = $this->church_name;

       $data = array("church_id"=> $church_id,
       "church_name"=> $church_name);
       $answer = (new ControllerSuperuser)->ctrRejectChurch($data);
       echo json_encode($answer);
    }
}
 

  $reject = new ChurchReject();
  $reject -> church_id = $_POST["church_id"];
  $reject -> church_name = $_POST["church_name"];
  $reject -> rejectChurch();
