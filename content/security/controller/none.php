<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

someloader('some.application.controller');

class SomeControllerNone extends SomeController {
    
    public function display() {
        ?>
<a href="index.php?app=security&attack=xss">Xss</a>
<br />
<a href="index.php?app=security&attack=sqlinjection">Sql -injection</a>
<br />
<a href="index.php?app=security&attack=csrfclient">CSRF Client</a>
<br />



        <?php
    }
}