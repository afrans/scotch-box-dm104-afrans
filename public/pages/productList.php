<div ng-init="initListProduct()">
	<div ng-repeat="product in productList" class="col-md-4 col-sm-6 col-xs-12 productInfo">
		<p class="lead">{{product.nome}}</p>
		<img ng-src="{{product.url_foto}}" alt="image" class="img-responsive">

		<strong>Por: {{product.preco | currency:"R$"}}</strong>
		<p>
			<button class="btn btn-primary" type="button" ng-click="openProductDetail(product.id)">+ Detalhes</button>
		</p>
	</div>
</div>