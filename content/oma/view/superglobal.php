<?php


class ExampleShowView {

	protected $model;
	
	public function setModel($data) {
		$this->model = $data;
	}
	
	public function show($template) {
		$this->data = $this->model->getData();
		
		require "tmpl/$template.php";
	}

}