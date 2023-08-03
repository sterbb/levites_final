<?php
require_once "../controllers/calendar.controller.php";
require_once "../models/calendar.model.php";
class CheckLinkFile{

    public $event;
    public function checkFile(){
      $event = $this->event;

       $data = array("event"=> $event);
        $answer = (new ControllerCalendar)->ctrCheckFile($data);
       echo json_encode($answer);
    }
}
 

  $getDetails = new CheckLinkFile();
  $getDetails -> event = $_POST["event"];
  $getDetails -> checkFile();
