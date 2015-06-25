<?php
require 'vendor/autoload.php';

$app = new \Slim\Slim();

$app->get('/', function() {
	echo "Welcome to Guest API";
});

$app->get('/guests', function() use ( $app ) {
	
	$db = getDB();
	$user = array();
	foreach($db->user() as $guest) {
		$user[] = array(
			'id' => $guest['id'],
			'user' => $guest['user'],
			'email' => $guest['email'],
            'age' => $guest['age'],
			'passwd' => $guest['passwd']            
		);
	}
	
	$app->response()->header('Content-Type', 'application/json');
	echo json_encode($user);
});

$app->post('/guest', function () use ( $app ) {
    
	$db = getDB();
	$guestToAdd = json_decode($app->request->getBody(), true);
	$guest = $db->user->insert($guestToAdd);
	$app->response->header('Content-Type', 'application/json');
	echo json_encode($guest);
});

$app->delete('/guest/:id', function($id) use ( $app ) { 
	echo $id;
});

function getConnection() {
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = 'root';
	$dbname = 'dm104';
	$pdo = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
	return $pdo;
}

function getDB() {
	$pdo = getConnection();
	$db = new NotORM($pdo);
	return $db;
}

$app->run();
?>