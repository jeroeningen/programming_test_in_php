<?php 
	class Xml_FilesController extends ApplicationController {
		var $models = array('filter');
		
		//filter the xml file
		function filter() {
			$session = new Session();
			$filter = new $this->models[0];
			//handles the AJAX request
			if ($this->ajax) {
				$file = $session->get('xml_file');
				$records = $filter->retrieve_xml($file);
				return count($records) - count($filter->filter_xml($file, !empty($this->params['filter']['field']) ? $this->params['filter']['field'] : ''));
			} else {
				$file = $this->uploaded_file['xml'];
				if ($filter->is_xml($file)) {
					//Save the file to the tmp dir and store the filename in the session
					$session->add('xml_file', $filter->save_file($file));
					return $this->render(__FUNCTION__);
				} else {
					return $this->render('error');
				}
			}
		}
		
		//create the result for the filtered xml file
		function result() {
			$session = new Session();
			$filter = new $this->models[0];
			$filtered_records = $filter->filter_xml($session->get('xml_file'), !empty($this->params['filter']['field']) ? $this->params['filter']['field'] : '');
			
			//after use, delete the file and destroy the session
			$filter->remove_file($session->get('xml_file'));
			$session->destroy();
			
			return $filter->create_xml($filtered_records);
		}
	}
?>