<?php
/**
 * This is controller file.
 * @package content
 * @subpackage ngg
 */
someloader ( 'some.application.controller' );
/**
 * This is controller file.
 * @package content
 * @subpackage ngg
 */

class SomeControllerDefault extends SomeController {
	
	/**
	 * default flow function.
	 * if no view is set, start is shown.
	 *
	 */
	
	function display() {
		$this->start ();
	}
	
	#
	#
	# name of the methods must be values from url parameter view, like ?app=ngg&view=guess
	#
	#
	

	#
	# this is an example of method, that is called if url is http://....?view=guess.
	# the value of the view parameter maps to method name
	#
	public function guess() {
		$session = SomeFactory::getSession ();
		//need to compare quess to answer
		$aguess = SomeRequest::getInt ( 'aguess', 0 );
		$answer = null;
		someloader ( 'some.cookie.cookie' );
		$cookies = SomeCookie::getInstance ();
		$c = $cookies->getCookie ( 'numberguess' );
		
		$val = unserialize ( stripslashes ( $c ['value'] ) );
		$answer = $val ['answer'];
		$guesses = $val ['guesses'];
		$val ['guesses'] [] = $aguess;
		$totalguesses = $session->get ( 'totalguesses', 0 );
		$totalguesses = ( int ) $totalguesses + 1;
		$session->set ( 'totalguesses', $totalguesses );
		
		if ($answer == $aguess) {
			$numberguess_answers = $session->get ( 'numberguessanswers', array () );
			
			$this->rightguess ( $aguess, count ( $guesses ) + 1, count ( $numberguess_answers ) + 1 );
			
			$numberguess_answers [] = $answer;
			$session->set ( 'numberguessanswers', $numberguess_answers );
			$cookies->delete ( 'numberguess' );
		
		} else {
			
			$this->wrongguess ( $aguess, $guesses, $answer );
			$cookies->update ( 'numberguess', 'value', serialize ( $val ) );
		
		}
	}
	
	public function resume() {
		?>
<div style="width: 600px">
<div style="width: 150px; float: left; border-right: solid 1px black"><a
	href="index.php?app=ngg&view=start">Start Game</a><br />
<a href="index.php?app=ngg&view=quit">Quit</a><br />
<a href="index.php?app=ngg&view=statistics">Statistics</a><br />
<a href="index.php?app=ngg&view=info">Game Info</a><br />
</div>
<div style="float: left; display: block; width: 430px; padding: 0 0 3 0">
       <?php
		someloader ( 'some.cookie.cookie' );
		$cookies = SomeCookie::getInstance ();
		$c = $cookies->getCookie ( 'numberguess' );
		
		$val = unserialize ( stripslashes ( urldecode ( $c ['value'] ) ) );
		$answer = $val ['answer'];
		$guesses = $val ['guesses'];
		echo "Your previous answers:" . join ( ',', $guesses ) . "<br />\n";
		echo "Guess again or <a href='?app=ngg&view=quit'>quit</a><br />";
		
		?>
       
       
       <form action='?app=ngg&view=guess' method='post' />
Make a guess <input type='text' name='aguess' /> <br />
<input type='submit' />
</form>
<br />
       [<?php
		echo $answer?>]
       </div>
</div>
<?php
	}
	
	/**
	 * index.php?app=ngg&view=start
	 */
	public function start() {
		$trycount = 10;
		$session = SomeFactory::getSession ();
		$numberguess_answers = $session->get ( 'numberguessanswers', array () );
		$answer = null;
		while ( $trycount -- ) {
			$answer = rand ( 1, 100 );
			if (! in_array ( $answer, $numberguess_answers )) {
				break;
			}
		}
		//TODO if answer is null end the game, can not find new answers easily.
		someloader ( 'some.cookie.cookie' );
		$cookies = SomeCookie::getInstance ();
		$numbercookie ['name'] = 'numberguess';
		$val ['answer'] = $answer;
		$val ['guesses'] = array ();
		$numbercookie ['value'] = serialize ( $val );
		$cookies->addCookie ( $numbercookie )?>

		//ask for first guess
		<div style="width: 600px">
<div style="width: 150px; float: left; border-right: solid 1px black"><a
	href="index.php?app=ngg&view=start">Start Game</a><br />
<a href="index.php?app=ngg&view=quit">Quit</a><br />
<a href="index.php?app=ngg&view=statistics">Statistics</a><br />
<a href="index.php?app=ngg&view=info">Game Info</a><br />
</div>
<div style="float: left; display: block; width: 430px; padding: 0 0 3 0">
<form action='?app=ngg&view=guess' method='post' />
Make a guess <input type='text' name='aguess' /> <br />
<input type='submit' />
</form>
<br />
       [<?php
		echo $answer?>]
       </div>
</div>
<?php
	}
	
	/**
	 * index.php?app=ngg&view=quit
	 */
	public function quit() {
		$session = SomeFactory::getSession ();
		$answer = null;
		someloader ( 'some.cookie.cookie' );
		$cookies = SomeCookie::getInstance ();
		$c = $cookies->getCookie ( 'numberguess' );
		if ($c) {
			$val = unserialize ( stripslashes ( $c ['value'] ) );
			$answer = $val ['answer'];
		}
		$numberguess_answers = $session->get ( 'numberguessanswers', array () );
		$numgames = count ( $numberguess_answers );
		?>
<div style="width: 600px">
<div style="width: 150px; float: left; border-right: solid 1px black"><a
	href="index.php?app=ngg&view=start">Start Game</a><br />
<a href="index.php?app=ngg&view=quit">Quit</a><br />
<a href="index.php?app=ngg&view=statistics">Statistics</a><br />
<a href="index.php?app=ngg&view=info">Game Info</a><br />
</div>
<div style="float: left; display: block; width: 430px; padding: 0 0 3 0">
       <?php
		if ($answer)
			echo "Correct answer was: $answer!<br />";
		echo "Number of games played:" . $numgames . "<br />";
		echo "bye bye<br />";
		?>
       </div>
</div>
<?php
		$cookies->delete ( 'numberguess' );
		$session->clear ( 'numberguessanswers' );
		$session->clear ( 'games' );
		$session->clear ( 'totalguesses' );
	}
	
