<pre>
THIS IS THINGS YOU CAN DO AT THE MVC EXTENSIONS.
</pre>

<h2>MVC and access to  library code and users and doing access control.</h2>


<?php

////////////////////////////////////////////////////////////////
///////////// 
// BASIC MVC WITHOUT EXTENSION TEMPLATES 
////////////
////////////////////////////////////////////////////////////////

someloader('some.application.controller');
class MyController extends SomeController {
    public function __construct() { // OPTIONAL
        parent::__construct();
    }
    
    public function display() {// optional
        $model = $this->getModel('my');
        $view = $this->getView('my');
    }
    
    // get here with ?app=my&view=dosomething
    // or alias
    // ?app=my&action=dosomething
    public function dosomething() {
        // create model, create view...
        
        // NEED TO REDIRECT TO NEW GET http-address?
        // IF THIS IS DONE, VIEW IS NOT RENDERED; EITHER VIEW OR REDIRECT
        $frontController = SomeFactory::getApplication();
        $frontController->redirect("?app=login");
    }
}

someloader('some.application.model');
// My -model must be like this in file model/my.php
class SomeModelMy extends SomeModel {
    
    public function __construct(array $options = array()) { // OPTIONAL
        parent::__construct($options);
    }
    
    public function doSomething() {
        
        // THE CODE IN THESE EXAMPLES USUALLY GO TO CONTROLLER, MODEL OR EVEN VIEW.
        
        ////////////////////////////////////////////////////////////////////////
        // LIBRARY IS IN THE folder ROOT/library/some
        // ANY LIBRARY FILE IS LOADED WITH LOADER:
        // some.user.user, some.session,session and some.application.application
        // some.database.row, some.language.language
        //  are loaded by the front controller
        // BUT mvc classes need to be loaded
        // someloader('some.application.controller');
        // someloader('some.application.model');
        // someloader('some.application.view');
        // and sometimes other classes too, but usually there 3 are enough
        // it is equivalent to write:
        // include SOME_LIBRARY . DS. 'some' . DS . 'paths-to-file' . DS. "file.php"
        
        // just as an example
        someloader('some.database.rows.demo');
        
        ////////////////////////////////////////////////////////////////////////
        // SESSION
        // It is also possible to change session storage to database
        //  at the configuration.php. Values to set are file|mysql
        $session = SomeFactory::getSession();
        $session->get('name_of_key', 'default-value');
        $session->set('name_of_key', 'value-to-set');
        $session->clear('name_of_key');
        
        ////////////////////////////////////////////////////////////////////////
        // REQUEST
        // all these prevent xss attack.
        $someInt = SomeRequest::getInt('age');
        $someAlphabets = SomeRequest::getCmd('action');
        $someString = SomeRequest::getString('address');
        $someWithHtml = SomeRequest::getString('htmlpost', '', 'POST', JREQUEST_ALLOWHTML );
        
        ////////////////////////////////////////////////////////////////////////
        //FILE UPLOAD, see example @ content/avatar
        $files = SomeRequest::get('files');
        
        
        ////////////////////////////////////////////////////////////////////////
        // DATABASE - ACTIVE RECORD
        // any active record row is like user row
        someloader('some.database.row');
        $userRow = SomeRow::getRow('user');
        $userRow->username = "xxx";
        $userRow->create();
        // OTHER CRUD METHODS ALSO AVAILABLE
        // Id is required for update, read and delete.
        // $userRow->id = [id];
        // $userRow->read();
        // $userRow->email = "me@me.me";
        // $userRow->update();
        // $userRow->delete();
        
        // YOU MAY PUT THE 'ROW' FILE UNDER EXTENSION TO TABLE FOLDER
        // IT THEN WORKS BUT ONLY WIHIN THE MVC OF THAT CONTENT
        // SEE content/crud/table/crud.php
        // YOU MAY AS WELL BUT THOSE FILES TOO TO LIBRARY/some/database/rows/
        
        // DATABASE - statement, execute
        // SEE php.net/pdo for database API
        // Also http://www.phpeveryday.com/articles/PDO-Introduction-PHP-Data-Object-P545.html
        // configuration.php need to have database configured
        $database = SomeFactory::getDBO();
        $stmn = $database->prepare("SELECT NOW() as now");
        $stmn->execute();
        $stdClass = $stmn->fetchObject();
        echo $stdClass->now;
        
        $stmn = $database->prepare("SELECT * FROM user");
        $stmn->execute();
        $rows = $stdClass = $stmn->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $row) {
            echo $row['username'];
        }
        // with safe parameters (prevents sql-injection)
        $stmn = $database->prepare("SELECT * FROM user WHERE id=?");
        $stmn->execute(array($userid));
        $row = $stdClass = $stmn->fetch(PDO::FETCH_ASSOC);
        
        
        // see more examples in content/crud and content/quote
        
