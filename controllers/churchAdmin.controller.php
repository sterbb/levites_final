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


}

?>