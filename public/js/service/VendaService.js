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
		//TODO RODRIGO CHAMAR SERVIÇO AQUI
		if (callBack) {
			callBack([
				{
					venda_id: 1,
					data_venda: 1437161980569,
					valor_total: 2500,
					status: 'Aguardando'
				},
				{
					venda_id: 4,
					data_venda: 1437161980569,
					valor_total: 5100,
					status: 'Entregue'
				},
				{
					venda_id: 8,
					data_venda: 1437161980569,
					valor_total: 15962.55,
					status: 'Deu erro'
				}
			]);
		}
	};
	
	return service;
	
});