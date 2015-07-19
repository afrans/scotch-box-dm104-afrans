<?php 

class SessionLogin {
	
	public function createSession() {
		if (isset($_POST['data'])) {
		
			$data = $_POST['data'];

			if (!empty($data)) {

				$nome = $data['nome'];
				$id = $data['id'];

				if ( !empty($nome) && !empty($id) ) {
					
					session_start();
					$_SESSION['nome'] = $nome;
					$_SESSION['id'] = $id;
					$_SESSION['isValidUser'] = 'VALIDO';
					
					header('Content-type: application/json');
					$responseArray['status'] = 'success';
					echo json_encode($responseArray);
				}
			}
		}
	}
	
	public function isUserLogged() {
		session_start();
		
		if (!isset($_SESSION['isValidUser']) || $_SESSION['isValidUser'] == 'INVALIDO') {
			header("Location: login.php?envio=login_errado");
		}
	}
}


$login = new SessionLogin();
$login->createSession();

?>