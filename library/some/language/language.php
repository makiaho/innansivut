<?php
/**
* SomeLanguage class is storage for language tokens.
*
* @package wo2009
* @subpackage library
* 
*/
SomeLoader::import('library.some.language.ilanguage', SOME_PATH.DS.'interface',null);
/**
* SomeLanguage
*
* @package wo2009
* @subpackage library
* 
*/
class SomeLanguage implements ISomeLanguage {
  
  private $language;
  private $strings = array();

  public function __construct($language='en_GB') {
	$this->language = $language;
	$this->load('site');
  }

  /**
  * default language translation function.
  *
  * @param string $str token
  * @param boolean $jssafe javascript safe
  * @return string text
  */
  public function _($str,$jssafe=false) {
	if (isset($this->strings[$str])) {
		return $this->strings[$str];
	} else {
		return $str;
	}
  }
  /**
  * @param string $token language token
  * @return string translated token
  */
  public function get($token) {
	return $this->_($token);
  }
  /**
  * set new language token and override old if there is one.
  * @param string $token
  * @param string $value
  */
  public function set($token,$value) {
	$this->strings[$token] = $value;
  }
  /**
  * load new language file to translation table.
  * @param string $file part of the .ini file that defines file.
  * @return boolean true if file was found and loaded
  */
  public function load($file) {
	$filename = SOME_LANGUAGE.DS.$this->language.DS.$file.'.'. $this->language.'.ini';
	if (!file_exists($filename)) {
		//echo "file_exists($filename)<br />\n";
		return;
	}
	//content as array, file()
	$lines = file($filename);
	//each line that does not start with # and has = is plitted to two, to get token and string
	foreach($lines as $line) {
		if ($line && $line[0] != '#' && $line[0] != '/' && strpos($line,'=') ) {
			$parts = explode('=',$line,2);
			$this->strings[$parts[0]] = $parts[1];
		}
	}
	return true;
  }
  
}