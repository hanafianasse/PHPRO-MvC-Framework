<?php

class user {

	private $db;

	function __construct($db){
		$this->db = $db;
	}

	public function verifyIdentity($login,$password){
		try{
			$queryString = "select * from compte where login = '".$login."' and password = '".$password."' ";
			$stmt = $this->db->query($queryString);
			if($stmt->rowCount() == 0){
				throw new IBMException("Login or Password not valid !");
			}
			return $stmt->fetch(PDO::FETCH_ASSOC);
		}
		catch(PDOException $ex) {
			echo $ex->getMessage();
		}
	}
}

?>