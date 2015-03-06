<?php
/**
* ISOmeCookie acts as mediator between user sent and received cookies.
* @author Hannu Lohtander
* @package wo2009
* @subpackage library
*
*/


/**
* @package wo2009
* @subpackage library
*/

class SomeCookie {

	/**
	* this array holds one array for each cookie. Cookies one item has keys:
    * name, value, expiry,path,domain,secure,httponly
    * <code>
    * $cookies = array(
    *   'COOKIES NAME' => array(
    *     'name' => null,
    *     'value' => null,
    *     'expiry' => time(),
    *     'path' => '/',
    *     'domain' => 'www.cs.uta.fi'
    *   ),
    *   'COOKIES NAME' => array(
    *      ...
    *   ),
    *   ...
    * )</code>
	*/
	protected $cookies = array();
	
	/**
	* this cvariable holds data for cookies that must be deleted, 
	*  expiry given to the past, are put to this array.
	* when callind send, it must send these cookies too in order to make browser delete cookies.
	* Must be array of arrays like member $cookies.
	*/
	protected $deleted = array();
	
	protected function __construct($options) {
		//load cookies from $_COOKIE. create copy...
		foreach ($_COOKIE as $k => $v)
		$this->cookies[$k] = array(
			'name' => $k,
			'value' => $v
		);
	}
	
	public static function getInstance(array $options = array()) {
		# this is singleton
		static $instance;
		if (!$instance) {
			$instance = new self($options);
		}
		return $instance;
	}
	
	public function addCookie(array $cookie) {
	   # you need to impelent adding cookie to this->cookie
	   $this->cookies[$cookie['name']] = $cookie;
	}
	
	public function getCookie($cookiename) {
		# need to get cookie from this->cookies by cookiename
		if (isset($this->cookies[$cookiename]))
		return $this->cookies[$cookiename];
		else
		return null;
	}
	
	public function getCookies() {
		return $this->cookies;
	}
	
	public function replaceCookie(array $cookie) {
		throw new Exception('Not implemented');
	}
	
	/**
	* method to send cookies. use setcookie or setrawcookie
    *
	*/
	
	public function send() {
		foreach ($this->cookies as $singlecookie) {
			if (session_name() === $singlecookie['name']) continue;
   			setcookie($singlecookie['name'],stripslashes( $singlecookie['value'] ));
		}
		//and cookies to be deleted
		foreach ($this->deleted as $singlecookie) {
   			setcookie($singlecookie['name'],'',time()-24800);
		}
	}
	
	
	public function delete($cookiename) {
	# removes the cookie from this->cookies and sets it to this->deleted with expiry to history
		if ( isset($this->cookies[$cookiename]) ) {
			
			$this->deleted[$cookiename] = $this->cookies[$cookiename];
			$this->deleted[$cookiename]['expiry'] = time() - 24800;
			$this->deleted[$cookiename]['value'] = '';
						
			unset($this->cookies[$cookiename]);
		}
	}
	
	public function update($cookiename,$parameter,$value=null) {
		# updates one value from one cookie
		if ( isset($this->cookies[$cookiename]) ) {
			$this->cookies[$cookiename][$parameter] = $value;
		}
	}
	
	#
	# you can use this to set some defaults before sending cookie. A matter of choice, not in any way 
	#  mandatory functionality. a helper method of a kind.
	#
	
	private function prepareCookie($c) {
		//need to set expire, path, domain, secure and httponly, if those are not set
		//TODO set default by looking into environment and settings. setting also to-do
		
		if (!$c['domain']) {
			$c['domain'] = $_SERVER["HTTP_HOST"];
		}
		if (!$c['path']) {
			$c['path'] = '/';
		}
		if ($c['secure'] === null || $c['secure'] === '') {
			$c['secure'] = false;
		}
		if ($c['httponly'] === null || $c['httponly'] === '') {
			$c['httponly'] = false;
		}

		
		return array(
			$c['name'],
			$c['value'],
			$c['expiry'],
			$c['path'],
			$c['domain'],
			$c['secure'],
			$c['httponly']
		);
	}

}
