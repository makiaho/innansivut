<?php
/**
 * 
 * @author Hannu Lohtander
 * @package wo2009
 * @subpackage library
 */

/**
 * 
 * @author munbuntu
 * @package wo2009
 * @subpackage library
 */

class SomeCSRF {
    const TOKENNAME = 'csrf';
    static $token;
    
	public static function newToken() {
            if (!isset(self::$token)) {
                self::$token = md5(uniqid(rand(), TRUE));
		// to session, with name csrftoken
		$session = SomeFactory::getSession();
		$session->set('csrftoken',self::$token);
		$session->set('csrftokentime',time());

            }
            return self::$token;
	}
	
	public static function isValid($token) {
		$session = SomeFactory::getSession();
		$csrftoken = $session->get('csrftoken','sadfasgagsagsadfsaf');
		// time is not used $csrftokentime = $session->get('csrftokentime',0);
		if ($csrftoken === $token) {
			return true;
		}
		return false;
	}
	
	
}