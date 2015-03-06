<?php
/**
* ISomeLanguage class is storage for language tokens.
*
* @package wo2009
* @subpackage library
* 
*/

/**
* interface for SomeLanguage
*
* <p>Somelanguage is "token to translation" class. It can be used to load language files and make translations.
* <br>
* <code>
* echo SomeText::_('FRONTPAGE');
* echo SomeText::sprintf('BREADCRUMB',array( SomeText::_('HOMEPAGE'), SomeText::_('USER'),SomeText::_('LOGIN')));
* SomeText::printf('HELLOUSER',$username);
* </code>
* </p>
*
* @package wo2009
* @subpackage library
* 
*/
interface ISomeLanguage {
  

  public function __construct($language='en_GB');

  /**
  * default language translation function.
  *
  * @param string $str token
  * @param boolean $jssafe javascript safe
  * @return string text
  */
  public function _($str,$jssafe=false);
  
  /**
  * @param string $token language token
  * @return string translated token
  */
  public function get($token);
  
  /**
  * set new language token and override old if there is one.
  * @param string $token
  * @param string $value
  */
  public function set($token,$value);
  
  /**
  * load new language file to translation table.
  * @param string $file part of the .ini file that defines file.
  * @return boolean true if file was found and loaded
  */
  public function load($file);
  
}