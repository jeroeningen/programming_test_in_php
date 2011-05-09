<?php 
	class Html {
		/**
		 * 
		 * Create a html link
		 * @param string $name
		 * @param string $url
		 */
		function link($name, $url) {
			$url = $this->url_for($url);
			echo "<a href=\"" . RELATIVE_ROOT . "$url\">$name</a>";
		}
		
		function image($url) {
			$url = $this->url_for($url);
			echo "<img src=\"" . RELATIVE_ROOT . "images/$url\" />";
		}
		
		function url_for($url) {
			if (substr($url, 0, 1) == "/") {
				$url = substr($url, 1, strlen($url) - 1);
			}
			return $url;
		}
	}
?>