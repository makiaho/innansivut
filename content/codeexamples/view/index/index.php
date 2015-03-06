<?php
someloader('some.application.view');

class SomeViewIndex extends SomeView {

	public function display($tmpl=null) {
		parent::display('index');
	}

}