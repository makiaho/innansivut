<?php

//var_dump($this->carray);
?>
<form action='index.php?app=configuration&do=save' method=post>
<?php
foreach ($this->carray as $cname => $category) {
	echo "<b>$cname</b><br />";
	foreach ($category as $key => $value) {
		echo "<span style='width: 150px; display: block; float: left;'>&nbsp;$key</span><input type=text name='{$cname}___{$key}' value='$value' /><br />";
	}
	echo "<br />";
	
}
?>
<input type=submit value="save" />
</form>
