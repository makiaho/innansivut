<?php

someloader('some.application.view');

class SomeViewInfo extends SomeView {
	
	public function display($tmpl = null) {
		$model = $this->getModel();
		$this->confwritable = $model->isConfigurationWriteable();
		$this->dpengineselected = $model->isDbSelected();
		$conf_array = $model->getConfiguration();
		$this->databasedriver = $conf_array['database']['databasedriver'];
		$this->databasehost = $conf_array['database']['databasehost'];
		$this->database = $conf_array['database']['database'];
		$this->dbuser = $conf_array['database']['dbuser'];
		$this->dbpass = $conf_array['database']['dbpass'];
		
		$this->connected = $model->getConnected();
		$this->errors = $model->getErrors();
		$this->issomeuserinstalled = $model->getSomeuserStatus();
		if ($this->issomeuserinstalled) {
			$this->someuserstatus = 'SomeUser table is installed';
			$this->someuseraction = '<span class="greenok">No action required.</span>';
		} else {
			$this->someuserstatus = 'SomeUser table is NOT installed';
			$this->someuseraction = '<a href="index.php?app=configuration&cntr=install&view=install&table=someuser"><span class="redfail">INSTALL</span></a>';
		}
		
		$this->issomesessioninstalled = $model->getSomesessionStatus();
		if ($this->issomesessioninstalled) {
			$this->somesessionstatus = 'Somesession table is installed';
			$this->somesessionaction = '<span class="greenok">No action required.</span>';
		} else {
			$this->somesessionstatus = 'Somesession table is NOT installed';
			$this->somesessionaction = '<a href="index.php?app=configuration&cntr=install&view=install&table=somesession"><span class="redfail">INSTALL</span></a>';
		}
		
		parent::display($tmpl);
	}
	
	
}