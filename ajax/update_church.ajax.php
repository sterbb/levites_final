<!-- <?php

require_once "../controllers/churchsetting.controller.php";
require_once "../models/churchsetting.model.php";


class updateChurch {

    public $Newchurch_name;


    public $Newregion;
    public $Newprovince;
    public $Newbarangay;
    public $Newstreet;


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
        
        $Newregion = $this -> Newregion;
        $Newprovince = $this -> Newprovince;
        $Newbarangay = $this -> Newbarangay;
        $Newstreet = $this -> Newstreet;




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
        
        "Newregion"=>$Newregion,
        "Newprovince"=>$Newprovince,
        "Newbarangay"=>$Newbarangay,
        "Newstreet"=>$Newstreet,





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


$updateChurchDetails -> Newregion = $_POST["Newregion"];
$updateChurchDetails -> Newprovince = $_POST["Newprovince"];
$updateChurchDetails -> Newbarangay = $_POST["Newbarangay"];
$updateChurchDetails -> Newstreet = $_POST["Newstreet"];

    


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
