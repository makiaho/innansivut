<?php

//Tehdään kolme näkymää: oikeudettomat, oikeudet miniversioon ja oikeudet täyteen versioonn
// Controlleri voi olla minkä tahansa niminen, 
// 
//   siis tässä default.php tiedostossa ei tarvitse olla SomeControllerDefault niminen luokka
//
// controllerin täytyy kuitenkin aina periytyä SomeController luokasta, ja toteuttaa vähintää display() metodi.

//koska tässä example sovelmassa on kaksi eri näkymää oletusnäkymän lisäksi, system ja date näkymät, niille on tehty omat metodit
// sovelmassa on siis kolme näkymää, default, system ja date - ja kaksi mallia default ja system

someloader('some.application.controller');

class SomeControllerManifest extends SomeController {

    
     public function display() {
        
         //Tarkastetaan tässä, onko oikeuksia manifestointipiiriin.
         
         //Jos käyttäjä ei ole kirjautunut, niin -> näytetään tilaussivu
         //Jos rekisteröitynyt, niin kysytään käyttäjältä, onko oikeutta. Parametrina tuote=manifestointipiiri
         //TODO: lisää vielä tämän päivän päivämäärä (onko TÄNÄÄN oikeutta)
         
         
	$user = SomeFactory::getUser();
        if ($user->hasRights('manifestointipiiri')) {
        
            $this->fullVersion();
            
        } else
        {
            
            $this->noRights();
        }
        
     }
    
    
  //Perustilaussivu
  public function noRights() {
    // getModel(default) olettaa, että on olemassa tiedosto model/NoRights.php 
	//   ja siellä luokka SomeModelNoRights joka perii luokan SomeModel
    $model = $this->getModel('noRights');
	// mallin metodeita voidaan kutsua tässä. 
	//  Yksi muista vaihtoehdoista on, että malli rakentimessaan tekee toimintonsa. Ohjelmoija valitsee miten tämän hoitaa
	$model->prepare();
	// tämä olettaa, että on olemassa tiedosto view/noRights/noRights.php jossa luokka SomeViewNoRights joka perii luokan SomeView
	$view = $this->getView('noRights');
	//asetetaan malli näkymälle, jotta se on sen display() metodissa haettavissa.
	$view->setModel($model);
	//ilman parametriä, tmpl on default, siis oletetaan että on olemassa tiedosto
	//  view/default/tmpl/default.php
	$view->display('NoRights');
  }
  

  public function fullVersion() {
    // getModel(default) olettaa, että on olemassa tiedosto model/NoRights.php 
	//   ja siellä luokka SomeModelNoRights joka perii luokan SomeModel
    $model = $this->getModel('fullVersion');
	// mallin metodeita voidaan kutsua tässä. 
	//  Yksi muista vaihtoehdoista on, että malli rakentimessaan tekee toimintonsa. Ohjelmoija valitsee miten tämän hoitaa
	$model->prepare();
	// tämä olettaa, että on olemassa tiedosto view/noRights/noRights.php jossa luokka SomeViewNoRights joka perii luokan SomeView
	$view = $this->getView('fullVersion');
	//asetetaan malli näkymälle, jotta se on sen display() metodissa haettavissa.
	$view->setModel($model);
	//ilman parametriä, tmpl on default, siis oletetaan että on olemassa tiedosto
	//  view/default/tmpl/default.php
	$view->display('fullVersion');
  }
  
   //metodi jota kutsutaan, jos url parametrin view arvona on system, siis http://...?view=system
   //url parametrissä on olemassa myäs muuttuja type=long tai type=short, joka kertoo mallille, 
   // kumpi system data halutaan näyttää
   // short data tarkoittaa vain ip osoittetta, jossa palvelin on. long data tarkoittaa koko phpinfo() funtion tulostetta.
  public function limitedVersion() {
	//halutaan käyttää system mallia, ja samalla url parametri view=system
	//myähemmin käytetäänkin system näkymää, siis view/system/system.php
	$view = SomeRequest::getVar('view','default');
	// getModel(system) olettaa, että on olemassa tiedosto model/system.php 
	//   ja siellä luokka SomeModelSystem joka perii luokan SomeModel
    $model = $this->getModel($view );
	// mallin metodeita voidaan kutsua tässä. 
	//  Yksi muista vaihtoehdoista on, että malli rakentimessaan tekee toimintonsa. Ohjelmoija valitsee miten tämän hoitaa
	// paluuarvona tulee seuraavan datan muoto, siis 'short' tai 'long'
	$datatype = $model->prepareSystem();
	// tämä olettaa, että on olemassa tiedosto view/system/system.php jossa luokka SomeViewSystem joka perii luokan SomeView
	$view = $this->getView('system');
	//asetetaan malli näkymälle, jotta se on sen display() metodissa haettavissa.
	$view->setModel($model);
	//ilman parametriä, tmpl on default, siis oletetaan että on olemassa tiedosto
	//  view/default/tmpl/default.php
	// koska tässä asetetaan templateksi joko short tai long, täytyy olla olemassa tiedostot
	//   view/system/tmpl/short.php
	//   view/system/tmpl/long.php
	if ($datatype == 'long') {
		//etsi template example/view/system/tmpl/long.php
		$view->display('long');
	} else if ($datatype == 'short') {
    	//etsi template example/view/system/tmpl/short.php
		$view->display('short');
	} else {
		//show short data as default
		//etsi template example/view/system/tmpl/short.php
		$view->display('short');
	}
  }

}
