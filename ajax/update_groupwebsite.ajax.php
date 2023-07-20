<?php
require_once "../controllers/website.controller.php";
require_once "../models/website.model.php";
class updateWebsiteGroup{


    public function updateGroup(){

        $groupid = $this->groupid;
      $groupname = $this->groupname;
      $newgroupname = $this->newgroupname;
      

       $data = array("groupid"=> $groupid,
       "groupname"=> $groupname,
       "newgroupname"=> $newgroupname);
       return $answer = (new ControllerWebsite)->ctrupdateWebsiteInGroup($data);
        
    }
}
 

  $update = new updateWebsiteGroup();
  $update -> groupid = $_POST["groupid"];
  $update -> groupname = $_POST["groupname"];
  $update -> newgroupname = $_POST["newgroupname"];
  $update -> updateGroup();
