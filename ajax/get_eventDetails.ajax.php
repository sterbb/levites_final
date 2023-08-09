<?php
require_once "../controllers/calendar.controller.php";
require_once "../models/calendar.model.php";


class EventDetails{

    public $event_id;
    public function getEventDetails(){
      $event_id = $this->event_id;

       $data = array("event_id"=> $event_id);
       $answer = (new ControllerCalendar)->ctrGetEventDetails($data);
       echo json_encode($answer);
      
    }
}
 

  $getEvDetails = new EventDetails();
  $getEvDetails -> event_id = $_POST["event_id"];
  $getEvDetails -> getEventDetails();
