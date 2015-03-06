<?php
someloader('some.application.view');

class SomeViewQuote extends SomeView {
	
	public function display($tmpl=null) {
		parent::display($tmpl);
	}
	
	public function create() {
		$this->quote  = $this->getModel()->getQuote();
		$this->errors = $this->getModel()->getErrors();
		parent::display('form');
	}
	
	public function read() {
		$this->quote  = $this->getModel()->getQuote();
		$this->errors = $this->getModel()->getErrors();
		parent::display('quote');
	}
	
	public function update() {
		$this->quote  = $this->getModel()->getQuote();
		$this->errors = $this->getModel()->getErrors();
		parent::display('form');
	}
	
	public function deleted() {
		$this->quote  = $this->getModel()->getQuote();
		$this->errors = $this->getModel()->getErrors();
		parent::display('deleted');
	}

}