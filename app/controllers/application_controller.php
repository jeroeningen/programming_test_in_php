<?php 
	class ApplicationController extends Controller {
		function index() {
			$this->session->destroy();
			return $this->render(__FUNCTION__);
		}
	}
?>