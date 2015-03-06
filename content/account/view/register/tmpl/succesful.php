<?php
//success comes here

$userdata = $this->userdata;



?>
<h1>Registration completed succesfully</h1>

You may now login with your username <?php echo $userdata['username']  ?>

<hr />
<form action='index.php?app=login&view=login' method='post'>
Username: <input type='text' name='username' value='<?php echo $userdata['username']  ?>' />
<br />
Password: <input type='password' name='password' value='' />
<br />
<input type='submit' name='smit' value='LogIn' />
</form>


