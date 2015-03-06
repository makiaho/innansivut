<?php
include dirname(__FILE__) . DS. "index.php";

?>

<h1>Colors</h1>

<script>
jQuery(document).ready(function() {

jQuery("p").click(function() {
		jQuery(this).css("color","blue");
	
});

jQuery("#changebtn").click(function() {
	jQuery("#exampletext").css("color","red");

});


});
</script>

<p>Example text</p>
<p>Example text 2</p>
<p>Example text 3</p>
<p>Example text 4</p>
<div id="exampletext">Example text 5</div>
<div id="changebtn"><input type="button" id="changebtn" value="Hit Me" /></div>