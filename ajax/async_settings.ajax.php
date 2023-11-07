<?php
require_once "../controllers/churchAdmin.controller.php";
require_once "../models/churchAdmin.model.php";
require_once "../controllers/churchsetting.controller.php";
require_once "../models/churchsetting.model.php";

class AsyncSettings{

    public $settings;


    public function SettingsFunction(){
      $settings = $this->settings;

      if($settings == "church"){
         $answer =  (new ControllerAdmin)->ctrShowChurchAdmin();
         echo json_encode($answer);
        }else  if($settings == "donation"){
            $answer =  (new ControllerChurchSetting)->ctrShowDonation();
            echo json_encode($answer);
        }else  if($settings == "social"){
            $answer = (new ControllerChurchSetting)->ctrShowSocialMedia();
            echo json_encode($answer);
        }


    }

    
}
 

$settingsUpdate = new AsyncSettings();

$settingsUpdate -> settings = $_POST["settings"];


$settingsUpdate -> SettingsFunction();
