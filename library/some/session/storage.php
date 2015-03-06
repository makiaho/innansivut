<?php
/**
* @author Hannu Lohtander
* @package wo2009
* @subpackage library
*
*/
SomeLoader::import('library.some.session.istorage', SOME_PATH.DS.'interface',null);
/**
* @author Hannu Lohtander
* @package wo2009
* @subpackage library
*
*/
abstract class SomeSessionStorage implements ISomeSessionStorage {
	
	protected function __construct($options) {
		$this->register();
	}	
	
	public static function getInstance($driver = 'none', $options = array()) {
	#
	# this is factory method to create instances from folder storage
	# 
	#
		$file = dirname(__FILE__).DS.'storage'.DS.$driver.'.php';
		include($file);
		$class = 'SomeSessionStorage'.ucfirst($driver);
		return new $class($options);
	}
	
	
	
		/**
	* Register the functions of this class with PHP's session handler
	*
	* @access public
	* @param array $options optional parameters
	*/
	function register( $options = array() )
	{
		// use this object as the session handler
		session_set_save_handler(
			array($this, 'open'),
			array($this, 'close'),
			array($this, 'read'),
			array($this, 'write'),
			array($this, 'destroy'),
			array($this, 'gc')
		);
	}
	


}
