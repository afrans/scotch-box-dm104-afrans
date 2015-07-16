var app = angular.module("smartphoneStore", ['ngRoute']);

app.config(function ($routeProvider) {
		$routeProvider
			.when('/', {
				templateUrl: 'pages/productList.php'
			})
			.when('/product/:id', {
				templateUrl: 'pages/product.php'
			})
			.when('/login', {
				templateUrl: 'pages/login.php'
			})
			.otherwise({
				redirectTo: '/'
			});
	});