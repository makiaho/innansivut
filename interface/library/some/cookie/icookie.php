<?php
/**
* ISOmeCookie acts as mediator between user sent and received cookies.
* @package wo2009
* @subpackage library
*/

/**
* @package wo2009
* @subpackage library
*/
interface ISomeCookie {

	# can not declare protected function, but as this is singleton, constructor should
	# be created as protected to disallow direct new SomeCookie calls.
	# protected function __construct(array $options);
	
	/**
	* singleton.
	* @param array $options are options that might be needed. None is known at the moment.
	*/
	
	public static function getInstance(array $options = array());
	
	/**
	* method to add cookie with all the information in array.
	* <p>See also http://www.cs.uta.fi/wo/wo2009/index.php?app=lectures&tpl=lecture&l=cookie.
	* argument array has keys of cookie's parts: name, value expire, path, etc...</p>
	* @param array $cookie associative array having keys and values
	*/
	
	public function addCookie(array $cookie);
	
	/**
	* method to get a cookie currently set or fetched from $_COOKIE
	* @param string $cookiename cookie's name to expected being available
	* @return array $cookie or null, if no cookie is found
	*/
	
	public function getCookie($cookiename);
	
	/**
	* method to get all the cookies currently set or fetched from $_COOKIE
	* @return array $cookies as 2 dimensional array
	*/
	
	public function getCookies();
	
	/**
	* you do not have to implement this. implementing classes could create method, with throw exception in it.
	*/
	
	public function replaceCookie(array $cookie);

	/**
	* method for sending cookies at once.
	* this method sends all but session cookie. session cookie must not be touched in any way.
	*/
	
	public function send();
	
	/**
	* method to delete cookie from $_COOKIE and this instance
	* @param string $cookiename name of cookie to be deleted.
	* @return true, if there was cookie that could be deleted, false if cookie did not exist
	*/
	
	public function delete($cookiename);
	
	/**
	* method to set name, value, expire, path, domain, secure or httponly attribute to new value.
	* no need to implement this before it is needed. Just create method that throws exception(not implementd)
	* @param string $cookiename that is changed
	* @param string $parametername that is replaced
	* @param $newvalue value set
	* @return true, if there was cookie that could be updated, false if cookie did not exist or could not be updated.
	* @throws Exception if setting a value that can not be used, f.ex. domain that is not where we are!
	*/
	
	public function update($cookiename,$parametername,$newvalue=null);
	
}