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
<br>Username: <input type='text' name='username' value='<?php echo $username  ?>' />
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
<input type="hidden" name="csrf" value="<?php /*todo, mistä tämä echo SomeCSRF::newToken() */?>" />
<input type='submit' name='smit' value='Tallenna tiedot' />

</form>


 
<table width="430" border="0" cellpadding="0" cellspacing="0" align="left">

<form action='index.php?app=account&view=register&tmpl=form' method='post'>
<?php 
?>
<tr>
<td colspan="2" width="430" height="45" align="center"><p><b>Rekister&ouml;idy Oman Elämäni Luojan käyttäjäksi</b></p></td> 
</tr><tr>
<td width="180" height="30"><p class="lomake">S&auml;hk&ouml;posti*</p></td>
<td width="250" height="30"><input type="email" size="27" class="yhteystieto" name="sposti" required="required"></td>
</tr><tr>
<td width="180" height="30"><p class="lomake">Vahvista s&auml;hk&ouml;posti*</p></td>
<td width="250" height="30"><input type="email" size="27" class="yhteystieto" name="sposti" required="required"></td>
</tr><tr>
<td width="180" height="20"><p class="lomake" required="required">Salasana*</p></td> 
<td width="250" height="20"><input type="text" size="27" class="yhteystieto" name="password" required="required"></td>
</tr><tr>
<td width="180" height="30"><p class="lomake">Vahvista salasana*</p></td>
<td width="250" height="30"><input type="" size="27" class="yhteystieto" name="password" required="required"></td>
</tr><tr>
<td width="180" height="30"><p class="lomake" required="required">Etunimi</p></td> 
<td width="250" height="30"><input type="text" size="27" class="yhteystieto" name="etunimi" required=""></td>
</tr><tr>
<td width="180" height="30"><p class="lomake" required="required">Sukunimi</p></td> 
<td width="250" height="30"><input type="text" size="27" class="yhteystieto" name="sukunimi" required=""></td>
</tr><tr>
<td width="180" height="30"><p class="lomake">Katuosoite</p></td>
<td width="250" height="30"><input type="text" size="27" class="yhteystieto" name="katuosoite" required=""></td>
</tr><tr>
<td width="180" height="30"><p class="lomake">Postinumero</p></td>
<td width="250" height="30"><input type="text" size="27" class="yhteystieto" name="postinumero" required=""></td>
</tr><tr>
<td width="180" height="30"><p class="lomake">Postitoimipaikka</p></td>
<td width="250" height="30"><input type="text" size="27" class="yhteystieto" name="postitoimip" required=""></td>
</tr><tr>
<td width="180" height="30"><p class="lomake">Syntymäaika</p></td>
<td width="250" height="30"><input type="text" size="27" class="syntyma-aika" name="Syntyma-aika" required=""></td>
</tr>
<input type="hidden" name="csrf" value="<?php /*todo, mistä tämä echo SomeCSRF::newToken() */?>" />
<input type='submit' name='smit' value='Tallenna tiedot' />

</form>
<hr />
<a href='index.php?app=account&view=register&tmpl=form&language=en_GB'>English</a><br />
<a href='index.php?app=account&view=register&tmpl=form&language=fi_FI'>Suomi</a><br />

</table>





