<?php

// tämä on näkymä tiedosto, view. Tämän tiedoston luokan nimen pääte on sama, kuin tiedoston nimi

someloader('some.application.view');

class SomeViewNoRights extends SomeView {

  //tässä luokassa on display() metodi, jota controlleri kutsuu haluamansa template tiedoston nimi
  // ainoana argumenttina. Jos controlleri ei aseta tätä argumentti, se asetetaan parent::display(tmpl=default)
  //   metodissa arvoksi default, joka tarkoittaa tiedostoa tmpl/default.php
  // -> Tehdään default.PHP, joka on tilaussivu.  

  public function display($tmpl = null) {
	//mallin saa getModel() metodilla. 
	//  Se on malli, jonka controller tälle oliolle asetti kutsumalla $view->setModel($model)
	$model = $this->getModel();
	//mallissa voi olla meille dataa tässä tapauksessa haettavana metodilla getDate()
	// $this->showdate on käytössä template tiedostossa tmpl/date.php, sillä tämä olio $this hakee tuon template tiedoston
	//  parent luokan loadTemplate metodissa.
	//$this->showdate = date('d-m-Y H-i-s', $model->getNowTime()) ;
	//tässä metodissa voidaan vielä muuttaa $tmpl muuttujan arvo. Muuten siirretään eteenpäin se arvo, joka tuli
	//  controllerilta, tai null oletusarvo.
	parent::display($tmpl);
  }
  
  //
  // tässä tiedostossa voisi olla muitakin metodeja, joita esimerkiksi display() metodista kutsutaan
  //
  //
  
}
