<?php

class ControllerSuperuser{
	static public function ctrShowChurchList($data){
        return $answer = (new ModelSuperUser)->mdlShowChurchList($data);
	}

	static public function ctrShowDeactivatedChurch(){
        return $answer = (new ModelSuperUser)->mdlShowDeactivatedChurch();
	}

	static public function ctrShowDeactivated(){
        return $answer = (new ModelSuperUser)->mdlShowDeactivated();
	}

	static public function ctrDeactivateAccount($data){
        return $answer = (new ModelSuperUser)->mdlDeactivateAccount($data);
	}

	static public function ctrActivateAccount($data){
        return $answer = (new ModelSuperUser)->mdlActivateAccount($data);
	}



	static public function ctrShowChurchListExplore($data){
        return $answer = (new ModelSuperUser)->mdlShowChurchListExplore($data);
	}

	static public function ctrShowRejectedChurches($data){
        return $answer = (new ModelSuperUser)->mldShowRejectedChurches($data);
	}

	static public function ctrShowChurchList1($data){
        return $answer = (new ModelSuperUser)->mdlShowChurchList1($data);
	}


	static public function ctrGetChurchDetails($data){
        return $answer = (new ModelSuperUser)->mdlGetChurchDetails($data);
	}

	static public function ctrAcceptChurch($data){
        return $answer = (new ModelSuperUser)->mdlAcceptChurch($data);
	}

	static public function ctrRejectChurch($data){
        return $answer = (new ModelSuperUser)->mdlRejectChurch($data);
	}

	static public function ctrGetChurchDetailsOnly($data){
        return $answer = (new ModelSuperUser)->mdlGetChurchDetailsOnly($data);
	}
	
	
	
	
	


}