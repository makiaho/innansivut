<?php
/**
* @package content
* @subpackage account
*/
someloader('some.application.view');
/**
* @package content
* @subpackage account
*/
class SomeViewTest extends SomeView {

	public function display($tmpl=null) {
		$model = $this->getModel();
		#
		# set values here to this, example $this->date = date('d.m.Y H:i:s');
		#
		$this->date = date('d.m.Y H:i:s');
		$this->result = $model->getResult();
		//must call parent display with $tmpl
		parent::display($tmpl);
	}

}