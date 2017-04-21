<?php

class AuthController Extends baseController {

	public function index(){
		if(isset($_SESSION["email"])){
			unset($_SESSION["email"]);
		}
		$this->registry->template->show('auth/login');
	}

	public function connect(){
		if(isset($_POST["login"]) && isset($_POST["password"])){
			try{
				$userEm = new user($this->registry->db);
				$res = $userEm->verifyIdentity($_POST["login"],$_POST["password"]);
				$_SESSION["connectedUser"] = $res['login'];
				header('location: index.php?rt=Accueil');
			}catch(IBMException $ibm) {
				$this->registry->template->show('auth/login');
				FB::info($ibm->getError());
				print('<script type="text/javascript">$("#loginbox").effect("shake");</script>');
			}
		}else{
			$this->index();
		}
	}

	public function disconnect(){
		unset($_SESSION['connectedUser']);
		$this->registry->template->show('auth/login');
	}

	public function resetPassword(){
		$this->registry->template->show('auth/newpassword');
	}

	public function sendResetPassword(){
		$this->registry->template->show('auth/resetingpassword');
		$this->sendCodebyEmail();
	}

	public function checkCode(){
		if(isset($_POST["code"]) && isset($_SESSION["email"])){
			$userEm = new user($this->registry->db);
			if($userEm->verifyResetCode($_POST["code"],$_SESSION["email"])){
				// show reseting password view 
				header('location: index.php?rt=auth/changePassword');
			}else{
				//set message here 
				$this->registry->template->wrongCode = "Désoler, Code invalid !";
				$this->registry->template->show('auth/resetingpassword');
			}
		}

	}

	private function sendCodebyEmail(){
		if(isset($_POST["email"])){
			// save Email into session to use it later
			$_SESSION["email"] = $_POST["email"];
			// generate a random code
			$code = $this->randomPassword();
			// save it into db !!!
			$userEm = new user($this->registry->db);
			$login = $userEm->getLoginByEmail($_POST["email"]);
			$userEm->setResetCode($login,$code);
			// send reseting email with reseting code
			$to      = $_POST["email"];
			$subject = 'IBM - Reset Password';
			$message = 'Hi, you asked to reset your password, here is your code : '.$code;
			$headers = 'From: absolution.bx@gmail.com'."\r\n".'MIME-Version: 1.0'."\r\n".'Content-type: text/html; charset=utf-8';
			mail($to, $subject, $message, $headers);
		}
	}

	private function randomPassword() {
		$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		$pass = array();
		$alphaLength = strlen($alphabet) - 1;
		for ($i = 0; $i < 8; $i++) {
			$n = rand(0, $alphaLength);
			$pass[] = $alphabet[$n];
		}
		return implode($pass);
	}

	public function changePassword(){
		if(isset($_SESSION["email"])){
			$this->registry->template->show('auth/changepassword');
		}
	}

	public function setNewPassword(){
		if(isset($_POST["password1"]) && isset($_POST["password2"]) &&  isset($_SESSION["email"])){
			if($_POST["password1"] != $_POST["password2"]){
				$this->registry->template->message = "Mot de passe ne correspond pas";
				$this->registry->template->show('auth/changepassword');
			}else{
				$userEm = new user($this->registry->db);
				$userEm->setNewpassword($_POST["password1"],$_SESSION["email"]);
				$this->registry->template->show('auth/login');				
			}

		}
	}
}