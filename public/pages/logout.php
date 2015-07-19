<?php 

class Logout {
	
	public function finishSession() {
		session_start();
		$_SESSION['isValidUser'] = 'INVALIDO';
	}
	
}


$logout = new Logout();
$logout->finishSession();

?>