<?php
someloader('some.application.view');

class SomeView10askeltarunsauteen extends SomeView {

	public function display($tmpl=null) {
		$model = $this->getModel();
            
		parent::display($tmpl);
	}

}