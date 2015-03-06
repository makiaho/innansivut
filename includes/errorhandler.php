<?php
/**
* error handler set here.
*
* @package wo2009
*
*/

/**
* error handler set here.
*
* @param int $severity E_XXX codes http://fi2.php.net/manual/en/errorfunc.constants.php
* @param string $message error message
* @param string $filename
* @param int $lineno
*/
function exceptions_error_handler($severity, $message, $filename, $lineno) {
  if (error_reporting() == 0) {
    return;
  }
  
  if (error_reporting() & E_NOTICE) {
	//skip notice level errors to avoid everything being an exception
	if (class_exists('SomeResponse')) {
  	 SomeResponse::setBody("<p class='exception'>$message $filename $lineno</p>");
	}
	//echo "<p>$message $filename $lineno</p>";
	//exit;
	return;
  }
  
  if (error_reporting() & $severity) {
    SomeResponse::setBody("<p class='exception'>$message $filename $lineno</p>");
    throw new ErrorException($message, 0, $severity, $filename, $lineno);
  }
} 
set_error_handler("exceptions_error_handler");