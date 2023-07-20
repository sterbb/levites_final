<?php
require_once "../controllers/calendar.controller.php";
require_once "../models/calendar.model.php";

class GetWebsiteDetails{

    public $event_date;
    public $eventType;

    public function getDetails(){
      $event_date = $this->event_date;
      $eventType = $this->eventType;

       $data = array("event_date"=> $event_date,
       "eventType"=> $eventType);
       return $answer = (new ControllerCalendar)->ctrShowEvents($data);

    }

    
}
 

$event = new GetWebsiteDetails();

$event -> event_date = $_POST["date"];
$event -> eventType = $_POST["eventType"];

$event -> getDetails();
