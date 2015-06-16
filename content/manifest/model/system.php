<?php

// koska t�m�n tiedoston nimi on default.php, t�ytyy my�s mallin nimen olla SomeModelDefault.
//   jos tiedoston nimi olisi foo.php, pit�isi malli olla vastaavasti SomeModelFoo

someloader('some.application.model');

class SomeModelSystem extends SomeModel {

	public $now = null;

	public function __construct(array $options=array()) {
		parent::__construct($options);
	}

 
 
	 public function prepare() {
		//set time or do nothing. this is just example.
		$this->now = time();
	 }
	 
	 public function prepareSystem() {
		//system data can be short or long
		// jompi kumpi valitaan, getVar metodin toinen argumentti pakottaa palauttamaan short, jos url ei sis�ll� tyyppi� type
		$datatype = SomeRequest::getVar('type','short');
		switch ($datatype) {
		 case 'short': {
			//only ip of server. get it with $_SERVER[''];
			$this->data = $_SERVER['SERVER_ADDR'];
		 } break;
		 case 'long': {
		    ob_start();
			phpinfo();
			$content = ob_get_clean();
			$this->data = $content;
		 }
		}
		return $datatype;
	 }
	 
	 public function getNowTime() {
		return $this->now;
	 }
	 
	 public function getData() {
		return $this->data;
	 }
}
