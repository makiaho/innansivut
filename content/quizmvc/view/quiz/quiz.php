<?php

someloader("some.application.view");

class SomeViewQuiz extends SomeView {

	

        public function display($tmpl = 'default') {
            // just empty
        }
        
	public function form() {
		$this->numbers = $this->getModel()->getNumbers();
		$this->num1 = $this->numbers[0];
		$this->num2 = $this->numbers[1];
		parent::display("form");

	}
	
	public function answer() {
		$this->answer = $this->getModel()->getAnswer();
		$this->oldNumbers = $this->getModel()->getOldNumbers();
		$this->old1 = $this->oldNumbers[0] ;
		$this->old2 =$this->oldNumbers[1];
		$this->oldCorrect = $this->oldNumbers[0] * $this->oldNumbers[1];
		$this->isCorrect = $this->getModel()->getIsCorrect();
		
		$this->numbers = $this->getModel()->getNumbers();
		$this->num1 = $this->numbers[0];
		$this->num2 = $this->numbers[1];
		parent::display("answer");
		

	}
        
        public function stats() {
            $this->correctAnswers = $this->getModel()->correctAnswers;
            $this->gamesPlayed = $this->getModel()->gamesPlayed;
            parent::display("stats");
        }

}
