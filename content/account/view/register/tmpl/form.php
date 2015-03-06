<?php
//register form comes here

$userdata = $this->userdata;
$errors = $this->errors;

$username = isset($userdata['username']) ? $userdata['username'] : '';
$email    = isset($userdata['email'])    ? $userdata['email']    : '';
$homepage = isset($userdata['homepage']) ? $userdata['homepage'] : '';




if (!empty($errors)) {
    ?>
    <strong><i><?php echo SomeText::_('CHECK FORM') ?></i></strong><br />
    <?php
    foreach ($errors as $error) {
        echo "<span style='color:red'>$error</span><br />\n";
    }
    echo "<br /><br />\n";

}

?>
<h1><?php echo SomeText::_('FILL FORM H1') ?></h1>

<form action='index.php?app=account&view=register&tmpl=form' method='post'>
<?php echo SomeText::_('USERNAME') ?>: <input type='text' name='username' value='<?php echo $username  ?>' />
<br />
Password: <input type='password' name='password' value='' />
<br />
Password again: <input type='password' name='password2' value='' />
<br />
Email: <input type='text' name='email' value='<?php echo $email  ?>' />
<br />
Homepage: <input type='text' name='homepage' value='<?php echo $homepage  ?>' />
<br />
<br />

<input type='submit' name='smit' value='Register' />

</form>

<br />
Note:<br />
Username is mandatory and can have only alphabets, numbers and letters _ and -.
<br />
Email  is mandatory.
<br />
Homepage is mandatory.
<hr />
<a href='index.php?app=account&view=register&tmpl=form&language=en_GB'>english</a><br />
<a href='index.php?app=account&view=register&tmpl=form&language=fi_FI'>finnish</a><br />
