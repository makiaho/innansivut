<?php
someloader('some.application.model');

class SomeModelRss extends SomeModel {

	private $feeds;
	private $feedurls;
	
	public function form() {
		//get possible urls from session
		$session = SomeFactory::getSession();
		$feedurls = $session->get('feedurls',array());
		
		$this->feedurls = $feedurls;
		//$session->set('feedurls',$feedurls);
	}
	
	public function feed() {
		someloader('simplepie.simplepie');
		$session = SomeFactory::getSession();
		$this->feedurls = $session->get('feedurls',array());
		
		$urls = SomeRequest::getVar('urls',array(),'post');
		foreach ($urls as $k =>  $url) {
			$this->feedurls[$k] = $url;
		}
		
		// Multiple feeds
		$argumenturls = array();
		foreach ($this->feedurls as $url) {
		    //if is valid http
		    if ($url) {
		        $argumenturls[] = $url;
		    }
		}
		
    	$session->set('feedurls',$argumenturls);
		$this->feeds = new SimplePie($argumenturls, SOME_PATH.DS. '/cache');
	}
	
	public function getFeeds() {
		if (!$this->feeds) {
			$this->feed();
		}
		return $this->feeds;
	}
	
	public function getFeedurls() {
	    //fill up to 5 urls
	    $tmp = array(null,null,null,null,null);
	    foreach ($this->feedurls as $index =>  $url) {
	        $tmp[$index] = $url;
	    }
		return $tmp;
	}

}
