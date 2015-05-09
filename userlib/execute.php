<?php


class execute{

	var $_db;

	
	function __construct(){

		session_start();

	}


	function main(){

		$this->logout();

		$this->checkGet();


		$page_module = new $_GET[MODULE]();
		$page_module->main();

	}

	function checkGet(){


		if( !empty($_SESSION[USER_ID])){
			if(empty($_GET[MODULE])){	
				$_GET[MODULE] = DEFAULT_MODULE;

			}
		} else {

			$_GET[MODULE] = LOGIN;
		}
		require_once( MODULEPATH.'/'.$_GET[MODULE].'.php' );

	}


	function scClearToLogin(){

		$_SESSION = array();

	}


	function logout(){

		if(!empty($_POST[P_LOGOUT])){
			$this->scClearToLogin();
			$_POST = NULL;
		}

	}

}

?>