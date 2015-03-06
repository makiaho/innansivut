<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


someloader('some.application.controller');

class SomeControllerSqlinjection extends SomeController {
    
    public function display() {
        $user = SomeFactory::getUser();
        
        ?>
<h2>Username: <?php echo $user->username ?></h2>
<form action='index.php?app=security&attack=sqlinjection&action=sqlinjection' method='post'>
Username: <input type='text' name='username' value='' />
<br />
Password: <input type='password' name='password' value='' />
<br />
<input type='submit' name='smit' value='LogIn' />
</form>
<pre>asfa45343245sdf' OR username="admin" -- '</pre>
        <?php
    }
    
    public function sqlinjection() {
        // LOGIN.
        $db = SomeFactory::getDBO();
        $username = $_POST['username'];
        $password = $_POST['password'];
        echo "<pre>SELECT * FROM someuser WHERE username='$username' AND password='$password'</pre>";
        $result = $db->query("SELECT * FROM someuser WHERE username='$username' AND password='$password'");
        if ($result->rowCount() > 0) {
            echo "At least one row found.<br />";
            $userStd = $result->fetchObject();
            $user = SomeFactory::getUser();
            $user->id = $userStd->id;
            $user->username = $userStd->username;
            $user->email = $userStd->email;
            $user->homepage = htmlentities($userStd->homepage);
            $user->userrole = $userStd->userrole;
            //$frontController = SomeFactory::getApplication();
            //$frontController->redirect("index.php?app=security&attack=sqlinjection&action=whoami");
        } else {
            echo "No rows found.<br />";
        }
        
        // WHOAMI?
        $userFromSession = SomeFactory::getUser();
        echo "I AM: [$userFromSession->username]";
        echo "<hr />";
        
    }
    
    public function whoami() {
        $userFromSession = SomeFactory::getUser();
        var_dump($userFromSession);
        echo "I AM: [$userFromSession->username]";
        echo "<hr />";
    }
}
