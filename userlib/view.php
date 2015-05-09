<?php

require_once('smarty/libs/Smarty.class.php');

class view {

	function __construct() {

		return $this->getSmarty();

	}

	function getSmarty(){

		$smarty = new Smarty();		
		$smarty->template_dir = TEMPLATESPATH;
		$smarty->compile_dir  = COMPILEPATH;
		
		return $smarty;

	}

	function _redirect($module=null, $id=null){

		$url="index.php";
		if(isset($module)){
			$url.="?module=".$module;
			if(isset($id)){
				$url.="&id=".$id;
			}
		}
		header("Location:".$url);
	}	
}

?>