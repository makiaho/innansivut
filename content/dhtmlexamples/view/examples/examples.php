<?php
someloader('some.application.view');

class SomeViewExamples extends SomeView {

	public function display($tmpl='index') {
		$model = $this->getModel();
		$this->navi = $model->getNavi();
		parent::display($tmpl);
	}
	
	public function horizontalmenu() {
		$model = $this->getModel();
		$this->navi = $model->getNavi();
		parent::display('horizontalmenu');
	}
	
	public function tabbar() {
		$model = $this->getModel();
		$this->navi = $model->getNavi();
		parent::display('tabbar');
	}
	
	public function ratingplugin() {
		$model = $this->getModel();
		$this->navi = $model->getNavi();
		parent::display('ratingplugin');	
	}

}