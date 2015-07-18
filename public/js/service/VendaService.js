app.factory('VendaService', function() {
	
	var service = {};
	
	service.saveTableVenda = function(callBack, order) {		
		var apiUrl = 'api/order';
		
		$.ajax({
			type: 'POST',
			contentType: 'application/json',
			data: order,
			url: apiUrl,
			success: function(responseData) {
				callBack(responseData);
			},
			error: function(responseData) {
				callBack(responseData);
			}
		});
	};

	service.saveTableProdutosVenda = function(productsOrder) {		
		var apiUrl = 'api/products_order';
		
		$.ajax({
			type: 'POST',
			contentType: 'application/json',
			data: productsOrder,
			url: apiUrl,
			success: function(responseData) {
				console.log(responseData);
			},
			error: function(responseData) {
				console.log(responseData);
			}
		});
	};
	
	service.loadPedidos = function(callBack, customerId) {
		var apiUrl = 'api/order/' + customerId;
		
		$.ajax({
			type: 'GET',
			contentType: 'application/json',
			url: apiUrl,
			success: function(responseData) {
				callBack(responseData);
			},
			error: function() {
				callBack(responseData);
			}
		});
	};
	
	return service;
	
});