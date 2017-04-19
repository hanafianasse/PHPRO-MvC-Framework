<?php

class AdherentController Extends baseController {

	public function index(){
		if($this->userIsConnected()){
			$this->registry->template->login = $_SESSION["connectedUser"];
			$this->registry->template->show('includes/header');
			$this->registry->template->show('adherents/list');
			print('<script>selectOnglet1();</script>');
		}else{
			header('location:/Exemple_mvc_pdo/index.php?rt=auth');
		}
	}

	

}



?>