<?php
someloader('some.application.model');

class SomeModelInfo extends SomeModel {

	public $answer;
	public $guesses;
	
	
	public function __construct(array $options=array()) {
		parent::__construct($options);
		$this->load();
	}
	
	public function getAnswer() {
		return $this->answer;
	}
	
	public function getGuesses() {
		return $this->guesses;
	}
	
	protected function load() {
		$answer = null;
		$guesses = null;
		
		someloader ( 'some.cookie.cookie' );
		$cookies = SomeCookie::getInstance ();
		$c = $cookies->getCookie ( 'numberguess' );
		if ($c) {
			$val = unserialize ( stripslashes ( $c ['value'] ) );
			$this->answer = $val ['answer'];
			$this->guesses = $val ['guesses'];
		
		}
	}
	
	
	
}