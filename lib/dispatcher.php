<?php 
	class Dispatcher {
		function dispatch() {
			//include the base controller
			include ROOT . "lib/controllers/controller.php";
			include ROOT . "app/controllers/application_controller.php";
			
			if (empty($_REQUEST['url'])) {
				$controller_name = "root";
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
			$content = $controller->index();
			
			if (ajax_request()) {
				echo $content;
			} elseif (isXml($content)) {
				//send Xml
				header("Content-type: text/xml");
				echo $content;
			} else {
				//include the basic vars for the view
				include ROOT . 'lib/views/basics.php';
				
				//include the layout if it is a 'normal' request
				include ROOT . "app/views/layouts/" . $controller->layout . ".php";
			}
		}
	}
?>