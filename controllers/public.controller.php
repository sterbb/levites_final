<?php 

class ControllerPublic{

    static public function ctrShowPublic(){
        return $answer = (new ModelPublic)->mdlShowPublic();
    }



    static public function ctrUpdatePublic($data){
        return $answer = (new ModelPublic)->mdlUpdatePublic($data);
    }


}




?>