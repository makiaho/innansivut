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
class SomeViewRegister extends SomeView {

	public function display($tmpl=null) {
		$model = $this->getModel();
		#
		# set values here to this, example $this->date = date('d.m.Y H:i:s');
		#
		$this->date = date('d.m.Y H:i:s');
		$this->userdata = $model->getUserdata();
		$this->errors = $model->getErrors();
		//for the form, unset those values that have no errors. We will not put those to form again.
		/*TODO miksei oikeita arvoja jätetä? foreach ($this->errors as $k => $estr) {
		    if (isset($this->userdata[$k])) {
		        unset($this->userdata[$k]);
		    } 
		} */
		
		//must call parent display with $tmpl
		parent::display($tmpl);
	}

}
