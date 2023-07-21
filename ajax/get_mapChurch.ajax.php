<?php 
require_once "../controllers/churchAdmin.controller.php";
require_once "../models/churchAdmin.model.php";

class churchMap {
    // ...

    public function getChurchMap() {
        // Assuming you have a function in the controller to get the latitude and longitude
         $data = (new ControllerAdmin)->ctrGetChurchMap();
        echo json_encode($data);
    }
}


$mapChurch = new churchMap();

$mapChurch->getChurchMap();


?>