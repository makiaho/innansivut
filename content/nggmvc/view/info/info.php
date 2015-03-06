<?php
someloader('some.application.view');

class SomeViewInfo extends SomeView {

	public function display($tmpl=null) {
		$model = $this->getModel();
		$this->guesses    = $model->getGuesses();
		parent::display('info');
	}
	
	

}