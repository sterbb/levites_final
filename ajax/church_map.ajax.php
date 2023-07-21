<?php
require_once "../controllers/churchAdmin.controller.php";
require_once "../models/churchAdmin.model.php";

class churchMap {

    public $latitude;
    public $longitude;
    


    public function addChurchMap(){
        $latitude = $this -> latitude;
        $longitude = $this -> longitude;
     
        // $hashpass = password_hash($password, PASSWORD_DEFAULT);


        $data = array("latitude"=>$latitude,
        "longitude"=>$longitude);

        return $answer = (new ControllerAdmin)->ctrAddChurchMap($data);
     
    }


}

$mapChurch = new churchMap();

$mapChurch -> latitude = $_POST["latitude"];

$mapChurch-> longitude = $_POST["longitude"];


$mapChurch -> addChurchMap();
