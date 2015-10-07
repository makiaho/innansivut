<?php
defined('SOME_PATH') or die('Unauthorized access');
include(PATH_CONTENT.DS.'controller'.DS.'kurssisivu.php');
$controller = new SomeControllerKurssisivu();
$controller->execute();
?>