<?php

class BlogsModel {

	public function __construct() {}

	protected $blogs = array(
		'Blog 1 asdf ',
		'Blog 2 asdf asd'
		
	);
	
	public function getBlogs() {
		// get blogs from database
		return $this->blogs;
	}
	
	

}