<?php 
	class Dispatcher {
		function dispatch() {
			//include the base controller
			include ROOT . "lib/controllers/controller.php";
		
			if (empty($_REQUEST['url'])) {
				$controller_name = "application";
			} else {
				$controller_name = $_REQUEST['url'];
			}
			//include the controller and the model
			include ROOT . "app/controllers/" . $controller_name . "_controller.php";
			if (file_exists(ROOT . "app/models/" . $controller_name . ".php")) {
				include ROOT . "app/models/" . $controller_name . ".php";
			}
			$controller_name = $controller_name . "Controller";
			$controller = new $controller_name;
			return $controller->index();
		}
	}
?>