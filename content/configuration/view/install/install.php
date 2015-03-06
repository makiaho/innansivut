<?php

someloader('some.application.view');

class SomeViewInstall extends SomeView {
	
	
	public function display($tmpl = null) {
		
		if ($tmpl === 'pdomysql') {
			$this->mysql();
		} else if ($tmpl === 'pdopostgres') {
			$this->postgres();
		}
		
	}
	
	protected function mysql() {
		// need info from model.
		
		parent::display('mysql');
	}
	
	protected function postgres() {
		// need info from model.
		
		parent::display('postgres');
	}
	
	
}