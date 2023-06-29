<?php

require_once "../controllers/registration.controller.php";
require_once "../models/registration.model.php";


class resendCode {



    public function resendVerificationCode(){

        return $answer = (new ControllerRegistration)->ctrResendCode();
     
    }


}

$resend = new resendCode();

$resend -> resendVerificationCode();





?>