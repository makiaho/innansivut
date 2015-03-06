<?php
someloader('some.application.view');

class SomeViewFoo extends SomeView {

	public function display($tmpl=null) {
		
		parent::display($tmpl);
	}

}