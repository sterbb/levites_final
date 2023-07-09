<?php
class ControllerUserAccount{
	static public function ctrAddUserAccount($data){
	   	return $answer = (new ModelUserAccount)->mdlAddUserAccount($data);
	}

	static public function ctrShowUserAccount(){
        return $answer = (new ModelUserAccount)->mdlShowUserAccount();
	}

    
}