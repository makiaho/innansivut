<script type="text/javascript">
<!--
jQuery(document).ready(function() {

	//border:;padding:0 3px;font:bold 10px verdana,sans-serif;color:#FFF;background:#F60;
	//text-decoration:none;margin:4px;
	jQuery("#button1").css("border","1px solid");
	jQuery("#button1").css("border-color","#FC9 #630 #330 #F96");
	jQuery("#button1").css("font","bold 14px verdana,sans-serif");
	jQuery("#button1").css("color","#FFF");
	jQuery("#button1").css("background","#F60");
	jQuery("#button1").css("text-decoration","none");
	jQuery("#button1").css("margin","4px");
	jQuery("#button1").css("padding","2px");

	jQuery("#button2").attr("style","border:1px solid;border-color:#FC9 #630 #330 #F96;padding:0 3px;font:bold 14px verdana,sans-serif;color:#FFF;background:#F60;text-decoration:none;margin:4px;padding:2px");

	$("#button2").clone().attr("id","button3").html("Click 3").appendTo('#buttons');
	
	jQuery("#button1").click(function() {
		jQuery("#showstage2").hide();
		jQuery("#showstage3").hide();
		jQuery("#showstage1").show();
	});

	jQuery("#button2").click(function() {
		jQuery("#showstage1").hide();
		jQuery("#showstage3").hide();
		jQuery("#showstage2").html("<p>this is text</p><img src='http://media.wiley.com/product_data/coverImage/59/04705844/0470584459.jpg' alt='jquery for dummies'/>");
		jQuery("#showstage2").show();
				
	});

	jQuery("#button3").click(function() {
		jQuery("#showstage1").hide();
		jQuery("#showstage2").hide();
		jQuery("#showstage3").show("fade", {}, 1500);
		jQuery("#showstage3").effect("highlight", {}, 2500);
	});
	
	jQuery("#showstage1").html("Stage 1 Ready");
	
});
//-->
</script>
<h1>Week 7 exercises as one page</h1>

<p id="buttons"><span id="button1">Click 1</span><span id="button2">Click 2</span></p>


<div id="stages">

<p id="showstage1" style="display:none">

</p>

<p id="showstage2" style="display:none">
Stage 2 Ready.
</p>

<p id="showstage3" style="display:none">
Stage 3 Ready.
</p>

</div>