<?php 

class ControllerChurchSetting{

    static public function ctrAddDonation($data){
        return $answer = (new ModelChurchSetting)->mdlAddDonation($data);
	}

	static public function ctrShowDonation(){
        return $answer = (new ModelChurchSetting)->mdlShowDonation();
	}

        static public function ctrAddChurchImages($data){
        return $answer = (new ModelChurchSetting)->mdlAddChurchImages($data);
        }


        static public function ctrUpdateChurch($data){
        return $answer = (new ModelChurchSetting)->mdlUpdatehurch($data);
        }

        static public function ctrDeleteDonation(){
        return $answer = (new ModelChurchSetting)->mdlDeleteDonation();
        }
                    

        
    

}

?>