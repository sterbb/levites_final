<?php
class ControllerUserAccount{
	static public function ctrAddUserAccount($data){
	   	return $answer = (new ModelUserAccount)->mdlAddUserAccount($data);
	}

	static public function ctrShowUserAccount(){
        return $answer = (new ModelUserAccount)->mdlShowUserAccount();
	}

	static public function ctrShowManualAccount(){
        return $answer = (new ModelUserAccount)->mdlShowManualAccount();
	}
	

	static public function ctrGetReportChurch(){
		return $answer = (new ModelUserAccount)->mdlGetReportChurch();
	 }

	 static public function ctrTotalEvent(){
		return $answer = (new ModelUserAccount)->mdlTotalEvent();
	 }

	 static public function ctrAddSubMember($data){
		return $answer = (new ModelUserAccount)->mdlAddSubMember($data);
	 }
	 
	 

    
}