<?php 

class ControllerNotifications{

    static public function ctrGetCollaborationNotif(){
        return $answer = (new ModelNotifications)->mdlGetCollaborationNotif();
    }

    static public function ctrGetCollaborationNotifPublic(){
        return $answer = (new ModelNotifications)->mdlGetCollaborationNotifPublic();
    }

    static public function ctrclearNotification($data){
        return $answer = (new ModelNotifications)->mdlclearNotifications($data);
    }

    static public function ctrAddWarningNotif($data){
        return $answer = (new ModelNotifications)->mdlAddWarningNotif($data);
    }

    
}

?>