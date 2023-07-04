<?php
require_once "../controllers/superuser.controller.php";
require_once "../models/superuser.model.php";

class ChurchList{ 
	public function showChurchList(){
		 $church = (new ControllerSuperuser)->ctrShowChurchList1(0);
		echo json_encode($church);
	}
}

$churchlist = new ChurchList();
$churchlist -> showChurchList();
?>