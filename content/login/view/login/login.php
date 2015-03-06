<?php
/**
* @package content
* @subpackage login
*/
someloader('some.application.view');
/**
* @package content
* @subpackage login
*/
class SomeViewLogin extends SomeView {

	public function display($tmpl=null) {
		$model = $this->getModel();
		#
		# set values here to this, example $this->date = date('d.m.Y H:i:s');
		#
		$this->date = date('d.m.Y H:i:s');
		$this->userdata = $model->getUserdata();
		$this->errors = $model->getErrors();
		//must call parent display with $tmpl
		parent::display($tmpl);
	}

}
