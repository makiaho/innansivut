<?php
someloader('some.application.view');

class SomeViewIndex extends SomeView {

	public function display($tmpl=null) {
		$model = $this->getModel();
		$this->navi = $model->getNavi();
		parent::display('index');
	}

}