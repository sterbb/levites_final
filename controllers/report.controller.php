<?php
class ControllerReport{
	static public function ctrShowEventReport($data){
	   	return $answer = (new ModelReport)->mdlShowEventReport($data);
	}



}