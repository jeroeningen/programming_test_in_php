<?php
	class Stylesheet{
		/**
		 * 
		 * Create the stylesheet link
		 * @param mixed $stylesheets
		 */
		function link($stylesheets) {
			if (is_array($stylesheets)) {
				foreach($stylesheets as $stylesheet) {
					$this->create_link($stylesheet);
				}
			} else {
				$this->create_link($stylesheets);
			}
		}
		
		function create_link($filename) {
			echo "<link href=\"" . RELATIVE_ROOT . "stylesheets/$filename.css\" media=\"screen\" rel=\"stylesheet\" type=\"text/css\" />";
		}
	}
?>