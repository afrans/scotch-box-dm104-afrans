app.controller('ProductController', ['$location', '$scope', 'ProductService', function($location, $scope, ProductService) {
	
	$scope.productList = [];
	
	$scope.init = function() {
		$scope.$emit('cartUpdateMessage');
		
		var marcaIdParameter = $scope.retrieveParameter();
		ProductService.getProductList($scope.setProductList, marcaIdParameter);
	};
	
	$scope.retrieveParameter = function() {
		var url = $location.absUrl();
		var dataUrl = url.match(/(\w+=[0-9a-zA-ZáàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ]+)/g);
		
		if (dataUrl !== null) {
			var i = 0,
				max = dataUrl.length;
			
			for (; i < max; i++) {
				if (dataUrl[i].indexOf("m=") > -1) {
					var marcaId = dataUrl[i].replace("m=", "");
					return parseInt(marcaId);
				}
			}
		}
		
		return null;
	};
	
	$scope.setProductList = function(productList) {
		$scope.$apply(function() {
			$scope.productList = productList;
		});
	};
	
}]);