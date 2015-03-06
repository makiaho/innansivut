<?php
someloader('some.application.view');

class SomeViewQuote extends SomeView {
	
	public function display($tmpl=null) {
		parent::display($tmpl);
	}
	
	public function create() {
		$this->quote  = $this->getModel()->getQuote();
		$this->errors = $this->getModel()->getErrors();
		ob_start();
		parent::display('form.ajax');
		$payload = ob_get_clean();
		echo json_encode(array(
			'errors' => 0,
			'error' => 0,
			'message' => '',
			'form' => $payload
		));
	}
	
	public function read() {
		$quote  = $this->getModel()->getQuote();
		$errors = $this->getModel()->getErrors();
		
		echo json_encode(array(
			'errors' => 0,
			'error' => 0,
			'message' => '',
			'payload' => $quote
		));
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