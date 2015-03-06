<?php
/**
* global response object that uses $_GLOBAL['_SomeResponse'] as storage for headers, and body.
* 
* <p>
* Usage:
* <code>
* SomeResponse::addHeader($str);
* SomeResponse::getHeaders();
* SomeResponse::setBody($body);
* SomeResponse::getBody();
* </code>
* </p>
* @package wo2009
* @subpackage library
*/

/**
* @package wo2009
* @subpackage library
*/
class SomeResponse{

	public static function addHeader($str) {
		//split from :
		//TODO validate, that there is : glyph
		$parts = explode(":",$str);
		$GLOBALS['_SomeResponse']['headers'][trim($parts[0])] = $parts[1];
	}
	
	public static function getHeaders() {
		//join key and value
		$headers = array();
		foreach ($GLOBALS['_SomeResponse']['headers'] as $k => $v) {
			$headers[] = "$k:$v";
		}
		return $headers;
	}
	
	public static function setBody($body) {
		if (!isset($GLOBALS['_SomeResponse'])) {
			$GLOBALS['_SomeResponse'] = array();
		}
	   if (!isset($GLOBALS['_SomeResponse']['body'])) {
            $GLOBALS['_SomeResponse']['body'] = array();
        }
		$GLOBALS['_SomeResponse']['body'][] = $body;
	}
	
	public static function replaceBody($body) {
		if (!isset($GLOBALS['_SomeResponse'])) {
			$GLOBALS['_SomeResponse'] = array();
		}

        $GLOBALS['_SomeResponse']['body'] = array();
       
		$GLOBALS['_SomeResponse']['body'][] = $body;
	}
	
	public static function getBody() {
		if (isset($GLOBALS['_SomeResponse']['body'])) {
			return join("",$GLOBALS['_SomeResponse']['body']);
		} else {
			return "";
		}
	}
	
	public static function send() {
		//headers
		$headers = array();
		if ( isset($GLOBALS['_SomeResponse']['headers']) && is_array($GLOBALS['_SomeResponse']['headers']) ) {
		foreach ($GLOBALS['_SomeResponse']['headers'] as $k => $v) {
			$headers[] = "$k:$v";
		}
		foreach ($headers as $h) {
			header($h);
		}
		}
		echo self::getBody();
	}
	


}