<?php
/**
* @package wo2009
* @subpackage library
*/


/**
* Example usage.
* <code>
* You can get SomeUser object instance using SomeFactory:
* 
* $user = SomeFactory::getUser();
* 
* Creating new user
* 
* When you get id, username, password, email and homepage from SomeRequest, and have validated those, you can set them to $user:
* $user->setId(null);
* $user->setPassword($password);
* $user->setUsername($username);
* $user->setEmail($email);
* $user->setHomepage($homepage);
* //if you need to set userrole, and when user registers you must, then you set userrole
* $user->setUserrole('registered');
* //before user has been logged in, userrole is 'guest'.
* $userrole = $user->getUserrole(); //is 'guest' unless registered and logged in.
* $user->create();
* if ($user->getId() > 0) { echo 'user created with id:'.$user->getId(); }
* 
* Reading user from database
* 
* $user = SomeFactory::getUser();
* //to get $id, you may need to select id from someuser where username=X and password=Y
* // X and Y comes from login form.
* $user->setId($id);
* $user->read();
* 
* Updating user
* 
* $user = SomeFactory::getUser();
* 
* $user->setPassword($password);
* $user->setUsername($username);
* $user->setEmail($email);
* $user->setHomepage($homepage);
* //if you need, set userrole to something else, $user->setUserrole('admin');
* $user->update();
* 
* Delete user
* 
* $user = SomeFactory::getUser();
* $user->setId($id);
* $user->delete();
* </code>
* @package wo2009
* @subpackage library
*/
interface ISomeUser {



	public function __construct();
	
	public function setId($id);
	public function setUsername($username);
	public function setPassword($pw);
	public function setUserrole($ur);
	public function setEmail($email);
	public function setHomepage($hp);
        
        public function setFirstName($fn);
        public function setLastName($ln);
        public function setStreetAddress($sa);
        public function setZipCode($zc);
        public function setCity($c);
        public function setCountry($c);
        public function setPhoneNumber($ph);
        public function setDateOfBirth($d);
        
	public function getId();
	public function getUsername();
	public function getPassword();
	public function getUserrole();
	public function getEmail();
	public function getHomepage();
	
        public function getFirstName();
        public function getLastName();
        public function getStreetAddress();
        public function getZipCode();
        public function getCity();
        public function getCountry();
        public function getPhoneNumber();
        public function getDateOfBirth();
        
	public function read();
	
	public function create();
	
	public function update();
	
	public function delete();

}