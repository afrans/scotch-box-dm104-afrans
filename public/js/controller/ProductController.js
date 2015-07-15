app.controller('ProductController', ['$rootScope', '$scope', 'ProductService', function($rootScope, $scope, ProductService) {
	
	$scope.productList = [];
	
	$scope.init = function() {
		$scope.$emit('cartUpdateMessage');
		ProductService.getProductList($scope.setProductList);
	};
	
	$scope.setProductList = function(productList) {
		$scope.$apply(function() {
			$scope.productList = productList.products;
		});
	};
	
	
	
}]);