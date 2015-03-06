<?php
include dirname(__FILE__) . DS. "index.php";

?>

<h1>Colors</h1>

<script>
jQuery(document).ready(function() {

	jQuery("p").css("color","blue");
	var t=setTimeout(function() { jQuery("p").css("color","green") },3000);
	var t=setTimeout(function() { jQuery("p").css("color","red") },6000);
	var t=setTimeout(function() { jQuery("p").css("color","yellow") },9000);
});
</script>

<p>Example text</p>
<p>Example text 2</p>
<p>Example text 3</p>
<p>Example text 4</p>
<div>Example text 5</div>