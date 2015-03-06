<?php



// Controlleri voi olla minkä tahansa niminen, 
//   siis tässä default.php tiedostossa ei tarvitse olla SomeControllerDefault niminen luokka
//
// controllerin täytyy kuitenkin aina periytyä SomeController luokasta, ja toteuttaa vähintää display() metodi.

//koska tässä example sovelmassa on kaksi eri näkymää oletusnäkymän lisäksi, system ja date näkymät, niille on tehty omat metodit
// sovelmassa on siis kolme näkymää, default, system ja date - ja kaksi mallia default ja system

//Omassa on vain yksi näkymä: kyselyview, joten riittää tuo vastaus-metodi ja lisäksi display-metodi, joka korvaa kysely-metodin
//ei tarvi myöskään kuin yksi malli: KysymysMalli.

someloader('some.application.controller');





class OmaController extends SomeController{




  //this will be used when user first time opens the example. this uses default (KysymysMalli) model, default  view (kyselyview)  and default template (mieititään template)
  public function display() {
    // getModel(default) olettaa, että on olemassa tiedosto model/default.php 
	//   ja siellä luokka SomeModelDefault joka perii luokan SomeModel
	
	//muutetaan: SomeModelKysymysMalli -luokka tiedostossa model/KysymysMalli.php
    //$model = $this->getModel('default');
	$model = $this->getModel('KysymysMalli');
	
	
	// mallin metodeita voidaan kutsua tässä. 
	//  Yksi muista vaihtoehdoista on, että malli rakentimessaan tekee toimintonsa. Ohjelmoija valitsee miten tämän hoitaa
	//poistin konstruktorin ja arvotaan kysymykset tässä preparessa.
	$model->prepare();
        $model->talletaOikeaVastaus();
	
	
	// tämä olettaa, että on olemassa tiedosto view/default/default.php jossa luokka SomeViewDefault joka perii luokan SomeView
	//Eli omassani    tiedosto view/kysely/kysely.php jossa luokka SomeViewKysele
	//$view = $this->getView('default');
	$view = $this->getView('kysely');  
	//asetetaan malli näkymälle, jotta se on sen display() metodissa haettavissa.
	$view->setModel($model);
	
	//ilman parametriä, tmpl on default, siis oletetaan että on olemassa tiedosto
	//  view/default/tmpl/default.php
	$view->display();
  }
 
public function vastaus(){
            
     
			//uusi kysymysmalli ja haetaan annettu arvaus syotteesta
			$model = $this->getModel('KysymysMalli');
			$model->prepare();
			$model->arvattu=TRUE;		
            $model->arvaus= (int)$_POST['answer'];    
			
			
			
			

		   //haetaan edellinen oikea vastaus verrattavaksi			
			$temp= $model->haeOikeaVastaus();
			
			//ja talletetaan nykyinen.
            $model->talletaOikeaVastaus();
			
			//ja asetetaan vanha oikea vastaus vertailuun
            $model->OikeaVastaus = $temp;
			
			//luodaan näkymä ja asetetaan mallimme sen näkymäksi
            //$view = new KyselyView(); 
			$view = $this->getView('kysely');  
			
    	    $view->setModel($model); 
                      
            //Naytetaan, mita saatiin aikaan.
            //$view->render();
			$view->display();
			
		
 
            
  
        }
        

       
        
		
	
		
 

};