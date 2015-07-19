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
	$scope.usuario = null;
	$scope.user = 'Entrar';

	$scope.initListProduct = function() {
		$scope.loadUserLogged();
		$scope.loadCartFromSessionStorage();
		
		var marcaIdParameter = $scope.retrieveParameter();
		ProductService.getProductList($scope.setProductList, marcaIdParameter);
	};
	
	$scope.loadUserLogged = function() {
		var usuario = sessionStorage.getItem('UsuarioLogado');
		if (usuario && usuario != 'null') {
			$scope.usuario = JSON.parse(usuario);
			$scope.user = 'Olá ' + $scope.usuario.nome + " - Sair";
		} else {
			$scope.user = 'Entrar';	
		}
	};
	
	$scope.listMoreSolded = function() {
		$scope.loadCartFromSessionStorage();
		$scope.productList = [];
		ProductService.getMoreSoldList($scope.callBackListMoreSolded);
	};
	
	$scope.callBackListMoreSolded = function(listMoreSolded) {
		if (listMoreSolded) {
			for (var i = 0; i < listMoreSolded.length; i++) {
				var product = listMoreSolded[i];
				ProductService.getProductInformation($scope.addProductToList, product.produto_id);
			}
		}
	};
	
	$scope.addProductToList = function(product) {
		$scope.productList = $scope.productList.concat(product);
		$scope.$apply();
	};
	
	$scope.loadCartFromSessionStorage = function() {
		var itens = sessionStorage.getItem('customerCart');
		
		if (itens !== null) {
			var itensInSession = JSON.parse(itens);
			$scope.cartItens = itensInSession;
			$scope.updateBillingAccount();
		}
		
		$scope.setCartMessage();
		$scope.clearMessages();
	};

	$scope.clearMessages = function() {
		$scope.messageError = null;
		$scope.displayMessageError = false;
		$scope.displayMessage = false;
		$scope.message = null;
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
			cliente_id: $scope.usuario.id,
			data_venda: now.getTime()
		};

		VendaService.saveTableVenda($scope.callBackSaveTableVenda, JSON.stringify(vendaObject));
	};
						  
	$scope.callBackSaveTableVenda = function(responseData) {
		if (responseData && responseData.id) {
			
			for (var i = 0; i < $scope.cartItens.length; i++) {
				
				var vendaProductObj = {
					venda_id: responseData.id,
					produto_id: $scope.cartItens[i].id
				};
				
				VendaService.saveTableProdutosVenda(JSON.stringify(vendaProductObj));
			}
			
			$scope.clearChart();
			$scope.displayMessage = true;		
			$scope.message = 'Pedido Finalizado com sucesso!';
			$scope.loadPedidos();
			
		} else {
			$scope.displayMessageError = true;
			$scope.messageError = 'Erro ao finalizar o pedido. Por favor entre em contato com o administrador.';
		}
		
		$scope.$apply();
	};
	
	$scope.clearChart = function() {
		$scope.cartItens = [];
		$scope.updateChart();
	};
	
	$scope.loadPedidos = function() {
		VendaService.loadPedidos($scope.setPedidos, $scope.usuario.id);
	};
	
	$scope.setPedidos = function(pedidos) {
		if (pedidos && pedidos !== '{"result":"Not matched"}') {
			
			for (var i = 0; i < pedidos.length; i++) {
				var pedido = pedidos[i];
				var timestamp = parseInt(pedido.data_venda);
				pedido.data_venda = new Date(timestamp);
			}
			
			$scope.pedidos = pedidos;
			$scope.$apply();
		}
	};
	
}]);