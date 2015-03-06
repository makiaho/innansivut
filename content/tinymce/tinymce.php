<?php
defined('SOME_PATH') or die('Unauthorized access');
include(PATH_CONTENT.DS. 'controller' . DS. 'tinymce.php');
$controller = new SomeControllerTinymce();
$controller->execute();

$app = SomeFactory::getApplication();
$app->setTemplate('tinymce');