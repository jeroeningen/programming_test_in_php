<?php
	class Javascript {
		//create javascript tag(s)
		function tag($filenames) {
			if (is_array($filenames)) {
				foreach($filenames as $filename) {
					$this->create_tag($filename);
				}
			} else {
				$this->create_tag($filenames);
			}
			
		}
		
		//actually create the javascript tag
		function create_tag($filename) {
			echo "<script src=\"javascripts/$filename.js\" type=\"text/javascript\"></script>";
		}
	}
?>