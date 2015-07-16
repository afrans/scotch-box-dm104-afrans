<?php 

class Menu {
	
	public function buildMenu() {
		
		$currentPage = '0';
		if ( isset($_GET['m']) ) {
			$currentPage = $_GET['m'];	
		}
		
		$menu = 			
			'<nav class="navbar navbar-default">'.
				'<div class="container">'.
					'<div class="navbar-header">'.
						'<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">'.
							'<span class="sr-only">Toggle navigation</span>'.
							'<span class="icon-bar"></span>'.
							'<span class="icon-bar"></span>'.
							'<span class="icon-bar"></span>'.
						'</button>'.
						'<a class="navbar-brand" href="">Menu</a>'.
					'</div>'.
					'<div class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;" ng-controller="CartController">'.
						'<ul class="nav navbar-nav">'.
							'<li '. ($currentPage == '0' ? 'class="active"' : '') . '><a href="?">Home</a></li>'.
							'<li '. ($currentPage == '1' ? 'class="active"' : '') . '><a href="?m=1">Apple</a></li>'.
							'<li '. ($currentPage == '2' ? 'class="active"' : '') . '><a href="?m=2">Samsung</a></li>'.
							'<li '. ($currentPage == '3' ? 'class="active"' : '') . '><a href="?m=3">LG</a></li>'.
							'<li '. ($currentPage == '4' ? 'class="active"' : '') . '><a href="?m=4">Microsoft</a></li>'.
						'</ul>'.
						'<ul class="nav navbar-nav navbar-right">'.
							'<li><a href="#"><span class="glyphicon glyphicon-shopping-cart textCart"></span>{{ cartMessage }}</a></li>'.
							'<li><a href="/#/login">Entrar</a></li>'.
						'</ul>'.
					'</div>'.
				'</div>'.
			'</nav>';
		
		echo $menu;
	}
	
}

?>