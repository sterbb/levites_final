<?php
require_once "../controllers/calendar.controller.php";
require_once "../models/calendar.model.php";

class AddCalendarEvent{

    public $event_title;
    public $event_type;
    public $event_date1;
    public $event_date2;
    public $event_time1;
    public $event_time2;
    public $event_venue;
    public $event_location;
    public $event_announcement;


    public function addEvent(){
      $event_title = $this->event_title;
      $event_type = $this->event_type;
      $event_date1 = $this->event_date1;
      $event_time1 = $this->event_time1;
      $event_date2 = $this->event_date2;
      $event_time2 = $this->event_time2;
      $event_venue = $this->event_venue;
      $event_location = $this->event_location;
      $event_announcement = $this->event_announcement;

       $data = array("event_title"=> $event_title,
       "event_type"=> $event_type,
       "event_date1"=> $event_date1,
       "event_time1"=> $event_time1,
       "event_date2"=> $event_date2,
       "event_time2"=> $event_time2,
       "event_venue"=> $event_venue,
       "event_location"=> $event_location,
       "event_announcement"=> $event_announcement);
       return $answer = (new ControllerCalendar)->ctrAddEvent($data);

    }

    
}
 

$addEvent = new AddCalendarEvent();

$addEvent -> event_title = $_POST["event_title"];
$addEvent -> event_type = $_POST["event_type"];
$addEvent -> event_date1 = $_POST["event_date1"];
$addEvent -> event_time1 = $_POST["event_time1"];
$addEvent -> event_date2 = $_POST["event_date2"];
$addEvent -> event_time2 = $_POST["event_time2"];
$addEvent -> event_venue = $_POST["event_venue"];
$addEvent -> event_location = $_POST["event_location"];
$addEvent -> event_announcement = $_POST["event_announcement"];

$addEvent -> addEvent();
