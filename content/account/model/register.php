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

class SomeModelRegister extends SomeModel {

    protected $userdata = array();
    protected $errors   = array();
    

	public function __construct(array $options=array()) {
		parent::__construct($options);
	}
	
	public function isSubmit() {
	    $issubmit = SomeRequest::getVar('username',0);
	    return $issubmit;
	}
	
	public function dotask() {
	    //so far it is only register task
	    $valid = $this->validate();
	    if (!$valid) {
	        return false;
	    }
	    //else it is valid, and we can create it
	    return $this->create();
	}
	
	public function validate() {
	    $username  = SomeRequest::getVar('username' , '');
  	    $password  = SomeRequest::getVar('password' , '');
  	    $password2 = SomeRequest::getVar('password2', '');
  	   	$email     = SomeRequest::getVar('email'    , '');
  	   	$homepage  = SomeRequest::getVar('homepage' , '');
  	   	// set errors to this->errors
  	   	// user form input fields name as $this->errors key:
  	   	//  $this->errors['username'] = "Username is not valid because...";
	if (! preg_match('#^[a-z0-9_-]{3,24}$#i',$username) ) {
  	   	    $this->errors['username'] = 'Not a valid Username';
  	   	} else {
  	   	    $this->userdata['username'] = $username;
  	   	}
		
  	   	if (! preg_match('#^.+$#i',$email) ) {
  	   	    $this->errors['email'] = 'Not a valid Email address';
  	   	} else {
  	   	   $this->userdata['email'] = $email;
  	   	}
		
  	   	if (! preg_match('#^.+$#i',$homepage) ) {
  	   	    $this->errors['homepage'] = 'Not a valid Homepage';
  	   	} else {
  	   	   $this->userdata['homepage'] = $homepage;
  	   	}
		
  	   	if (! preg_match('#^.{3,}$#i',$password) ) {
  	   	    $this->errors['password'] = 'Not a valid Password';
  	   	} else {
  	   	   $this->userdata['password'] = $password;
  	   	}
  	   	// if one or more error were added, then we must return boolean false
  	   	return count($this->errors) == 0;
	}
	
	/**
	 * @return true if user is created, false if not.
	 */
	public function create() {
		someloader('some.user.user');
	    $someuser = new SomeUser();
	    $this->userdata = array(
	    	'username'  => SomeRequest::getVar('username' , ''),
  	    	'password'  => SomeRequest::getVar('password' , ''),
  	    	'password' => SomeRequest::getVar('password2', ''),
  	   		'email'     => SomeRequest::getVar('email'    , ''),
  	   		'homepage'  => SomeRequest::getVar('homepage' , '')
	    );
	    
	    $someuser->setUsername($this->userdata['username']);
	    $someuser->setEmail($this->userdata['email']);
	    $someuser->setHomepage($this->userdata['homepage']);
            $username=$this->userdata['username'];
            $passu=$this->userdata['password'];
            $salattupassu=md5($passu.$username.'blaa');
	    $someuser->setPassword($salattupassu);
	    $someuser->setUserrole('registered');
	    $this->userdata['userrole'] = $someuser->getUserrole();
	    
	    $someuser->create();
        if ($someuser->getId() > 0) {
       	    $this->userdata['id'] = $someuser->getId();
            return true;
        } else {
            return false;
        }
	}
	
	public function getUserdata() {
	    return $this->userdata;
	}

	public function getErrors() {
	    return $this->errors;
	}
	

}
