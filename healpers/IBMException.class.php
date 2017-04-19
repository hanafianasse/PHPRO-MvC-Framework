<?php

class IBMException extends Exception {

	protected $error;

	function __construct($error){
		$this->error = $error;
	}

	public function getError(){
		return $this->error;
	}

}

?>