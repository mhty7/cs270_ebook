<?php

class DataOperation {

	var $_db;

	var $sqltype = DBTYPE;
	var $user = DBUSER;
	var $server = DBSERVER;
	var $password = DBPASSWORD;
	var $dbname = DBNAME;

	function __construct($flag = null) {

		//classify job according to flag
		$this->dbdispatch ($flag);

	}

	function dbdispatch ($flag) {

		//do nothing if flag is set
		if (!empty($flag)) {
		
		// otherwise connect to db
		} else {
			$this->dbconnect();
		}

	}

	function dbconnect () {
		
		$dsn = $this->sqltype.':dbname='.$this->dbname.';host='.$this->server.';charset=utf8';
		try{
			$this->_db = new PDO($dsn,$this->user,$this->password);
		} catch(PDOException $e){
			return $this->dbreturn(FALSE,$e->getMessage());	
		}
		
		$this->_db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
		

	}

	function dbclose(){

		$this->_db=null;

	}

	function resReturn($res=false,$data=null){

		if(empty($data)){
			$data=null;
		}
		return array($res, $data);

	}

}

?>