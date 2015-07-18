<?php 

class SessionLogin {
	
	public function createSession() {
		session_start();
		$_SESSION['nome'] = $login;
		$_SESSION['id'] = $senha;
	}
	
	public function isUserLogged() {
	}
}


?>