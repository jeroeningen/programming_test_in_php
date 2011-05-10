<?php 
	class ApplicationController extends Controller {
		var $layout = 'programming_test';
		var $components = array('session');
		
		function __construct() {
			parent::__construct();
		}
	}
?>