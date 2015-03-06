<?php
someloader('some.application.model');

class SomeModelQuotes extends SomeModel {

	protected $quotes;

	public function __construct(array $options=array()) {
		parent::__construct($options);
		$this->load();
	}
	
	protected function load() {
		$this->quotes = new Quotes();
	}
	
	public function getQuotes() {
		return $this->quotes;
	}

}