<?php
require_once "../controllers/calendar.controller.php";
require_once "../models/calendar.model.php";
class LinkPlaylist{

    public $playlist;
    public $event;
    
    public function linkPlaylist(){
      $playlist = $this->playlist;
      $event = $this->event;

       $data = array("playlist"=> $playlist,
       "event"=> $event);
       return $answer = (new ControllerCalendar)->ctrLinkPlaylist($data);

    }
}
 

  $getDetails = new LinkPlaylist();
  $getDetails -> playlist = $_POST["playlist"];
  $getDetails -> event = $_POST["event"];
  $getDetails -> linkPlaylist();
