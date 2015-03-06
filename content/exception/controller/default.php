<?php
someloader('some.application.controller');

class SomeControllerDefault extends SomeController {

	public function __construct() {
		parent::__construct();
	}
	
	public function display() {
		//thiw will throw exception SomeFileNotFoundException, as
		// there is no model/default file.
		$model = $this->getModel('default');
		$view = $this->getView('default');
		$view->setModel($model);
		$view->display();
	}
	
   public function foo() {
   	    //this will throw exception SomeClassNotFound as there is file
   	    // view/bar/bar.php, but there is no class SomeViewBar (but SomeViewFoo)
        $model = $this->getModel('foo');
        $view = $this->getView('bar');
        $view->setModel($model);
        $view->display();
    }


}