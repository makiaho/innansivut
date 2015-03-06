<?php
someloader('some.application.view');

class SomeViewEditor extends SomeView {

	public function display($tmpl='editor') {
		parent::display($tmpl);
	}

}