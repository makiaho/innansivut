<?php
include dirname(__FILE__) . DS. "index.php";

?>

<h1>Rating Plugin</h1>

<script src='template/dhtmlexamples/rating/jquery.MetaData.js' type="text/javascript" language="javascript"></script>
<script src='template/dhtmlexamples/rating/jquery.rating.js' type="text/javascript" language="javascript"></script>
<link href='template/dhtmlexamples/rating/jquery.rating.css' type="text/css" rel="stylesheet"/>
<!--

http://api.jquery.com/ready/
 
All three of the following syntaxes are equivalent:

    $(document).ready(handler)
    $().ready(handler) (this is not recommended)
    $(handler)


 -->
<script type="text/javascript">
$(function(){
 $('.auto-submit-star12').rating({
  callback: function(value, link){
   // 'this' is the hidden form element holding the current value
   // 'value' is the value selected
   // 'element' points to the link element that received the click.
   alert("The value selected was '" + value + "'\n\nWith this callback function I can automatically submit the form with this code:\nthis.form.submit();");
   
   // To submit the form automatically:
   //this.form.submit();
   
   // To submit the form via ajax:
   //$(this.form).ajaxSubmit();
  }
 });
});
</script>

<form action="index.php?app=dhtmlexamples&view=ratingplugin" method="post">

<div class="Clear">
Rating 1:
(1 - 3)
<input class="auto-submit-star12" type="radio" name="test-3A-rating-1" value="1" />
<input class="auto-submit-star12" type="radio" name="test-3A-rating-1" value="2" />
<input class="auto-submit-star12" type="radio" name="test-3A-rating-1" value="3" />
</div>
<br />
<input type="submit" name="smitrating" value="Send" />
</form>

<h2>Posted value</h2>

<p>
<?php 

echo SomeRequest::getInt('test-3A-rating-1',-1);
?>
</p>

<h2>Without dhtml</h2>

<div class="Clear">
Rating 1:
(1 - 3)
<input class="noclass" type="radio" name="test" value="1" />
<input class="noclass" type="radio" name="test" value="2" />
<input class="noclass" type="radio" name="test" value="3" />
</div>
<br />
<input type="submit" name="smitrating" value="Send" />