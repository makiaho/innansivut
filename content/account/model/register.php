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
	    
  	    $password  = SomeRequest::getVar('password' , '');
  	    $password2 = SomeRequest::getVar('password2', '');
  	    $email     = SomeRequest::getVar('email'    , '');
            $email2     = SomeRequest::getVar('email2'    , '');
  	    $firstname     = SomeRequest::getVar('firstname', '');
            $lastname = SomeRequest::getVar('lastname', '');
            $streetaddress = SomeRequest::getVar('streetaddress', '');
            $zipcode = SomeRequest::getVar('zipcode', '');
            $city = SomeRequest::getVar('city', '');
            $country = SomeRequest::getVar('country', '');
            $phonenumber = SomeRequest::getVar('phonenumber', '');
            $dateofbirth = SomeRequest::getVar('dateofbirth', '');
            
            
  	   	// set errors to this->errors
  	   	// user form input fields name as $this->errors key:
  	   	//  $this->errors['username'] = "Username is not valid because...";
                //TODO tee muutkin tarkistukset
            
		
  	   	if (! preg_match('#^.+$#i',$email) ) {
  	   	    $this->errors['email'] = SomeText::_('SAHKOPOSTIOSOITEVAARAMUOTOINEN');
  	   	} else {
  	   	   $this->userdata['email'] = $email;
  	   	}
		
                if (!($email==$email2)) {
  	   	    $this->errors['email2'] = SomeText::_('SAHKOPOSTIOSOITTEETEITASMAA');
  	   	} ;
  	   	
  	   	
                
		
  	   	if (! preg_match('#^.{3,}$#i',$password) ) {
  	   	    $this->errors['password'] = SomeText::_('SALASANAVAARAMUOTOINEN');
  	   	} else {
  	   	   $this->userdata['password'] = $password;
  	   	}
                
                if (!($password==$password2)) {
  	   	    $this->errors['password2'] = SomeText::_('SALASANATEITASMAA');
  	   	} else {
  	   	   $this->userdata['password2'] = $password2;
  	   	}
                //TODO testi vielä
                
                 $this->userdata['email2'] = $email2;
                $this->userdata['firstname'] = $firstname ;
                $this->userdata['lastname'] = $lastname ;
                $this->userdata['streetaddress'] = $streetaddress ;
                $this->userdata['zipcode'] = $zipcode ;
                $this->userdata['city'] = $city;
                $this->userdata['country'] = $country;
                $this->userdata['phonenumber'] = $phonenumber;
                $this->userdata['dateofbirth'] = $dateofbirth;
                
                
                
                
                
                
  	   	// if one or more errors were added, then we must return boolean false
  	   	return count($this->errors) == 0;
	}
	
	/**
	 * @return true if user is created, false if not.
	 */
	public function create() {
		someloader('some.user.user');
	    $someuser = new SomeUser();
	    $this->userdata = array(
	    	'username'  => SomeRequest::getVar('email' , ''),
  	    	'password'  => SomeRequest::getVar('password' , ''),
                
                'firstname'  => SomeRequest::getVar('firstname' , ''),
                'lastname'  => SomeRequest::getVar('lastname' , ''),
                'streetaddress'  => SomeRequest::getVar('streetaddress' , ''),
                'zipcode'  => SomeRequest::getVar('zipcode' , ''),
                'city'  => SomeRequest::getVar('city' , ''),
                'country'  => SomeRequest::getVar('country' , ''),
                'dateofbirth'  => SomeRequest::getVar('dateofbirth' , ''),
                'phonenumber'  => SomeRequest::getVar('phonenumber' , ''),
                
                
  	    	'password2' => SomeRequest::getVar('password2', '')
                
                //TODODEBUG
                
                
                //tähän sitten loput ?
                
                
                
                
                
                
                
                
                
                
	    );
	    
	    $someuser->setUsername($this->userdata['username']);
            $username=$this->userdata['username'];
            $passu=$this->userdata['password'];
            $salattupassu=md5($passu.$username.'blaa');
	    $someuser->setPassword($salattupassu);
	    $someuser->setUserrole('registered');
	    $this->userdata['userrole'] = $someuser->getUserrole();
	    
            $someuser->setFirstName($this->userdata[firstname]);
            $someuser->setLastName($this->userdata[lastname]);
            $someuser->setStreetAddress($this->userdata[streetaddress]);
            $someuser->setZipCode($this->userdata[zipcode]);
            $someuser->setCity($this->userdata[city]);
            $someuser->setPhoneNumber($this->userdata[phonenumber]);
            $someuser->setCountry($this->userdata[country]);
            $someuser->setDateOfBirth($this->userdata[dateofbirth]);
            
            
            
            
            
            
            
            
            
            
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
