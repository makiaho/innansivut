<div style="width: 600px">
<div style="width: 150px; float: left; border-right: solid 1px black"><a
	href="index.php?app=nggmvc&view=start">Start Game</a><br />
<a href="index.php?app=nggmvc&view=quit">Quit</a><br />
<a href="index.php?app=nggmvc&view=statistics">Statistics</a><br />
<a href="index.php?app=nggmvc&view=info">Game Info</a><br />
</div>
<div style="float: left; display: block; width: 430px; padding: 0 0 3 0">
		Play the game by making guesses. You guess for the number that program knows.
		<?php
		if ($this->guesses) {
			echo "<a href='index.php?app=nggmvc&view=resume'>Resume the game</a><br />";
			echo "<a href='index.php?app=nggmvc&view=quit'>Quit the game</a><br />";
		} else {
			echo "<a href='index.php?app=nggmvc&view=start'>Start game</a>";
		}
		?>
		
		</div>
</div>