        ////////////////////////////////////////////////////////////////////////
        // LANGUAGE
        // configuration.php has default value
        // ALSO; SET language to FC; usually not used like this
        $frontController->setLanguage('en_GB');
        // index.php?language=fi_FI GET/POST request sets language to session
        // what language is active?
        $language = $frontController->getLanguage();
        
        ////////////////////////////////////////////////////////////////////////
        // USING LANGUAGE AT THE TEMPLATE
        // site.ini is always loaded. Only the ini file of the current
        // extention is additionally loaded
        echo SomeText::_('LANGUAGE TOKEN AT THE INI FILE');
        
        ////////////////////////////////////////////////////////////////////////
        // SET TEMPLATE
        // configuration.php has default value
        $frontController = SomeFactory::getApplication();
        $frontController->setTemplate("red");
        
        ////////////////////////////////////////////////////////////////////////
        // REDIRECT (google http redirect - force browser to go to url)
        // usage is in the content/quotes/controller.php
        // -> if user has no access, redirect to lofin with message
        $frontController = SomeFactory::getApplication();
        $frontController->redirect("?app=login");
        
        // SET MESSAGE THAT IS AVAILABLE AT THE NEXT PAGE; NEXT REQUEST
        // MESSAGE GOES TO SESSION AND IS DELETED AUTOMATICALLY
        $frontController->redirect("?app=login", "PLEASE LOGIN FIRST!");
        // and in the next page access the message
        $message = $frontController->getSysMessage();
        // see content/login/view/login/tmp/default.php
        // -> there system message is echoed
        
        ////////////////////////////////////////////////////////////////////////
        // USER AND USER ROLE AND CHECKING USER ROLE
        // best example is content/quotes/quotes.php
        // and
        // content/quotes/controller.php
        $user = SomeFactory::getUser();
        $role = $user->getUserrole(); // guest / admin / registered
        
        ////////////////////////////////////////////////////////////////////////
        // RBAC
        
        // ADD ACCESS RULES: see content/quotes/quotes.php
        // ALSO SomeRbac contructor sets access rules
        // rules are role-map arrays. See examples
        
        // add rules. Dots are just for readability
        $rbacObject = SomeRbac::getInstance();
        // add access to registered to do users.browse
        $rbacObject->addActions("registered", array('users.browse'));
        // add access to guest to do allowed.to.register and user.read
        $rbacObject->addActions("guest", array('allowed.to.register', 'user.read'));
                
        // check access, can this user do users.browse?
        $hasAccess = SomeAuth::_($user,'users.browse'); // true, because is added
        if (!$hasAccess) throw new Exception("ACCESS DENIED");
        
        ////////////////////////////////////////////////////////////////////////
        // ERRORS!
        // WHERE DID THE ERROR GO?
        
        // see ROOT/error.log if you see white screen and no errors.
        // index.php sets level with error_reporting()
        // xampp also has error log at C:\xampp\apache\logs
        
        ////////////////////////////////////////////////////////////////////////
        // CSRF
        $token = SomeCSRF::newToken();
        // put to get or post
        // <form action="...?... &csrftoken=$token" ...>
        
        // and at the request where token is validated
        $postedToken = SomeRequest::getCmd('csrftoken');
        if (! SomeCSRF::isValid($postedToken) ) throw new Exception("ACCESS DENIED FRO CSRF");
    
        
        
    }
    
    public function getMyModelVar() {
        return "example-var-value";
    }
    
}

someloader('some.application.view');
// My -view must be like this in file view/my/my.php
class SomeViewMy extends SomeView {
    
    public function __construct(array $options = array()) { // OPTIONAL
        parent::__construct($options);
    }
    
    public function display($tmpl = 'default') { // OPTIONAL
        parent::display($tmpl);
    }
    
    public function my() {
        // load template my
        $this->user = SomeFactory::getUser();
        $model = $this->getModel();
        $session = SomeFactory::getSession();
        $this->myvar = $session->get('myvar', 'default-value');
        $this->language = SomeFactory::getApplication()->getLanguage();
        $this->sysMessage = SomeFactory::getApplication()->getSysMessage();
        $currentMasterTemplate = SomeFactory::getApplication()->getTemplate();
        // ... and values from model
        // $this->myModelVar = $this->getModel()->getMyModelVar();
        
        // load tmpl/my.php
        parent::display('my');
    }
}

// view/my/tmpl/my.php
///////////////////// MY TPL EXAMPLE ////////////////////
$user = SomeFactory::getUser();

?>

<h2>Examples</h2>
<?php 
if( empty($this->sysMessage)) {
    echo "Sysmessage: {$this->sysMessage}";
}
?>
<hr />
Hello <?php echo $user->getUsername() ?>
<hr />
Change to finnish <a href="?language=fi_FI">go</a>
<hr />
my var <?php echo $this->myvar ?>
<hr />
Date: <?php echo date('d.n.y H:i:s') ?>
<hr />

<?php
/////////////////////////// END MY TMPL EXAMPLE
?>
