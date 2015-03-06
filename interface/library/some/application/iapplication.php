<?php
/**
* @package wo2009
* @subpackage library
*/

/**
* @package wo2009
* @subpackage library
*/
interface ISomeApplication {
	
	/**
	* getInstance is singleton.
	* @return SomeApplication instance
	* 
	*/
	
	public static function getInstance();
	
	/**
	* dispatch content.
	* <p>Dispatch gets one parameter, that is the content name in folder content/. Example blog is dispatched uding
	* url http://....(index.php?app=blog, and there would be content bootstrap file content/blog/blog.php. dispatch includes 
	* the file and uses ob_start .. ob_get_clean to buffer output, and return it as dispatch result.</p>
	* @param string content application name
	* @return string xhtml 
	*/
	
	public function dispatch($app);
	
	/**
	* loads the master template and renders.
	* @return void
	*/
	public function render();
	
	/**
	* method to close application. This optionally calls other object needing closing like SomeSession->close() 
	* and SomeCookies->close()
	* @return boolean true always
	*/
	
	public function close();
	
	/**
	* redirect browser to url with optional message.
	* @param string $url http address for the location
	* @param string $msg message to attach to url - not implemented
	*/
	public function redirect($url,$msg='');
	
	/**
	 * Get current language token, eg. fi_FI.
	 * @return string language token.
	 */
	public function getLanguage();

}
