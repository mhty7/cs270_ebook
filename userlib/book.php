<?php

class BookOperation extends DataOperation {


	function __construct() {
		parent::__construct();

	}

	function getBooklist () {


		$mdb = $this->_db;

		$sql = "SELECT isbn, title, created_at FROM book ";
		$stmt = $mdb->prepare($sql);
		$stmt->execute();

		if (!$stmt) die("Database error");

		if ($stmt->rowCount() > 0){
			return $this->resReturn(TRUE, $stmt->fetchAll());
		}else{
			return $this->resReturn(FALSE);
		}


	}



	function dbend () {


		$this->dbclose();


	}



}

?>
