<?php
someloader('some.application.model');

class SomeModelExample extends SomeModel {

	protected $data;
	
	public function __construct(array $options=array()) {
		parent::__construct($options);
		$this->load();
	}
	
	protected  function load() {
		$example = SomeRequest::getCmd('example');
		#echo PATH_CONTENT . DS . 'examples' . DS . $example . ".php";
		ob_start();
		include PATH_CONTENT . DS . 'examples' . DS . $example . ".php";
		$data = ob_get_clean();
		$this->data = $data;
	}
	
	public function getData() {
		return $this->data;
	}

}