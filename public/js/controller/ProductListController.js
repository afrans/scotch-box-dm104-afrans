app.controller('ProductListController', ['$location', '$scope', 'ProductService', 'VendaService', function($location, $scope, ProductService, VendaService) {
	
	$scope.productList = [];
	$scope.cartItens = [];
	$scope.pedidos = [];
	$scope.cartMessage = '';
	$scope.billingAccount = 0;
	$scope.messageError = null;
	$scope.displayMessageError = false;
	$scope.displayMessage = false;
	$scope.message = null;

	$scope.initListProduct = function() {
		$scope.loadCartFromSessionStorage();
		
		var marcaIdParameter = $scope.retrieveParameter();
		ProductService.getProductList($scope.setProductList, marcaIdParameter);
		
		$scope.displayMessage = false;
		$scope.message = null;
	};
	
	$scope.loadCartFromSessionStorage = function() {
		var itens = sessionStorage.getItem('customerCart');
		
		if (itens !== null) {
			var itensInSession = JSON.parse(itens);
			$scope.cartItens = itensInSession;
			$scope.updateBillingAccount();
		}
		$scope.setCartMessage();
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
	
	$scope.addProduct = function(product) {
		$scope.cartItens.push(product);
		$scope.updateChart();
		
		$scope.displayMessage = true;		
		$scope.message = 'Produto Adicionado ao Carrinho!';
	};
	
	$scope.updateChart = function() {
		sessionStorage.setItem('customerCart', JSON.stringify($scope.cartItens));
		$scope.setCartMessage();
		$scope.updateBillingAccount();
	};
	
	$scope.updateBillingAccount = function() {
		$scope.billingAccount = 0.0;
		
		if ($scope.cartItens) {
			
			for (var i = 0; i < $scope.cartItens.length; i++) {
				var item = $scope.cartItens[i];
				var price = parseFloat(item.preco);
				$scope.billingAccount += price;
			}
		}
	};
	
	$scope.setCartMessage = function() {
		
		var itemsInCart = 0;
		var itens = sessionStorage.getItem('customerCart');
		
		if (itens !== null) {
			var itensInSession = JSON.parse(itens);
			itemsInCart = itensInSession.length;	
		}
		
		
		if (itemsInCart === 0) {
			$scope.cartMessage = 'Vazio';
			
		} else if (itemsInCart === 1) {
			$scope.cartMessage = itemsInCart + ' item';
		
		} else {
			$scope.cartMessage = itemsInCart + ' itens';
		}
	};
	
	$scope.removeItem = function(product) {
		for (var i = 0; i < $scope.cartItens.length; i++) {
			var item = $scope.cartItens[i];
			
			if (product.id === item.id) {
				
				$scope.cartItens.splice(i, 1);
				$scope.updateChart();
				break;
			}
		}
	};
	
	$scope.closeOrdered = function() {
		var now = new Date();
		
		var vendaObject = {
			cliente_id: 10,
			data_venda: now.getDate(),
			produtos_venda: []
		};
		
		for (var i = 0; i < $scope.cartItens.length; i++) {
			var item = $scope.cartItens[i];
			vendaObject.produtos_venda.push(item.id);
		}
		
		VendaService.save($scope.callBackVenda, JSON.stringify(vendaObject));
	};
						  
	$scope.callBackVenda = function(responseData) {
		if (responseData && responseData.result === 'SUCCESS') {
			$scope.clearChart();
			
		} else {
			$scope.displayMessageError = true;
			$scope.messageError = 'Erro ao finalizar o pedido. Por favor entre em contato com o administrador.';
		}
	};
	
	$scope.clearChart = function() {
		$scope.cartItens = [];
		$scope.updateChart();
	};
	
	$scope.loadPedidos = function() {
		VendaService.loadPedidos($scope.setPedidos);
	};
	
	$scope.setPedidos = function(pedidos) {
		$scope.pedidos = pedidos;
	};
	
}]);