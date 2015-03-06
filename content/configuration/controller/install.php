<?php


someloader('some.application.controller');

ini_set('display_errors',1);
error_reporting(E_ALL);

class SomeControllerInstall extends SomeController {
	
	
	public function display() {
		$this->infoscreen();
	}
	
	public function infoscreen() {
		
		$model = $this->getModel('info');
		$foobar = $this->getModel('install');
		$model->loadConfiguration();
		$view = $this->getView('info');
		$view->setModel($model);
		
		$view->display();
	}
	
	public function install() {
		$infomodel = $this->getModel('info');
		$installmodel = $this->getModel('install');
		if (!$infomodel->getConnected()) {
			// MUST choose driver, or it is autodetected.
			$this->infoscreen();
			return;
		}
		$model = $installmodel->getModel($infomodel->getDriver());
		$model->install(); // two tables, it will know which one.
		$view = $this->getView('install');
		$view->setModel($model);
		$view->display($infomodel->getDriver());
	}
	
}