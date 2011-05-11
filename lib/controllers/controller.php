<?php 
	//include the application model
	include APP_DIR . "controllers/application_controller.php";
	
	class Controller {
		/**
		 * 
		 * Get the uploaded file from the server
		 */
		var $uploaded_file;
		
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
		
		/**
		 * 
		 * Set the filename of the layout
		 */
		var $layout = 'layout';
		
		/**
		 * 
		 * Set the models to include
		 */
		var $models = array();

		function __construct() {
			$this->uploaded_file = $_FILES;
			
			$this->ajax = (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == "XMLHttpRequest");

			$this->params = array_merge($_POST, $_GET);
			
			//include the specified models
			if (!empty($this->models)) {
				foreach($this->models as $model) {
					include APP_DIR . "models/$model.php";
				}
			}
		}
		
		/**
		 * 
		 * function to render the view
		 * @param string $view
		 */
		function render($view) {
			return file_get_contents(APP_DIR . "views/" . strtolower(str_replace("Controller", "", get_called_class())) . "/$view.php");
		}
		
	}
?>