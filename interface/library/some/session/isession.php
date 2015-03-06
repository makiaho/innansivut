<?php
/**
* @package wo2009
* @subpackage library
*/

/**
* Session interface.
*
* <p>Usage Example:
* <code>
* $session = SomeFactory::getSession();
* $session->set('key_foo',1);
* //page where value is loaded
* $session = SomeFactory::getSession();
* $key_foo = $session->get('key_foo');
* //unset session variable
* $session->clear('key_foo');
* </code>
* </p>
* @package wo2009
* @subpackage library
*/

interface ISomeSession {
    
    /** constructor will create storage thats type is given with $store parameter */
    public function __construct($store = 'none', $options = array());
    
    public static function getInstance($handler,$options=array());
    

    
    /** 
    * set name to value, return old value if found 
    * @param string $name _SESSION superglobal key
    * @param mixed $value key value
    */
    public function set($name,$value);
    /** 
    * get the value, or if it does not exits, return argument default
    * @param string $name name of the _SESSION hash
    * @param mixed $default value to return if $name is not found in _SESSION
    * @return mixed value
    */
    
    public function get($name,$default=null);
    
    /**
    * unset the value using php language construct unset().
    * @param string $name key in the _SESSION hash.
    */
    
    public function clear($name);
    
    /** this closes php session using session function */
    
    public function close();
    
    /** this destroys session, also the session cookie and empties $_SESSION superglobal */
    
    public function destroy();

}