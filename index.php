<?php 
    ob_start();
ob_implicit_flush(FALSE);
/**
* index bootstrap
* @package wo2009
*/

// these force some debug behaviour, that make easier to follow errors.
ini_set('error_log',dirname(__FILE__).'/error.log');
ini_set('log_errors',1);
ini_set('display_errors',1);
ini_set('implicit_flush',false);

error_reporting(E_ALL);
$debug = 0;
/**
* SOME_PATH
*/
define('SOME_PATH',dirname(__FILE__));
/** */
require_once( SOME_PATH . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'defines.php' );
/** */
require_once( SOME_PATH.DS.'includes'.DS.'someexception.php' );
#/** */
#require_once( SOME_PATH.DS.'includes'.DS.'errorhandler.php' );
try {
/**
* initialize someloader()
*/
    require_once(SOME_LIBRARY.DS.'loader.php');

/**
* more initializing, library classes that are always loaded.
* trying to get framework. Failing to do so means that there is bugs or something broken at the server.
*/

	require_once(SOME_LIBRARY.DS.'some'.DS.'common.php');
	$framework = SomeFactory::getApplication();
	$debug = $framework->getDebug();

} catch (SomeException $e) {
	//get error template from root and exit, can not even build
	require(SOME_PATH.DS.'error.php');
	exit;
} catch (Exception $e) {
	require(SOME_PATH.DS.'error.php');
	exit;
}

//Try to do framework magic, failing to do so can happen for lots of reasons.
try {
	$app = SomeRequest::getVar('app','frontpage');
	$framework->dispatch($app);
	// render puts xhtml string to SomeDocumentHTML buffer, it does not echo anything
	$framework->render();
	
	// predebug string has all the e_notifications and such messages.
	$prebug = ob_get_clean();
	
} catch (Exception $e) {
	require(SOME_PATH.DS.'error.php');
	exit;
}
//id debug, echo debug
if ($debug) {
	//echo "<pre>$prebug</pre>\n";
	if ($prebug /*  if any prebug is there */) {
		SomeResponse::setBody("<pre>$prebug</pre>\n");
	}
} 
$framework->close();

