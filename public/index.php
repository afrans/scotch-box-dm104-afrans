<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Apple Store</title>
		
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/estilo.css">
		
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		
		<div id="topo_da_pagina" class="page-header">
			<h1 class="text-center">Smartphone Store</h1>
		</div>
		<?php
			include 'pages/menu.php';
			$menu = new Menu();
			$menu->buildMenu();
		?>
		
		<div id="characters"></div>

		<script src="js/bootstrap.min.js"></script>
		<script src="bower_components/jquery/dist/jquery.min.js"></script>
	</body>
</html>