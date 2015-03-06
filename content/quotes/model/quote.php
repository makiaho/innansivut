<?php
someloader('some.application.model');

class SomeModelQuote extends SomeModel {

	protected $quote;
	
	public function __construct(array $options=array()) {
		parent::__construct($options);
		$id = SomeRequest::getInt('id',null);
		$issubmit = SomeRequest::getInt('issubmit',0);
		$this->quote = new Quote();
		
		if ($id) {
			$this->load($id);
		}
	
		if ($issubmit) {
				$this->quote = new Quote();
				$this->quote->bind(SomeRequest::get('post'));
		}
	}
	
	protected function load($id) {
		$this->quote = new Quote();
		$this->quote->setId($id);
		$this->quote->read();
	}
	
	public function save() {
		// save the quote. Bind it form the post just to be sure that data is up to date.
		$this->quote->bind(SomeRequest::get('post'));
		return $this->quote->insert();
	}
	
	public function delete() {
		return $this->quote->delete();
	}
	
	public function getQuote() {
		return $this->quote;
	}

}