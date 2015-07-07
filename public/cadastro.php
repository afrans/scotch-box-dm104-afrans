<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Trabalho DM104</title>
		
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/estilo.css">
		
		<link rel="stylesheet" href="css/main.css" />
        <!-- <link rel="stylesheet" href="css/t1/style.css" title="Theme 1" /> -->
        <!-- <link rel="alternate stylesheet" href="css/t2/style.css" title="Theme 2" /> -->
		
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		
		<div id="topo_da_pagina" class="page-header">
			<h1 class="text-center">Trabalho Final</h1>
		</div>
		
		<nav class="navbar navbar-default">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">Menu</a>
				</div>
				<div class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
					<ul class="nav navbar-nav">
						<li><a href="index.html">Home</a></li>
						<li class="active"><a href="#">Sig up</a></li>
						<li><a href="avaliacao.html">Avaliação</a></li>
						<li><a href="relatorio.html">Relatórios</a></li>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</nav>
		
		<form >
	    <fieldset>
		    <label for="username">
			    Username
			    <input id="user" type="text" name="user"/>
		    </label>

            <label for="email">
			    Email
			    <input id="email" type="text" name="email"/>
    		</label>

            <label for="email">
			    Age
			    <input id="age" type="text" name="age"/>
    		</label>
		
	    	<label for="secretword">
		    	Password
			    <input id="secretword" type="password" name="passwd"/>
    		</label>
		
    		<input type="submit" value="Sign up" />
	    </fieldset>
        </form>
    
        <script src="bower_components/jquery/dist/jquery.min.js"></script>
        <script src="js/GuestService.js"></script>
        <script src="js/GuestController.js"></script>
		
		<!-- <script src="js/jquery-2.1.4.min.js"></script> -->
		<script src="js/bootstrap.min.js"></script>
		
	</body>
</html>