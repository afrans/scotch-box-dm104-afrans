app.factory('ProductService', function() {
	
	var service = {};
	
	service.getProductList = function(callBack, marcaId) {
		
		var apiUrl = 'api/products';
		if (marcaId) {
			apiUrl += '/marca_id/' + marcaId;
		}		
		
		$.ajax({
			type: 'GET',
			contentType: 'application/json',
			url: apiUrl,
			success: function(responseData) {
				callBack(responseData);
			},
			error: function() {
				console.log('Error to add guest ');
			}
		});
	};
	
	service.getProductInformation = function() {
		//TODO: XRODFAR
	};
	
	return service;
	
});