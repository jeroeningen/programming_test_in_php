<?php 
	class Filter {
		
		/**
		 * 
		 * Save the xml file to the temp dir.
		 * @param string $file
		 * @return string $path
		 */
		function save_file($file) {
			$filename = rand() . $file['name']['xml_file'];
			move_uploaded_file($file['tmp_name']['xml_file'], TMP_DIR . $filename);
			return TMP_DIR . $filename;
		}
		
		/**
		 * 
		 * Remove the xml file from the temp dir
		 * @param $file
		 * 
		 */
		function remove_file($file) {
			unlink($file);
		}
		
		/**
		 * 
		 * Check wether the given file is an xml file based on the extension and the type
		 * @param $file
		 * @return boolean
		 */
		function is_xml($file) {
			if (end(explode(".", $file['name']['xml_file'])) != "xml" ||
				$file['type']['xml_file'] != "text/xml") {
				return false;
			} else {
				return true;
			}
		}
		
		/**
		 * 
		 * Retrieve the xml as an array
		 * @param $file
		 * * @return mixed records
		 */
		function retrieve_xml($file) {
			$xml = (simplexml_load_file($file));
			$records = array();
			foreach($xml->children() as $child => $node) {
				$record = (array) $node;
				array_push($records, $record);
			}
			return $records;
		}
		
		/**
		 * 
		 * Filter the given xml file for unique records
		 * @param $xml
		 * @param $filters
		 * @return mixed $records
		 */
		function filter_xml($file, $filters) {
			$records = $this->retrieve_xml($file);
			if ($filters == '') {
				return $records;
			} else {
				//give every record an unique id
				for($i = 0; $i < count($records); $i++) {
					$records[$i]['id'] = $i;
				}
				//loop through the filters and compare the records
				foreach($filters as $filter) {
					for($i = 0; $i < count($records); $i++) {
						for($j = 0; $j < count($records); $j++) {
							//if the values for the given filters are the same, flag record for delete
							if ($records[$i][$filter] == $records[$j][$filter] && $records[$i]['id'] != $records[$j]['id']) {
								$records[$i]['delete'] = true;
								$records[$j]['delete'] = true;
							}
						}
					}
				}
				
				//actually delete the record
				$size = count($records);
				for($i = 0; $i < $size; $i++) {
					unset($records[$i]['id']);
					if(!empty($records[$i]['delete']) && $records[$i]['delete']) {
						unset($records[$i]);
					}
				}
				return $records;
			}
		}
		
		/**
		 * 
		 * Return the records as Xml
		 * @param $records
		 * @return xml $xml
		 */
		function create_xml($records) {
			//before creating new xml, first filter the xml
			$xml = new SimpleXMLElement('<data></data>');
			foreach($records as $record) {
				$xml_record = $xml->addChild('record');
				foreach ($record as $key => $value) {
					$xml_record->addChild($key, $value);
				}
			}
			return $xml->asXML();
		}
	}
?>