<?php
class ControllerReportSubmission{

	static public function ctrSubmitReport($data){
	   	return $answer = (new ModelReportSubmission)->mdlSubmitReport($data);
	}

	//violations
	static public function ctrgetSubmissions($choice){
		return $answer = (new ModelReportSubmission)->mdlgetSubmissions($choice);
 	}

	//feedbacks
	static public function ctrReportDetails($data){
		return $answer = (new ModelReportSubmission)->mdlReportDetails($data);
	}

	static public function ctrWarnedAccounts(){
		return $answer = (new ModelReportSubmission)->mdlWarnedAccounts();
	}

	static public function ctrdeleteReport($data){
		return $answer = (new ModelReportSubmission)->mdldeleteReport($data);
	}

	static public function ctrdeleteWarningReport($data){
		return $answer = (new ModelReportSubmission)->mdldeleteWarningReport($data);
	}




	


	
}