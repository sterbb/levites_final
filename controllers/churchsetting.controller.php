<?php 

class ControllerChurchSetting{

    static public function ctrAddDonation($data){
        return $answer = (new ModelChurchSetting)->mdlAddDonation($data);
	}

	static public function ctrShowDonation(){
        return $answer = (new ModelChurchSetting)->mdlShowDonation();
	}
    

}

?>