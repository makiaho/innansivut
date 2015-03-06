<?php
/**
* SomeDocumentHTML.
*
* @package wo2009
* @subpackage library
* @author Hannu Lohtander
*/
SomeLoader::import('library.some.document.idocumenthtml', SOME_PATH.DS.'interface',null);
/**
* SomeDocumentHTML.
* 
* @package wo2009
* @subpackage library
*/
class SomeDocumentHTML {

	private $buffer;
	private $template = 'default';
	private $file = 'index';
	
	public function __construct() {
		
	}
	
	public static function getInstance() {
		static $instance;
		if (!$instance) {
			$instance = new self;
		}
		return $instance;
	}
	/**
	* function to add dispatched content to document buffer.
	*
	* @param string $content dispatched xhtml
	* @return void
	*/
	public function setContent($content) {
		$this->buffer['content'] = $content;
	}
	
	public function setSideBar($sidebarxhtml) {
		$this->buffer['sidebar'] = $sidebarxhtml;
	}
	
	public function setTemplate($template) {
		$this->template = $template;
	}
	
	public function setFile($file) {
		$this->file = $file;
	}
	
	public function render() {
		$data = $this->loadMasterTemplate();	
		$replace = array();
		$matches = array();
		if(preg_match_all('#<some:([\w]+) (.*)\/>#iU', $data, $matches))
		{


			$count = count($matches[1]);

			for($i = 0; $i < $count; $i++)
			{
				
				$name  = $matches[1][$i];
				$replace[$i] = $this->buffer[$name];
			}

			$data = str_replace($matches[0], $replace, $data);
		}
		return $data;
	}
	
	
	private function loadMasterTemplate() {
		//get it from SOME_THEMES/default/index.php
		//SOME_THEMES should be defined in SOME_PATH/includes/defines.php
		$path_and_file = SOME_THEMES.DS.$this->template.DS.$this->file.'.php';
		if (!file_exists($path_and_file)) {
			throw new SomeFileNotFoundException("Master template file {$this->file} for {$this->template} not found");
		}
		
		ob_start();
		//$content = file_get_contents(SOME_THEMES.DS.'default'.DS.'index.php');
		$templatefile = $path_and_file;
		require_once($templatefile);
		$content = ob_get_clean();
		return $content;
	}

}