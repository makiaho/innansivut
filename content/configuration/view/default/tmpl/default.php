<h1>Configuration.xml</h1>
<p>SEE FIRST: <a href='index.php?app=configuration&cntr=install'>INSTALLATION</a></p>
<?php

//var_dump($this->carray);
?>
<form action='index.php?app=configuration&view=edit&do=save' method=post>
<?php
foreach ($this->carray as $cname => $category) {
	echo "<b>$cname</b><br />";
	foreach ($category as $key => $value) {
		echo "<div style='clear:both'><span style='width: 150px; display: block; float: left;'>&nbsp;$key</span><input width='150px' style='clear:right' type=text name='{$cname}___{$key}' value='$value' /><br /></div>";
	}
	echo "<br />";
	
}
?>
<input type=submit value="save" />
</form>
