<?php

class Quotes{

	protected $quotes;
	
	public function __construct() {
		$this->load();
	}
	
	protected function load() {
		$sql = "SELECT * FROM quotes ORDER BY bywhom";
		$database = SomeFactory::getDBO();
		$result = $database->query($sql);
		$this->quotes = $result->fetchAll(PDO::FETCH_CLASS, "Quote");
	}
	
	public function getQuotes() {
		return $this->quotes;
	}

}