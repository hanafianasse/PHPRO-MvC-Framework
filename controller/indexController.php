<?php

/***  This is the default controller ***/
Class indexController Extends baseController {

	public function index(){
		/*** Go to Authentification controller ***/
		header('location:/Exemple_mvc_pdo/index.php?rt=auth');
	}
}

?>