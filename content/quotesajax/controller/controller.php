<?php
someloader('some.application.controller');

class SomeControllerQuote extends SomeController {

	public function __construct() {
		parent::__construct();
	}
	
	public function display() {
		$this->quotes();
	}
	
	public function create() {
		if (!SomeAuth::_(SomeFactory::getUser(),'quotes.edit')) {
			SomeFactory::getApplication()->redirect("index.php?app=login","You have no permission to create <a href='index.php?app=quotes'>quote</a>");
		}
		
		$issubmit = SomeRequest::getInt('issubmit',0);
		if ($issubmit) {
			$model = $this->getModel('quote');
			// @TODO error handling
			$model->save();
			$view = $this->getView('quote');
			$view->setModel($model);
			//show new quote
			$view->read();
		} else {
			$model = $this->getModel('quote');
			$view = $this->getView('quote');
			$view->setModel($model);
			// show form
			$view->create();
		}
	}
	
	public function update() {
		if (!SomeAuth::_(SomeFactory::getUser(),'quotes.edit')) {
			SomeFactory::getApplication()->redirect("index.php?app=login","You have no permission to edit <a href='index.php?app=quotes'>quote</a>");
		}
		$issubmit = SomeRequest::getInt('issubmit',0);
		if ($issubmit) {
			$model = $this->getModel('quote');
			// @TODO error handling
			$model->save();
			$view = $this->getView('quote');
			$view->setModel($model);
			//show new quote
			$view->read();
		} else {
			$model = $this->getModel('quote');
			$view = $this->getView('quote');
			$view->setModel($model);
			// show form
			$view->update();
		}
	}
	
	public function read() {
		$model = $this->getModel('quote');
		// @TODO error handling
		$view = $this->getView('quote');
		$view->setModel($model);
		//show new quote
		$view->read();
	}
	
	public function delete() {
		if (!SomeAuth::_(SomeFactory::getUser(),'quotes.delete')) {
			SomeFactory::getApplication()->redirect("index.php?app=login","You have no permission to delete <a href='index.php?app=quotes'>quote</a>");
		}
		$model = $this->getModel('quote');
		$model->delete();
		$this->quotes();
	}
	
	public function quotes() {
		if (!SomeAuth::_(SomeFactory::getUser(),'quotes.list')) {
			SomeFactory::getApplication()->redirect("index.php?app=login","You have no permission to list <a href='index.php?app=quotes'>quotes</a>");
		}
		$model = $this->getModel('quotes');
		$view = $this->getView('quotes');
		$view->setModel($model);
		$view->display();
	}
}