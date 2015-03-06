<?php
include dirname(__FILE__) . DS. "index.php";

?>

<h1>Doc Ready</h1>

<script>
jQuery(document).ready(function() {
	alert("Document ready");
	var t=setTimeout(function() { jQuery("#textp").html("Changed...") },3000);
});
</script>

<p id="textp">Example text</p>