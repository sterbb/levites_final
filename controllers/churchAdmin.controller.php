<?php 

class ControllerAdmin{

    static public function ctrShowChurchAdmin(){
        return $answer = (new ModelAdmin)->mdlShowChurchAdmin();
    }

    static public function ctrShowChurchProfile($churchID){
        return $answer = (new ModelAdmin)->mdlShowChurchProfile($churchID);
    }
    static public function ctrShowChurchAccount(){
        return $answer = (new ModelAdmin)->mdlShowChurchAccount();
    }


    static public function ctrAddChurchMap($data){
        return $answer = (new ModelAdmin)->mdlAddChurchMap($data);
    }


    static public function ctrGetChurchMap(){
        return $answer = (new ModelAdmin)->mdlGetChurchMap();
    }



}

?>