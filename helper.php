<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);	
	
//!///////////////
// Includes a file

function _inc($file)
{
	require('inc/'.$file.'.php');
}

?>