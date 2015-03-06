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
class SomeRowDemo extends SomeRow {
	
	public $table = 'wo2009_demotable';
	public $primary = 'id';
	public $columns = array(
	   'id',
	   'data'
	);
	
	public $id = null;
	public $data = null;
	
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
	
	public function check() {
		return true;
	}
	
}