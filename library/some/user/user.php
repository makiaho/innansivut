<?php
/**
* @package wo2009
* @subpackage library
*/

SomeLoader::import('library.some.user.iuser', SOME_PATH.DS.'interface',null);

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
* //and finally create
* $user->create();
* if ($user->getId() > 0) { echo "user created succesfully"; } 
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
class SomeUser implements ISomeUser {
        
        const ROLE_ADMIN = "admin";
        const ROLE_REGISTERED ="registered";
        const ROLE_GUEST = "guest";
    
	public $id;
	public $username;
	public $password;
	public $userrole;
	public $email;
	public $homepage;

	public function __construct() {
	
	}
	
	public function setId($id) { $this->id = $id;}
	public function setUsername($username) { $this->username = $username;}
	public function setPassword($pw) { $this->password = $pw;}
	public function setUserrole($ur) { $this->userrole = $ur;}
	public function setEmail($email) { $this->email = $email;}
	public function setHomepage($hp) { $this->homepage = $hp;}
	
	public function getId()    { return $this->id;}
	public function getUsername() { return $this->username;}
	public function getPassword() { return $this->password;}
	public function getUserrole() { return $this->userrole ? $this->userrole : 'guest'; }
	public function getEmail()    { return $this->email;}
	public function getHomepage() { return $this->homepage; }
	

	public function read() {
		//echo "read()<br />";
		//var_dump($this);
		someloader('some.database.row');
		$userrow = SomeRow::getRow('user');
		$userrow->id = $this->id;
		$found = $userrow->read();
		if (!$found) {
			throw new SomeDatabaseException("someuser id {$this->id} not found");
		}
		foreach (get_object_vars($userrow) as $k => $v) {
			$this->$k = $v;
		}
		//var_dump($this,$userrow);
	}
	
	public function create() {
		//echo "create()<br />";
		//var_dump($this);
		someloader('some.database.row');
		$userrow = SomeRow::getRow('user');
		$userrow->id = $this->id;
		$userrow->username = $this->username;
		$userrow->password = $this->password;
		$userrow->userrole = $this->userrole;
		$userrow->email = $this->email;
		$userrow->homepage = $this->homepage;
		
		$ok =$userrow->create();
		if (!$ok) {
			throw new SomeDatabaseException("someuser could not be created");
		}
		//var_dump($userrow);
		$this->id = $userrow->id;
		return $this->id;
	}
	
	public function update() {
		//echo "update()<br />";
		//var_dump($this);
		someloader('some.database.row');
		$userrow = SomeRow::getRow('user');
		$userrow->id = $this->id;
		$userrow->username = $this->username;
		$userrow->password = $this->password;
		$userrow->userrole = $this->userrole;
		$userrow->email    = $this->email;
		$userrow->homepage = $this->homepage;
		
		$ok = $userrow->update();
		if (!$ok) {
			throw new SomeDatabaseException("someuser could not be updated");
		}
		//var_dump($userrow);
	}
	
	public function delete() {
		//echo "delete()<br />";
		//var_dump($this);
		someloader('some.database.row');
		$userrow = SomeRow::getRow('user');
		$userrow->id = $this->id;

		$userrow->delete();
		//var_dump($userrow);
	}

}