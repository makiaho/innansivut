<?php
someloader('some.application.controller');

class SomeControllerTinymce extends SomeController {

	public function __construct() {
		parent::__construct();
	}
	
	public function display() {
		$view = $this->getView('editor');
		$view->display();
	}
	
	public function save() {
		// would save the posted html
		// must ensure that html is cleaned but safe html tags are passed through.
		$safehtml = SomeRequest::getString("content","","post",JREQUEST_ALLOWHTML);
		echo "<pre>";
		echo htmlentities($safehtml);		
		echo "</pre>";
		$view = $this->getView('editor');
		$view->display();
	}
	
}