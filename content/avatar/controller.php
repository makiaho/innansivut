<?php
/**
* This is controller file.
* @package content
* @subpackage login
*/
someloader('some.application.controller');
/**
* This is controller file.
* @package content
* @subpackage login
*/


class SomeControllerAvatar extends SomeController {
	
	/**
	 * default flow function.
	 * if no view is set, register form is shown. If the user is not logged in.
	 *
	 */
	
	function display() {
		
		$this->upload();
		
	}
	
	function upload() {
		$issubmit = SomeRequest::getInt('issubmit');
		$model = $this->getModel('avatar');
		if ($issubmit) {
			$model->createAvatar();
			$view = $this->getView('avatar');
			$view->setModel($model);
			$view->show();
		} else {
			$view = $this->getView('avatar');
			$view->setModel($model);
			$view->form();		
		}
		
	}




	
}