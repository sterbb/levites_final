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
	
	
	 static public function ctrAddEventType($data){
		return $answer = (new ModelCalendar)->mdlAddEventType($data);
 	}

	 static public function ctrShowEventType(){
		return $answer = (new ModelCalendar)->mdlShowEventType();
 	}

	 static public function ctrDeleteEventType(){
		return $answer = (new ModelCalendar)->mdlDeleteEventType();
	 }

	 static public function ctrLinkPlaylist($data){
		return $answer = (new ModelCalendar)->mdlLinkPlaylist($data);
	 }

	 static public function ctrLinkFile($data){
		return $answer = (new ModelCalendar)->mdlLinkFile($data);
	 }

	 static public function ctrCheckFile($data){
		return $answer = (new ModelCalendar)->mdlCheckFile($data);
	 }

	
	 static public function ctrGetEventDetails($data){
		return $answer = (new ModelCalendar)->mdlGetEventDetails($data);
	 }

	 
	 static public function ctrUpdateEvents($data){
		return $answer = (new ModelCalendar)->mdlUpdateEvents($data);
	 }

	 

	 static public function ctrDeleteEvents($data){
        return $answer = (new ModelCalendar)->mdlDeleteEvents($data);
	}

	 

	 
	



}
