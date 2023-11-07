<?php
require_once "../controllers/playlist.controller.php";
require_once "../models/playlist.model.php";

class AsyncPlaylist{


    public function playlistFunction(){

        $answer = (new ControllerPlaylist)->ctrShowPlaylist();
         echo json_encode($answer);
    }

    
}
 

$playlist = new AsyncPlaylist();


$playlist -> playlistFunction();
