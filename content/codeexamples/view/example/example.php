<?php
someloader('some.application.view');

class SomeViewExample extends SomeView {

	public function display($tmpl=null) {
		parent::display('example');
	}

}