<div style="width: 600px">
<div style="width: 150px; float: left; border-right: solid 1px black"><a
	href="index.php?app=nggmvc&view=start">Start Game</a><br />
<a href="index.php?app=nggmvc&view=quit">Quit</a><br />
<a href="index.php?app=nggmvc&view=statistics">Statistics</a><br />
<a href="index.php?app=nggmvc&view=info">Game Info</a><br />
</div>
<div style="float: left; display: block; width: 430px; padding: 0 0 3 0">
       <?php
		//need to get
		echo "Wrong answer: {$this->guess}! This was your " . (count ( $this->guesses ) + 1) . ". answer<br />";
		if ($this->guess < $this->answer) {
			echo "Answer is <i>bigger</i><br />";
		} else {
			echo "Answer is <i>smaller</i><br />";
		}
		echo "Your previous answers:" . join ( ',', $this->guesses ) . "<br />\n";
		echo "Guess again or <a href='?app=nggmvc&view=quit'>quit</a><br />";
		?>
       <form action='?app=nggmvc&view=guess' method='post' />
Make a guess <input type='text' name='aguess' /> <br />
<input type='submit' />
</form>
<br />
       [<?php
		echo $this->answer ?>]
       </div>
</div>
