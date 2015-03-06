<?php
/**
 * 
 * @author Hannu Lohtander
 * @package wo2009
 * @subpackage mvc
 *
 */


SomeLoader::import('library.some.application.iview', SOME_PATH.DS.'interface',null);
/**
 * 
 * @package wo2009
 * @subpackage mvc
 *
 */
class SomeView implements ISomeView{
	/**  */
	private $_name;
	/**  */
	private $model;
	/**
	 * defautl constructor.
	 * @param array $options
	 * @return ISomeView
	 */
	public function __construct(array $options = array()) {
		if (isset($options['name'])) {
			$this->_name = $options['name'];
		} else {
			$this->_name = $this->getName();
		}
	}

	public function display($tmpl='default') {
		if ($tmpl === null) {
			$tmpl = 'default';
		}	
		$this->loadTemplate($tmpl);
	}
	
	public function setModel(ISomeModel $model) {
		$this->model = $model;
	}
	
	public function getModel() {
		return $this->model;
	}
	
	protected function loadTemplate($tmpl) {
		//get it from PATH_CONTENT.DS.view.DS.(suffix).DS.'tmpl'.DS.$tmpl.'.php'
		$suffix = $this->getName();
		
		include(PATH_CONTENT.DS.'view'.DS.$suffix.DS.'tmpl'.DS.$tmpl.'.php');
	}
	
	public function getName()
	{
		$name = $this->_name;

		if (empty( $name ))
		{
			$r = null;
			if ( !preg_match( '/SomeView(.*)/i', get_class( $this ), $r ) ) {
				throw new Exception("SomeView::getName() : Cannot get or parse class name.");
			}
			$this->_name = $name = strtolower( $r[1] );
		}

		return $name;
	}


}
