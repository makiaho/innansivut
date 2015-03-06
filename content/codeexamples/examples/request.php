
<h2>Getting Int, Float, Cmd, String or array from request.</h2>
<pre>
$someint   = SomeRequest::getInt('age',0);
$somefloat = SomeRequest::getFloat('weight',0.0);
$somecmd   = SomeRequest::getCmd('page','index');
// if no peopleids is present, empty array is returned
$somearray = SomeRequest::getCmd('peopleids',array());
</pre>

<h2>Getting HTML from request.</h2>
<p>
This is needed for example when TinyMCE generated HTML is used. Only safe html is passed through.
</p>
<pre>
// from the POST from the variable content data and keep safe html tags.
$withsafehtml = SomeRequest::getString('content','','post',JREQUEST_ALLOWHTML);
</pre>
