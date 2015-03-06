<?php

someloader('some.application.view');

class SomeViewEdit extends SomeView {
	
	public function display($tpl='default') {
		$model = $this->getModel();
		$this->carray = $model->getConfarray();
		parent::display($tpl);
	}
	
} 
