<div id="accordion">
<!--
Quick links.
Rss feeds (is empty)
Login.
-->
    <h5>Miten tätä</h5>
<div>
<p class="laatikko">
    <a href="?app=account&action=register">Register</a>
</p>
</div>
<h5>sivua saisi muutettua</h5>
<div>
<p class="laatikko">
niin että teksti oikealla näkyisi kokonaan?
</p>
</div>
<h5>Login</h5>
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
    Username: <input type='text' name='username' value='' width="20" style="width:100px" />
<br />
Password: <input type='password' name='password' value='' width="20" style="width:100px" />
<br />
<input type='submit' name='smit' value='LogIn' />
</form>

<?php 
}
?>
</p>
</div>

</div>