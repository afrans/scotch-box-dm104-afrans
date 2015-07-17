<?php 

class Menu {
	
	public function buildMenu() {
		
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
					'<div class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">'.
						'<ul class="nav navbar-nav">'.
							'<li><a href="#/">Home</a></li>'.
							'<li><a href="#marca/1">Apple</a></li>'.
							'<li><a href="#marca/2">Samsung</a></li>'.
							'<li><a href="#marca/3">LG</a></li>'.
							'<li><a href="#marca/4">Microsoft</a></li>'.
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