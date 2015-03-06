<?php

someloader("some.application.model");

class SomeModelQuiz extends SomeModel {
	
	private $answer;
	private $numbers;
	private $oldNumbers;
	private $isCorrect;
	private $rand1, $rand2;
	
	public function __construct(array $options = Array()) {
		if (isset($_POST['answer'])) {
			$this->answer = $_POST['answer'];
		}
		$session = SomeFactory::getSession();
		$numbers = $session->get("numbers");
		if ($numbers !== null) {
			$this->numbers = $numbers;
		}
		// rand1 and rand2
		$this->rand1 =  rand(1,10);
		$this->rand2 = rand(1,10);
	}
	
	public function processFormPost() {
		// posted the answer
		$this->isCorrect = $this->isCorrect();
		// put previous numbers to oldNumbers
		$this->oldNumbers = $this->numbers;
		// current numbers are from new randoms
		$this->numbers = array($this->rand1, $this->rand2);
		// putSession will change the numbers at the session and in the model
		
                $this->putSession();
	}
        
        public function processStats() {
            $session = SomeFactory::getSession();
            $this->correctAnswers = $session->get("correctAnswers", 0);
            $this->gamesPlayed = $session->get("gamesPlayed", 0);
                
        }
	
	public function processStart() {
		//first access
		$this->numbers = array($this->rand1, $this->rand2);
		$this->putSession();
	}
	
	/**
	* return the new numbers
	* @return array
	*/
	public function getNumbers() {
		return $this->numbers;
	}
	
	public function getOldNumbers() {
		return $this->oldNumbers;
	}
	
	public function getIsCorrect() {
		return $this->isCorrect;
	}
	
	public function getAnswer() {
		return $this->answer;
	}
	
	private function putSession() {
		$session = SomeFactory::getSession();
		$session->set('numbers',$this->numbers);
                $correctAnswers = $session->get("correctAnswers", 0);
                $this->isCorrect ? $correctAnswers++: null;
                $session->set("correctAnswers" , $correctAnswers);
                $gamesPlayed = $session->get("gamesPlayed", 0);
                $gamesPlayed++;
                $session->set("gamesPlayed" , $gamesPlayed);
                  
                
	}
	
	private function isCorrect() {
		$rand1 = $this->numbers[0];
		$rand2 = $this->numbers[1];
		$correct = $rand1 * $rand2;
		$answer = $this->answer;
		return (int)$correct == (int)$answer;
	}

}