<?php
defined('SOME_PATH') or die('Unauthorized access');
include(PATH_CONTENT.DS.'controller'.DS.'default.php');
$controller = new SomeControllerDefault();
$controller->execute();

$app = SomeFactory::getApplication();
$app->setTemplate('red');
?>