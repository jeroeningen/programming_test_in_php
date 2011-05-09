<?php 
	class Dispatcher {
		function dispatch() {
			if (empty($_REQUEST['url'])) {
				$controller_and_view = array('root', 'index');
			} else {
				$controller_and_view = explode("/", $_REQUEST['url']);
			}
			$controller_name = $controller_and_view[0];
			//include the base controller
			include ROOT . "lib/controllers/controller.php";
			
			//include the controller
			include ROOT . "app/controllers/" . $controller_name . "_controller.php";
			$controller_name = ($controller_name . "Controller");
			$controller = new $controller_name;
			$content = call_user_func(array($controller, $controller_and_view[1]));
			
			if (ajax_request()) {
				echo $content;
			} elseif (isXml($content)) {
				//send Xml
				header("Content-type: text/xml");
				echo $content;
			} else {
				//include the basic vars for the view and
				//include the layout if it is a 'normal' request
				include ROOT . 'lib/views/basics.php';
			}
		}
	}
?>