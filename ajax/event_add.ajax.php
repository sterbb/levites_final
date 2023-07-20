<?php
require_once "../controllers/calendar.controller.php";
require_once "../models/calendar.model.php";

class AddCalendarEvent{

    public $event_title;
    public $event_type;
    public $event_date;
    public $event_time;
    public $event_venue;
    public $event_location;
    public $event_announcement;


    public function addEvent(){
      $event_title = $this->event_title;
      $event_type = $this->event_type;
      $event_date = $this->event_date;
      $event_time = $this->event_time;
      $event_venue = $this->event_venue;
      $event_location = $this->event_location;
      $event_announcement = $this->event_announcement;

       $data = array("event_title"=> $event_title,
       "event_type"=> $event_type,
       "event_date"=> $event_date,
       "event_time"=> $event_time,
       "event_venue"=> $event_venue,
       "event_location"=> $event_location,
       "event_announcement"=> $event_announcement);
       return $answer = (new ControllerCalendar)->ctrAddEvent($data);

    }

    
}
 

$addEvent = new AddCalendarEvent();

$addEvent -> event_title = $_POST["event_title"];
$addEvent -> event_type = $_POST["event_type"];
$addEvent -> event_date = $_POST["event_date"];
$addEvent -> event_time = $_POST["event_time"];
$addEvent -> event_venue = $_POST["event_venue"];
$addEvent -> event_location = $_POST["event_location"];
$addEvent -> event_announcement = $_POST["event_announcement"];

$addEvent -> addEvent();
