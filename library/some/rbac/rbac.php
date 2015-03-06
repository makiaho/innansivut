<?php
/**
* SomeRbac is authentication class.
*
* @package wo2009
* @subpackage library
* 
*/

/**
* SomeRbac
*
* @package wo2009
* @subpackage library
* 
*/

class SomeRbac {

	private $maps = array();

	
	
	protected function __construct() {
		//if map is serialized to SOME_CACHE; then use that
		//if (file_exists(SOME_CACHE.DS.'somerbac.serialized')) {
		//	$this->maps = unserialize( file_get_contents(SOME_CACHE.DS.'somerbac.serialized') );
		//} else {
			//set defaults to maps
			$this->maps['guest'] = array('read');
			$this->maps['registered'] = array('read','write','update','create');
			$this->maps['admin'] = array_merge($this->maps['registered'], array('moderate','administer'));
			$this->maps['manager'] = array();
		//}
	}
	
	public static function getInstance() {
		static $instance;
		if (!$instance) {
			$instance = new self;
		}
		return $instance;
	}
	
	public function __destruct() {
		//save and serialize to file
		$serialized = serialize($this->maps);
		file_put_contents(SOME_CACHE.DS.'somerbac.serialized',$serialized);
	}
	
	public function addActions($role,$actions =array()) {
		$map = $this->maps[$role];
		$fullmap = array_unique(array_merge($map,$actions));
		$this->maps[$role] = $fullmap;
	}
	
	public function hasAccess($role,$action) {
		if (isset($this->maps[$role])) {
			return in_array($action,$this->maps[$role]);
		}
		return false;
	}
	
	public function removeActions($role,$remove) {
		if (isset($this->maps[$role])) {
			$this->maps[$role] = array_diff($this->maps[$role],$remove);
		}
	}



}