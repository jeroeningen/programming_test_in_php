<?php
	//start the session
	session_start();

	//set the constants for the application
	include 'constants.php';
	
	//set the global functions
	include 'globals.php';

	/**
	 * Show errors
	 * 0: Do not show errors
	 * 1: Show errors
	 */
	ini_set('display_errors', '1');
	
?>