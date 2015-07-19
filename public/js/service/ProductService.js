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
				console.log('Error to retrieve products');
			}
		});
	};
	
	service.getProductInformation = function(callBack, productId) {
		var apiUrl = 'api/products/id/' + productId;
		
		$.ajax({
			type: 'GET',
			contentType: 'application/json',
			url: apiUrl,
			success: function(responseData) {
				callBack(responseData);
			},
			error: function() {
				console.log('Error to retrieve products');
			}
		});
	};
	
	service.getMoreSoldList = function(callBack) {
		var apiUrl = 'api/sold_6';
		
		$.ajax({
			type: 'GET',
			contentType: 'application/json',
			url: apiUrl,
			success: function(responseData) {
				callBack(responseData);
			},
			error: function() {
				console.log('Error to retrieve products');
			}
		});
	};
	
	return service;
	
});