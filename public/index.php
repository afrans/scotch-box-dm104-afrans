<!DOCTYPE html>
<html lang="pt-br" ng-app="smartphoneStore">
	<head>
		<meta charset="utf-8">
    	<meta http-equiv="Cache-Control" content="no-cache">
    	<meta http-equiv="expires" content="Mon, 22 Jul 2002 11:12:01 GMT">
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
	<body ng-controller="ProductListController" ng-init="initListProduct()">
		
		<div id="topo_da_pagina" class="page-header">
			<h1 class="text-center">Smartphone Store</h1>
		</div>
		
		<?php
			include 'pages/menu.php';
			$menu = new Menu();
			$menu->buildMenu();
		?>
		
		<div id="content">
			<div ng-view=""></div>
		</div>

		<script src="bower_components/jquery/dist/jquery.min.js"></script>
		<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="bower_components/angular/angular.min.js"></script>
		<script src="bower_components/angular-route/angular-route.js"></script>
		<script src="js/index.js"></script>
		<script src="js/service/ProductService.js"></script>
		<script src="js/service/CustomerService.js"></script>
		<script src="js/service/VendaService.js"></script>
		<script src="js/controller/ProductListController.js"></script>
		<script src="js/controller/ProductController.js"></script>
		<script src="js/controller/LoginController.js"></script>
		<script src="js/controller/CustomerController.js"></script>
	</body>
</html>