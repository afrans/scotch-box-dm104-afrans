<?php
require 'vendor/autoload.php';

$app = new \Slim\Slim();

$app->get('/', function() {
	echo "Welcome to SmartphoneStore API";
});

$app->get('/products(/:type(/:value))', function ($type = NULL, $value = NULL) use ( $app ) {

    $db = getDB();
	$json_result= array();
    if($type==NULL and $value==NULL){
    foreach ($db->produto() as $produto) {
	$json_result[]= array(
	'id' => $produto["id"], 
	'nome' => $produto["nome"], 
	'marca' => $produto->marca["nome"], 
	'url_foto' => $produto["url_foto"], 
	'quantidade' => $produto["quantidade"], 
	'preco' => $produto["preco"]
	);}
    } else if ($type=="marca_id") {
    foreach ($db->produto()->where("marca_id = ?", $value) as $produto) {
	$json_result[]= array(
	'id' => $produto["id"], 
	'nome' => $produto["nome"], 
	'marca' => $produto->marca["nome"], 
	'url_foto' => $produto["url_foto"], 
	'quantidade' => $produto["quantidade"], 
	'preco' => $produto["preco"]
	);}
    } else {
    foreach ($db->produto()->where("id = ?", $value) as $produto) {
	$json_result[]= array(
	'id' => $produto["id"], 
	'nome' => $produto["nome"], 
	'marca' => $produto->marca["nome"], 
	'url_foto' => $produto["url_foto"], 
	'quantidade' => $produto["quantidade"], 
	'preco' => $produto["preco"]
	);}
    } 
	$app->response()->header('Content-Type', 'application/json');
	echo json_encode($json_result);
    });

$app->get('/client/:id', function($id) use ( $app ) {

    $db = getDB();
    foreach ($db->cliente()->where("id = ?", $id) as $client) {
	$json_result = array(
	'nome' => $client["nome"], 
	'sobrenome' => $client["sobrenome"], 
	'senha' => $client["senha"], 
	'cpf' => $client["cpf"],
    'telefone' => $client["telefone"],
    'email' => $client["email"], 
    'endereco' => $client["endereco"],
    'bairro' => $client["bairro"], 
    'cidade' => $client["cidade"], 
	'estado' => $client["estado"]
	);}
	$app->response()->header('Content-Type', 'application/json');
	echo json_encode($json_result);
});

$app->post('/client', function () use ( $app ) {
    
	$db = getDB();
	$clientToAdd = json_decode($app->request->getBody(), true);
	$client = $db->cliente->insert($clientToAdd);
	$app->response->header('Content-Type', 'application/json');
	echo json_encode($client);
});

$app->post('/login(/:email(/:senha))', function($email = NULL, $senha = NULL) use ( $app ) {

    $db = getDB();
	$json_result = NULL;
    foreach ($db->cliente()->where("email = ? AND senha = ?" , $email, $senha) as $client) { 
	$json_result = array (
	'nome' => $client["nome"], 
	'sobrenome' => $client["sobrenome"]
	);}
	if ($json_result==NULL){
		$json_result = array ('login' => 'Email/Senha inválidos');
	}
	$app->response()->header('Content-Type', 'application/json');
	echo json_encode($json_result);
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