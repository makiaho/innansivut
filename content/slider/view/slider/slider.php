<?php
someloader('some.application.view');

class SomeViewSlider extends SomeView {

	public function display($tmpl='default') {
		$model = $this->getModel();

		parent::display($tmpl);
	}

}