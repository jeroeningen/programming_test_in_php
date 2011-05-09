<?php 
	class Controller {
		/**
		 * 
		 * Get the uploaded file from the server
		 */
		var $uploaded_file;
		
		/**
		 * 
		 * set the session in this variable
		 */
		var $session;
		
		/**
		 * 
		 * Set if it is an Ajax request
		 */
		var $ajax;
		
		/**
		 * 
		 * Set the parameters send to the controller
		 */
		var $params = array();
		
		function __construct() {
			$this->uploaded_file = $_FILES;
			
			$this->ajax = (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == "XMLHttpRequest");

			$this->params = array_merge($_POST, $_GET);
			
			//include the session component
			include ROOT . 'lib/components/session.php';
			$this->session = new Session();
		}
		
		/**
		 * 
		 * function to render the view
		 * @param string $view
		 */
		function render($view) {
			$data = 'test';
			return file_get_contents(ROOT . "app/views/" . strtolower(str_replace("Controller", "", get_called_class())) . "/$view.php");
		}
		
	}
?>