<?php
$userdata = $this->userdata;


?>

<h1>Logged in</h1>

You are logged in.

<br />

Username: <?php echo $userdata['username'] ?>
<br />
Userrole: <?php echo $userdata['userrole'] ?>
<br />
Email: <?php echo $userdata['email'] ?>
<br />
Homepage: <?php echo $userdata['homepage'] ?>
<br />




<hr />
Logout: <a href='index.php?app=login&view=logout'>logout</a>
<hr />
<?php echo $this->date ?>
