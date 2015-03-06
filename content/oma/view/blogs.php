<?php

class BlogsView {
	
	protected $model;
	
	public function setModel($data) {
		$this->model = $data;
	}
	public function admin() {
		//
		$this->blogs = $this->model->getBlogs();
		require "tmpl".DS."adminlist.php";
	}
	
	public function render() {
		//
		$this->blogs = $this->model->getBlogs();
		require "tmpl".DS."bloglist.php";
	}

}