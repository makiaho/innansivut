<?php
/**
* @package content
* @subpackage user
*/
someloader('some.application.model');

/**
* @package content
* @subpackage user
*/

class SomeModelDefault extends SomeModel {

    protected $userdata = array();
    protected $errors = array();

	public function __construct(array $options=array()) {
		parent::__construct($options);
		if ($this->isSubmit()) {
		    $this->login();
		}
	}
	
	public function isSubmit() {
	    $username = SomeRequest::getVar('username',null);
	    return $username;
	}
	
	public function login() {
		$username = SomeRequest::getVar('username',null);
	    $password = SomeRequest::getVar('password',null);
	    $sql = "SELECT * FROM someuser WHERE username=? and password=?";
	    $database = SomeFactory::getDBO();
	    $stmt = $database->prepare($sql);
	    $ok = $stmt->execute(
	        array($username,$password)
	    );
	    if ($ok) {
	        $row = $stmt->fetch();
	        if ($row['id']) {
	            //
	            $this->userdata = $row;
	            $user = SomeFactory::getUser();
   	            $user->setId($row['id']);
	            $user->setUsername(trim($row['username']));
	            $user->setUserrole(trim($row['userrole']));
	            $user->setEmail(trim($row['email']));
	            $user->setHomepage(trim($row['homepage']));
	            return true;
	        } else {
	            $this->errors['notfound'] = "user $username not found from database. Check username and password";
	        }
	    }
	    return false;
	}
	
	public function getUserdata() {
	    return $this->userdata;
	}

	public function getErrors() {
	    return $this->errors;
	}

	
	#
	# maybe methods like isLoggedin(), isGuest(), etc...
	#
	# maybe a method getSomeUser that return user from session
	#
	# what ever you need to do to implement default actions.
	#

}
