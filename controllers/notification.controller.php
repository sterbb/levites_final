<?php 

class ControllerNotifications{

    static public function ctrGetCollaborationNotif(){
        return $answer = (new ModelNotifications)->mdlGetCollaborationNotif();
    }

    static public function ctrGetCollaborationNotifPublic(){
        return $answer = (new ModelNotifications)->mdlGetCollaborationNotifPublic();
    }


}

?>