<?php
someloader('some.application.controller');

class SomeControllerHello extends SomeController {

	public function __construct() {
		parent::__construct();
	}
	
	public function display() {
		$model = $this->getModel('default');
		$view = $this->getView('default');
		$view->setModel($model);
		$view->display();
	}
	
	public function showdate() {
		$model = $this->getModel('default');
		$view = $this->getView('date');
		$view->setModel($model);
		$view->display();
	}
}