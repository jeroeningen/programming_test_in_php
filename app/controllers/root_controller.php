<?php 
	class RootController extends ApplicationController {
		function index() {
			//destroy the session when user access the root of the webapplication
			$session = new Session();
			$session->destroy();
			return $this->render(__FUNCTION__);
		}
	}
?>