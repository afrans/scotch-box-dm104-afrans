<div ng-controller="ProductController" ng-init="initialize()" class="col-md-6 col-sm-8 col-xs-12">
	<p class="lead">{{product.nome}}</p>
	<img ng-src="{{product.url_foto}}" alt="image" class="img-responsive">
	
	<p>{{product.descricao}}</p>
	<strong>Por: {{product.preco | currency:"R$"}}</strong>
	<p>
		<button class="btn btn-primary" type="button" ng-click="addProduct(product)">Adicionar ao carrinho</button>
	</p>
</div>