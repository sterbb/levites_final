<?php
require_once "../controllers/report.controller.php";
require_once "../models/collaboration.model.php";
class getAffiliatedChurches{

    public $church_id;
    public function getChurches(){
      $church_id = $this->church_id;

       $data = array("church_id"=> $church_id);
       $answer = (new ControllerReport)->ctrgetAffiliates($data);
       echo json_encode($answer);
    }
}
 

  $getDetails = new getAffiliatedChurches();
  $getDetails -> church_id = $_POST["church_id"];
  $getDetails -> getChurches();
