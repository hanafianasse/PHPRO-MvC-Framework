<?php

class AuthController Extends baseController {

	public function index(){
		$this->registry->template->show('auth/login');
	}

	public function connect(){
		try{
			$userEm = new user($this->registry->db);
			$res = $userEm->verifyIdentity($_POST["login"],$_POST["password"]);
			$_SESSION["connectedUser"] = $res['login'];
			header('location: index.php?rt=Accueil');
		}catch(IBMException $ibm) {
			$this->registry->template->show('auth/login');
			echo '<script type="text/javascript">$("#loginbox").effect("shake");</script>';
			//echo $ibm->getError();
		}
	}

	public function disconnect(){
		unset($_SESSION['connectedUser']);
		$this->registry->template->show('auth/login');
	}
}