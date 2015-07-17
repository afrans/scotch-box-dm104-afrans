app.controller('ProductListController', ['$location', '$scope', 'ProductService', function($location, $scope, ProductService) {
	
	$scope.productList = [];
	
	$scope.initListProduct = function() {
		$scope.$emit('cartUpdateMessage');
		
		var marcaIdParameter = $scope.retrieveParameter();
		ProductService.getProductList($scope.setProductList, marcaIdParameter);
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
	
}]);