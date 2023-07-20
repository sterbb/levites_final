<?php
require_once "../controllers/churchsetting.controller.php";
require_once "../models/churchsetting.model.php";

class AddImages {
    public $userAvatarFile;
    public $userBackFile;

    public function addImages() {
        $userAvatarFile = $this->userAvatarFile;
        $userBackFile = $this->userBackFile;

        $data = array(
            "userAvatarFile" => $userAvatarFile
            // "userBackFile" => $userBackFile
        );

        return $answer = (new ControllerChurchSetting)->ctrAddChurchImages($data);
    }
}

$addImages = new AddImages();

$addImages->userAvatarFile =  $_POST["userAvatarFile"];
// $addImages->userBackFile =  $_FILES["userBackFile"];


$addImages->addImages();