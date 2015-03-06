<?php
someloader('some.application.controller');

class SomeControllerDefault extends SomeController {

	public function __construct() {
		parent::__construct();
	}
	
	public function display() {
		$model = $this->getModel('default');
		$view = $this->getView('default');
		$view->setModel($model);
		$view->display();
	}

}