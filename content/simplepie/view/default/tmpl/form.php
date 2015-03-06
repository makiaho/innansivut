<?php

$feed0 = $this->feedurls[0];
$feed1 = $this->feedurls[1];
$feed2 = $this->feedurls[2];
$feed3 = $this->feedurls[3];
$feed4 = $this->feedurls[4];
?>

<form action='index.php?app=simplepie&view=feed' method='post'>
Feed 1: <input type='text' name='urls[]' value='<?php echo $feed0; ?>' /><br />
Feed 2: <input type='text' name='urls[]' value='<?php echo $feed1; ?>' /><br />
Feed 3: <input type='text' name='urls[]' value='<?php echo $feed2; ?>' /><br />
Feed 4: <input type='text' name='urls[]' value='<?php echo $feed3; ?>' /><br />
Feed 5: <input type='text' name='urls[]' value='<?php echo $feed4; ?>' /><br />


<br />
<input type='submit' name='see feeds' />
</form>