<?php

class UserOperation extends DataOperation {


	function __construct() {


		parent::__construct();


	}

	function userlogin ($user , $pass) {

		$mdb = $this->_db;

		$sql = "SELECT * FROM accounts WHERE username = ? and password = ? ";
		$stmt = $mdb->prepare($sql);
		$stmt->bindValue(1,$user);
		$stmt->bindValue(2,MD5($pass));
		$stmt->execute();

		if (!$stmt) die("Database error");

		if ($stmt->rowCount() > 0){
			return $this->resReturn(TRUE, $stmt->fetch());
		}else{
			return $this->resReturn(FALSE);
		}


	}


	function isAdmin($user){


		$mdb = $this->_db;

		$sql = "SELECT * FROM accounts WHERE username = ? ";
		$stmt = $mdb->prepare($sql);
		$stmt->bindValue(1,$user);
		$stmt->execute();

		if (!$stmt) die("Database error");

		if ($stmt->rowCount() > 0){
			$ret=$stmt->fetch();
			if($ret['status']==1){
				return $this->resReturn(TRUE);
			}
		}

		return $this->resReturn(FALSE);



	}

	

	

	
	function dbend () {


		$this->dbclose();


	}

}

?>