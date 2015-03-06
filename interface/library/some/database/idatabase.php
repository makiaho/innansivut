<?php
/**
* ISomeDatabase is factory method to create instance of PDO class.
* <p>
* Usage:
* array $options has driver, host and database:
* driver is pdopostgres or pdomysql
* host is postgres.cs.uta.fi or your prefered host
* database is the uta basic account username, example aa123456
* </p>
* <p>This class is not used directly! Instead create instance using SomeFactory!</p>
* <code>$database = SomeFactory::getInstance();</code>
* <p>This is instance of PDO class, so use it like http://www.php.net/PDO</p>
* @package wo2009
* @subpackage library
*/

/**
* @package wo2009
* @subpackage library
*/
interface ISomeDatabase {
	
	/**
	* create instance from SomeFactoryPdopostgres.
	* <p>array should have at least keys driver, database, host, and possibly dbuser and dbpass</p>
	* @param array $options.
	* @return PDO object instance 
	*/
	public static function getInstance(array $options);

}