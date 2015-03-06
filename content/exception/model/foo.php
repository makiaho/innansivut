<?php
someloader('some.application.model');

class SomeModelFoo extends SomeModel {

	public function __construct(array $options=array()) {
		parent::__construct($options);
	}

}