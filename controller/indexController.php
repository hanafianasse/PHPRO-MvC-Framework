<?php

/***  This is the default controller ***/
Class indexController Extends baseController {

	public function index(){

		/*** Example of seting a template variable ***/
		$this->registry->template->welcome = 'Welcome to PHPRO MVC';

		/*** Go to Authentification controller ***/
		header('location:/Exemple_mvc_pdo/index.php?rt=auth');
	}
}

?>