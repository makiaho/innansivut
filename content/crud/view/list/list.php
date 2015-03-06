<?php
someloader('some.application.view');

class SomeViewList extends SomeView {
	
	public function thelist() {
		$this->rows = $this->getModel()->getRows();
		parent::display('list');
	}

}