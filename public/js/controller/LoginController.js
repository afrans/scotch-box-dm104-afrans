app.controller('LoginController', ['$scope', 'CustomerService', function($scope, CustomerService) {
	
	$scope.email = null;
	$scope.password = null;
	$scope.messageError = null;
	
	$scope.doLogin = function() {
		CustomerService.authentication($scope.callBackLogin, $scope.email, $scope.password);
	};
	
	$scope.callBackLogin = function(response) {
		if (!response || response.login === 'Email/Senha inválidos') {
			$scope.messageError = response.login;
			
		} else {
			
		}
	};
	
}]);