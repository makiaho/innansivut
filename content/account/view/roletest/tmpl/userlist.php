<?php
// $model here only for testing purposes, because this whole roletest is just testing, not real application.
$users = $this->getModel()->getUsers();


?>
<form action="index.php?app=account&view=roletest" method="POST">
<select name="id">
<?php 
foreach ($users as $user) {
	?>
	<option value="<?php echo $user['id'] ?>"><?php echo $user['username'] . " (" . $user['userrole']  . ")"; ?></option>
	<?php 

}
?>
</select>
<br />
New role
<select name="newrole">
<option value="admin">admin</option>
<option value="registered">registered</option>
<option value="manager">manager</option>

</select>
<br />
<input type="submit" name="Send" value="Send" />
</form>