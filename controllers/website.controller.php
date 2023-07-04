<?php
class ControllerWebsite{
	static public function ctrAddWebsite($data){
	   	return $answer = (new ModelWebsite)->mdlAddWebsite($data);
	}

	static public function ctrShowWebsites(){
        return $answer = (new ModelWebsite)->mdlShowWebsites();
	}
}