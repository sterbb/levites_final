<?php
require_once "../controllers/reportsubmission.controller.php";
require_once "../models/reportsubmission.model.php";

class DeleteReport{

    public $report_id;
    
    public function deleteReport(){

      $report_id = $this->report_id;
      

       $data = array("report_id"=> $report_id);
       $answer = (new ControllerReportSubmission)->ctrdeleteWarningReport($data);
      
    }
}
 

  $delete = new DeleteReport();
  $delete -> report_id = $_POST["report_id"];
  $delete -> deleteReport();
