<?php 
	//configure the envirnoment
	include '../lib/config/config.php';
	
	//include the logic for the application and return the content
	include ROOT . '/lib/dispatcher.php';
	$dispatcher = new Dispatcher();
	$content = $dispatcher->dispatch();

	if (ajax_request()) {
		echo $content;
	} elseif (isXml($content)) {
		//send Xml
		header("Content-type: text/xml");
		echo $content;
	} else {
		//include the layout if it is a 'normal' request
		include ROOT . 'app/views/layouts/programming_test.php';
	}
?>