	/**
	 * index.php?app=ngg&view=statistics
	 */
	public function statistics() {
		?>
<div style="width: 600px">
<div style="width: 150px; float: left; border-right: solid 1px black"><a
	href="index.php?app=ngg&view=start">Start Game</a><br />
<a href="index.php?app=ngg&view=quit">Quit</a><br />
<a href="index.php?app=ngg&view=statistics">Statistics</a><br />
<a href="index.php?app=ngg&view=info">Game Info</a><br />
</div>
<div style="float: left; display: block; width: 430px; padding: 0 0 3 0">
       <?php
		$session = SomeFactory::getSession ();
		$numberguess_answers = $session->get ( 'numberguessanswers', array () );
		$numgames = count ( $numberguess_answers );
		echo "Number of games played:" . $numgames . "<br />";
		$games = $session->get ( 'games', array () );
		foreach ( $games as $i => $game ) {
			echo "$i: $game[1] guesses for the answer $game[0]<br />";
		}
		echo "<br />Start <a href='?app=ngg&view=start'>new</a>or <a href='?app=ngg&view=quit'>quit</a><br />";
		?>
  		</div>
</div>
<?php
	}
	
	/**
	 * index.php?app=ngg&view=info
	 */
	public function info() {
		$answer = null;
		$guesses = null;
		
		someloader ( 'some.cookie.cookie' );
		$cookies = SomeCookie::getInstance ();
		$c = $cookies->getCookie ( 'numberguess' );
		if ($c) {
			$val = unserialize ( stripslashes ( $c ['value'] ) );
			$answer = $val ['answer'];
			$guesses = $val ['guesses'];
		
		}
		?>
<div style="width: 600px">
<div style="width: 150px; float: left; border-right: solid 1px black"><a
	href="index.php?app=ngg&view=start">Start Game</a><br />
<a href="index.php?app=ngg&view=quit">Quit</a><br />
<a href="index.php?app=ngg&view=statistics">Statistics</a><br />
<a href="index.php?app=ngg&view=info">Game Info</a><br />
</div>
<div style="float: left; display: block; width: 430px; padding: 0 0 3 0">
		Play the game by making guesses. You guess for the number that program knows.
		<?php
		if ($guesses) {
			echo "<a href='index.php?app=ngg&view=resume'>Resume the game</a><br />";
			echo "<a href='index.php?app=ngg&view=quit'>Quit the game</a><br />";
		} else {
			echo "<a href='index.php?app=ngg&view=start'>Start game</a>";
		}
		?>
		
		</div>
</div>
<?php
	
	}
	
	protected function wrongguess($answer, $guesses, $correct) {
		?>

<div style="width: 600px">
<div style="width: 150px; float: left; border-right: solid 1px black"><a
	href="index.php?app=ngg&view=start">Start Game</a><br />
<a href="index.php?app=ngg&view=quit">Quit</a><br />
<a href="index.php?app=ngg&view=statistics">Statistics</a><br />
<a href="index.php?app=ngg&view=info">Game Info</a><br />
</div>
<div style="float: left; display: block; width: 430px; padding: 0 0 3 0">
       <?php
		//need to get
		echo "Wrong answer: $answer! This was your " . (count ( $guesses ) + 1) . ". answer<br />";
		if ($answer < $correct) {
			echo "Answer is <i>bigger</i><br />";
		} else {
			echo "Answer is <i>smaller</i><br />";
		}
		echo "Your previous answers:" . join ( ',', $guesses ) . "<br />\n";
		echo "Guess again or <a href='?app=ngg&view=quit'>quit</a><br />";
		?>
       <form action='?app=ngg&view=guess' method='post' />
Make a guess <input type='text' name='aguess' /> <br />
<input type='submit' />
</form>
<br />
       [<?php
		echo $correct?>]
       </div>
</div>
<?php
	}
	
	protected function rightguess($answer, $guesscount, $numgames) {
		$session = SomeFactory::getSession ();
		$games = $session->get ( 'games', array () );
		$games [] = array ($answer, $guesscount );
		$session->set ( 'games', $games );
		//need to get...
		?>

<div style="width: 600px">
<div style="width: 150px; float: left; border-right: solid 1px black"><a
	href="index.php?app=ngg&view=start">Start Game</a><br />
<a href="index.php?app=ngg&view=quit">Quit</a><br />
<a href="index.php?app=ngg&view=statistics">Statistics</a><br />
<a href="index.php?app=ngg&view=info">Game Info</a><br />
</div>
<div style="float: left; display: block; width: 430px; padding: 0 0 3 0">
       <?php
		echo "Correct answer: $answer! This was your " . $guesscount . ". answer<br />";
		echo "Number of games played:" . $numgames . "<br />";
		echo "<br />Start <a href='?app=ngg&view=start'>new</a>or <a href='?app=ngg&view=quit'>quit</a><br />";
		?>
  		</div>
</div>
<?php
	}

}

