<?php
someloader('some.application.view');

class SomeViewAjax extends SomeView {

	public function display($tmpl='default') {
		
		parent::display($tmpl);
	}

}