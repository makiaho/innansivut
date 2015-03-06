<div id="accordion">
<!--
Quick links.
Rss feeds (is empty)
Login.
-->
    <h3>Quick Links</h3>
<div>
<p>
    <a href="?app=account&action=register">Register</a>
</p>
</div>
<h3>Rss Feeds</h3>
<div>
<p>
Intentionally left empty.
</p>
</div>
<h3>Login</h3>
<div>
<p>
<?php 
if (SomeFactory::getUser()->getId() > 0) {
	
	?>
	<a href="index.php?app=login&view=logout">Log Out <?php echo SomeFactory::getUser()->getUsername() ?></a>
	<?php 
	
} else {

?>

<br />
<form action='index.php?app=login&view=login' method='post'>
    Username: <input type='text' name='username' value='' width="20" style="width:200px" />
<br />
Password: <input type='password' name='password' value='' width="20" style="width:200px" />
<br />
<input type='submit' name='smit' value='LogIn' />
</form>

<?php 
}
?>
</p>
</div>

</div>