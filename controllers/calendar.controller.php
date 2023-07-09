<?php
class ControllerCalendar{
	static public function ctrAddEvent($data){
	   	return $answer = (new ModelCalendar)->mdlAddEvent($data);
	}

}