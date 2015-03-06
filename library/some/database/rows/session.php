<?php
/**
* SomeRowSession table.
*
* <p>example of possible database table from user:
* CREATE TABLE somesession (
*    sesskey character(32) NOT NULL PRIMARY KEY,
*    expiry integer NOT NULL,
*    value text
* ) 
* 
* </p>
* @package wo2009
* @subpackage library
*/

/**
* Template class SomeRow-Session.
*
* @package wo2009
* @subpackage library
*/
class SomeRowSession extends SomeRow {
	
	public $table = 'somesession'; //change name if you use some other table name
	public $primary = 'sesskey'; //change primary key column, if you use something else
	public $columns = array(
	   'sesskey',
	   'expiry',
	   'value'
	);
	
	public $sesskey = null;
	public $expiry  = null;
	public $value   = null;
	
	private $exists = false;

	
	public function __construct() {
		parent::__construct();
	}
	
	public function getColumns() {
		return $this->columns;
	}
	
	public function getTable() {
		return $this->table;
	}
	
	public function getPrimary() {
		return $this->primary;
	}
	
	public function create() {
		$key = $this->getPrimary();
		//if it does exists, then update, else insert
		if ($this->exists()) {
			$this->update();
			return $this->$key;
		} else {
		#####################################
			$columnstmp = $this->getColumns();
			foreach ($columnstmp as $colname) {
				$columns[$colname] = $this->$colname;
			}
			
			$table = $this->getTable();
			$qmarks = array_fill( 0  , count($columns), '?');
			$sql = "INSERT INTO $table (".join(',',array_keys($columns)).") VALUES(".join(',',$qmarks).")";
			$columns = array_values($columns); //values must be integer indexed array
			$database = SomeFactory::getDBO();
	        $statement = $database->prepare($sql);
			$this->sql = $sql;
	        $success = $statement->execute(
	          $columns
	        );
			ob_start();
			print_r($columns);
			$this->columnsdebug = ob_get_clean();
			
	        return $this->$key;
		#####################################
		}
	}
	
	public function exists() {
		return $this->exists;
	}
	
	public function read() {
		$read = parent::read();
		if ($read) {
			$this->exists = true;
		}
		return $read;
	}
	
	public function check() {
		return true;
	}
	
}