<?php
/**
* SomeApplication is implementation of Front Controller pattern.
* @package wo2009
* @subpackage library
*/
SomeLoader::import('library.some.application.iapplication', SOME_PATH.DS.'interface',null);


/**
* @package wo2009
* @subpackage library
*/
class SomeApplication implements ISomeApplication {

	private $template;
	private $sysmessage;

	protected function __construct() {
		$this->initialize();
	}	
	
	public static function getInstance() {
		#
		# create singleton here
		#
		static $instance;
		if (!$instance) {
			$instance = new self;
		}
		return $instance;
	}

	public function initialize() {
		$conf = SomeFactory::getConfiguration();
		#
		# start session here
		#
		$session = SomeFactory::getSession();
		#
		# session started, create default user
		#
		$user = SomeFactory::getUser();
		#
		# language selection
		#
		$this->setLanguage();
		#
		# template= url parameter?
		# 
		$template = SomeRequest::getCmd('template','');
		$this->setTemplate($template);
		// does session has sysmessage?
		if ($session->get('sysmessage')) {
			$this->sysmessage = $session->get('sysmessage');
			$session->clear('sysmessage');
		}
	}
	
	public function getSysMessage() {
		return $this->sysmessage;
	}
	
	public function setLanguage() {
        $session = SomeFactory::getSession();
		$conf = SomeFactory::getConfiguration();
        $language = SomeRequest::getVar('language',null);
        $sesslanguage = $session->get('language',null);
        $argumentlanguage = $conf->get('language','common');
        if ($language) {
            $session->set('language',$language);
            $argumentlanguage = $language;
        } else if ($sesslanguage) {
            $argumentlanguage = $sesslanguage;
        }
        $this->language = $argumentlanguage;
        SomeFactory::getLanguage($argumentlanguage);
		
	}
	
	public function getLanguage() {
		return $this->language;
	}
	
	public function dispatch($app) {
		#
		# buffer the output
		# include the $app bootsrap file
		# get buffer and put to SomeDocumentHTML buffer
		#
		ob_start();
		$contentpath = SOME_CONTENT.DS.$app;
		define('PATH_CONTENT',$contentpath);
		
		require(PATH_CONTENT.DS.$app.'.php');
		$content = ob_get_clean();
		$document = SomeFactory::getDocument();
		$document->setContent($content);
	}
	/**
	 * rendering content, calls directly SomeDocuemntHTML:render.
	 * The rendered content is set to SomeResponse buffer, where it is fetched when output starts.
	 * @return void
	 *
	 */
	public function render() {
		$document = SomeFactory::getDocument();
		$document->setTemplate($this->getTemplate());
		$xhtml = $document->render();
		SomeResponse::setBody($xhtml);
		//exit;
	}
	/**
	 * get the current template.
	 * @return string template name.
	 */
	public function getTemplate() {
		if ($this->template) {
			return $this->template;
		} else {
			return 'default';
		}
	}
	/**
	 * set current template.
	 * This method can be called from MVC model to set new template.
	 * @param string $template name of the folder in template/ directory
	 */
	public function setTemplate($template) {
		if (empty($template)) {
			$conf = SomeFactory::getConfiguration();
			$template = $conf->get('template','common');
			if (empty($template)) {
				$template = 'default';
			}
		}
		$this->template = $template;
	}
	/**
	 * get the current debug value.
	 * @return int debug true or false
	 */
	public function getDebug() {
		$conf = SomeFactory::getConfiguration();
        return $conf->get('debug','debug') ? $conf->get('debug','debug'): 0;
	}
	/**
	 * method to ut response to browser with headers and body.
	 * @return void
	 */
	public function close() {
		#
		# close cookies, that means send them from SomeCookies. Implement SomeFactory::getSomeCookies() to get instance.
		#
		if (class_exists('SomeCookie')) {
			$cookies = SomeCookie::getInstance();
			$cookies->send();
		}
		SomeResponse::addHeader('Content-Type:text/html; charset=utf-8');
		SomeResponse::send();
		exit;
	}
	/**
	 * send location header to browser.
	 * @param string $url the http address to redirect browser
	 * @param string $msg the optional message, not implemented
	 */
	public function redirect($url,$msg='') {
		// if message is not empty, save it to session
		if (!empty($msg)) {
			$session = SomeFactory::getSession();
			$session->set('sysmessage',$msg);
		}
		header('Location:'.$url);
		$this->close();
	}

}
