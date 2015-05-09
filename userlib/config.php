<?php

//Database Account
define('DBTYPE', 'mysql');
define('DBUSER', 'cs270');
define('DBSERVER', 'localhost');
define('DBPASSWORD', 'cs270');
define('DBNAME', 'ebook_cs270');


//Direcroty Path
define('LIBPATH', './userlib/');
define('MODULEPATH', './pagemodule/');
define('TEMPLATESPATH', './template/');
define('COMPILEPATH', './template/compile/');

//Responce Definition
define('RESFLAG', 0);
define('RESDATA', 1);

//Session Keys
define('USER_ID', 'user_id');

//Module Names
define('DEFAULT_MODULE', 'booklist');
define('LOGIN', 'login');


//Option Keys
define('ID', 'id');
define('MODULE', 'module');

//Post Keys
define('P_USERID', 'uname');
define('P_USERPASS', 'upass');
define('P_USERSET', 'user_set');
define('P_ADDDETAIL', 'detail');
define('P_ADDID', 'id');
define('P_ADDNEW', 'new');
define('P_ADDSEARCH', 'search');
define('P_ADDEDIT', 'edit');
define('P_ADDDELETE', 'del');
define('P_LOGOUT','logout');

//Message Definition
define('LOGINERR', "Invalid username or password");
define('USERIDEMPTY', "Username is required");
define('USERIDERR', "Invalid username");
define('PASSEMPTY', "Password is required");


?>
