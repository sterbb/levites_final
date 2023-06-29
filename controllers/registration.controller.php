<?php
class ControllerRegistration{
	static public function ctrRegisterAccount($data){
	   	return $answer = (new ModelRegister)->mdlRegisterPublicAccount($data);
	}

	static public function ctrRegisterChurch($data){
		return $answer = (new ModelRegister)->mdlRegisterChurchAccount($data);
 	}
	
	static public function 	ctrVerifyRegisteration($data){
		return $answer = (new ModelRegister)->mdlVerifyRegistration($data);
 	}

	static public function ctrResendCode(){
		return $answer = (new ModelRegister)->mdlResendVerification();
	}

	
}