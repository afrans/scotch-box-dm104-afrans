app.controller('CustomerController', ['$scope', '$location', '$window', 'CustomerService', function($scope, $location, $window, CustomerService) {
	
	$scope.nome = null;
	$scope.sobreNome = null;
	$scope.cpf = null;
	$scope.email = null;
	$scope.confirmaEmail = null;
	$scope.password = null;
	$scope.confirmaPassword = null;
	$scope.telefone = null;
	$scope.endereco = null;
	$scope.bairro = null;
	$scope.cidade = null;
	$scope.estado = null;
	$scope.displayMessageError = false;
	$scope.messageError = null;
	
	$scope.save = function() {
		if ($scope.validateEmailAndPassword()) {
			var customer = $scope.createCustomerJson();
			CustomerService.save($scope.afterSave, customer);
		}
	};
	
	$scope.validateEmailAndPassword = function() {
		if ($scope.email !== $scope.confirmaEmail) {
			$scope.displayMessageError = true;
			$scope.messageError = 'E-mail tem que ser igual no campo "E-mail" e "Confirma E-mail"';
			return false;
		}
		
		if ($scope.password !== $scope.confirmaPassword) {
			$scope.displayMessageError = true;
			$scope.messageError = 'Senha tem que ser igual no campo "Senha" e "Confirma Senha"';
			return false;
		}
		
		return true;
	};
	
	$scope.createCustomerJson = function() {
		var customerJson = {};
		customerJson.nome = $scope.nome;
		customerJson.sobrenome = $scope.sobreNome;
		customerJson.cpf = $scope.cpf;
		customerJson.email = $scope.email;
		customerJson.senha = $scope.password;
		customerJson.telefone = $scope.telefone;
		customerJson.endereco = $scope.endereco;
		customerJson.bairro = $scope.bairro;
		customerJson.cidade = $scope.cidade;
		customerJson.estado = $scope.estado;
		
		return JSON.stringify(customerJson);
	};
	
	$scope.afterSave = function(responseData) {
		if (responseData && responseData.result === 'SUCCESS') {
			$scope.$apply(function() {
				$window.location.reload();
			});
			
		} else {
			$scope.displayMessageError = true;
			$scope.messageError = 'Erro ao realizar o cadastro. Por favor entre em contato com o administrador.';
		}
	};
	
}]);