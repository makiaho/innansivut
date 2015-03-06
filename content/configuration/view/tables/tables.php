<?php

someloader('some.application.view');

class SomeViewTables extends SomeView {
	
	public function display($tpl='default') {
		$model = $this->getModel();
		$this->errors = $model->getErrors();
		parent::display($tpl);
	}
	
} 
