<?php
require_once "../controllers/superuser.controller.php";
require_once "../models/superuser.model.php";

class ChurchList{ 
	public function showChurchList(){
		return $church = (new ControllerSuperuser)->ctrShowChurchList();

		// if(count($member) == 0){
		// 	$jsonData = '{"data":[]}';
		// 	echo $jsonData;
		// 	return;
		// }
		// $jsonData = '{
		// 	"data":[';
		// 		for($i=0; $i < count($member); $i++){
		// 			$jsonData .='[
		// 				"'.$member[$i]["memID"].'",
		// 				"'.$member[$i]["fullname"].'",
		// 				"'.$member[$i]["category"].'",
		// 				"'.$member[$i]["cstats"].'",
		// 				"'.$member[$i]["fname"].'",
		// 				"'.$member[$i]["mname"].'",
		// 				"'.$member[$i]["lname"].'",
		// 				"'.$member[$i]["suffix"].'",
		// 				"'.$member[$i]["civilstats"].'",
		// 				"'.$member[$i]["age"].'",
		// 				"'.$member[$i]["dob"].'",
		// 				"'.$member[$i]["gender"].'",
		// 				"'.$member[$i]["email"].'",
		// 				"'.$member[$i]["phone"].'"
					
					
					
		// 			],';
		// 		}
		// 		$jsonData = substr($jsonData, 0, -1);
		// 		$jsonData .= '] 
		// 	}';
		// echo $jsonData;
	}
}

$churchlist = new ChurchList();
$churchlist -> showChurchList();
?>