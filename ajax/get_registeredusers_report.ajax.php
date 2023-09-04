<?php
require_once "../controllers/report.controller.php";
require_once "../models/report.model.php";
class GetReport{

    public $month;
    public $year;
    
    public function getReportDetails(){
      $month = $this->month;
      $year = $this->year;
   
       $data = array("month"=> $month, 
       "year"=> $year);
       $answer = (new ControllerReport)->ctrgetRegisteredUsers($data);
       echo json_encode($answer);
    }
}
 

  $getDetails = new GetReport();
  $getDetails -> month = $_POST["month"];
  $getDetails -> year = $_POST["year"];
  $getDetails -> getReportDetails();
