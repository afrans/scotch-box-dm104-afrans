app.factory('CustomerService', function() {
	
	var service = {};
	
	service.authentication = function(callBack, user, password) {
		var apiUrl = 'api/login/' + user + '/' + password;
		
		$.ajax({
			type: 'POST',
			contentType: 'application/json',
			url: apiUrl,
			success: function(responseData) {
				callBack(responseData);
			},
			error: function() {
				console.log('Error to add client');
			}
		});
	};
	
	service.save = function(callBack, customer) {
		var apiUrl = 'api/client';
		
		$.ajax({
			type: 'POST',
			contentType: 'application/json',
			data: customer,
			url: apiUrl,
			success: function(responseData) {
				callBack(responseData);
			},
			error: function(responseData) {
				callBack(responseData);
			}
		});
	};
	
	
	
	return service;
	
});