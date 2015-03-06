<?php
/**
* @package wo2009
* @subpackage library
*/

/**
* @package wo2009
* @subpackage library
*/

interface ISomeSessionStorage {
    

    /**
    * this is factory method. Using the driver, the correct handler class for session storage should be fetched.
    * then that class is given with correct methods to session_set_save_handler calllback parameters.
    * @param string $driver 'file' or 'database'
    * @param array $options some additional options, if needed, to storage class cosntructor.
    * @return ISessionStorage implementation
    */
    public static function getInstance($driver = 'none', $options = array());
    
    /**
    * @param string $save_path, that is obsolete if file is not used.
    * @param string $session_name ususally if not overriden, PHPSESSID. Is used as cookie name.
    * @return true
    */
    function open($save_path, $session_name);
    
    /**
    *
    * @return true
    */
    function close();
    /**
    * @param string $key session id
    * @return string type, even if it is just empty string - "".
    */
    function read($key);
    /**
    * @param string $key session id
    * @param string $value session serialized string
    * @return boolean true of false
    */
    function write($key, $value);
    /**
    *
    * @return true
    */
    function destroy($id);
    /**
    *
    * @return true
    */
    function gc($maxlifetime);
    
        /**
    * Register the functions of this class with PHP's session handler
    *
    * @access public
    * @param array $options optional parameters
    */
    function register( $options = array() );
    
    #this is given here on purpose, to show where the session handlers are set.
    # class register from __construct
    #function register( $options = array() )
    #{
    #   // use this object as the session handler
    #   session_set_save_handler(
    #       array($this, 'open'),
    #       array($this, 'close'),
    #       array($this, 'read'),
    #       array($this, 'write'),
    #       array($this, 'destroy'),
    #       array($this, 'gc')
    #   );
    #}


}