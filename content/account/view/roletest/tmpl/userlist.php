
<!DOCTYPE html>
<html>
<head>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> 

<script>
$(document).ready(function(){
    $("button").dblclick(function(){
        $("#pekka").hide();
    });
});
</script>
</head>



<body>





<?php
// $model here only for testing purposes, because this whole roletest is just testing, not real application.
$users = $this->getModel()->getUsers();


?>

JEE JQUERYA!
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

<h2>This is a heading</h2>

<p id="pekka">This is Pekka paragraph.</p>
<p>This is another paragraph.</p>

<button>Click me</button>
