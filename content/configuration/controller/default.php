<?php

class SomeControllerDefault extends SomeController {
	
	/**
	 * default flow function
	 *
	 */
	
	function display() {
		$view = SomeRequest::getCmd('view','default');
		$model = $this->getModel('edit');
	    
	    $view = $this->getView('default');
	    $view->setModel($model);
        $view->display();
	}
	
	function edit() {
		$view = SomeRequest::getCmd('view','default');
		$model = $this->getModel($view);
	    
	    $view = $this->getView('default');
	    $view->setModel($model);
        $view->display();
	}
	
	function tables() {
		$view = SomeRequest::getCmd('view','edit');
		$model = $this->getModel($view);
	    
	    $view = $this->getView($view);
	    $view->setModel($model);
        $view->display();
	}
	
}
