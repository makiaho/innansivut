<?php
someloader('some.application.view');

class SomeViewDate extends SomeView {

	public function display($tmpl=null) {
		$model = $this->getModel();
		$this->date = $model->getDate();
		parent::display();
	}

}