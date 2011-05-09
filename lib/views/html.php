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
		
		/**
		 * 
		 * Create an image tag
		 * @param string $url
		 * @param array $options
		 * 
		 * Possible: options
		 * in_anchor: Set to true if the image tag is part of an anchor
		 */
		function image($url, $options = array()) {
			$url = $this->url_for($url);
			$image = "<img src=\"" . RELATIVE_ROOT . "images/$url\" />";
			if (!empty($options['in_anchor'])) {
				return $image;
			} else {
				echo $image;
			}
		}
		
		function url_for($url) {
			if (substr($url, 0, 1) == "/") {
				$url = substr($url, 1, strlen($url) - 1);
			}
			return $url;
		}
	}
?>