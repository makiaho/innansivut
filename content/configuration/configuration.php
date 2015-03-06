<?php
defined('SOME_PATH') or die('Unauthorized access');


////
//// MUST BE ADMIN TO ACCESS HERE!
////

/*
$user = SomeFactory::getUser();
if ($user->getUserrole() != 'admin') {
	$app = SomeFactory::getApplication();
	$app->redirect('index.php?app=login', SomeText::_('MUST LOGIN AS ADMIN'));
	exit;
}
*/

someloader('some.application.controller');

if (!defined('PATH_CONTENT'))
define('PATH_CONTENT',dirname(__FILE__));


$cntrparam = SomeRequest::getCmd('cntr','default');
$cntrlclass= 'SomeController'. ucfirst($cntrparam);

include(PATH_CONTENT.DS.'controller'.DS. $cntrparam .'.php');

// default or install controller.
$controller = new $cntrlclass;

$controller->execute();
