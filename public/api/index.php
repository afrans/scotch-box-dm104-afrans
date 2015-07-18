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
	
	$json_result = array ('result' => 'SUCCESS');
	echo json_encode($json_result);
});

$app->post('/login(/:email(/:senha))', function($email = NULL, $senha = NULL) use ( $app ) {

    $db = getDB();
	$json_result = NULL;
	
    foreach ($db->cliente()->where("email = ? AND senha = ?" , $email, $senha) as $client) { 
		$json_result = array (
			'nome' => $client["nome"], 
			'id' => $client["id"]
		);
	}
	
	if ($json_result==NULL){
		$json_result = array ('login' => 'Email/Senha inválidos');
	}
	
	$app->response()->header('Content-Type', 'application/json');
	echo json_encode($json_result);
});

$app->post('/order', function () use ( $app ) {
    
	$db = getDB();
	$orderToAdd = json_decode($app->request->getBody(), true);
	$order = $db->venda->insert($orderToAdd);
	$app->response->header('Content-Type', 'application/json');
    $json_result = array ('id' => $order["id"]);
    echo json_encode($json_result);
});

$app->post('/products_order', function () use ( $app ) {
    
	$db = getDB();
	$products_orderToAdd = json_decode($app->request->getBody(), true);
	$products_order = $db->produtos_venda->insert($products_orderToAdd);
	$app->response->header('Content-Type', 'application/json');

    if ($products_order!=false){
	$json_result = array ('result' => 'SUCCESS');
	echo json_encode($json_result);
    } else {
    $json_result = array ('result' => 'ERROR');
	echo json_encode($json_result);
    }

});

$app->get('/order/:id', function($client_id) use ( $app ) {

    $db = getDB();
    $sales_id = NULL;    
	$sales_date = NULL;
	$sales_status = NULL;
    $sale_price=NULL;
	$json_result= array();
	
    foreach ($db->venda()->where("cliente_id = ?", $client_id) as $order) {
		$sale_price = 0;
		$sales_id = $order["id"];    
		$sales_date = $order["data_venda"];
		$sales_status = $order["status_do_pedido"];
		
		foreach ($db->produtos_venda()->where("venda_id = ?", $sales_id) as $sale_product) {
			foreach ($db->produto()->where("id = ?", $sale_product["produto_id"]) as $produto) {
				$sale_price += $produto["preco"];
			}
		}
		
		$json_result[]= array(
			'venda_id' => $sales_id, 
			'data_venda' => $sales_date,     
			'status' => $sales_status,
			'valor_total' => $sale_price     
		);
    }
	
    if ($json_result!=[]){
		$app->response()->header('Content-Type', 'application/json');
		echo json_encode($json_result);
    } else {
		$json_result = array ('result' => 'Not matched');
		echo json_encode($json_result);
    }
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