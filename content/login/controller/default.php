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


class SomeControllerDefault extends SomeController {
	
	/**
	 * default flow function.
	 * if no view is set, register form is shown. If the user is not logged in.
	 *
	 */
	
	function display() {
		
		// if the user is logged in, then it is sort of wrong to show register form...
		$user = SomeFactory::getUser();
		$view = SomeRequest::getCmd('view','login');
		$model = $this->getModel('default');
		$view = $this->getView($view);
		$tmpl = SomeRequest::getVar('tmpl','default');
		$view->setModel($model);
		$view->display($tmpl);
		
	}
	
	function login() {

		$model = $this->getModel('default');
		$view = $this->getView('login');
		$tmpl = SomeRequest::getVar('tmpl','default');
		$view->setModel($model);
		if ($model->isSubmit()) {
		    // was it succesfull?
			$user = SomeFactory::getUser();
			if (!$user->getId()) {
				$tmpl = 'default';
			} else {
				$tmpl = 'succesful';
			}
		} else {
			$tmpl = 'default';
		}
		
		$view->display($tmpl);
		//
	}


	function logout() {
		$user = SomeFactory::getUser();
		
		$user = SomeFactory::getUser();
		$user->setId(0);
		$user->setUsername('');
		$user->setUserrole('guest');
		$user->setUsername('');
		$user->setEmail('');
		$user->setHomepage('');
		
		
		# let the code below be as it is. After logout it does redirect to login view.
		
		$app = SomeFactory::getApplication();
		
		$app->redirect('index.php?app=login');
	}

	
}
