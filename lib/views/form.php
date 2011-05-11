<?php
	class Form {
		var $name = '';
		/**
		 * 
		 * create a form tag
		 * @param string $name
		 * @param string $action
		 * @param array $html array with html options
		 * 
		 *  Current possible options:
		 *  multipart: sets the form as a multipart form
		 */
		function create($name, $action, $html = array()) {
			$this->name = $name;
			echo "<form name=\"$name\" action=\"" . RELATIVE_ROOT . $action ."\" method=\"POST\"" .
			((!empty($html['multipart']) && $html['multipart']) ? " enctype=\"multipart/form-data\"" : "") .
			(!empty($html['id']) ? " id=\"" . $html['id'] . "\"" : "")
			. ">";
		}
		
		/**
		 * 
		 * Create a file field tag
		 * @param string $field
		 */
		function file_field($field) {
			return $this->input_tag($field, 'file');
		}
		
		/**
		 * 
		 * Create a checkbox tag
		 * @param string $field
		 */
		function checkbox($field, $html_attributes) {
			return $this->input_tag($field, 'checkbox', $html_attributes);
		}
		
		/**
		 * 
		 * Create a hidden field tag
		 * @param string $field
		 * @param string $html_attributes
		 */
		function hidden($field, $html_attributes) {
			return $this->input_tag($field, 'hidden', $html_attributes);
		}
		
		/**
		 * 
		 * Create a label tag
		 * @param string $field
		 */
		function label($field) {
			echo "<label name=$this->name[$field]>$field</label>";
		}
		
		/**
		 * 
		 * Create a genric input tag
		 * @param string $name
		 * @param array $html_attributes
		 */
		function input_tag($field, $type, $html_attributes = array()) {
			$input = "<input type=\"$type\" name=\"$this->name".
				(strstr($field, "[]") ? ("[" . str_replace("[]", "", $field) . "][]") : ("[$field]")) . "\" ";
			foreach ($html_attributes as $key => $value) {
					$input .= $key ."=\"$value\" ";
			}
			$input .= "/>";
			echo $input;
		}
		
		/**
		 * 
		 * Create a submit tag
		 * @param string $name
		 * @param string $value
		 */
		function submit($name, $value = null) {
			if (empty($value)) {
				$value = $name;
			}
			return $this->input_tag($name, 'submit', array('value' => $value));
		} 
		
		function end() {
			echo "</form>";
		}
	}
?>