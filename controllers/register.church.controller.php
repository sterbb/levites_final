<?php
class ControllerAccounts{
	static public function ctrAddChurchAccounts($data){
	   	$answer = (new ModelChurch)->mdlChurchAccount($data);
	}

    static public function ctrEditChurchAccounts($data){
        $answer = (new ModelChurch)->mdlChurchAccount($data);
	 }


    

	

}