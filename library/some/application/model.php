<?php
/**
 * 
 * @author Hannu Lohtander
 * @package wo2009
 * @subpackage mvc
 *
 */


SomeLoader::import('library.some.application.imodel', SOME_PATH.DS.'interface',null);
/**
 * 
 * @package wo2009
 * @subpackage mvc
 *
 */
class SomeModel implements ISomeModel {
    
	protected $errors = array();
	
	/**
     * constructor
     * @param array $options
     * @return ISomeModel
     */
	public function __construct(array $options = array()) {
		
	}
	
	public function getErrors() {
		return $this->errors;
	}
	
}