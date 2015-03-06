<?php

someloader('some.application.view');

class SomeViewDefault extends SomeView {
	
	public function display($tpl='default') {
		$model = $this->getModel(); //$model = $this->_model;
		$this->carray = $model->getConfarray();
		parent::display($tpl);
	}
	
} 
