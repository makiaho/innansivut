<?php
/**
* @package content
* @subpackage account
*/
someloader('some.application.view');
/**
* @package content
* @subpackage account
*/
class SomeViewRoletest extends SomeView {

	public function display($tmpl=null) {
		parent::display('userlist');
	}

}