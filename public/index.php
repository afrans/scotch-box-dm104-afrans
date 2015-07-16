<!DOCTYPE html>
<html lang="pt-br" ng-app="smartphoneStore">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Smartphone Store</title>
		
		<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/estilo.css">
		<link rel="icon" href="favicon.ico">
		
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body ng-controller="ProductController" ng-init="init()">
		
		<div id="topo_da_pagina" class="page-header">
			<h1 class="text-center">Smartphone Store</h1>
		</div>
		
		<?php
			include 'pages/menu.php';
			$menu = new Menu();
			$menu->buildMenu();
		?>
		
		<div id="content">
		
			<div ng-repeat="product in productList" class="col-md-4 col-sm-6 col-xs-12 productInfo">
				<p class="lead">{{product.nome}}</p>
				<img ng-src="{{product.url_foto}}" alt="image" class="img-responsive">
				
				<strong>Por: {{product.preco | currency:"R$"}}</strong>
				<p>
  					<button class="btn btn-primary" type="button">+ Detalhes</button>
				</p>
			</div>
		</div>

		<script src="bower_components/jquery/dist/jquery.min.js"></script>
		<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="bower_components/angular/angular.min.js"></script>
		<script src="js/index.js"></script>
		<script src="js/service/ProductService.js"></script>
		<script src="js/controller/ProductController.js"></script>
		<script src="js/controller/CartController.js"></script>
	</body>
</html>