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



 <form action='index.php?app=account&view=register&tmpl=form' method='post'>
<table width="430" border="0" cellpadding="0" cellspacing="0" class="lomake" align="left">
<tr>
<td width="430" align="left" valign="top">

<table width="430" border="0" cellpadding="0" cellspacing="0" align="left">
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
<td width="250" height="30"><input type="text" size="27" class="yhteystieto" name="Syntyma-aika" required=""></td>

</tr><tr>
<td width="180" height="30"><p class="lomake">Käyttäjänimi</p></td>
<td width="250" height="30"><input type="text" size="27" class="yhteystieto" name="username" required=""></td>
</tr><tr>
<td width="180" height="30"><p class="lomake">Salasana</p></td>
<td width="250" height="30"><input type="text" size="27" class="yhteystieto" name="password" required=""></td>
</tr><tr>
<td width="180" height="30"><p class="lomake">Vahvista salasana</p></td>
<td width="250" height="30"><input type="text" size="27" class="yhteystieto" name="password2" required=""></td>

</tr>
</td>
</tr><tr>
<td width="65"></td>
 <td width="365" height="65" align="left" valign="top">
<input type="hidden" name="csrf" value="<?php /*todo, mistä tämä echo SomeCSRF::newToken() */?>" />
<input type='submit' name='submit' value='Tallenna tiedot' /></td>


  </td>  
  </tr>
  </table>
  </form> 

</td>
</tr>
</table>






