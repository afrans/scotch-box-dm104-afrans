app.controller('ProductController', ['$scope', 'ProductService', function($scope, ProductService) {
	
	$scope.productList = [];
	
	$scope.init = function() {
		$scope.setCartMessage();
		ProductService.getProductList($scope.setProductList);
	};
	
	$scope.setProductList = function(productList) {
		$scope.productList = productList.products;
		$scope.$apply();
	};
	
}]);