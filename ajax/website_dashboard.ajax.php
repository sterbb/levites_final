<?php
require_once "../controllers/website.controller.php";
require_once "../models/website.model.php";

class AddWebsite{

    public $website;


    public function addWebsite(){
      $website = $this->website;

       $data = array("website"=> $website);
       return $answer = (new ControllerWebsite)->ctrBookmarkWebsite($data);

    }
}
 

$addWebsite = new AddWebsite();
$addWebsite -> website = $_POST["bookmark_list"];

$addWebsite -> addWebsite();
