<?php

class ControllerSuperuser{
	static public function ctrShowChurchList($data){
        return $answer = (new ModelSuperUser)->mdlShowChurchList($data);
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
	
	
	


}