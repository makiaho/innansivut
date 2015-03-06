<?php
someloader('some.application.view');

class SomeViewGame extends SomeView {

	public function display($tmpl=null) {
		
		parent::display();
	}
	
	public function start() {
		$model = $this->getModel();
		$this->answer = $model->getAnswer();
		$this->data['answer'] = $model->getAnswer();
		// tmpl/start.php
		parent::display("start");
	}
	
	public function guess() {
		$model = $this->getModel();
		$this->answer   = $model->getAnswer();
		$this->guess    = $model->getGuess();
		$this->guesses  = $model->getGuesses();
		$this->guesscount = count($this->guesses) + 1;
		$this->games    = $model->getGames();
		$this->numgames = count($this->games);
		
		
		$tmpl = $this->answer == $this->guess ? 'rightguess': 'wrongguess';
		
		$this->data['answer'] = $model->getAnswer();
		
		parent::display($tmpl);
	}
	
	public function quit() {
		$model = $this->getModel();
		$this->answer   = $model->getAnswer();
		$this->games    = $model->getGames();
		
		$this->numgames = count($this->games);
		parent::display("quit");
	}
	
	public function resume() {
		$model = $this->getModel();
		$this->answer   = $model->getAnswer();
		$this->guesses  = $model->getGuesses();
		$this->games    = $model->getGames();
		
		$this->numgames = count($this->games);
		parent::display("resume");
	}

}