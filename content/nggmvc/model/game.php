<?php
someloader('some.application.model');

class SomeModelGame extends SomeModel {

	public $answer;
	public $guess;
	public $guesses;
	public $games;
	
	public function __construct(array $options=array()) {
		parent::__construct($options);
	}
	
	public function getAnswer() {
		return $this->answer;
	}
	
	public function getGuess() {
		return $this->guess;
	}
	
	public function getGuesses() {
		return $this->guesses;
	}
	
	public function getGames() {
		return $this->games;
	}
	
	public function start() {
		$trycount = 10;
		$session = SomeFactory::getSession ();
		$numberguess_answers = $session->get ( 'numberguessanswers', array () );
		$this->answer = null;
		while ( $trycount -- ) {
			$this->answer = rand ( 1, 100 );
			if (! in_array ( $this->answer, $numberguess_answers )) {
				break;
			}
		}
		//TODO if answer is null end the game, can not find new answers easily.
		someloader ( 'some.cookie.cookie' );
		$cookies = SomeCookie::getInstance ();
		$numbercookie ['name'] = 'numberguess';
		$val ['answer'] = $this->answer;
		$val ['guesses'] = array ();
		$numbercookie ['value'] = serialize ( $val );
		$cookies->addCookie ( $numbercookie );
	}
	
	public function guess() {
		$session = SomeFactory::getSession ();
		//need to compare quess to answer
		$this->guess = $aguess = SomeRequest::getInt ( 'aguess', 0 );
		$answer = null;
		
		someloader ( 'some.cookie.cookie' );
		$cookies = SomeCookie::getInstance ();
		$c = $cookies->getCookie ( 'numberguess' );
		
		$val = unserialize ( stripslashes ( $c ['value'] ) );
		
		$this->answer  = $answer  = $val ['answer'];
		$this->guesses = $guesses = $val ['guesses'];
		$val ['guesses'] [] = $aguess;
		
		$totalguesses = $session->get ( 'totalguesses', 0 );
		$totalguesses = ( int ) $totalguesses + 1;
		$session->set ( 'totalguesses', $totalguesses );
		
		if ($answer == $aguess) {
			$numberguess_answers = $session->get ( 'numberguessanswers', array () );
			
			#$this->rightguess ( $aguess, count ( $guesses ) + 1, count ( $numberguess_answers ) + 1 );
			
			$numberguess_answers [] = $answer;
			$session->set ( 'numberguessanswers', $numberguess_answers );
			$cookies->delete ( 'numberguess' );
			
			$games = $session->get ( 'games', array () );
			$games [] = array ($answer, count($guesses) + 1 );
			$session->set ( 'games', $games );
			$this->games = $games;
		} else {
			
			#$this->wrongguess ( $aguess, $guesses, $answer );
			$cookies->update ( 'numberguess', 'value', serialize ( $val ) );
		
		}
	}
	
	public function quit() {
		$session = SomeFactory::getSession ();
		$answer = null;
		someloader ( 'some.cookie.cookie' );
		$cookies = SomeCookie::getInstance ();
		$c = $cookies->getCookie ( 'numberguess' );
		if ($c) {
			$val = unserialize ( stripslashes ( $c ['value'] ) );
			$this->answer = $answer = $val ['answer'];
		}
		$numberguess_answers = $session->get ( 'numberguessanswers', array () );
		$this->guesses = $numberguess_answers;
		$numgames = count ( $numberguess_answers );
		$games = $session->get ( 'games', array () );
		$this->games = $games;
		
		$cookies->delete ( 'numberguess' );
		$session->clear ( 'numberguessanswers' );
		$session->clear ( 'games' );
		$session->clear ( 'totalguesses' );
	}
	
	public function resume() {
		$session = SomeFactory::getSession ();
		someloader ( 'some.cookie.cookie' );
		$cookies = SomeCookie::getInstance ();
		$c = $cookies->getCookie ( 'numberguess' );
		
		$val = unserialize ( stripslashes ( $c ['value'] ) );
		$this->answer = $val ['answer'];
		$this->guesses = $val ['guesses'];
		
		$games = $session->get ( 'games', array () );
		$this->games = $games;
	}
	
}