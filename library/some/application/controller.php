<?php
/**
 * See ISomeController for documenattnion
 * @see ISomeController
 * @author Hannu Lohtander
 * @package wo2009
 * @subpackage mvc
 *
 */
SomeLoader::import('library.some.application.icontroller', SOME_PATH.DS.'interface',null);
/**
 * 
 * @author munbuntu
 * @package wo2009
 * @subpackage mvc
 */
class SomeController implements ISomeController {
    /**
     * 
     * @return ISomeController
     */
	public function __construct() {
		
	}
	/**
	 * 
	 * @return void
	 */
	 
	public function execute() {
		$this->loadLanguage();
		//get the view parameter from request. If there is method that has the name of the value, call it.
		//default call is display.
		$view = SomeRequest::getCmd('view',null);
		$action = SomeRequest::getCmd('action',null);
                // action is alias for view, when the view is not set
                // if view is set, action is just extension argument
                if ($view === null && $action !== null) {
                    $view = $action;
                }
                $methods = get_class_methods($this);
		if ( in_array($view,$methods) ) {
			$this->$view();
		} else {
			$this->display();
		}
	}
	/**
	 * this throws execption. You must implement this in contents controller. 
	 *
	 */
	 
	public function display() {
		throw new Exception('subclass must implement display!');
	}
	/**
	 * method to get model.
	 * @param string $modelname suffic of the model in SomeModel[suffix]
	 * @return ISomeModel
	 */
	public function getModel($modelname) {
		//use $modelname as filename and classname suffix.
		//path is PATH_CONTENT.DS.'model'.DS
		
		//all the checks and validation skipped.
		$path = PATH_CONTENT.DS.'model'.DS;
		$path_and_file = $path . $modelname.'.php';
		$classname = 'SomeModel'. ucfirst($modelname);
		if (!file_exists($path_and_file)) {
			throw new SomeFileNotFoundException("Model file for $modelname not found");
		}
		require_once($path_and_file);
		if (!class_exists($classname,false)) {
			throw new SomeClassNotFoundException("Model class $classname not found");
		}
		return new $classname;
	}
	/**
	 *  method to get view.
	 *  @param string $viewname. Suffix of the SomeView[suffix]
	 *  @return ISomeView
	 *
	 */
	public function getView($viewname) {
		//use $viewname as filename and classname suffix.
		//path is PATH_CONTENT.DS.view.DS.$viewname
		
		//all the checks and validation skipped.
		$path = PATH_CONTENT.DS.'view'.DS;
		$path_and_file = $path .DS.$viewname.DS. $viewname.'.php';
		$classname = 'SomeView'. ucfirst($viewname);
	    if (!file_exists($path_and_file)) {
            throw new SomeFileNotFoundException("View file for $viewname not found");
        }
        require_once($path_and_file);
	    if (!class_exists($classname,false)) {
            throw new SomeClassNotFoundException("View class $classname not found");
        }
		return new $classname;
	}
	
	protected function loadLanguage() {
		$app = SomeRequest::getVar('app');
		$language=SomeFactory::getLanguage();
		$language->load($app);
	}
	
	

}