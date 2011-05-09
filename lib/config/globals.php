<?php 
	//define global functions here
	
	/**
	 * 
	 * rewrite of the print_r function
	 * @param $value
	 */
	function p($value) {
		return print_r($value);
	}
	
	/**
	 * 
	 * return if it is an Ajax request
	 */
	function ajax_request() {
		return !empty($_SERVER['HTTP_X_REQUESTED_WITH']);
	}
	
	/**
	 * 
	 * Checjk wether the content is Xml
	 * @param $content
	 */
	function isXml($content) {
		return strstr($content, "<?xml version=\"1.0\"?>");
	}
?>