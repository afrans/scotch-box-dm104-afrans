app.controller('ProductListController', ['$location', '$scope', 'ProductService', function($location, $scope, ProductService) {
	
	$scope.productList = [];
	$scope.cartItens = [];
	$scope.cartMessage = '';
	
	$scope.initListProduct = function() {
		$scope.loadCartFromSessionStorage();
		$scope.setCartMessage();
		
		var marcaIdParameter = $scope.retrieveParameter();
		ProductService.getProductList($scope.setProductList, marcaIdParameter);
	};
	
	$scope.loadCartFromSessionStorage = function() {
		var itens = sessionStorage.getItem('customerCart');
		
		if (itens !== null) {
			var itensInSession = JSON.parse(itens);
			$scope.cartItens = itensInSession;
		}
	};
	
	$scope.retrieveParameter = function() {
		var url = $location.absUrl();
		var index = url.lastIndexOf('/') + 1;
		var marcaId = url.substring(index);
		
		return marcaId;
	};
	
	$scope.setProductList = function(productList) {
		$scope.$apply(function() {
			$scope.productList = productList;
		});
	};
	
	$scope.openProductDetail = function(productId) {
		 $location.url('/product/' + productId);
	};
	
	$scope.addProduct = function(product) {
		$scope.cartItens.push(product);
		$scope.updateChart();
	};
	
	$scope.updateChart = function() {
		sessionStorage.setItem('customerCart', JSON.stringify($scope.cartItens));
		$scope.setCartMessage();
	};
	
	$scope.setCartMessage = function() {
		
		var itemsInCart = 0;
		var itens = sessionStorage.getItem('customerCart');
		
		if (itens !== null) {
			var itensInSession = JSON.parse(itens);
			itemsInCart = itensInSession.length;	
		}
		
		
		if (itemsInCart === 0) {
			$scope.cartMessage = 'Vazio';
			
		} else if (itemsInCart === 1) {
			$scope.cartMessage = itemsInCart + ' item';
		
		} else {
			$scope.cartMessage = itemsInCart + ' itens';
		}
	};
	
	$scope.removeItem = function(product) {
		for (var i = 0; i < $scope.cartItens.length; i++) {
			var item = $scope.cartItens[i];
			
			if (product.id === item.id) {
				
				$scope.cartItens.splice(i, 1);
				$scope.updateChart();
				break;
			}
		}
	};
	
}]);