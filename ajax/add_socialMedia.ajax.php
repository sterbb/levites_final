<?php
require_once "../controllers/churchsetting.controller.php";
require_once "../models/churchsetting.model.php";

class addMedia{

    public $socialMedia;
    public $socialMedia_category;

    

    public function addSocial(){
        $socialMedia = $this->socialMedia;
        $socialMedia_category = $this->socialMedia_category;


       $data = array("socialMedia"=> $socialMedia,
       "socialMedia_category"=> $socialMedia_category);
       return $answer = (new ControllerChurchSetting)->ctrAddSocialMedia($data);

    }

}
 

$mediaAdd = new addMedia();

$mediaAdd -> socialMedia = $_POST["socialMedia"];

$mediaAdd -> socialMedia_category = $_POST["socialMedia_category"];


$mediaAdd -> addSocial();
