app.factory('ProductService', function() {
	
	var service = {};
	
	service.getProductList = function(callBack) {
		$.ajax({
			type: 'GET',
			contentType: 'application/json',
			url: 'api/all_products',
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