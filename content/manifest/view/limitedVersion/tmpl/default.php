<?php

//this->showdate on asettu tiedostossa view/default/default.php, sen display metodissa.
//kaikki data jota t��ll� k�sitell��n, olisi syyt� asettaa tuossa metodissa.
echo "<h1>Current date</h1>";

echo $this->showdate;

?>
<hr />

Haluaisitko katsoa <a href='index.php?app=example&view=system&type=short'>lyhyen</a>
 tai <a href='index.php?app=example&view=system&type=long'>pitkän</a> järjestelmäinformaation?
 
 <hr />
 <a href='index.php?app=example&view=date'>date, system model with date view and date template</a>
 
 <hr />
 <a href='index.php?app=example'>default model, view and template</a>