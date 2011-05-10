<?php
	//define constancs here

	//set the application root
	define('ROOT', str_replace("public/index.php", "", $_SERVER['SCRIPT_FILENAME']));
	define('APP_DIR', ROOT . 'app/');
	define('LIB_DIR', ROOT . 'lib/');
	define('TMP_DIR', ROOT . 'tmp/');
	define('RELATIVE_ROOT', str_replace("public/index.php", "", $_SERVER['SCRIPT_NAME']));
?>