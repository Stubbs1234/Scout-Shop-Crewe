<?php

class errors extends controller {
		
	public function __construct() {
		parent::__construct();

		$this->renderPage('errors');
	}
}

?>