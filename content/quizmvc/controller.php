<?php

someloader('some.application.controller');

class QuizController extends SomeController {
    
        public function display() {
            $this->form();
        }
    
	public function form() {
		$model = $this->getModel('quiz');
		$model->processStart();
		$view= $this->getView('quiz');
		$view->setModel($model);
		$view->form();		
	}
	
	public function answer() {
		$model = $this->getModel('quiz');
		$model->processFormPost();
		$view= $this->getView('quiz');
		$view->setModel($model);
		$view->answer();		
	}
        
        public function stats() {
		$model = $this->getModel('quiz');
		$model->processStats();
		$view= $this->getView('quiz');
		$view->setModel($model);
		$view->stats();		
	}
        

}