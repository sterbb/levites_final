<?php
class ControllerWebsite{
	static public function ctrAddWebsite($data){
	   	return $answer = (new ModelWebsite)->mdlAddWebsite($data);
	}

	static public function ctrShowWebsites(){
        return $answer = (new ModelWebsite)->mdlShowWebsites();
	}

    static public function ctrAddGroup($data){
        return $answer = (new ModelWebsite)->mdlAddGroup($data);
	}

	static public function ctrShowGroups(){
        return $answer = (new ModelWebsite)->mdlShowGroups();
	}
    
    
}