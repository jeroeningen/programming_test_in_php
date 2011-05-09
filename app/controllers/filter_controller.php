<?php 
	class FilterController extends ApplicationController {
		function index() {
			$filter = new Filter();
			//handles the AJAX request
			if ($this->ajax) {
				return count($this->session->get('records')) - count($filter->filter_xml($this->session->get('records'), !empty($this->params['filter']['field']) ? $this->params['filter']['field'] : ''));
			} else {
				$file = $this->uploaded_file['xml'];
				if ($filter->is_xml($file)) {
					//Get the XML and add it to the session
					$this->session->add('records', $filter->retrieve_xml($file));
					return $this->render(__FUNCTION__);
				} else {
					return $this->render('error');
				}
			}
		}
	}
?>