<?php 

class ControllerMembership{

    static public function ctrGetPendingMembership(){
        return $answer = (new ModelMembership)->mdlGetPendingMembership();
    }

    static public function ctrGetAcceptedMembership(){
        return $answer = (new ModelMembership)->mdlGetAcceptedMembership();
    }

    static public function ctrcancelMembership($data){
        return $answer = (new ModelMembership)->mdlcancelMembership($data);
    }


}

?>