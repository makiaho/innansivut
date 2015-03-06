<?php
someloader('some.application.view');

class SomeViewDefault extends SomeView {

	public function display($tmpl=null) {
		$model = $this->getModel();
		$this->hello = $model->getHello();
		parent::display();
	}

}