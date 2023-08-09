<?php
require_once "../controllers/calendar.controller.php";
require_once "../models/calendar.model.php";

class updateEvents {

    
    public $event_id;
    public $new_title;
    public $new_date;
    public $new_category;
    public $new_venue;
    public $new_location;
    public $new_announcement;

    public $new_eventtime1;




    public function UpdateEvents(){
        $event_id = $this -> event_id;

        $new_title = $this -> new_title;

        $new_date = $this -> new_date;

        $new_category = $this -> new_category;
        
        $new_venue = $this -> new_venue;
        
        $new_location = $this -> new_location;
        
        $new_announcement = $this -> new_announcement;

        $new_eventtime1 = $this -> new_eventtime1;

        
     




        $data = array("event_id"=>$event_id,
                    "new_title"=>$new_title,
                    "new_date"=>$new_date,
                    "new_category"=>$new_category,
                    "new_venue"=>$new_venue,
                    "new_location"=>$new_location,
                    "new_announcement"=>$new_announcement,
                    "new_eventtime1"=>$new_eventtime1
  
  
  

    );


        return $answer = (new ControllerCalendar)->ctrUpdateEvents($data);

    }


}

$updateEventDetails = new updateEvents();

$updateEventDetails -> event_id = $_POST["event_id"];

$updateEventDetails -> new_title = $_POST["new_title"];

$updateEventDetails -> new_date = $_POST["new_date"];

$updateEventDetails -> new_category = $_POST["new_category"];

$updateEventDetails -> new_venue = $_POST["new_venue"];

$updateEventDetails -> new_location = $_POST["new_location"];

$updateEventDetails -> new_announcement = $_POST["new_announcement"];

$updateEventDetails -> new_eventtime1 = $_POST["new_eventtime1"];





$updateEventDetails -> UpdateEvents();





?> 
