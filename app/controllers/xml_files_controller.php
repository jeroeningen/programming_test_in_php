<?php 
	class Xml_FilesController extends ApplicationController {
		var $models = array('filter');
		
		//filter the xml file
		function filter() {
			$filter = new $this->models[0];
			//handles the AJAX request
			if ($this->ajax) {
				$file = $this->params['xml']['filename'];
				$records = $filter->retrieve_xml($file);
				return count($records) - count($filter->filter_xml($file, !empty($this->params['xml']['field']) ? $this->params['xml']['field'] : ''));
			} else {
				$file = $this->uploaded_file['xml'];
				if ($filter->is_xml($file)) {
					//Save the file to the tmp dir and set the filename as a parameter
					$this->params['xml']['filename'] = $filter->save_file($file);
					return $this->render(__FUNCTION__);
				} else {
					return $this->render('error');
				}
			}
		}
		
		//create the result for the filtered xml file
		function result() {
			$filter = new $this->models[0];
			$filtered_records = $filter->filter_xml($this->params['xml']['filename'], !empty($this->params['xml']['field']) ? $this->params['xml']['field'] : '');
			
			//after use, delete the file
			$filter->remove_file($this->params['xml']['filename']);
			
			return $filter->create_xml($filtered_records);
		}
	}
?>