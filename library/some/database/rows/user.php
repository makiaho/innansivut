<?php
/**
* SomeRowUser table.
*
* <p>example of possible database table from user:
* CREATE TABLE someuser (
*    id integer NOT NULL,
*    username character varying(32),
*    "password" character(32),
*	 userrole character(32),
*    email text,
*    homepage text
* );
* 
* </p>
* <p>Usage examples for create, read, update and delete:
* <code>
* someloader('some.database.row');
* $userrow = SomeRow::getRow('user');
* //if you know the id, you can read user row from table someuser
* $userrow->id = 1;
* $userrow->read();
* echo $userrow->id;
* echo $userrow->username;
* echo $userrow->password;
* echo $userrow->userrole;
* echo $userrow->email;
* echo $userrow->homepage;
* // if you have userrow columns data, and you want to create new user
* $userrow->id = null;
* $userrow->username = 'jaska78';
* $userrow->password = 'sectretpass';
* $userrow->userrole = 'registered';
* $userrow->email = 'jaska@example.org';
* $userrow->homepage = null;
* $userrow->create();
* //if you want to update, you must set id and call update
* //same than create, but
* $userrow->id = 1;
* $userrow->update();
* //to delete, you just need id and then call delete()
* $userrow->id = 1;
* $userrow->delete;
* </code>
* </p>
* @package wo2009
* @subpackage library
*/

/**
* Template class SomeRow-User.
* 
* <p>example of possible database table for user:
* CREATE TABLE wo2009_someuser (
*    id integer NOT NULL,
*    username character varying(32),
*    "password" character(32),
*	 userrole character(32),
*    email text,
*    homepage text
* );
* 
* </p>
* <p>Usage examples for create, read, update and delete:
* <code>
* someloader('some.database.row');
* $userrow = SomeRow::getRow('user');
* //if you know the id, you can read user row from table someuser
* $userrow->id = 1;
* $userrow->read();
* echo $userrow->id;
* echo $userrow->username;
* echo $userrow->password;
* echo $userrow->userrole;
* echo $userrow->email;
* echo $userrow->homepage;
* // if you have userrow columns data, and you want to create new user
* $userrow->id = null;
* $userrow->username = 'jaska78';
* $userrow->password = 'sectretpass';
* $userrow->userrole = 'registered';
* $userrow->email = 'jaska@example.org';
* $userrow->homepage = null;
* $userrow->create();
* //if you want to update, you must set id and call update
* //same than create, but
* $userrow->id = 1;
* $userrow->update();
* //to delete, you just need id and then call delete()
* $userrow->id = 1;
* $userrow->delete;
* </code>
* </p>
*
* @package wo2009
* @subpackage library
*/
class SomeRowUser extends SomeRow {
	
	public $table = 'someuser'; //change name if you use some other table name
	public $primary = 'id'; //change primary key column, if you use something else
	public $columns = array(
	   'id',
	   'username',
	   'password',
	   'userrole',
	   'email',
            'firstname',
            'lastname',
            'streetaddress',
            'zipcode',
            'city',
            'country',
            'phonenumber',
            'dateofbirth',
       	   'homepage'
	);
	
	public $id       = null;
	public $username = null;
	public $password = null;
	public $userrole = 'guest';
	public $email    = null;
	public $homepage = null;
        
            public $firstname  = null;
            public $lastname  = null;
            public $streetaddress  = null;
            public $zipcode  = null;
            public $city  = null;
            public $country  = null;
            public $phonenumber  = null;
            public $dateofbirth  = null;
        
        
     
        
	
	public function __construct() {
		parent::__construct();
	}
	
	public function getColumns() {
		return $this->columns;
	}
	
	public function getTable() {
		return $this->table;
	}
	
	public function getPrimary() {
		return $this->primary;
	}
	
	public function check() {
		return true;
	}
	
}