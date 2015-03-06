<?php
/**
 * 
 * @author Hannu Lohtander
 * @package wo2009
 * @subpackage mvc
 *
 */

/**
 * 
 * @author munbuntu
 * @package wo2009
 * @subpackage mvc
 */
interface ISomeController {

	/**
	 * constructor.
	 * @return ISomeController
	 */
	public function __construct();

	/**
	 * method to call to engage mvc execution.
	 * <p>This methods looks for $view parameter in url and calls corresponding method - if one exists.
	 * If it fails to find method with $view name, it calls display().
	 * </p>
	 */
	 
	public function execute();
	
	/**
	 *  default method that should be overriden in extending class.
	 *  @return void
	 *
	 */
	 
	public function display();
	/**
	 * method to get model of <i>M</i>vc by using its name.
	 * <p>Model is looked from content subfolder method/. it should have name SomeModel . $modelname</p> 
	 *
	 */
	 
	public function getModel($modelname);
	
	/**
	 * method to get view from m<i>V</i>c.
	 * <p>View is looked from content subfolder view/. it should have name SomeView . $viewname</p>
	 *
	 */
	public function getView($viewname);

}