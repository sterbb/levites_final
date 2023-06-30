<?php

class ControllerSuperuser{
	static public function ctrShowChurchList($data){
        return $answer = (new ModelSuperUser)->mdlShowChurchList($data);
	}
}