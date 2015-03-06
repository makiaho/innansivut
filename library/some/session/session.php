<?php
/**
* @package wo2009
* @subpackage library
*/


/** */
require('storage.php');
SomeLoader::import('library.some.session.isession', SOME_PATH.DS.'interface',null);
/**
* @package wo2009
* @subpackage library
*/

class SomeSession implements ISomeSession {

	public function __construct($store = 'none', $options = array()) {
		//get the correct storage, and register it.
		$this->_store = SomeSessionStorage::getInstance($store, $options);
		session_name('wo' . md5('wocookie'));
		session_start();
		ini_set('session.gc_divisor',40);

		// Send modified header for IE 6.0 Security Policy
		header('P3P: CP="NOI ADM DEV PSAi COM NAV OUR OTRo STP IND DEM"');
	}
	
	public static function getInstance($driver,$options = array()) {
		static $instance;
		if (!$instance) {
			$instance= new self($driver,$options);
		}
		return $instance;
	}
	
	public function set($name,$value) {
		$old = isset($_SESSION[$name]) ?  $_SESSION[$name] : null;

		if (null === $value) {
			unset($_SESSION[$name]);
		} else {
			$_SESSION[$name] = $value;
		}

		return $old;
	}
	
	public function get($name,$default=null) {
		if (isset($_SESSION[$name])) {
			return $_SESSION[$name];
		}
		return $default;
	}
	
	public function clear($name) {
		unset($_SESSION[$name]);
	}
	
	public function close() {
		session_write_close();
	}
	
	function destroy()
	{
		if (isset($_COOKIE[session_name()])) {
			setcookie(session_name(), '', time()-42000, '/');
		}

		session_unset();
		session_destroy();
		return true;
	}

}
