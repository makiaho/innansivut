<?php 
if (SomeFactory::getApplication()->getSysMessage()) {
	echo "<div class='errormsg'>".SomeFactory::getApplication()->getSysMessage()."</div>";
}

?>

<h1>Kirjaudu sis&auml;&auml;n</h1>

<?php 
if (SomeFactory::getUser()->getId() > 0) {
	
	?>
	<a href="index.php?app=login&view=logout">Log Out <?php echo SomeFactory::getUser()->getUsername() ?></a>
	<?php 
	
} else {

?>

<br />
<form action='index.php?app=login&view=login' method='post'>
K&auml;ytt&auml;j&auml;nimi: <input type='text' name='username' value='' />
<br />
Salasana: <input type='password' name='password' value='' />
<br />
<input type='submit' name='smit' value='Kirjaudu sis&auml;&auml;n' />
</form>

<?php 
}
?>