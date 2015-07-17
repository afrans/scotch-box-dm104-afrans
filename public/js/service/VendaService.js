app.factory('VendaService', function() {
	
	var service = {};
	
	service.save = function(callBack, customer) {
		//TODO RODRIGO CHAMAR SERVIÇO AQUI
		if (callBack) {
			callBack({'result': 'SUCCESS'});
		}
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