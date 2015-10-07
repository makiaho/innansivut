<?php
someloader('some.application.controller');

class SomeControllerKurssisivu extends SomeController {

	public function __construct() {
		parent::__construct();
	}
	
        
        //TODO: Mites tässä voitaisiin vielä päättää, että MITÄ kurssia nyt halutaan näyttä - eli kuka tätä
        //        kutsuu ja miten parametri kurssista välittyy tänne?
	public function display() {
		$user = SomeFactory::getUser();
                
                //TODO: Tarkasta oikeudet tässä.
                $model = $this->getModel('kurssisivu');
                $view = $this->getView('10askeltarunsauteen');
                $view->setModel($model);
                
                //loganneelle käyttäjälle kurssisivu, muuten ilmoittautumissivu
                if (!$user->getId()) {
                    $view->display('10_askelta_runsauteen_ilmoittautuminen');
                } else {
                    
		     $view->display('10_askelta_runsauteen');
                    
                }
         
                
		
		$view->display();
	}
	
        
        
                
                
                
       /*         	
	function display() {
		
		// if the user is logged in, then it is sort of wrong to show register form...
		$user = SomeFactory::getUser();
		if (!$user->getId()) {
			$view = SomeRequest::getVar('view','register');
			$model = $this->getModel($view);
			$view = $this->getView($view);
			$tmpl = SomeRequest::getVar('tmpl','default');
			$view->setModel($model);
			$view->display($tmpl);
		} else {
			// change to login view. Do http redirect.
			$app = SomeFactory::getApplication();
			$app->redirect('index.php?app=login');
		}
        
        
        */
        
        
        
}