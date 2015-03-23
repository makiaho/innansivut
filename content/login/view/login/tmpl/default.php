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
<table width"683">
<tr>
<td width="120"></td>
<td width="180" height="30"><p class="lomake">K&auml;ytt&auml;j&auml;nimi:</p> <input type='text' name='username' value=''  required="required" />
<br /></td>

</tr><tr>
<td width="120"></td>
<td width="180" height="30"><p class="lomake">Salasana:</p> <input type='password' name='password' value=''  required="required" />
<br /></td>
</tr>
<tr>
<td width="120"></td>
<td width="180" height="30"><form>
<input type="checkbox" name="muista_salasana" value="muista_salasana">Muista minut</u></a>
</form>
</td>
</tr>
</table>

<table width"683">
<tr>
<td width="120"></td>
<td width="180" height="30">
<input type='submit' name='smit' value='Kirjaudu sis&auml;&auml;n' />
</td>

</tr>

</table>
</form>
<br><br><br><br><br>
<?php 
}
?>