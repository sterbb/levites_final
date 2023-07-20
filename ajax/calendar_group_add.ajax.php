<?php
require_once "../controllers/calendar.controller.php";
require_once "../models/calendar.model.php";

class AddEventGroup{

    public $group_name;
    public $group_members;
    public $members_email;
    public $event_date;
    public $event_time;
    public $event_title;
    public $event_venue;
    public $event_location;
    public $eventID;

    public function addGroup(){
      $group_name = $this->group_name;
      $group_members = $this->group_members;
      $members_email = $this->members_email;
      $event_date = $this->event_date;
      $event_time = $this->event_time;
      $event_title = $this->event_title;
      $event_venue = $this->event_venue;
      $event_location = $this->event_location;
      $eventID = $this->eventID;

       $data = array("eventID"=> $eventID,
       "group_name"=> $group_name,
       "group_members"=> $group_members,
       "members_email"=> $members_email,
       "event_date"=> $event_date,
       "event_time"=> $event_time,
       "event_title"=> $event_title,
       "event_venue"=> $event_venue,
       "event_location"=> $event_location);
       return $answer = (new ControllerCalendar)->ctrAddGroup($data);

    }

    
}
 

$addGroup = new AddEventGroup();
$addGroup -> eventID = $_POST["eventID"];
$addGroup -> group_name = $_POST["group_name"];
$addGroup -> group_members = $_POST["group_members"];
$addGroup -> members_email = $_POST["members_email"];
$addGroup -> event_date = $_POST["event_date"];
$addGroup -> event_time = $_POST["event_time"];
$addGroup -> event_title = $_POST["event_title"];
$addGroup -> event_venue = $_POST["event_venue"];
$addGroup -> event_location = $_POST["event_location"];



$addGroup -> addGroup();
