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



	


	
}