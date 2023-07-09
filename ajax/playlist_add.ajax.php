<?php
require_once "../controllers/playlist.controller.php";
require_once "../models/playlist.model.php";

class AddPlaylist{

    public $playlist_name;


    public function addPlaylist(){

      $playlist_name = $this->playlist_name;

       $data = array("playlist_name"=> $playlist_name);
       return $answer = (new ControllerPlaylist)->ctrAddPlaylist($data);

    }
}
 

$addPlaylist = new AddPlaylist();

$addPlaylist -> playlist_name = $_POST["playlist_name"];



$addPlaylist -> addPlaylist();
