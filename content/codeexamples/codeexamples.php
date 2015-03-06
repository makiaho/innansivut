<?php
defined('SOME_PATH') or die('Unauthorized access');
include(PATH_CONTENT.DS.'controller.php');
$controller = new SomeControllerCE();
$controller->execute();