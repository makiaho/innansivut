<?php
/**
* @package content
* @subpackage avatar
*/
someloader('some.application.view');
/**
* @package content
* @subpackage login
*/
class SomeViewAvatar extends SomeView {

	public function display($tmpl=null) {
		
		parent::display($tmpl);
	}
	
	public function form($tmpl='form') {
		$model = $this->getModel();
		$this->fieldname = $model->getFieldname();
		parent::display($tmpl);
	}
	
	public function show($tmpl='show') {
		$model = $this->getModel();
		
		$this->avatardata = $model->getAvatarData();
		$this->avatarhref = $this->avatardata['href'];
		$this->avatarhrefthumb = $this->avatardata['hrefthumb'];
		$this->fieldname = $model->getFieldname();
		parent::display($tmpl);
	}
	
	

}
