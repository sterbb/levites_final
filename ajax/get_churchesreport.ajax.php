<?php
require_once "../controllers/report.controller.php";
require_once "../models/report.model.php";
class GetReport{

    public $month;
    public $year;
    public $church_status;
    
    public function getReportDetails(){
      $month = $this->month;
      $year = $this->year;
      $church_status = $this->church_status;
   
       $data = array("month"=> $month, 
       "church_status"=> $church_status,
       "year"=> $year);
       $answer = (new ControllerReport)->ctrgetChurchStatus($data);
       echo json_encode($answer);
    }
}
 

  $getDetails = new GetReport();
  $getDetails -> month = $_POST["month"];
  $getDetails -> year = $_POST["year"];
  $getDetails -> church_status = $_POST["church_status"];
  $getDetails -> getReportDetails();
