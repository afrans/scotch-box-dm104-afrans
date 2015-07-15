<?php
require 'vendor/autoload.php';

$app = new \Slim\Slim();

$app->get('/', function() {
	echo "Welcome to Guest API";
});

$app->get('/all_products', function() use ( $app ) {

    $db = getDB();
    $json_result = '[';
    $first_item = True; 

    foreach ($db->produto() as $produto) {
    
        if ($first_item) {
        $first_item = False;
        } else {
        $json_result .= ',';
        }
 
        $json_result .= '{name: "'.$produto["nome"];
        $json_result .= '", marca: "'.$produto->marca["nome"];
        $json_result .= '", descricao: "'.$produto["descricao"];
        $json_result .= '", url_foto: "'.$produto["url_foto"];
        $json_result .= '", quantidade: "'.$produto["quantidade"];
        $json_result .= '", preco: "'.$produto["preco"];
        $json_result .= '"}';

    }

    $json_result .= ']';

	$app->response()->header('Content-Type', 'application/json');
	echo json_encode($json_result);
	
});

$app->post('/type_product/:marca_id', function ($marca_id) use ( $app ) {

    $db = getDB();
    $json_result = '[';
    $first_item = True;
    
    foreach ($db->produto()->where("marca_id = ?", $marca_id) as $produto) {
    
        if ($first_item) {
        $first_item = False;
        } else {
        $json_result .= ',';
        }
 
        $json_result .= '{name: "'.$produto["nome"];
        $json_result .= '", marca: "'.$produto->marca["nome"];
        $json_result .= '", descricao: "'.$produto["descricao"];
        $json_result .= '", url_foto: "'.$produto["url_foto"];
        $json_result .= '", quantidade: "'.$produto["quantidade"];
        $json_result .= '", preco: "'.$produto["preco"];
        $json_result .= '"}';

    }

    $json_result .= ']';

	$app->response()->header('Content-Type', 'application/json');
	echo json_encode($json_result);
    
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