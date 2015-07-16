app.controller('ProductController', ['$location', '$scope', 'ProductService', function($location, $scope, ProductService) {
	
	$scope.product = null;
	
	$scope.initialize = function() {
		$scope.$emit('cartUpdateMessage');
		
		var productId = $scope.retrieveParameter();
		ProductService.getProductInformation($scope.setProduct, productId);
	};
	
	$scope.retrieveParameter = function() {
		var url = $location.absUrl();
		var index = url.lastIndexOf('/') + 1;
		var productId = url.substring(index);
		
		return productId;
	};
	
	$scope.setProduct = function(productInformation) {
		$scope.$apply(function() {
			$scope.product = productInformation[0];
		});
	};
	
}]);