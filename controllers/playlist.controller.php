<?php
class ControllerPlaylist{
	static public function ctrAddPlaylist($data){
	   	return $answer = (new ModelPlaylist)->mdlAddPlaylist($data);
	}

	static public function ctrShowPlaylist(){
        return $answer = (new ModelPlaylist)->mdlShowPlaylist();
	}

    static public function ctrShowPlaylistDelete(){
        return $answer = (new ModelPlaylist)->mdlShowPlaylistDelete();
	}



    
}