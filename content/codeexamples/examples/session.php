
<h2>Getting, Setting nad Cleaning value from session.</h2>
<pre>
$session = SomeFactory::getSession();
$session->set('username','admin');
// if no username is found in the session anonymous is returned.
$username = $session->get('username','anonymous');

$session->clear('username');
</pre>

