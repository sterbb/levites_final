<?php
require_once "../controllers/notification.controller.php";
require_once "../models/notification.model.php";

class ClearNotifications{

    public $recipient_id;

    public function clearHeaderNotifications(){

      $recipient_id = $this->recipient_id;


       $data = array("recipient_id"=> $recipient_id);
       return $answer = (new ControllerNotifications)->ctrclearNotification($data);

    }
}
 

$notifications = new ClearNotifications();

$notifications -> recipient_id = $_POST["recipient_id"];

$notifications -> clearHeaderNotifications();