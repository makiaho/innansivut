<?php
/**
* SomeDocumentHTML
* @package wo2009
* @subpackage library
* @author Hannu Lohtander
*/

/**
* SomeDocumentHTML
* 
* @package wo2009
* @subpackage library
*/
interface ISomeDocumentHTML {

#	private $buffer;
	
	public function __construct();
	
	/** singleton creator */
	public function getInstance();
	
	/** 
	* add content to this->buffer['content']. 
	* @param string $content xhtml 
	*/
	public function setContent($content);
	
	/**
	* render document, this is called from SomeApplication->render().
	* <p>loads template, str_replace <some_content /> tag with this->buffer['content']</p>
	* @return string $xhtml whole html page
	*/
	public function render();

}