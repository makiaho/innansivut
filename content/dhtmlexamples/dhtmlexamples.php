<?php
defined('SOME_PATH') or die('Unauthorized access');
include(PATH_CONTENT.DS.'controller'.DS.'dhtmlexamples.php');
$controller = new SomeControllerDhtmlexamples();
$controller->execute();

$app = SomeFactory::getApplication();
$app->setTemplate('dhtmlexamples');