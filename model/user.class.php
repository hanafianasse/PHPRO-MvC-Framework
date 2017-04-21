<?php

class user {

	private $db;

	function __construct($db){
		$this->db = $db;
	}

	public function verifyIdentity($login,$password){
		try{
			$request = $this->db->prepare("select * from compte where login= ? and password= ? ");
			$request->execute(array($login,$password));	
			$result = $request->fetch(PDO::FETCH_ASSOC);
			if($request->rowCount() == 0){
				throw new IBMException("Login or Password not valid !");
			}
			return $result;
		}
		catch(PDOException $ex) {
			echo $ex->getMessage();
		}
	}

	public function setResetCode($login,$resetCode){
		try{
			$request = $this->db->prepare("update compte SET reset_code= ? WHERE login= ? ");
			$request->execute(array($resetCode,$login));
		}
		catch(PDOException $ex) {
			echo $ex->getMessage();
		}
	}

	public function getLoginByEmail($email){
		try{
			$request = $this->db->prepare('select login from compte WHERE email= :_email ');
			$request->bindParam(':_email', $email);
			$request->execute();
			$result = $request->fetch(PDO::FETCH_ASSOC);
			if($request->rowCount() == 0){
				return "##_EMAIL_NOT_FOUND_##";
			}
			return $result["login"];
		}
		catch(PDOException $ex) {
			echo $ex->getMessage();
		}
	}

	public function verifyResetCode($code,$email){
		try{
			$request = $this->db->prepare('select reset_code from compte WHERE reset_code= :code and email= :email ');
			$request->bindParam(':code', $code);
			$request->bindParam(':email', $email);
			$request->execute();
			$result = $request->fetch(PDO::FETCH_ASSOC);
			if($request->rowCount() == 0){
				return false;
			}
			return true;
		}
		catch(PDOException $ex) {
			echo $ex->getMessage();
		}
	}

	public function setNewpassword($password,$email){
		try{
			$request = $this->db->prepare('update compte SET reset_code= NULL , password= :password WHERE email= :email');
			$request->bindParam(':email', $email);
			$request->bindParam(':password', $password);
			$request->execute();
		}
		catch(PDOException $ex) {
			echo $ex->getMessage();
		}
	}

}

?>