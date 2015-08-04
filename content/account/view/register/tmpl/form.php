<html>
    <head>

        
 
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

    </head>

<?php
//register form comes here
$userdata = $this->userdata;
$errors = $this->errors;
//käyttäjänimenä käytetään sähköpostiosoitetta
$username = isset($userdata['email']) ? $userdata['email'] : '';
$email    = isset($userdata['email'])    ? $userdata['email']    : '';


//täytetään kentät, jos käyttäjä on jo kerran arvon antanut

$email2    = isset($userdata['email2'])    ? $userdata['email2']    : '';
$firstname    = isset($userdata['firstname'])    ? $userdata['firstname']    : '';
$lastname    = isset($userdata['lastname'])    ? $userdata['lastname']    : '';
$streetaddress    = isset($userdata['streetaddress'])    ? $userdata['streetaddress']    : '';
$zipcode    = isset($userdata['zipcode'])    ? $userdata['zipcode']    : '';
$city    = isset($userdata['city'])    ? $userdata['city']    : '';
$dateofbirth    = isset($userdata['dateofbirth'])    ? $userdata['dateofbirth']    : '';
$country    = isset($userdata['country'])    ? $userdata['country']    : '';
$phonenumber    = isset($userdata['phonenumber'])    ? $userdata['phonenumber']    : '';

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
<table width="683">
			<tr>
			<td width="450">
			</td>
			<td width="233"><p class="lomake"><a href="?app=login"><u>Kirjaudu sis&auml;&auml;n</u></a></p>
			</td></tr>
			</table>
<br>

 <form id='formi' action='index.php?app=account&view=register&tmpl=form' method='post'>
<table width="430" border="0" cellpadding="0" cellspacing="0" class="lomake" align="left">
<tr>
<td width="430" align="left" valign="top">

<table width="430" border="0" cellpadding="0" cellspacing="0" align="left">
<tr>
<td colspan="2" width="430" height="45" align="center"><p><b>Rekister&ouml;idy Oman Elämäni Luojan käyttäjäksi</b></p></td> 
</tr><tr>
<td width="180" height="30"><p class="lomake">S&auml;hk&ouml;posti*</p></td>
<td width="250" height="30"><input type="email" size="27" class="yhteystieto" name="email" value= "<?php echo $email  ?>" required"></td>
</tr><tr>
<td width="180" height="30"><p class="lomake">Vahvista s&auml;hk&ouml;posti*</p></td>
<td width="250" height="30"><input type="email" size="27" class="yhteystieto" name="email2" value= "<?php echo $email2  ?>" ></td>
</tr><tr>
<td width="180" height="20"><p class="lomake" >Salasana*</p></td> 
<td width="250" height="20"><input type="text" size="27" class="yhteystieto" name="password" ></td>
</tr><tr>
<td width="180" height="30"><p class="lomake">Vahvista salasana*</p></td>
<td width="250" height="30"><input type="" size="27" class="yhteystieto" name="password2" ></td>
</tr><tr>
<td width="180" height="30"><p class="lomake" required="">Etunimi</p></td> 
<td width="250" height="30"><input type="text" size="27" class="yhteystieto" name="firstname" value= "<?php echo $firstname  ?>" "></td>
</tr><tr>
<td width="180" height="30"><p class="lomake" required="">Sukunimi</p></td> 
<td width="250" height="30"><input type="text" size="27" class="yhteystieto" name="lastname" value= "<?php echo $lastname  ?>" ></td>
</tr><tr>
<td width="180" height="30"><p class="lomake">Katuosoite</p></td>
<td width="250" height="30"><input type="text" size="27" class="yhteystieto" name="streetaddress" value= "<?php echo $streetaddress  ?>" ></td>
</tr><tr>
<td width="180" height="30"><p class="lomake">Postinumero</p></td>
<td width="250" height="30"><input type="text" size="27" class="yhteystieto" name="zipcode" value= "<?php echo $zipcode  ?>" ></td>
</tr><tr>
<td width="180" height="30"><p class="lomake">Postitoimipaikka</p></td>
<td width="250" height="30"><input type="text" size="27" class="yhteystieto" name="city" value= "<?php echo $city  ?>" ></td>
</tr><tr>
<td width="180" height="30"><p class="lomake">Maa</p></td>
<td width="250" height="30"><input type="text" size="27" class="yhteystieto" name="country" value= "<?php echo $country  ?>" ></td>
</tr><tr>
<td width="180" height="30"><p class="lomake">Puhelinnumero</p></td>
<td width="250" height="30"><input type="text" size="27" class="yhteystieto" name="phonenumber"  value= "<?php echo $phonenumber  ?>"></td>

</tr><tr>
<td width="180" height="30"><p class="lomake">Syntymäaika</p></td>
<td width="250" height="30"><input type="text" size="27" class="yhteystieto" name="dateofbirth" value= "<?php echo $dateofbirth  ?>" ></td>

</tr>

</tr>

 

</td>
</tr><tr>
<td width="65"></td>
 <td width="365" height="65" align="left" valign="top">
<input type="hidden" name="csrf" value="<?php /*todo CSRF security echo SomeCSRF::newToken()*/ ?>" />
<input type='submit' name='submit' value='Tallenna tiedot' /></td>


  </td>  
  </tr>
  </table>
  </form> 

</td>
</tr>
</table>






