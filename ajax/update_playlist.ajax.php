<?php
require_once "../controllers/playlist.controller.php";
require_once "../models/playlist.model.php";
class updateList{


    public function updatePlaylist(){

    $playlistid = $this->playlistid;
      $playlistname = $this->playlistname;
      $newplaylistname = $this->newplaylistname;
      

       $data = array("playlistid"=> $playlistid,
       "playlistname"=> $playlistname,
       "newplaylistname"=> $newplaylistname);
       return $answer = (new ControllerPlaylist)->ctrUpdatePlaylist($data);
        
    }
}
 

  $UpdatePlaylist = new updateList();
  $UpdatePlaylist -> playlistid = $_POST["playlistid"];
  $UpdatePlaylist -> playlistname = $_POST["playlistname"];
  $UpdatePlaylist -> newplaylistname = $_POST["newplaylistname"];
  $UpdatePlaylist -> updatePlaylist();
