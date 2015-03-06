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

class SomeModelTest extends SomeModel {

	public $results;

	public function __construct(array $options=array()) {
		parent::__construct($options);
	}
	
	public function prepare() {
		//if run test, run test
		$runtest = SomeRequest::getVar('runtest',0);
		if ($runtest) {
			$this->runtest();
		}
	}
	
	public function runtest() {
		//create someuser just to test, so do not get from factory
		//create
		$someuser = new SomeUser();
		$someuser->setPassword('cleartext');
		$someuser->setUsername('testuser');
		$someuser->setEmail('registered@example.org');
		$someuser->setHomepage('http://www.example.org/');
		$someuser->setUserrole('registered');
		$someuser->create();
		//need to have users id
		$this->results[] = "created user, expecting posivite integer as userid. value is:". $someuser->getId();
		//read
		$someuser2 = new SomeUser();
		$someuser2->setId($someuser->getId());
		$someuser2->read();
		$this->results[] = "read user, expecting username to be testuser. value is:". $someuser2->getUsername();
		//update
		$someuser2->setEmail('updated@example.org');
		$someuser2->setUserrole('admin');
		$someuser2->update();
		$someuser2->read();
		$this->results[] = "updated user, expecting userrole to be admin. value is:". $someuser2->getUserrole();
		//delete
		$someuser3 = new SomeUser();
		$someuser3->setPassword('cleartext2');
		$someuser3->setUsername('testuser2');
		$someuser3->setEmail('registered2@example.org');
		$someuser3->setHomepage('http://www2.example.com/');
		$someuser3->create();
		$this->results[] = "created another user, expecting users id to be positive integer. value is:". $someuser3->getId();
		//delete previous user
		$someuser4 = new SomeUser();
		$someuser4->setPassword('cleartext3');
		$someuser4->setUsername('testuser3');
		$someuser4->setEmail('registered3@example.org');
		$someuser4->setHomepage('http://www3.example.org/');
		$someuser4->setUserrole('anonymous');
		$someuser4->create();
		$someuser4->delete();
		//expecting that user4 can not be read...
		$someuser5 = new SomeUser();
		$someuser5->setId( $someuser4->getId() );
		$didexception = false;
		try {
		  $someuser5->read();
		} catch (SomeDatabaseException $sde) {
            $didexception = true;
			$this->results[] = "read deleted user, expecting username to be empty. value is:". $someuser5->getUsername();			
		}
		if (!$didexception) {
			$this->results[] = "read deleted user, expecting username to be empty. But value is:". $someuser5->getUsername();
		}

		unset($someuser);
		$someuser2->delete();
		$someuser3->delete();
		unset($someuser4);
		unset($someuser5);
	}
	
	public function getResult() {
		return $this->results;
	}
	
}