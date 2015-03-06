<?php
/**
* this is bootstrap file that includes class loader and classes that are needed at application initializing.
* <p>Classes that this file imports to scope are at least SomeRequest and SomeFactory.<br />
* This file also initialized someloader() function that is used to get more classes to scope.
* </p>
* @package wo2009
* @subpackage library
*/

/**
*
*/
if (! class_exists('SomeLoader')) {
    require_once( SOME_LIBRARY.DS.'loader.php');
}


SomeLoader::register('JFilterInput', SOME_LIBRARY.DS.'some'.DS.'filter'.DS.'filterinput.php'   );
//Environment classes
SomeLoader::import( 'some.environment.request'   );
SomeRequest::clean();
SomeLoader::import( 'some.environment.response'   );
SomeLoader::import( 'some.factory' );
SomeLoader::import( 'some.user.user'  );

//register exception classes
SomeLoader::register('SomeFrameworkException', SOME_LIBRARY.DS.'some'.DS.'exception'.DS.'frameworkexception.php'   );
SomeLoader::register('SomeDatabaseException',  SOME_LIBRARY.DS.'some'.DS.'exception'.DS.'databaseexception.php'   );
SomeLoader::register('SomeFileNotFoundException', SOME_LIBRARY.DS.'some'.DS.'exception'.DS.'filenotfoundexception.php'   );
SomeLoader::register('SomeClassNotFoundException', SOME_LIBRARY.DS.'some'.DS.'exception'.DS.'classnotfoundexception.php'   );


//class SomeText
/**
* class to help translations of strings.
* @package wo2009
*/

class SomeText
{
	/**
	 * Translates a string into the current language
	 *
	 * @access	public
	 * @param	string $string The string to translate
	 * @param	boolean	$jsSafe		Make the result javascript safe
	 *
	 */
	public static function _($string, $jsSafe = false)
	{
		$lang = SomeFactory::getLanguage();
		return $lang->_($string, $jsSafe);
	}

	/**
	 * Passes a string thru an sprintf
	 *
	 * @access	public
	 * @param	format The format string
	 * @param	mixed Mixed number of arguments for the sprintf function
	 */
	public static function sprintf($string)
	{
		$lang = SomeFactory::getLanguage();
		$args = func_get_args();
		if (count($args) > 0) {
			$args[0] = $lang->_($args[0]);
			return call_user_func_array('sprintf', $args);
		}
		return '';
	}

	/**
	 * Passes a string thru an printf
	 *
	 * @access	public
	 * @param	format The format string
	 * @param	mixed Mixed number of arguments for the sprintf function
	 */
	public static function printf($string)
	{
		$lang = SomeFactory::getLanguage();
		$args = func_get_args();
		if (count($args) > 0) {
			$args[0] = $lang->_($args[0]);
			return call_user_func_array('printf', $args);
		}
		return '';
	}

}

someloader('some.rbac.rbac');

/**
* class SomeAuth to authenticate users and action
*/

class SomeAuth {

	public static function _($user,$action='none') {
		$rbac = SomeRbac::getInstance();
		$role = $user->getUserrole();
		return $rbac->hasAccess($role,$action);
	}

}

class SomeUri {
    
    public static function getScheme() {
        $HTTP_HOST = SomeRequest::getString('HTTP_HOST', null, 'SERVER');
        $REQUEST_URI = SomeRequest::getString('REQUEST_URI', null, 'SERVER');
        
        $currentUrl = "http://{$HTTP_HOST}{$REQUEST_URI}";
        $urlParts = parse_url($currentUrl);
        return $urlParts['scheme'];
    }
    
    public static function getHost() {
    
        $HTTP_HOST = SomeRequest::getString('HTTP_HOST', null, 'SERVER');
        $REQUEST_URI = SomeRequest::getString('REQUEST_URI', null, 'SERVER');

        $currentUrl = "http://{$HTTP_HOST}{$REQUEST_URI}";

        $urlParts = parse_url($currentUrl);
        return $urlParts['host'];
    }
    
    public static function getPath() {
        
        $HTTP_HOST = SomeRequest::getString('HTTP_HOST', null, 'SERVER');
        $REQUEST_URI = SomeRequest::getString('REQUEST_URI', null, 'SERVER');
        $currentUrl = "http://{$HTTP_HOST}{$REQUEST_URI}";
        
        $urlParts = parse_url($currentUrl);
        $pathPart = (strpos($urlParts['path'], "index.php") === FALSE) ? $urlParts['path'] : dirname($urlParts['path']);
        if (substr($pathPart, -1) === "/") {
            $pathPart = substr($pathPart, 0,-1);
        }
        return $pathPart;
    }
    
}
