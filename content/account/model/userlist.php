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

class SomeModelUserlist extends SomeModel {

    protected $users = array();
    protected $errors   = array();
    

	public function __construct(array $options=array()) {
		parent::__construct($options);		
		$this->listUsers();
	}
	
	protected function listUsers() {
		

                //Tän saa tehdä vain admin ja kontrolleri pitää huolen, ettei tähän tule muita.
                //eli siirretään tämä roolitus muualle. (later on)
               
             //id (username tms) haetaan sessionista??
            /*$id='pekka';
            $user = new SomeUser;
            $user->SetId($id);
            $user->read();
            $role = $user->GetRole();*/
            
            $role = SomeFactory::GetUser()->getUserrole();
            $id = SomeFactory::GetUser()->getId();
            
            
            
          //JOS rooli on admin, niin annetaan tehdä tämä näin. Muussa tapauksessa
              //    annetaan hakea vain omia tietoja
          
            
            
       if ($role=='admin')
       {        
            
            
                $sql = "SELECT * FROM someuser";
		$database = SomeFactory::getDBO();
		$result = $database->query($sql);
		$this->users = $result->fetchAll(PDO::FETCH_ASSOC);
	} 
        else
        {
                
                $sql = "SELECT * FROM someuser WHERE id = ? ";
                
               
		$database = SomeFactory::getDBO();
                $stmt = $database->prepare($sql); 
                $ok = $stmt->execute(
	        array($id)
                 );
            
            
                if($ok){
                 
                $this->users = $stmt->fetchAll(PDO::FETCH_ASSOC);  
                
                }
                
		/*$result = $database->query($sql);
		$this->users = $result->fetchAll(PDO::FETCH_ASSOC);*/
            
        }
        }
	

	
	public function getUsers() {
		return $this->users;
	}
	
	
	

}