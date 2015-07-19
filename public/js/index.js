var app = angular.module("smartphoneStore", ['ngRoute']);

app.config(['$routeProvider', function ($routeProvider) {
		$routeProvider
			.when('/', {
				templateUrl: 'pages/productList.php'
			})
			.when('/marca/:id', {
				templateUrl: 'pages/productList.php'
			})
			.when('/product/:id', {
				templateUrl: 'pages/product.php'
			})
			.when('/login', {
				templateUrl: 'pages/login.php'
			})
			.when('/cart', {
				templateUrl: 'pages/cart.php'
			})
			.when('/customer', {
				templateUrl: 'pages/customer.php'
			})
			.when('/mais_vendidos', {
				templateUrl: 'pages/maisVendidos.php'
			})
			.otherwise({
				redirectTo: '/'
			});
	}]);