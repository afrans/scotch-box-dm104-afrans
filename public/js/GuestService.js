var GuestService = {

	list: [],
	
	add: function(guest, callback) {
		$.ajax({
			type: 'POST',
			contentType: 'application/json',
			url: 'api/guest',
			data: JSON.stringify(guest),
			success: function(addedGuest) {
				console.log('Guest created!' + guest.id + guest.user);
				callback(addedGuest);
                //console.log('Guest created!' + addedGuest.user);
			},
			error: function() {
				console.log('Error to add guest ' + guest.user);
			}
		});
	},
	
	remove: function(guest) {
		//TODO to implemented
	},
	
	getList: function(callback) {
		$.ajax({
			type: 'GET',
			url: 'api/guests',
			dataType: 'json',
			success: function(list) {
				callback(list);
			}
		});
	},
	
	saveToLocalStorage: function () {
		var listJson = JSON.stringify(GuestService.list);
		window.localStorage.setItem('guestlist', listJson);
	},
	
	retrieveFromLocalStorage: function () {
		var listJson = window.localStorage.getItem('guestlist');
		if(listJson) {
			GuestService.list = JSON.parse(listJson);
		}
	}
}