<?php

/*
 |--------------------------------------------------------------------------
 | ERROR DISPLAY
 |--------------------------------------------------------------------------
 | Don't show ANY in production environments. Instead, let the system catch
 | it and display a generic error message.
 |
 | If you set 'display_errors' to '1', CI4's detailed error report will show.
 */
error_reporting(E_ALL & ~E_DEPRECATED);
// If you want to suppress more types of errors.
// error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);
ini_set('display_errors', '0');

/*
 |--------------------------------------------------------------------------
 | DEBUG MODE
 |--------------------------------------------------------------------------
 | Debug mode is an experimental flag that can allow changes throughout
 | the system. It's not widely used currently, and may not survive
 | release of the framework.
 */
defined('CI_DEBUG') || define('CI_DEBUG', false);

//development on == true
if(true){
	error_reporting(E_ALL);
	ini_set('display_errors', '1');

	/*
	 |--------------------------------------------------------------------------
	 | DEBUG BACKTRACES
	 |--------------------------------------------------------------------------
	 | If true, this constant will tell the error screens to display debug
	 | backtraces along with the other error information. If you would
	 | prefer to not see this, set this value to false.
	 */
	defined('SHOW_DEBUG_BACKTRACE') || define('SHOW_DEBUG_BACKTRACE', true);

	/*
	 |--------------------------------------------------------------------------
	 | DEBUG MODE
	 |--------------------------------------------------------------------------
	 | Debug mode is an experimental flag that can allow changes throughout
	 | the system. This will control whether Kint is loaded, and a few other
	 | items. It can always be used within your own application too.
	 */
	defined('CI_DEBUG') || define('CI_DEBUG', true);
}