<?php

// Controlleri voi olla minkä tahansa niminen, 
//   siis tässä default.php tiedostossa ei tarvitse olla SomeControllerDefault niminen luokka
//
// controllerin täytyy kuitenkin aina periytyä SomeController luokasta, ja toteuttaa vähintää display() metodi.

//koska tässä example sovelmassa on kaksi eri näkymää oletusnäkymän lisäksi, system ja date näkymät, niille on tehty omat metodit
// sovelmassa on siis kolme näkymää, default, system ja date - ja kaksi mallia default ja system

someloader('some.application.controller');

class SomeControllerExample extends SomeController {

  //this will be used when user first time opens the example. this uses default model, default view and default template
  public function display() {
    // getModel(default) olettaa, että on olemassa tiedosto model/default.php 
	//   ja siellä luokka SomeModelDefault joka perii luokan SomeModel
    $model = $this->getModel('default');
	// mallin metodeita voidaan kutsua tässä. 
	//  Yksi muista vaihtoehdoista on, että malli rakentimessaan tekee toimintonsa. Ohjelmoija valitsee miten tämän hoitaa
	$model->prepare();
	// tämä olettaa, että on olemassa tiedosto view/default/default.php jossa luokka SomeViewDefault joka perii luokan SomeView
	$view = $this->getView('default');
	//asetetaan malli näkymälle, jotta se on sen display() metodissa haettavissa.
	$view->setModel($model);
	//ilman parametriä, tmpl on default, siis oletetaan että on olemassa tiedosto
	//  view/default/tmpl/default.php
	$view->display();
  }
  
  //metodi jota kutsutaan, jos url parametrin view arvona on date, siis http://...?view=date
  public function date() {
	//koska halutaan luoda system niminen malli ja date niminen näkymä, 
	//  voidaan hakea view parametrin arvo ja käyttää sitä argumenttina view oliota luodessa.
	// jos jostain syystä view parametria ei olisi, suoritettaisiin tässä default malli ja näkymä
	$view = SomeRequest::getVar('view','default');
	// getModel(system) olettaa, että on olemassa tiedosto model/system.php 
	//   ja siellä luokka SomeModelSystem joka perii luokan SomeModel
    $model = $this->getModel('system');
	// mallin metodeita voidaan kutsua tässä. 
	//  Yksi muista vaihtoehdoista on, että malli rakentimessaan tekee toimintonsa. Ohjelmoija valitsee miten tämän hoitaa
	$model->prepare();
	// tämä olettaa, että on olemassa tiedosto view/date/date.php jossa luokka SomeViewDate joka perii luokan SomeView
	$view = $this->getView($view);
	//asetetaan malli näkymälle, jotta se on sen display() metodissa haettavissa.
	$view->setModel($model);
	//ilman parametriä, tmpl on default, siis oletetaan että on olemassa tiedosto
	//  view/default/tmpl/default.php
	// koska tässä asetetaan templateksi date, täytyy olla olemassa tiedosto
	//   view/date/tmpl/date.php
	$view->display('date');
  }
  
   //metodi jota kutsutaan, jos url parametrin view arvona on system, siis http://...?view=system
   //url parametrissä on olemassa myäs muuttuja type=long tai type=short, joka kertoo mallille, 
   // kumpi system data halutaan näyttää
   // short data tarkoittaa vain ip osoittetta, jossa palvelin on. long data tarkoittaa koko phpinfo() funtion tulostetta.
  public function system() {
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
