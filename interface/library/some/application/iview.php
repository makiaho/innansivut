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
 * @package wo2009
 * @subpackage mvc
 *
 */

interface ISomeView {
    /**
     * constructor.
     * @param array $options
     * @return ISomeView
     */
	public function __construct(array $options = array());
	/**
	 * method to start rendering xhtml.
	 * @param string $tmpl template name. default to default
	 * @return void
	 */

	public function display($tmpl='default');
	/**
	 * set model to view
	 * @param ISomeModel $model instance of model
	 */
	public function setModel(ISomeModel $model);
	/**
	 * method to get model attached to view.
	 * @return ISomeModel
	 */
	public function getModel();

}