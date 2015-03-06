<?php
defined('SOME_PATH') or die('Unauthorized access');
include(PATH_CONTENT.DS. 'controller' . DS. 'controller.php');
$controller = new SomeControllerWeek7dhtml();
$controller->execute();

$app = SomeFactory::getApplication();
$app->setTemplate('dhtmlexamples');