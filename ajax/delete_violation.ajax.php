<?php
require_once "../controllers/reportsubmission.controller.php";
require_once "../models/reportsubmission.model.php";

class DeleteReport{


    public function deleteReport(){

      $report_id = $this->report_id;
      

       $data = array("report_id"=> $report_id);
       $answer = (new ControllerReportSubmission)->ctrdeleteReport($data);
      
    }
}
 

  $delete = new DeleteReport();
  $delete -> report_id = $_POST["report_id"];
  $delete -> deleteReport();
