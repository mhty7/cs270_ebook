<?php

require_once(LIBPATH.'book.php');


class booklist extends view {

	var $smarty;

	function __construct(){


		$this->smarty = parent::__construct();

	}

	function main(){

		$book_ins = new BookOperation;
		$booklist_res = $book_ins->getBooklist();
		
		require_once(LIBPATH.'user.php');
		$usr_ins = new UserOperation;
		$isadmin = $usr_ins->isAdmin($_SESSION[USER_ID]);
		$usr=array('username'=>$_SESSION[USER_ID],'isadmin'=>$isadmin[RESFLAG]);
		
		
		if ($booklist_res[RESFLAG] == TRUE){
			$this->smarty->assign('res', $booklist_res[RESDATA]);
			$this->smarty->assign('user',$usr);
			$this->smarty->display('booklist.html');

		} else {
			$this->smarty->assign('user',$usr);
			$this->smarty->display('booklist.html');
		}
		
		$book_ins->dbend();

	}

}
