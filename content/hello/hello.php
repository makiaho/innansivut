<?php
defined('SOME_PATH') or die('Unauthorized access');
include(PATH_CONTENT.DS.'controller'.DS.'hello.php');
$controller = new SomeControllerHello();
$controller->execute();
?>