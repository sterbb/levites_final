<?php
class ControllerRegistration{
	static public function ctrRegisterAccount($data){
	   	return $answer = (new ModelRegister)->mdlRegisterPublicAccount($data);
	}

	static public function 	ctrVerifyRegisteration($data){
		return $answer = (new ModelRegister)->mdlVerifyRegistration($data);
 }


}