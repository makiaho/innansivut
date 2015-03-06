<?php
someloader('some.application.controller');

class SomeControllerCE extends SomeController {

	public function __construct() {
		parent::__construct();
	}
	
	public function display() {
		$model = $this->getModel('index');
		$view = $this->getView('index');
		$view->setModel($model);
		$view->display();
		
	}
	
	public function example() {
		$model = $this->getModel('example');
		$view = $this->getView('example');
		$view->setModel($model);
		$view->display();
	}
}