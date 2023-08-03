<!-- <?php

require_once "../controllers/churchsetting.controller.php";
require_once "../models/churchsetting.model.php";


class updateChurch {

    public $Newchurch_name;
    public $Newchurch_address;
    public $Newcontact;
    public $Newfname;

    public $Newlname;
    public $Newdesignation;
    public $Newemail;
    public $Newusername;
    public $Newpassword;

    public $Newreligion;
    public $Newcity;

    public $Newmission;
    public $Newvision;

    
    public $Newchurchnum;







    public function updateChurches(){
        $Newchurch_name = $this -> Newchurch_name;
        $Newchurch_address = $this -> Newchurch_address;
        $Newcontact = $this -> Newcontact;
        $Newfname = $this -> Newfname;

        $Newlname = $this -> Newlname;
        $Newdesignation = $this -> Newdesignation;
        $Newemail = $this -> Newemail;
        $Newusername = $this -> Newusername;
        $Newpassword = $this -> Newpassword;

        $Newreligion = $this -> Newreligion;
        $Newcity = $this -> Newcity;

        $Newmission = $this -> Newmission;
        $Newvision = $this -> Newvision;

        $Newchurchnum = $this -> Newchurchnum;




        $data = array("Newchurch_name"=>$Newchurch_name,
        "Newchurch_address"=>$Newchurch_address,
        "Newcontact"=>$Newcontact,
        "Newfname"=>$Newfname,


        "Newlname"=>$Newlname,
        "Newdesignation"=>$Newdesignation,
        "Newemail"=>$Newemail,
        "Newusername"=>$Newusername,
        "Newpassword"=>$Newpassword,


        "Newreligion"=>$Newreligion,
        "Newcity"=>$Newcity,


        "Newmission"=>$Newmission,
        "Newvision"=>$Newvision,

        "Newchurchnum"=>$Newchurchnum

    );


        return $answer = (new ControllerChurchSetting)->ctrUpdateChurch($data);

    }


}

$updateChurchDetails = new updateChurch();

$updateChurchDetails -> Newchurch_name = $_POST["Newchurch_name"];

$updateChurchDetails -> Newchurch_address = $_POST["Newchurch_address"];

$updateChurchDetails -> Newcontact = $_POST["Newcontact"];

$updateChurchDetails -> Newfname = $_POST["Newfname"];



$updateChurchDetails -> Newlname = $_POST["Newlname"];

$updateChurchDetails -> Newdesignation = $_POST["Newdesignation"];

$updateChurchDetails -> Newemail = $_POST["Newemail"];

$updateChurchDetails -> Newusername = $_POST["Newusername"];

$updateChurchDetails -> Newpassword = $_POST["Newpassword"];



$updateChurchDetails -> Newreligion = $_POST["Newreligion"];

$updateChurchDetails-> Newcity = $_POST["Newcity"];

$updateChurchDetails -> Newmission = $_POST["Newmission"];

$updateChurchDetails-> Newvision = $_POST["Newvision"];

$updateChurchDetails-> Newchurchnum = $_POST["Newchurchnum"];



$updateChurchDetails -> updateChurches();





?> -->
