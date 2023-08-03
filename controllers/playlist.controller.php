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

	static public function ctrAddPlaylistSong($data){
        return $answer = (new ModelPlaylist)->mdlAddPlaylistSong($data);
	}

	static public function ctrUpdatePlaylist($data){
        return $answer = (new ModelPlaylist)->mdlUpdatePlaylist($data);
	}

	static public function ctrDeletePlaylist($data){
        return $answer = (new ModelPlaylist)->mdlDeletePlaylist($data);
	}


	static public function ctrShowEventsLinkingPlaylist(){
		return $answer = (new ModelPlaylist)->mdlShowEventsLinkingCalendar();
	 }

	//  static public function ctrShowEventsLinkingPlaylist(){
	// 	return $answer = (new ModelPlaylist)->mdlShowEventsLinkingCalendar();
	//  }
	 
	 


	
    
}