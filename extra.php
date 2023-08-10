define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', false );
@ini_set( 'display_errors', 0 );
@error_reporting( E_ALL );

define('FS_METHOD', 'direct');

define('WP_ENVIRONMENT_TYPE', 'development');

try {
if (defined('WP_ENVIRONMENT_TYPE') && (constant('WP_ENVIRONMENT_TYPE') !== 'production')) {
	if (defined('WP_CLI')) {
		$_SERVER['HTTP_HOST'] = '127.0.0.1:80';
	}
	if (!isset($_SERVER['HTTP_REQUEST_SCHEME'])) {
		$_SERVER['HTTP_REQUEST_SCHEME'] = 'http';
	}
	define( 'WP_HOME', $_SERVER['HTTP_REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/' );
	define( 'WP_SITEURL', $_SERVER['HTTP_REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/' );
}
} catch (\Throwable $e) {}
