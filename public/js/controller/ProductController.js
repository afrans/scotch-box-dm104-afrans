app.controller('ProductController', ['$scope', 'ProductService', function($scope, ProductService) {
	
	$scope.productList = [];
	$scope.cartItens = [];
	$scope.cartMessage = '';
		
	$scope.init = function() {
		$scope.setCartMessage();
		ProductService.getProductList($scope.setProductList);
	};
	
	$scope.setProductList = function(productList) {
		$scope.productList = productList.products;
		$scope.$apply();
	};
	
	$scope.setCartMessage = function() {
		if ($scope.cartItens.length === 0) {
			$scope.cartMessage = 'Vazio';
			
		} else if ($scope.cartItens.length === 1) {
			$scope.cartMessage = $scope.cartItens.length + ' item';
		
		} else {
			$scope.cartMessage = $scope.cartItens.length + ' itens';
		}
	};
	
}]);