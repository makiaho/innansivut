<?php
defined('SOME_PATH') or die('Unauthorized access');
/**
* @package content
* @subpackage ngg
*/

#
# this is ngg content package bootstrap
# 


#
# create controller here and call its execute. See 
#  content/example, content/hello  for examples.
#

include(PATH_CONTENT.DS.'controller'.DS.'default.php');
$c = new SomeControllerDefault();
$c->execute();
