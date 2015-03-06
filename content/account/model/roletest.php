<?php
/**
* @package content
* @subpackage account
*/
someloader('some.application.model');

/**
* @package content
* @subpackage account
*/

class SomeModelRoletest extends SomeModel {

    protected $users = array();
    protected $errors   = array();
    

	public function __construct(array $options=array()) {
		parent::__construct($options);
		$this->changeRole();
		$this->loadAllUsers();
	}
	
	protected function loadAllUsers() {
		$sql = "SELECT * FROM someuser";
		$database = SomeFactory::getDBO();
		$result = $database->query($sql);
		$this->users = $result->fetchAll(PDO::FETCH_ASSOC);
	}
	
	protected function changeRole() {
	    //tässä rooli vaihdetaan - samoin kai sitten voi sen roolin hakea?
		$id = SomeRequest::getInt('id',0);
		if ($id) {
			$ur = SomeRequest::getCmd('newrole');
			$user = new SomeUser();
			$user->setId($id);
			$user->read();
			$user->setUserrole($ur);
			$user->update();
		}
	}
	
	public function getUsers() {
		return $this->users;
	}
	
	
	

}