<?php
/**
* @author Hannu Lohtander
* @package wo2009
* @subpackage library
*
*/

/**
* @author Hannu Lohtander
* @package wo2009
* @subpackage library
*
*/
class SomeDatabasePdopostgres extends SomeDatabase {

	public function __construct(array $options) {
		//return new parent__construct(postgres string);
		$host = $options['host'];
		$databasename = $options['database'];
		$username = $options['dbuser'];
		$password = $options['dbpass'];
		//pgsql:host=localhost port=5432 dbname=testdb user=bruce password=mypass
		$str = "pgsql:host=$host port=5432 dbname=$databasename";
		if ($username) {
			$str.= " user=$username";
		}
		if ($password) {
			$str.= " password=$password";
		}
		$options['dns'] = $str;
		echo $str;
		parent::__construct($options);
	}
	
	public function lastInsertId($sequence) {
		return parent::lastInsertId($sequence);
	}

}
