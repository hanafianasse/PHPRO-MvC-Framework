<?php

class ContratController Extends baseController {

	public function index(){
		if($this->userIsConnected()){
			$this->registry->template->login = $_SESSION["connectedUser"];
			$this->registry->template->files = $this->getUploadedfiles();
			$this->registry->template->show('includes/header');
			$this->registry->template->show('contrats/list');
			print('<script>selectOnglet2();</script>');
		}else{
			header('location:/Exemple_mvc_pdo/index.php?rt=auth');
		}
	}

	private function getUploadedfiles(){
		
		$files = scandir('./uploadedfiles');// get uploaded files
		unset($files[0]); // we dont want the current dir
		unset($files[1]); // or the parent dir

		$filesWithSize = array();
		foreach ($files as $file) {
			$size = $this->readable(filesize('./uploadedfiles/'.$file));
			$object = (object) ['name'=> $file, 'size'=>$size];
			array_push($filesWithSize,$object);
		}
		return $filesWithSize;
	}

	private function readable($bytes, $decimals = 2) {
		$size = array('Byte','kB','MB','GB','TB','PB','EB','ZB','YB');
		$factor = floor((strlen($bytes) - 1) / 3);
		return sprintf("%.{$decimals}f",$bytes/pow(1024, $factor)).' '.$size[$factor];
	}

	public function viewAdd(){
		if($this->userIsConnected()){
			$this->registry->template->login = $_SESSION["connectedUser"];
			$this->registry->template->show('includes/header');
			$this->registry->template->show('contrats/ajouter');
			print('<script>selectOnglet2();</script>');
		}else{
			header('location:/Exemple_mvc_pdo/index.php?rt=auth');
		}
	}

	public function uploadFile(){
		if(isset($_FILES['file'])){
			$file = $_FILES['file'];
			$errors = array();

			$tmp = explode('.',$file['name']);
			$file_ext = strtolower(end($tmp));
			$allowedExpensions = array("docx","pdf","txt","xls");
			if(in_array($file_ext,$allowedExpensions) == false){
				$errors[] = "Extension not allowed, please choose one of these extensions : pdf, docx, xls, txt";
			}

			if($file['size'] > 2097152){
				$errors[] = 'File size must be 2 MB or less';
			}

			if(empty($errors) == true){
				//$file['name'] = "new_file.txt";
				move_uploaded_file($file['tmp_name'],"uploadedfiles/".$file['name']);
				header('location:/Exemple_mvc_pdo/index.php?rt=contrat');
			}else{
				$this->registry->template->login = $_SESSION["connectedUser"];
				$this->registry->template->errorUpload = $errors;
				$this->registry->template->show('includes/header');
				$this->registry->template->show('contrats/ajouter');
				print('<script>selectOnglet2();</script>');
			}
		}else{
			$this->viewAdd();
		}
	}

	public function download(){
		if(file_exists('./uploadedfiles/'.$_GET['filename'])) {
			$file = './uploadedfiles/'.$_GET['filename'];
			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename='.basename($file));
			header('Expires: 0');
			header('Cache-Control: must-revalidate');
			header('Pragma: public');
			header('Content-Length: '.filesize($file));
			ob_clean();
			flush();
			readfile($file);
		}
	}


}
?>