<script src="template/dhtmlexamples/js/jquery-1.7.1.min.js" type="text/javascript"></script>
<script src="template/dhtmlexamples/js/jquery-ui-1.8.17.custom.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="template/dhtmlexamples/css/pepper-grinder/jquery-ui-1.8.17.custom.css" />

<pre>http://api.jquery.com/category/ajax/</pre>
<script type="text/javascript">
<!--

$(document).ready(function() {
	$("#valueStaticLoadButton1").click(function() {
		$.get('content/ajaxexamples/ajaxdata.txt', function(data) {
			alert('Load was performed.');
			$("#result_staticfile1").html(data);
		});
	});
	
});

$(document).ready(function() {
	$("#valueStaticLoadButton2").click(function() {
		$.get('index.php?app=ajaxexamples&view=getfile', function(data) {
			alert('Load was performed.');
			$("#result_staticfile2").html(data);
		});
	});
	
});

$(document).ready(function() {

	$("#idplus").click(function(){
		$.get('index.php?app=ajaxexamples&view=storerating&somevalue=1', function(data) {
			var myObject = JSON.parse(data);
			  alert('Load was performed.');
				$("#result_plusminus").html(myObject.value);
		});
	});

	$("#idminus").click(function(){
		$.get('index.php?app=ajaxexamples&view=storerating&somevalue=-1', function(data) {
			var myObject = JSON.parse(data);
			  alert('Load was performed.');
				$("#result_plusminus").html(myObject.value);
		});
	});
	
});

$(document).ready(function() {
	$("#valueTestButton").click(function(){
		var value = $("#valuetestvalue").val();
		$.get('index.php?app=ajaxexamples&view=storevalue&somevalue=' + value, function(data) {
			var myObject = JSON.parse(data);
			  alert('Load was performed.');
				$("#result_valuestore").html(myObject.message);
		});
	});
});

$(document).ready(function() {
$("#testForm").submit(function(event) {

    /* stop form from submitting normally */
    event.preventDefault(); 
        
    /* get some values from elements on the page: */
    var form = $("#testForm");
    var formdata = $("#testForm").serializeArray();
    alert(formdata);
    var url = form.attr( 'action' );

    /* Send the data using post and put the results in a div */
    $.post( url, formdata,
      function( data ) {

        $( "#result_form" ).html(data.message);
      }, 'json'
    );
  });
});


function getAjaxData(resultid) {
	$.get('index.php?app=ajaxexamples&view=ajaxdata', function(data) {
		 
		  alert('Load was performed.');
			$("#"+resultid).html(data);
	});
	
}

//-->
</script>

<h1>Ajax Examples</h1>
<style>

h2 {
	color: blue;	
}
</style>

<h2>Loading static file</h2>

<input type="button" id="valueStaticLoadButton1" value="Click To Load" />

<pre id="result_staticfile1">...</pre>

<h2>Loading static file through Framework</h2>

<input type="button" id="valueStaticLoadButton2" value="Click To Load" />

<pre id="result_staticfile2">...</pre>

<h2>Store value to storage</h2>
<p>
Value: <input type="text" id="valuetestvalue" name="valuetestvalue" value="" /><input type="button" id="valueTestButton" value="Store" />
</p>

<pre id="result_valuestore">...</pre>

<h2>Store form to storage</h2>

<form id="testForm" action="index.php?app=ajaxexamples&view=storeposted">
Name: <input type="text" value="John" name="name" />
<br />
Address: <textarea name="address" rows="3" cols="40">Dallas, Texas</textarea>

<input type="submit" name="DoAjaxSend" value="Do Ajax Send" />
</form>

<pre id="result_form">...</pre>

<h2>Store plus/minus to storage</h2>

<p><span id="idplus">[+]</span> <span id="idminus">[-]</span></p>

<pre id="result_plusminus">...</pre>

<h2>Get dynamic ajax data</h2>

<input value="Do Ajax" type="button" id="button_getajaxdata" onclick="javascript:getAjaxData('result_getajaxdata')" />
<hr />

<pre id="result_getajaxdata">

</pre>
