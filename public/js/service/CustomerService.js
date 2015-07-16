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
	
	return service;
	
});