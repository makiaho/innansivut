<?php
someloader('some.application.model');

class SomeModelDefault extends SomeModel {

	public function __construct(array $options=array()) {
		parent::__construct($options);
	}

}