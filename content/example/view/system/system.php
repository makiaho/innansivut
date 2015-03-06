<?php

// t�m� on n�kym� tiedosto, view. T�m�n tiedoston luokan nimen p��te on sama, kuin tiedoston nimi

someloader('some.application.view');

class SomeViewSystem extends SomeView {

  //t�ss� luokassa on display() metodi, jota controlleri kutsuu haluamansa template tiedoston nimi
  // ainoana argumenttina. Jos controlleri ei aseta t�t� argumentti, se asetetaan parent::display(tmpl=default)
  //   metodissa arvoksi default, joka tarkoittaa tiedostoa tmpl/default.php

  public function display($tmpl = 'default') {
	//mallin saa getModel() metodilla. 
	//  Se on malli, jonka controlleri t�lle oliolle asetti kutsumalla $view->setModel($model)
	$model = $this->getModel();
	//mallissa voi olla meille dataa t�ss� tapauksessa haettavana metodilla getData()
	// $this->data on k�yt�ss� template tiedostossa tmpl/default.php, sill� t�m� olio $this hakee tuon template tiedoston
	//  parent luokan loadTemplate metodissa.
	$this->data = $model->getData();
	//t�ss� metodissa voidaan viel� muuttaa $tmpl muuttujan arvo. Muuten siirret��n eteenp�in se arvo, joka tuli
	//  controllerilta, tai null oletusarvo.
	parent::display($tmpl);
  }
  
  //
  // t�ss� tiedostossa voi olla muitakin metodeja, joita esimerkiksi display() metodista kutsutaan
  //
  //
  
}