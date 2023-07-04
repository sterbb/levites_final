<?php
require_once "../controllers/superuser.controller.php";
require_once "../models/superuser.model.php";
class ChurchDetails{

    public $church_id;
    public function getChurchDetails(){
      $church_id = $this->church_id;

       $data = array("church_id"=> $church_id);
       $answer = (new ControllerSuperuser)->ctrGetChurchDetails($data);
       echo json_encode($answer);
      
    }
}
 

  $getDetails = new ChurchDetails();
  $getDetails -> church_id = $_POST["church_id"];
  $getDetails -> getChurchDetails();
