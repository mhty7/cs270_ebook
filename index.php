<?php

mb_internal_encoding('UTF-8');
date_default_timezone_set('Asia/Manila');
ini_set( 'display_errors', 1 );
require_once('userlib/config.php');	
require_once(LIBPATH.'execute.php');
require_once(LIBPATH.'view.php');
require_once(LIBPATH.'data.php');

$execute = new execute();
$execute->main();

?>
