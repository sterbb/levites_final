<?php
require_once "../controllers/calendar.controller.php";
require_once "../models/calendar.model.php";
class LinkFile{

    public $files;
    public $event;
    
    public function linkFile(){
      $files = $this->files;
      $event = $this->event;

       $data = array("files"=> $files,
       "event"=> $event);
       return $answer = (new ControllerCalendar)->ctrLinkFile($data);

    }
}
 

  $getDetails = new LinkFile();
  $getDetails -> event = $_POST["event"];
  $getDetails -> files = $_POST["files"];
  $getDetails -> linkFile();
