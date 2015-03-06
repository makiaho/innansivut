<?php
someloader('some.application.controller');

class SomeControllerSlider extends SomeController {

	public function __construct() {
		parent::__construct();
	}
	
	public function display() {
		$model = $this->getModel('slider');
		$view = $this->getView('slider');
		$view->setModel($model);
		$view->display();
	}
	
}