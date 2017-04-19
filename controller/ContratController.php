<?php

class ContratController Extends baseController {

	public function index(){

		if($this->userIsConnected()){
			$this->registry->template->login = $_SESSION["connectedUser"];
			$this->registry->template->show('includes/header');
			$this->registry->template->show('contrats/list');
		}else{
			header('location:/Exemple_mvc_pdo/index.php?rt=auth');
		}
	}

}


?>