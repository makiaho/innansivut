<?php
someloader('some.application.controller');

class SomeControllerNgg extends SomeController {

	public function __construct() {
		parent::__construct();
	}
	
		/**
	 * default flow function.
	 * if no view is set, start is shown.
	 *
	 */
	
	function display() {
		$this->start ();
	}
	
	#
	#
	# name of the methods must be values from url parameter view, like ?app=nggmvc&view=guess
	#
	#
	

	#
	# this is an example of method, that is called if url is http://....?view=guess.
	# the value of the view parameter maps to method name
	#
	public function guess() {
		$model = $this->getModel('game');
		$model->guess();
		$view = $this->getView('game');
		$view->setModel($model);
		$view->guess();
	}
	
	public function resume() {
		$model = $this->getModel('game');
		$model->resume();
		$view = $this->getView('game');
		$view->setModel($model);
		$view->resume();

	}
	
	/**
	 * index.php?app=nggmvc&view=start
	 */
	public function start() {
		#include "model/game.php";
		#$model = new SomeModelGame();
		$model = $this->getModel('game');
		$model->start();
		#include "view/game/game.php";
		#$view = new SomeViewGame();
		$view = $this->getView('game');
		$view->setModel($model);
		$view->start();
		
	}
	
	/**
	 * index.php?app=nggmvc&view=quit
	 */
	public function quit() {
	
		$model = $this->getModel('game');
		$model->quit();
		$view = $this->getView('game');
		$view->setModel($model);
		$view->quit();
		
	}
	
	/**
	 * index.php?app=nggmvc&view=statistics
	 */
	public function statistics() {
		$model = $this->getModel('statistics');
		$view = $this->getView('statistics');
		$view->setModel($model);
		$view->display();
	}
	
	/**
	 * index.php?app=nggmvc&view=info
	 */
	public function info() {
		$model = $this->getModel('info');
		$view = $this->getView('info');
		$view->setModel($model);
		$view->display();
	}
	
}