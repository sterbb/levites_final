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

	static public function ctrdeleteWebsite($data){
        return $answer = (new ModelWebsite)->mdldeleteWebsite($data);
	}

	static public function ctrdeleteWebsiteInGroup($data){
        return $answer = (new ModelWebsite)->mdldeleteWebsiteInGroup($data);
	}

	static public function ctrdeleteWebsiteGroup($data){
        return $answer = (new ModelWebsite)->mdldeleteWebsiteGroup($data);
	}

	static public function ctrupdateWebsiteInGroup($data){
        return $answer = (new ModelWebsite)->mdlupdateWebsiteInGroup($data);
	}


	
    
	static public function ctrDeletewebsite(){
        return $answer = (new ModelWebsite)->mdlDeleteWebsite();
	}
    
    
	
	
    
}