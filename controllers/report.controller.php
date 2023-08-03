<?php
class ControllerReport{
	static public function ctrShowEventReport($data){
	   	return $answer = (new ModelReport)->mdlShowEventReport($data);
	}

	static public function ctrgetAffiliates($data){
		return $answer = (new CollaborationModel)->mdlshowAffilatedChurches();
 }



}