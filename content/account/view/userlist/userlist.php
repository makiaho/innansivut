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
class SomeViewUserlist extends SomeView {
    
    //protected $kayttajalista;

	public function display($tmpl=null) {
		$model = $this->getModel('userlist');
                
                $this->kayttajalista=$model->getUsers();
           
                
 
                
		//must call parent display with $tmpl
		parent::display($tmpl);
	}

}