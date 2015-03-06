<?php
someloader('some.application.view');

class SomeViewStatistics extends SomeView {

	public function display($tmpl=null) {
		$model = $this->getModel();
		$this->games    = $model->getGames();
		$this->numgames = count($this->games);
		parent::display('statistics');
	}
	
	

}