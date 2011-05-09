<?php 
	//configure the envirnoment
	include 'config/config.php';
	
	//dispatch the request to throught the controller to the view
	include ROOT . '/lib/dispatcher.php';

	$dispatcher = new Dispatcher();
	$dispatcher->dispatch();
?>