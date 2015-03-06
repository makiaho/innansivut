<?php


// koska t�m�n tiedoston nimi on default.php, t�ytyy my�s mallin nimen olla SomeModelDefault.
//   jos tiedoston nimi olisi foo.php, pit�isi malli olla vastaavasti SomeModelFoo

// -> Koska tiedoston nimi on kysymysmalli.php -> luokka on SomeModelKysymysMalli
someloader('some.application.model');

/*@var $model KysymysMalli*/
class SomeModelKysymysMalli extends SomeModel {

        
		
 # if you do construct'or, it must have exactly one argument, and it must be writen as in ISomeModel
 # constructor is optional, and is omitted here
 #
		
		
		
	    public  $arvattu=FALSE;  
        public  $arvaus;
        public $oikeaVastaus;
		
		
		# if you do construct'or, it must have exactly one argument, and it must be writen as in ISomeModel
 # constructor is optional, and is omitted here
 #ok, poistetaan konstruktori ja laitetaan prepare-metodiin ne, mitä siinä piti tehdä.
 
 
		
        public function prepare(){
            
         
            
          
            $rand1= rand(0,9);
            $rand2= rand(0,9);
            $this->oikeaVastaus=$rand1*$rand2;
            $this->kysymys=$rand1.' X '.$rand2.' ?';
			
            

            
            
               
        }
     

	
        public function talletaOikeaVastaus()  
        {

			$mySession = SomeFactory::getSession();
            $mySession->set("vastaus",$this->oikeaVastaus);
            
        }
        public function haeOikeaVastaus() //session
        {
            
			 $mySession = SomeFactory::getSession();
             $this->oikeavastaus = $mySession->get("vastaus");
        
        }


        public function annaKysymys() {
		 
            return $this->kysymys;
           
	}
        
	
        public function vastausOikein($arvaus){
         
            echo "debug: arvaus: ".$arvaus."</BR>";
            echo "debug: oikea vastaus: ".$this->oikeavastaus."</BR>";
            return ($arvaus == $this->oikeavastaus);
            
            
        }
	
	

}