<?php 
require_once "../controllers/account.controller.php";
require_once "../models/account.model.php";

class getReportChurch {
    // ...

    public function getReport() {
        // Assuming you have a function in the controller to get the latitude and longitude
         $data = (new ControllerUserAccount)->ctrGetReportChurch();
        echo json_encode($data);
    }
    
}


$reportChurch = new getReportChurch();

$reportChurch->getReport();


?>