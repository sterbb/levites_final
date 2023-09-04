<?php
class ControllerReport{
	static public function ctrShowEventReport($data){
	   	return $answer = (new ModelReport)->mdlShowEventReport($data);
	}

	static public function ctrgetAffiliates($data){
		return $answer = (new CollaborationModel)->mdlshowAffilatedChurches();
	}

	static public function ctrgetRegisteredUsers($data){
		return $answer = (new ModelReport)->mdlgetRegisteredUsers($data);
	}

	
	static public function ctrgetChurchStatus($data){
		return $answer = (new ModelReport)->mdlgetChurchStatus($data);
	}




}