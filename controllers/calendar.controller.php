<?php
class ControllerCalendar{
	static public function ctrAddEvent($data){
	   	return $answer = (new ModelCalendar)->mdlAddEvent($data);
	}

	static public function ctrAddGroup($data){
		return $answer = (new ModelCalendar)->mdlAddGroup($data);
	 }

	static public function ctrShowEvents($data){
		return $answer = (new ModelCalendar)->mdlShowEvents($data);
	}
 	}
	
	
	 static public function ctrAddEventType($data){
		return $answer = (new ModelCalendar)->mdlAddEventType($data);
 	}

	 static public function ctrShowEventType(){
		return $answer = (new ModelCalendar)->mdlShowEventType();
 	}

	 static public function ctrDeleteEventType(){
		return $answer = (new ModelCalendar)->mdlDeleteEventType();
	 }


	 static public function ctrGetReportChurch(){
		return $answer = (new ModelCalendar)->mdlGetReportChurch();
	 }

}