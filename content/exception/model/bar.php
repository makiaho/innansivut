<?php
someloader('some.application.model');

class SomeModelBar extends SomeModel {

	public function __construct(array $options=array()) {
		parent::__construct($options);
	}

}