<?php
require 'vendor/autoload.php';

$app = new \Slim\Slim();

$app->get('/', function() {
	echo "Welcome to Guest API";
});

$app->get('/guests', function() use ( $app ) {
	$db = getDB();
	
	$guests = array();
	foreach($db->guests() as $guest) {
		$guests[] = array(
			'id' => $guest['id'],
			'user' => $guest['user'],
			'email' => $guest['email'],
            'age' => $guest['age'],
			'passwd' => $guest['passwd']            
		);
	}
	
	$app->response()->header('Content-Type', 'application/json');
	echo json_encode($guests);
});

$app->post('/guest', function () use ( $app ) {
    
//    echo "recebeu post";
    
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
	$dbhost = getenv('localhost');
	$dbuser = getenv('root');
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