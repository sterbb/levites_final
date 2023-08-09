<?php

require_once "../controllers/calendar.controller.php";
require_once "../models/calendar.model.php";

class deleteEvents{

    public $eventID;
    public function DeleteEvents() {
        
        $eventID = $this->eventID;


        

       $data = array("eventID"=> $eventID);
        $result = (new ControllerCalendar)->ctrDeleteEvents($data);
        echo json_encode($result);
    }
}

$deleteEve = new deleteEvents();
$deleteEve -> eventID  = $_POST["eventID"];

$deleteEve->DeleteEvents();
?>
