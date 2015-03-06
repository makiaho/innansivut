<h1><?php echo SomeText::_('USER CONTENT'); ?></h1>

This is default template for register view.
<br />
<?php
//only, if users userrole is guest. Else she/he is logged in
$user = SomeFactory::getUser();

if ( trim($user->getUserrole()) === 'guest') {
?>
User register form is here: <a href='index.php?app=account&tmpl=form'>register</a>
<br />
Log in is here: <a href='index.php?app=login&view=login'>login</a>
<?php
} else {
?>
Logout is here: <a href='index.php?app=login&view=logout'>logout</a>
<?php
}
?>
<hr />
Run test on your someuser and database installation here:<br />
<a href='index.php?app=account&view=test'>someuser test</a>
<hr />
<p>As an example of update task, you can change roles of the users here:
<a href='index.php?app=account&view=roletest'>Roles Test</a>
</p>
<?php


?>
