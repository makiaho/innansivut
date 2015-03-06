<?php
someloader('some.application.controller');

class SomeControllerDefault extends SomeController {


	public function display() {
		//the form to selecte rss feeds
		$model = $this->getModel('rss');
		$view  = $this->getView('default');
		$view->setModel($model);
		$model->form();
		$view->display('form');
	}
	
	public function feed() {
		$model = $this->getModel('rss');
		$view  = $this->getView('default');
		$view->setModel($model);
		$model->feed();
		$view->display('feed');
	}

}