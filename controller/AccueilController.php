<?php 

class AccueilController Extends basecontroller{

	public function index(){
		if($this->userIsConnected()){
			$this->registry->template->show('accueil');
		}else{
			header('location:/Exemple_mvc_pdo/index.php?rt=auth');
		}
	}
}

?>