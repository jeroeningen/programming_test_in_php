<?php 
	class Session{
		/**
		 * 
		 * add data to the session
		 * @param string $name
		 * @param mixed $data
		 */
		function add($name, $data) {
			$_SESSION[$name] = $data;
			session_encode();
		}
		
		/**
		 * 
		 * Get a variable from the session
		 * @param string $name
		 */
		function get($name) {
			return $_SESSION[$name];
		}
		
		/**
		 * 
		 * Destroy the session
		 */
		function destroy() {
			session_destroy();
		}
	}
?>