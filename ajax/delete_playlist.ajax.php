<?php

require_once "../controllers/playlist.controller.php";
require_once "../models/playlist.model.php";

class deletePlaylist {

    public $playlistID;
    public function DeletePlaylist() {
        
        $playlistID = $this->playlistID;


        

       $data = array("playlistID"=> $playlistID);
        $result = (new ControllerPlaylist)->ctrDeletePlaylist($data);
        echo json_encode($result);
    }
}

$deleteList = new deletePlaylist();
$deleteList -> playlistID  = $_POST["playlistID"];

$deleteList->DeletePlaylist();

?>