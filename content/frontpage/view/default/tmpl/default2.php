<h1><?php echo SomeText::_('OMANELAMANILUOJA')  ?></h1>
<p>This is www-programming course framework, named wo2009.</p>
<pre style="color:red">

Crud application has new COLUMN in the database. ownerid, integer. Create it.

ALTER TABLE `crud` ADD `ownerid` INT NULL ,
ADD INDEX ( `ownerid` ) ;
</pre>
<pre style="color:blue">You should have now, from week 6 onwards the database 
configured! You need to have configuration.php that has your values.<br >/<br />

Copy your old configuration.php if you have changed it to this new framework folder.
</pre>


<table border="1" class="sitemaptable">

<tr>
	<td>
	
	<a href="index.php?app=sitemap">Extension index</a>
	
	</td>
	
	<td>
	<p>
	A Collection of extensions with explanations what they are.
	</p>
	
	</td>
</tr>

<tr>
	<td>
	
	<a href="index.php?app=help">Help</a>
	
	</td>
	
	<td>
	<p>
	Some instructions to get working database connection.
	</p>
	
	</td>
</tr>

<tr>
	<td>
	
	<a href="wodoc">API Docs and examples</a>
	
	</td>
	
	<td>
	<p>
	Autogenerated API documentation with few examples.
	</p>

	</td>
</tr>



</table>