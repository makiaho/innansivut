<?php
/**
* ISomeRow is factory method to create instance of specialized SomeRow classes.
* @package wo2009
* @subpackage library
*/

/**
* SomeRow is factory class to create specialized SomeRow[extensioname] objects.
*
* <p>SomeRow povides getRow factory method. It gets arguments that is the suffix of the class extending SomeRow.
* Extending class must be on subfolder rows/ in a file named exactly as class prefix. Example:
* <code>
* //get class SomeRowDemo from file rows/demo.php
* //This is NOT singleton
* $demorow = SomeRow::getRow('demo');
*
* </code>
* </p>
* <p>Extendng class MUST implement getTable(), getPrimary() and getColumns methods. See methods for explanation.</p>
*
* @package wo2009
* @subpackage library
*/
interface ISomeRow {
	
	/**
	* create instance from SomeRow.
	* @param string $table name of the class file and suffix of class name.
	* @return ISomeRow object instance 
	*/
	public static function getRow($table);
	
	/**
	* CRUD method create
	*/
	public function create();
	/**
	* CRUD method read
	*/
	public function read();
	/**
	* CRUD method update
	*/
	public function update();
	/**
	* CRUD method delete
	*/
	public function delete();

	/**
	* abstract function, extending class must implement.
	* <p>This method must return the table name of the database table it manages - example someuser. 
	* This method is implemented in extending class
	* , but called in parent. That means, that this is template method pattern style construct.</p>
	* @return string name of the database table
	*/
	public function getTable();
	/**
	* abstract function, extending class must implement.
	* <p>This method must return the column name from the table that is the primary key. Usually id like in table someuser.
	* This method is implemented in extending class
	* , but called in parent. That means, that this is template method pattern style construct.</p>
	* @return string primary column name
	*/
	public function getPrimary();
	/**
	* abstract function, extending class must implement.
	* <p>This method must return the columns names from the table it manages. 
	* Someuser has at least id, username, userrole, email, homepage.
	* This method is implemented in extending class
	* , but called in parent. That means, that this is template method pattern style construct.</p>
	* @return array list of columns in database table
	*/
	public function getColumns();
	
}