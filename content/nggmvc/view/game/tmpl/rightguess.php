<div style="width: 600px">
<div style="width: 150px; float: left; border-right: solid 1px black"><a
	href="index.php?app=nggmvc&view=start">Start Game</a><br />
<a href="index.php?app=nggmvc&view=quit">Quit</a><br />
<a href="index.php?app=nggmvc&view=statistics">Statistics</a><br />
<a href="index.php?app=nggmvc&view=info">Game Info</a><br />
</div>
<div style="float: left; display: block; width: 430px; padding: 0 0 3 0">
       <?php
		echo "Correct answer: $this->answer! This was your " . $this->guesscount . ". answer<br />";
		echo "Number of games played:" . $this->numgames . "<br />";
		echo "<br />Start <a href='?app=nggmvc&view=start'>new</a>or <a href='?app=nggmvc&view=quit'>quit</a><br />";
		?>
  		</div>
</div>