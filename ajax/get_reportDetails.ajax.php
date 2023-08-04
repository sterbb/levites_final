<?php
require_once "../controllers/reportsubmission.controller.php";
require_once "../models/reportsubmission.model.php";
class GetReport{

    public $report_id;


    public function getReportDetails(){
      $report_id = $this->report_id;

       $data = array("report_id"=> $report_id);
       $answer = (new ControllerReportSubmission)->ctrReportDetails($data);
       echo json_encode($answer);
    }
}
 

  $getDetails = new GetReport();
  $getDetails -> report_id = $_POST["report_id"];
  $getDetails -> getReportDetails();
