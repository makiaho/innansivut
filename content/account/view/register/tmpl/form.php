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
<h1><?php echo SomeText::_('taytapa lomake') ?></h1>

<form action='index.php?app=account&view=register&tmpl=form' method='post'>
<?php 
?>
<br>
<br>: <input type='text' name='username' value='<?php echo $username  ?>' />
<br />
Passwweweweord: <input type='password' name='password' value='' />
<br />
Password awwwgain: <input type='password' name='password2' value='' />
<br />
Email: <input type='text' name='email' value='<?php echo $email  ?>' />
<br />
Homepage: <input type='text' name='homepage' value='<?php echo $homepage  ?>' />
<br />
<br />

<table width="600" border="0" cellpadding="0" cellspacing="0" align="left">
<tr>
<td colspan="2" width="600" height="45" align="center"><p><b>Rekister&ouml;itymislomake</b></p></td> 
</tr><tr>
<td width="180" height="30"><p class="lomake" required="required">K&auml;ytt&auml;j&auml;nimi*</p></td> 
<td width="250" height="30"><input type="text" size="27" class="yhteystieto" name="kayttajanimi" required="required"></td>
</tr><tr>
<td width="180" height="30"><p class="lomake" required="required">Salasana*</p></td> 
<td width="250" height="30"><input type="text" size="27" class="yhteystieto" name="etunimi" required="required"></td>
</tr>
</table>


<input type="hidden" name="csrf" value="<?php /*todo, mistä tämä echo SomeCSRF::newToken() */?>" />
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
