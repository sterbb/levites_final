<?php 

class ControllerPublic{

    static public function ctrShowPublic(){
        return $answer = (new ModelPublic)->mdlShowPublic();
    }

    static public function ctrUpdatePublic($data){
        return $answer = (new ModelPublic)->mdlUpdatePublic($data);
    }

    static public function ctrShowAffiliatedChurches(){
        return $answer = (new ModelPublic)->mdlShowAffiliatedChurches();
    }

    static public function ctrShowEventDetails(){
        return $answer = (new ModelPublic)->mdlShowEventDetails();
    }

    static public function ctrGetChurchDetails(){
        return $answer = (new ModelPublic)->mdlGetChurchDetails();
	}

    static public function ctrGetDonation(){
        return $answer = (new ModelPublic)->mdlGetDonation();
	}

    static public function ctrCheckMembership(){
        return $answer = (new ModelPublic)->mdlCheckMembership();
	}

    static public function ctrCheckIfInGroup($eventID){
        return $answer = (new ModelPublic)->mdlCheckIfInGroup($eventID);
	}
    



}




?>