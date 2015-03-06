<?php

//this->showdate on asettu tiedostossa view/default/default.php, sen display metodissa.
//kaikki data jota täällä on, n, olisi syytä asettaa tuossa metodissa.
echo "<h1>Current data - long</h1>";

echo $this->data;

?>

<hr />

Haluaisitko katsoa <a href='index.php?app=example&view=system&type=short'>lyhyen</a>
 tai <a href='index.php?app=example&view=system&type=long'>pitkän</a> järjestelmäinformaation?
 
 <hr />
 <a href='index.php?app=example&view=date'>date, system model with date view and date template</a>
 
 <hr />
 <a href='index.php?app=example'>default model, view and template</a>