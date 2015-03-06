<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

someloader('some.application.controller');

class SomeControllerXss extends SomeController {
    
    public function display() {
        // user registration form
        $username = "anonymous" . rand(1,2000);
        ?>
<form action='index.php?app=security&attack=xss&action=posted' method='post'>
Username: <input type='text' name='username' value='<?php echo $username ?>' />
<br />
Password: <input type='password' name='password' value='moimoimoi' />
<br />
Password again: <input type='password' name='password2' value='moimoimoi' />
<br />
Email: <input type='text' name='email' value='not@important.my' />
<br />
Homepage: <input type='text' name='homepage' value='<script>alert(1);</script>' />
<br />
<br />

<input type='submit' name='smit' value='Register' />

</form>

        <?php
        
    }
    
    public function posted() {
        // without security put to database.
        $username = SomeRequest::getString('username');
        $password = SomeRequest::getString('password');
        $email = SomeRequest::getString('email');
        $homepage = $_POST['homepage'];
        someloader('some.database.row');
        /* @var $userRow SomeRowUser */
        $userRow = SomeRow::getRow('user');
        $userRow->username = $username;
        $userRow->password = $password;
        $userRow->email = $email;
        $userRow->homepage = $homepage;
        $userRow->create();
        echo "<a href='index.php?app=security&attack=xss&action=homepages'>index.php?app=security&attack=xss&action=homepages</a>";
    }
    
    public function homepages() {
        $db = SomeFactory::getDBO();
        $results = $db->query("SELECT username,homepage FROM someuser");
        $rows = $results->fetchAll(PDO::FETCH_NUM);
        foreach ($rows as $row) {
            echo "$row[0]: $row[1]<br />";
        }
    }
    
    
    
}

