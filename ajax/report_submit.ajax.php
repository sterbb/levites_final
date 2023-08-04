<?php
require_once "../controllers/reportsubmission.controller.php";
require_once "../models/reportsubmission.model.php";
class SubmitReport{

    public $report_type;
    public $report_subject;
    public $report_description;

    public function submitReport(){
      $report_type = $this->report_type;
      $report_subject = $this->report_subject;
      $report_description = $this->report_description;

       $data = array("report_type"=> $report_type,
       "report_subject"=> $report_subject,
       "report_description"=> $report_description);
       $answer = (new ControllerReportSubmission)->ctrSubmitReport($data);
       echo json_encode($answer);
    }
}
 

  $getDetails = new SubmitReport();
  $getDetails -> report_type = $_POST["report_type"];
  $getDetails -> report_subject = $_POST["report_subject"];
  $getDetails -> report_description = $_POST["report_description"];
  $getDetails -> submitReport();
