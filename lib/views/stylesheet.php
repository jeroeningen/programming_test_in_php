<?php
	class Stylesheet{
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
			echo "<link href=\"stylesheets/$filename.css\" media=\"screen\" rel=\"stylesheet\" type=\"text/css\" />";
		}
	}
?>