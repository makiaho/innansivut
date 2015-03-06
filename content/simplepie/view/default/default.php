<?php

someloader('some.application.view');

class SomeViewDefault extends SomeView {

	public function display($tmpl=null) {
		$model = $this->getModel();
		$this->feeds = $model->getFeeds();
		$this->feedurls = $model->getFeedurls();
		parent::display($tmpl);
	}

}