<?php
$baseUrl = SomeUri::getScheme()  ."://" . SomeUri::getHost() . SomeUri::getPath();
     

?>
<table border="1" class="sitemaptable">

<tr><th>Extension link</th><th>About</th></tr>

<tr>
	<td>
	
	<a href="index.php?app=ngg">Number Guess Game</a>
	
	</td>
	
	<td>
	<p>
	An exercise to study framework and its MVC design. (this is currently non-MVC version). MVC version 
	<a href="index.php?app=nggmvc">here</a>.
	</p>
	
	</td>
</tr>

<tr>
	<td>
	
	<a href="index.php?app=quotes">Quotes Extension</a>
	
	</td>
	
	<td>
	<p>
	An exercise to study framework and its Database Active Record implementation and I18N tools.
	</p>
	
	</td>
</tr>

<tr>
	<td>
	
	<a href="index.php?app=quiz">Quiz Extension</a>
	
	</td>
	
	<td>
	<p>
The quiz. Without mvc.
	</p>
	
	</td>
</tr>

<tr>
	<td>
	
	<a href="index.php?app=account">User Account</a>
	
	</td>
	
	<td>
	<p>
	An extension to implement user account. Incompete as RUD from CRUD operations are left as an exercise. Login
	 is an other extension <a href="index.php?app=login">here</a>.
	</p>
	<p>
	Demo code to change users role <a href="index.php?app=account&view=roletest">here</a>
	</p>
	<p>
	Create user using account extension, then you may login with that user.
	</p>
	</td>
</tr>


<tr>
	<td>
	
	<a href="index.php?app=dhtmlexamples">Dynamic html examples</a>
	
	</td>
	
	<td>
	<p>
	These examples are about dynamic html. See also apps: slider, week7dhtml, quotesajax and ajaxexamples.
	</p>
	<ul>
		<li><a href="index.php?app=slider"><span>Image Slider</span></a></li>
		<li><a href="index.php?app=week7dhtml"><span>Exercises week 7</span></a></li>
		<li><a href="index.php?app=ajaxexamples"><span>Ajax examples</span></a></li>
		<li><a href="index.php?app=quotesajax&ajax=1"><span>Quotes with Ajax</span></a></li>
	</ul>
	</td>
</tr>



<tr>
	<td>
	
	<a href="index.php?app=avatar">Avatar example.</a>
	
	</td>
	
	<td>
	<p>
Fileupload and cropping example.
	</p>
	</td>
</tr>


<tr>
	<td>
	
	<a href="index.php?app=tinymce">TinyMCE example.</a>
	
	</td>
	
	<td>
	<p>
TinyMCE example. Also quotes app (non ajax version) has TinyMCE editor with simplified configuration - not that menay buttons.
	</p>
	</td>
</tr>


<tr>
	<td>
	
	<a href="index.php?app=simplepie">SimplePie RSS example.</a>
	
	</td>
	
	<td>
	<p>
RSS with library.
	</p>
	</td>
</tr>

<tr>
	<td>
	
	<a href="index.php?app=codeexamples">Code Examples</a>
	
	</td>
	
	<td>
	<p>
	Few API usage examples.
	</p>
	</td>
</tr>

<tr>
	<td>
	
	<a href="<?php echo $baseUrl; ?>/pdfs">Install, Tutorials, etc...</a>
	
	</td>
	
	<td>
	<p>
	Some tutorials on how to code to the framework.
	</p>
	</td>
</tr>

<tr>
	<td>
	
	Useful extensions:
	
	</td>
	
	<td>
            <pre>
content/account for user registration index.php?app=account
content/account also for user roles
content/avatar for fileupload
content/crud for simple crud + list database example
content/quizmvc for session usage
content/quotes for almost anything but not session usage
content/red on how to change master template
content/login on login and logout of user.
content/hello for simple MVC
content/nggmvc for simple numberguess game without database
content/example for MVC without session/database/etc
pdf/ folder for tutorials.
            </pre>
	</td>
</tr>

</table>

