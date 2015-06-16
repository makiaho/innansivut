<?php

// koska t�m�n tiedoston nimi on default.php, t�ytyy my�s mallin nimen olla SomeModelDefault.
//   jos tiedoston nimi olisi foo.php, pit�isi malli olla vastaavasti SomeModelFoo

someloader('some.application.model');

class SomeModelFullVersion extends SomeModel {

 # if you do construct'or, it must have exactly one argument, and it must be writen as in ISomeModel
 # constructor is optional, and is omitted here
 #

 public $now = null;
 
 public function prepare() {
	//set time or do nothing. this is just example.
	//$this->now = date('d.mY H:i:s');
 }
 
 public function getNow() {
	return $this->now;
 }

}