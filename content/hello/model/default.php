<?php
someloader('some.application.model');

class SomeModelDefault extends SomeModel {

	public function __construct(array $options=array()) {
		parent::__construct($options);
	}
	
	public function getHello() {
		return "Hello";
	}
	
	public function getDate() {
		return date('d.m.Y',time());
	}

}