<?php
someloader('some.application.view');

class SomeViewCrud extends SomeView {
	
	public function display($tmpl=null) {
		parent::display($tmpl);
	}
	
	public function create() {
		$this->row  = $this->getModel()->getRow();
		$this->id   = $this->getModel()->getId();
		parent::display('create');
	}
	
	public function read() {
		$this->row  = $this->getModel()->getRow();
		$this->id   = $this->getModel()->getId();
		parent::display('read');
	}
	
	public function update() {
		$this->row  = $this->getModel()->getRow();
		$this->id   = $this->getModel()->getId();
		parent::display('update');
	}
	
	public function delete() {
		$this->row  = $this->getModel()->getRow();
		$this->id   = $this->getModel()->getId();
		parent::display('delete');
	}

}