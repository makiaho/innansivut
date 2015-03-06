<?php

class ExampleMenuView {

	protected $model;
	
	public function setModel($data) {
		$this->model = $data;
	}

	public function showMenu() {
		$this->menuitems = $this->model->getMenu();
		include "tmpl/menu.php";
	}

}