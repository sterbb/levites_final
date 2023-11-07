<?php
require_once "../controllers/reportsubmission.controller.php";
require_once "../models/reportsubmission.model.php";

class AsyncReports{

    public $reportFunction;


    public function ReportFunction(){
      $reportFunction = $this->reportFunction;

      if($reportFunction == "violations"){
         $answer =  (new ControllerReportSubmission)->ctrgetSubmissions(1);
         echo json_encode($answer);
        } else if($reportFunction == "warned"){
            $answer =       (new ControllerReportSubmission)->ctrWarnedAccounts();
            echo json_encode($answer);
           }
           
        
   

    }

    
}
 

$report = new AsyncReports();

$report -> reportFunction = $_POST["reportFunction"];


$report -> ReportFunction();
