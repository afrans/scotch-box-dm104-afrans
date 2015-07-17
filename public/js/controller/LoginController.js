app.controller('LoginController', ['$scope', 'CustomerService', function($scope, CustomerService) {
	
	$scope.email = null;
	$scope.password = null;
	$scope.messageError = null;
	$scope.displayMessageError = false;
	
	$scope.doLogin = function() {
		CustomerService.authentication($scope.callBackLogin, $scope.email, $scope.password);
	};
	
	$scope.callBackLogin = function(response) {
		var message = null;
		
		if (!response || response.login === 'Email/Senha inválidos') {
			message = response.login;
		}
		
		$scope.$apply(function() {
			$scope.messageError = message;
			$scope.displayMessageError = message !== null;
		});
	};
	
	
	
}]);