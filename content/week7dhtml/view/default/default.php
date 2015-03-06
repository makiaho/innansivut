<?php
someloader('some.application.view');

class SomeViewDefault extends SomeView {

	public function display($tmpl='default') {
		parent::display($tmpl);
	}

}