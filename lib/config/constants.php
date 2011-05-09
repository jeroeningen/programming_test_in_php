<?php
	//define constancs here

	//set the application root
	define('ROOT', str_replace("public/index.php", "", $_SERVER['SCRIPT_FILENAME']));
	define('TMP_DIR', ROOT . 'tmp/');
	define('RELATIVE_ROOT', str_replace("public/index.php", "", $_SERVER['SCRIPT_NAME']));
?>