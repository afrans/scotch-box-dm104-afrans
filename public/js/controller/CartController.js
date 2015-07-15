app.controller('CartController', ['$rootScope', '$scope', function($rootScope, $scope) {
	
	$scope.cartItens = [];
	$scope.cartMessage = '';
	
	$scope.$watch('cartUpdateMessage', function() {
		$scope.setCartMessage();
	});

	$scope.setCartMessage = function() {
		var itemsInCart = $scope.cartItens.length;
		if (itemsInCart === 0) {
			$scope.cartMessage = 'Vazio';
			
		} else if (itemsInCart === 1) {
			$scope.cartMessage = itemsInCart + ' item';
		
		} else {
			$scope.cartMessage = itemsInCart + ' itens';
		}
	};
	
}]);