<?php
someloader('some.application.view');

class SomeViewQuotes extends SomeView {
	
	public function display($tmpl='quotes') {
		$this->quotes = $this->getModel()->getQuotes()->getQuotes();
		parent::display($tmpl);
	}

}