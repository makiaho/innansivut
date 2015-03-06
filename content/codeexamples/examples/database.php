
<h2>Using Database.</h2>
<p>
DATABASE API IS PDO API! That is: <a href="http://www.php.net/PDO">http://www.php.net/PDO</a> is the full API for the $database instance.
</p>

<p>
Before you use database, you need to put database connection parameters to the configuration.php.
</p>

<pre>
// $database instace of PDO
$database = SomeFactory::getDBO();
$statement = $database->prepare("SELECT * FROM someuser WHERE username=?");
$ok = $statement->execute(array("admin"));
if ($ok) {
	$userdata = $statement->fetch(PDO::FETCH_ASSOC);
}
</pre>

<p>

</p>

