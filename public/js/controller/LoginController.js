app.controller('LoginController', ['$scope', '$location', '$http', '$window', 'CustomerService', function($scope, $location, $http, $window, CustomerService) {
	
	$scope.email = null;
	$scope.password = null;
	$scope.messageError = null;
	$scope.displayMessageError = false;
	
	$scope.checkLogout = function() {
		var usuario = sessionStorage.getItem('UsuarioLogado');
		if (usuario && usuario != 'null') {
			$http({
				url: '/pages/logout.php',
				method: "POST"
			}).success(function() {
				sessionStorage.setItem('UsuarioLogado', null);
				$window.location.reload();
			});
		} 
	};

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
			
			if (message === null) {
				
				$http({
					url: '/pages/sessionLogin.php',
					method: "POST",
					data: $.param({'data' : response}),
					headers: {'Content-Type': 'application/x-www-form-urlencoded'},
				}).success(function() {
					$scope.addUserToSession(response);
					$window.location.reload();
					$location.url('/cart');	
				});
			}
		});
	};
	
	$scope.addUserToSession = function(user) {
		sessionStorage.setItem('UsuarioLogado', JSON.stringify(user));
	};
	
	
}]);