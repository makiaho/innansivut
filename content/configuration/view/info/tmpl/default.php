<style type="text/css">
span.redfail {
	color: red;
}
span.greenok {
	color:green;
}

h1 {
	margin: 10 10 10 10;
	color:black;
	font-size: 20pt;
	text-decoration:underline;
	
}

h2 {
	margin: 10 10 10 20;
	color:grey;
	font-size: 14pt;
	border-bottom:thick dotted black;
	
}

h3 {
	margin: 10 10 10 20;
	color:grey;
	font-size: 12pt;
	font-style: italic
}

p, table {
	margin-left: 40px;
	
}

span.iserror {
	color: red;
}

</style>
<?php 
if (!empty($this->errors)) {
	echo "Repair these:<br />\n";
	foreach ($this->errors as $ek => $ev) {
		echo "<span class='iserror'>$ek / $ev</span><br />\n";
	}
}

?>
<h1>Installation Information.</h1>
<p>This page has installation information and instructions and links to verify 
and create installation for wo2009 framework.</p>
<h2>Overall Description.</h2>
<p>There are two things to do when installing wo2009.
<br />
1) putting correct values to configuration.php, found at the root of your installation.
<br />
2) creating two tables to the database.
</p>
<p>you can use either postgres server at the dbstub.sis.uta.fi or mysql server that came with your XAMPP installation.</p>
<h2>Settings Detected:</h2>
<table border=1>
<?php
// step 1. Must have configuration.php writeable.
if (!$this->confwritable) {
	?>
	<tr><td>configuration.php is not writable!</td><td><span class='redfail'>chmod it to 777 or in windows see its properties and uncheck read-only.</span></td></tr>
	<tr><td colspan='2'>You must complete this step. You get more information when configuration.php is writable.</td></tr>
	<tr><td colspan='2'>Do the required changes and <a href='index.php?app=configuration&cntr=install'>refresh this page</a>.</td></tr>
	</table>
	<?php 
	return; // thats it, user must chmod that file first
} else {
	?>
	<tr><td>configuration.php is writable</td><td><span class='greenok'>OK.</span></td></tr>
	<?php 
} 
// step 2. Need to have database engine given, or I ask it, and then put it to configuration.php
if (!$this->dpengineselected) {
	?>
	<tr><td>Database driver in not selected!</td><td><span class='redfail'>You MUST select database driver and put it to configuration.php.</span></td></tr>
	<tr><td colspan='2'>You must complete this step. Database driver goes to 'databasedriver' element in configuration.php. Value must be pdopostgres or pdomysql, which ever you are using.</td></tr>
	<tr><td colspan='2'>Change the value and <a href='index.php?app=configuration&cntr=install'>refresh this page</a>.</td></tr>
	</table>
	<?php 
	return; // thats it, user must chmod that file first
} else {
	?>
	<tr><td>Database is selected (<?php echo $this->dpengineselected ?>)</td><td><span class='greenok'>OK.</span></td></tr>
	<?php 
} 

?>
</table>
<h2>Database Engine Is Selected.</h2>
<p>Database host, database name and if using mysql, username and password must be given and must be valid values.</p>
<h3>Database Settings</h3>
<p><span style="color:#FF9933">Read instructions column</span> and compare current value to requirements. Change configuration.php if needed.</p>
<table border=1>

<tr><th>Fields</th><th>Value</th><th>instructions</th></tr>
<tr>
	<td>databasedriver:</td>
	<td><?php echo $this->databasedriver ?></td>
	<td>Driver must be 'pdopostgres' or 'pdomysql'.</td>
</tr>
<tr>
	<td>databasehost:</td>
	<td><?php echo $this->databasehost ?></td>
	<td>Host must be dbstud.sis.uta.fi OR if using mysql 127.0.0.1 OR localhost.</td>
</tr>
<tr>
	<td>database:</td>
	<td><?php echo $this->database ?></td>
	<td>Database must be with dbstud.sis.uta.fi your student number (mine is hl70329) OR if using mysql you must create database. Use http://localhost/phpmyadmin for that.</td>
</tr>
<tr>
	<td>dbuser:</td>
	<td><?php echo $this->dbuser ?></td>
	<td>Dbuser must be with dbstud.sis.uta.fi your shell login OR if using mysql you must create it.</td>
</tr>
<tr>
	<td>dbpass:</td>
	<td><?php echo $this->dbpass ?></td>
	<td>Dbpass must be with dbstud.sis.uta.fi as created (posted instruction to moodle forum) OR if using mysql you must fill it.</td>
</tr>
</table>
<p><a href='index.php?app=configuration'>Edit values here.</a></p>

<h2>Db Connection</h2>
<?php 
if ($this->connected) {
	?>
		<p><span class='greenok'>DB connection ok.</span></p>
	<?php 
} else {
	?>
		<p><span class='redfail'>Can not connect database! Read table above! Check values at configuration.php.</span></p>
	<?php
}
?>
<!-- tables. somesession. someuser. -->
<h2>Autoinstall Tables.</h2>
<p>You need tables someuser and somesession (if you are using database sessions, and not files).</p>
<?php 
if (!$this->connected) {
	?>
		<p><span class='redfail'>Fix database connection first.</span></p>
	<?php 
} else {
	?>
	<table border=1>
	<tr><th>Table name.</th><th>Status</th><th>Actions</th></tr>
	<tr><td>someuser</td><td><?php echo $this->someuserstatus ?></td><td><?php echo $this->someuseraction ?></td></tr>
	<tr><td>somesession</td><td><?php echo $this->somesessionstatus ?></td><td><?php echo $this->somesessionaction ?></td></tr>
	</table>
	<?php 
}


