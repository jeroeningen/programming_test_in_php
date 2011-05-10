<?php
	//create the stylesheet
	include 'stylesheet.php';
	$stylesheet = new Stylesheet();
	
	//create the javascript object
	include 'javascript.php';
	$javascript = new Javascript();
	
	//create the form object
	include 'form.php';
	$form = new Form();
	
	//create the html object
	include 'html.php';
	$html = new Html();

	include APP_DIR . "views/layouts/" . $controller->layout . ".php";
	
?>