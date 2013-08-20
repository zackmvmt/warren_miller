<?php

	// database
	define('DB_NAME', 'wme_presale_2012');
	
	// facebook
	define('FB_APP_ID', 447491768636418);
	define('FB_APP_SECRET', '9c2ca97b817b169f07f9db58bb2126da');
	define('FB_PAGE_URL', 'https://www.facebook.com/WarrenMillerEntertainment');
	define('FB_TAB_URL', FB_PAGE_URL . '?sk=app_' . FB_APP_ID);
	define('BASE_URL', 'http://' . $_SERVER['SERVER_NAME'] . '/apps/warren_miller/presale/');
	//define('FB_CANVAS_URL', 'http://apps.facebook.com/dogfunk_dc');
	

	// Path for common files
	define('COMMON_PATH', $_SERVER['COMMON_PATH']);
	require_once COMMON_PATH . '/global.php';
	require_once COMMON_PATH . '/functions.php';
		

?>