<?php

require_once "../controllers/calendar.controller.php";
require_once "../models/calendar.model.php";

class deleteEvent {
    public function DeleteEvent() {
        $result = (new ControllerCalendar)->ctrDeleteEventType();
        echo json_encode($result);
    }
}

$deleteEve = new deleteEvent();

$deleteEve->DeleteEvent();

?>
