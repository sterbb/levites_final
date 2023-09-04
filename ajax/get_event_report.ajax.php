<?php
require_once "../controllers/report.controller.php";
require_once "../models/report.model.php";

class GetEventDetails{

    public $date1;
    public $date2;

    public function getDetails(){
      $date1 = $this->date1;
      $date2 = $this->date2;
    //   $eventType = $this->eventType;

       $data = array("date1"=> $date1,
       "date2"=> $date2);
        $answer = (new ControllerReport)->ctrShowEventReport($data);
       echo json_encode($answer);

    }

    
}
 

$event = new GetEventDetails();

$event -> date1 = $_POST["date1"];
$event -> date2 = $_POST["date2"];
// $event -> eventType = $_POST["eventType"];

$event -> getDetails();
