<?php

someloader('some.application.model');

class SomeModelEdit extends SomeModel {
	
	protected $conf_categories = array();
	
	public function __construct(array $options = array()) {
		parent::__construct($options);
		$this->prepare();
	}
	
	private function prepare() {
		//this is either edit or save
		$do = SomeRequest::getVar('do','edit');
		$this->$do();
	}
	
	public function getConfarray() {
		return $this->conf_categories;
	}
	
	private function edit() {
		//load configuration.
		$conf = SomeFactory::getConfiguration();
		//get it to arrays, for simpler edit.
		$this->conf_categories = $conf->getAsArray();
		return true;
	}
	
	private function save() {
		$this->edit();
		$conf = SomeFactory::getConfiguration();
		foreach ($this->conf_categories as $catname => $v) {
			foreach ($v as $key => $val) {
				$value_from_post = SomeRequest::getVar("{$catname}___$key",'');
				$conf->set($key,$catname,$value_from_post);
			}
		}
		
		$exportedarray = var_export($conf->getAsArray(), true);
		file_put_contents(SOME_PATH.DS.'configuration.php',"<?php
    defined('SOME_PATH') or die('Unauthorized access');
    \$configuration = $exportedarray;"
);
		$this->edit();
	}
    
}
