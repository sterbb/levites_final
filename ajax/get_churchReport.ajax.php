<?php 
require_once "../controllers/calendar.controller.php";
require_once "../models/calendar.model.php";

class getReportChurch {
    // ...

    public function getReport() {
        // Assuming you have a function in the controller to get the latitude and longitude
         $data = (new ControllerCalendar)->ctrGetReportChurch();
        echo json_encode($data);
    }
    
}


$reportChurch = new getReportChurch();

$reportChurch->getReport();


?>