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
class SomeRowQuotes extends SomeRow {
	
	public $table = 'quotes';
	public $primary = 'id';
	public $columns = array(
	   'id',
	   'thequote',
	   'bywhom',
	   'whenyear'
	);
	
	public $id       = null;
	public $thequote = null;
	public $bywhom   = null;
	public $whenyear = null;
	
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