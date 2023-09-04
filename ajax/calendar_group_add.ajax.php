<?php
require_once "../controllers/calendar.controller.php";
require_once "../models/calendar.model.php";

class AddEventGroup{

    public $group_name;
    public $group_members;
    public $members_email;
    public $event_date1;
    public $event_time1;
    public $event_date2;
    public $event_time2;
    public $event_title;
    public $event_venue;
    public $event_location;
    public $eventID;

    public function addGroup(){
      $group_name = $this->group_name;
      $group_members = $this->group_members;
      $members_email = $this->members_email;
      $event_date1 = $this->event_date1;
      $event_time1 = $this->event_time1;
      $event_date2 = $this->event_date2;
      $event_time2 = $this->event_time2;
      $event_title = $this->event_title;
      $event_venue = $this->event_venue;
      $event_location = $this->event_location;
      $eventID = $this->eventID;

       $data = array("eventID"=> $eventID,
       "group_name"=> $group_name,
       "group_members"=> $group_members,
       "members_email"=> $members_email,
       "event_date1"=> $event_date1,
       "event_time1"=> $event_time1,
       "event_date2"=> $event_date2,
       "event_time2"=> $event_time2,
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
$addGroup -> event_date1 = $_POST["event_date1"];
$addGroup -> event_time1 = $_POST["event_time1"];
$addGroup -> event_date2 = $_POST["event_date2"];
$addGroup -> event_time2 = $_POST["event_time2"];
$addGroup -> event_title = $_POST["event_title"];
$addGroup -> event_venue = $_POST["event_venue"];
$addGroup -> event_location = $_POST["event_location"];



$addGroup -> addGroup();
