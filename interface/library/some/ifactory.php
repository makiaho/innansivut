<?php
/**
* Framework registry/factory.
* 
* This is the main source for various classes.
*
* @package wo2009
* @subpackage library
*/

/**
* Framework registry/factory.
* <p>This class in loaded by framework when starting. Usage example:<code>
* $session = SomeFactory::getSession();
* $conf = SomeFactory::getConfiguration();
* $user = SomeFactory::getUser();
* $application = SomeFactory::getApplication();
* $database = SomeFactory::getDBO();
* </code>
* </p>
* @package wo2009
* @subpackage library
*/
interface ISomeFactory {
	
	/**
	* get session singleton
	*
	* @return ISomeSession
	*/
	public static function getSession();
	
	/**
	* get Configuration  singleton
	*
	* @param string $file absolute path to configuration.xml file
	* @return ISomeConfiguration
	*/
	public static function getConfiguration($file=null);
	
	/**
	* get Front Controller SomeApplication singleton
	*
	* @return ISomeApplication
	*/
	public static function getApplication();
	
	/**
	* get database of type PDO
	* 
	* @return ISomeDatabase singleton
	*/
	public static function getDBO();
	
	/**
	* get Someuser.
	*
	* @return ISomeUser
	*/
	public static function getUser();
	/**
	* get SomeDocumentHTML.
	*
	* @return ISomeDocumentHTML
	*/
	public static function getDocument();
	
}
