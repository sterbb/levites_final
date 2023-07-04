<?php
require_once "../controllers/superuser.controller.php";
require_once "../models/superuser.model.php";
class ChurchReject{

    public $church_id;
    public function rejectChurch(){
      $church_id = $this->church_id;

       $data = array("church_id"=> $church_id);
       $answer = (new ControllerSuperuser)->ctrRejectChurch($data);
       echo json_encode($answer);
    }
}
 

  $reject = new ChurchReject();
  $reject -> church_id = $_POST["church_id"];
  $reject -> rejectChurch();
