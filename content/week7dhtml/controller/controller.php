<?php
someloader('some.application.controller');

class SomeControllerWeek7dhtml extends SomeController {

	public function __construct() {
		parent::__construct();
	}
	
	public function display() {
		$view = $this->getView('default');
		$view->display();
	}
	
}