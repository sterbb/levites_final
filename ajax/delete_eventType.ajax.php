<?php

require_once "../controllers/calendar.controller.php";
require_once "../models/calendar.model.php";

class deleteEventsType{

    public $type;
    public function DeleteTypeEvent() {
        
        $type = $this->type;
       $data = array("type"=> $type);
        $result = (new ControllerCalendar)->ctrDeleteEventType($data);
    }
}

$deleteType = new deleteEventsType();
$deleteType -> type  = $_POST["type"];

$deleteType->DeleteTypeEvent();
?>
