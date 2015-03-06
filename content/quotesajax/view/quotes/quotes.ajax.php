<?php
someloader('some.application.view');

class SomeViewQuotes extends SomeView {
	
	public function display($tmpl='quotes.ajax') {
		$this->quotes = $this->getModel()->getQuotes()->getQuotes();
		parent::display($tmpl);
	}
	
	public function quotes($tmpl='') {
		$quotes = $this->getModel()->getQuotes()->getQuotes();
		echo json_encode(array("errors" => 0, "payload" => $quotes));
	}

}