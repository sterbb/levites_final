<?php
require_once "../controllers/calendar.controller.php";
require_once "../models/calendar.model.php";

class AddEventType{

    public $type_name;


    public function addTypeEvent(){

      $type_name = $this->type_name;

       $data = array("type_name"=> $type_name);
       return $answer = (new ControllerCalendar)->ctrAddEventType($data);

    }
}
 

$addEventType= new AddEventType();

$addEventType -> type_name = $_POST["type_name"];


$addEventType -> addTypeEvent();
