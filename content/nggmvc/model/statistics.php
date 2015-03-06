<?php
someloader('some.application.model');

class SomeModelStatistics extends SomeModel {

	public $games;
	
	public function __construct(array $options=array()) {
		parent::__construct($options);
		$this->load();
	}
	
	public function getGames() {
		return $this->games;
	}
	
	protected function load() {
		$session = SomeFactory::getSession ();
		$this->games = $session->get ( 'games', array () );
	}
	
	
	
}