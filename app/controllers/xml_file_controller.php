<?php 
	include ROOT . 'app/models/filter.php';
	
	class Xml_FileController extends Controller {
		function index() {
			$filter = new Filter();
			$filtered_records = $filter->filter_xml($this->session->get('records'), !empty($this->params['filter']['field']) ? $this->params['filter']['field'] : '');
			return $filter->create_xml($filtered_records);
		}
	}
?>