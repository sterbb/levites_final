<?php
require_once "../controllers/notification.controller.php";
require_once "../models/notification.model.php";

class addReportWarning{

    public $notifcation_type;
    public $notifcation_title;
    public $reported_id;
    public $report;
    public $report_id;


    public function addWarning(){

      $notifcation_type = $this->notifcation_type;
      $notifcation_title = $this->notifcation_title;
      $reported_id = $this->reported_id;
      $report = $this->report;
      $report_id = $this->report_id;
      
       $data = array("notifcation_type"=> $notifcation_type,
       "notifcation_title"=> $notifcation_title,
       "reported_id"=> $reported_id,
       "report"=> $report,
       "report_id"=> $report_id);
       return $answer = (new ControllerNotifications)->ctrAddWarningNotif($data);

    }
}
 

$warning = new addReportWarning();

$warning -> notifcation_type = $_POST["notifcation_type"];
$warning -> notifcation_title = $_POST["notifcation_title"];
$warning -> reported_id = $_POST["reported_id"];
$warning -> report = $_POST["report"];
$warning -> report_id = $_POST["report_id"];


$warning -> addWarning();
