<?php
defined('SOME_PATH') or die('Unauthorized access');
/**
* this file is very simple bootsrap file that serves as default content.
* @package content
* @subpackage frontpage
*/


include(PATH_CONTENT.DS.'controller'.DS.'default.php');
$controller = new SomeControllerDefault();
$controller->execute();
