<?php
someloader('some.application.controller');

class SomeControllerDhtmlexamples extends SomeController {

	public function __construct() {
		parent::__construct();
	}
	
	public function display() {
		$example = SomeRequest::getCmd('example');
		if (!empty($example)) {
			// SomeRequest::setVar('view','examples');
			$this->examples();
		}
		$model = $this->getModel('index');
		$view = $this->getView('index');
		$view->setModel($model);
		$view->display();
	}
	
	public function horizontalmenu() {
		$model = $this->getModel('index');
		$view = $this->getView('examples');
		$view->setModel($model);
		$view->horizontalmenu();
	}
	
	public function ratingplugin() {
		$model = $this->getModel('index');
		$view = $this->getView('examples');
		$view->setModel($model);
		$view->ratingplugin();
	}

	public function tabbar() {
		$model = $this->getModel('index');
		$view = $this->getView('examples');
		$view->setModel($model);
		$view->tabbar();
	}
	
	public function examples() {
		$model = $this->getModel('index');
		$view = $this->getView('examples');
		$view->setModel($model);
		$example = SomeRequest::getCmd('example');
		$view->display($example);
	}
	
}