app.controller('ProductController', ['$scope', 'ProductService', function($scope, ProductService) {
	
	$scope.productList = [];
	
	$scope.init = function() {
		$scope.productList = ProductService.getProductList();
	};
	
}]);