<div style="width: 600px">
<div style="width: 150px; float: left; border-right: solid 1px black"><a
	href="index.php?app=nggmvc&view=start">Start Game</a><br />
<a href="index.php?app=nggmvc&view=quit">Quit</a><br />
<a href="index.php?app=nggmvc&view=statistics">Statistics</a><br />
<a href="index.php?app=nggmvc&view=info">Game Info</a><br />
</div>
<div style="float: left; display: block; width: 430px; padding: 0 0 3 0">
       <?php
		if ($this->answer)
			echo "Correct answer was: $this->answer!<br />";
		echo "Number of games played:" . $this->numgames . "<br />";
		echo "bye bye<br />";
		?>
       </div>
</div>