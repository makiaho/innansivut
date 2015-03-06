<?php 
if (SomeFactory::getApplication()->getSysMessage()) {
	echo "<div class='errormsg'>".SomeFactory::getApplication()->getSysMessage()."</div>";
}

?>

<h1>login form</h1>

<?php 
if (SomeFactory::getUser()->getId() > 0) {
	
	?>
	<a href="index.php?app=login&view=logout">Log Out <?php echo SomeFactory::getUser()->getUsername() ?></a>
	<?php 
	
} else {

?>

<br />
<form action='index.php?app=login&view=login' method='post'>
Username: <input type='text' name='username' value='' />
<br />
Password: <input type='password' name='password' value='' />
<br />
<input type='submit' name='smit' value='LogIn' />
</form>

<?php 
}
?>