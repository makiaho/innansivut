<?php
someloader('some.application.controller');

class SomeControllerQuoteAjax extends SomeController {

	public function __construct() {
		parent::__construct();
	}
	
	public function display() {
		if (!SomeAuth::_(SomeFactory::getUser(),'quotes.list')) {
			SomeFactory::getApplication()->redirect("index.php?app=login","You have no permission to list <a href='index.php?app=quotes'>quotes</a>");
			#echo json_encode(array("error" => 1, "message" => "You have no permission to list quotes."));
			#return true;
		}
		?>
		<script>
		
		<?php require PATH_CONTENT.DS. 'js' . DS . 'classes.js';  ?>	
		 
		jQuery(document).ready(function() {
			QuoteCommandList.execute();
		});
		</script>
		<?php 
		$model = $this->getModel('quotes');
		require(PATH_CONTENT.DS. 'view' . DS . 'quotes' . DS . 'quotes.ajax.php');
		$view = new SomeViewQuotes();
		$view->setModel($model);
		$view->display();
	}
	
	public function create() {
		if (!SomeAuth::_(SomeFactory::getUser(),'quotes.edit')) {
			//SomeFactory::getApplication()->redirect("index.php?app=login","You have no permission to create <a href='index.php?app=quotes'>quote</a>");
			echo json_encode(array("error" => 1, "message" => "You have no permission to create a quote."));
			return true;
		}
		
		$issubmit = SomeRequest::getInt('issubmit',0);
		if ($issubmit) {
			$model = $this->getModel('quote');
			// @TODO error handling
			$model->save();
			require(PATH_CONTENT.DS. 'view' . DS . 'quote' . DS . 'quote.ajax.php');
			$view = new SomeViewQuote();
			$view->setModel($model);
			//show new quote
			$view->read();
		} else {
			$model = $this->getModel('quote');
			require(PATH_CONTENT.DS. 'view' . DS . 'quote' . DS . 'quote.ajax.php');
			$view = new SomeViewQuote();
			$view->setModel($model);
			// show form
			$view->create();
		}
	}
	
	public function update() {
		if (!SomeAuth::_(SomeFactory::getUser(),'quotes.edit')) {
			SomeFactory::getApplication()->redirect("index.php?app=login","You have no permission to edit <a href='index.php?app=quotes'>quote</a>");
		}
		$issubmit = SomeRequest::getInt('issubmit',0);
		if ($issubmit) {
			$model = $this->getModel('quote');
			// @TODO error handling
			$model->save();
			require(PATH_CONTENT.DS. 'view' . DS . 'quote' . DS . 'quote.ajax.php');
			$view = new SomeViewQuote();
			$view->setModel($model);
			//show new quote
			$view->read();
		} else {
			$model = $this->getModel('quote');
			require(PATH_CONTENT.DS. 'view' . DS . 'quote' . DS . 'quote.ajax.php');
			$view = new SomeViewQuote();
			$view->setModel($model);
			// show form
			$view->update();
		}
	}
	
	public function read() {
		$model = $this->getModel('quote');
		// @TODO error handling
		require(PATH_CONTENT.DS. 'view' . DS . 'quote' . DS . 'quote.ajax.php');
		$view = new SomeViewQuote();
		$view->setModel($model);
		//show new quote
		$view->read();
	}
	
	public function delete() {
		if (!SomeAuth::_(SomeFactory::getUser(),'quotes.delete')) {
			SomeFactory::getApplication()->redirect("index.php?app=login","You have no permission to delete <a href='index.php?app=quotes'>quote</a>");
		}
		$model = $this->getModel('quote');
		$model->delete();
		$this->quotes();
	}
	
	public function quotes() {
		if (!SomeAuth::_(SomeFactory::getUser(),'quotes.list')) {
			//SomeFactory::getApplication()->redirect("index.php?app=login","You have no permission to list <a href='index.php?app=quotes'>quotes</a>");
			echo json_encode(array("error" => 1, "message" => "You have no permission to list quotes."));
			return true;
		}
		$model = $this->getModel('quotes');
		require(PATH_CONTENT.DS. 'view' . DS . 'quotes' . DS . 'quotes.ajax.php');
		$view = new SomeViewQuotes();
		$view->setModel($model);
		$view->quotes();
	}
}