<?php
include dirname(__FILE__) . DS. "index.php";

?>

<h1>Colors</h1>

<script>
jQuery(document).ready(function() {
	var colors = <?php echo json_encode( array("red","green","yellow","blue") ); ?>;
	jQuery("p").css("color",colors[3]);
	var t=setTimeout(function() { jQuery("p").css("color",colors[0]) },3000);
	var t=setTimeout(function() { jQuery("p").css("color",colors[1]) },6000);
	var t=setTimeout(function() { jQuery("p").css("color",colors[2]) },9000);
});
</script>

<p>Example text</p>
<p>Example text 2</p>
<p>Example text 3</p>
<p>Example text 4</p>
<div>Example text 5</div>