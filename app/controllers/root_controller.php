<?php 
	class RootController extends ApplicationController {
		function index() {
			$this->session->destroy();
			return $this->render(__FUNCTION__);
		}
	}
?>