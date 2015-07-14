app.factory('ProductService', function() {
	
	var service = {};
	
	service.getProductList = function() {
		//TODO: Rodrigo: Change this code to call REST Service
		var responseData = [
			{
				id: 21,
				name: 'Smartphone Nokia Lumia 630',
				description: 'Smartphone Nokia Lumia 630 Preto Dual Sim, Tv Digital ,Windows Phone 8.1, Tela 4.5", QuadCore 1.2GHz, Câm. 5MP, WiFi, Bluetooth e A-Gps -Tim',
				url_image: 'http://www.pontofrio-imagens.com.br/Control/ArquivoExibir.aspx?IdArquivo=46900634',
				price: '369.00'
			},
			{
				id: 22,
				name: 'iPhone 6 Plus 128GB',
				description: 'iPhone 6 Plus 128GB - IOS8, Tela de 5,5 polegadas, Cinza espacial, 128GB, Chip A8 com arquitetura de 64 bits, Nova câmera iSight de 8MP com pixels de 1,5 µ',
				url_image: 'http://store.storeimages.cdn-apple.com/4662/as-images.apple.com/is/image/AppleInc/aos/published/images/i/ph/iphone6p/gray/iphone6p-gray-select-2014?wid=470&hei=556&fmt=png-alpha&qlt=95&.v=1411520620409',
				price: '4699.00'
			},
			{
				id: 23,
				name: 'Smartphone Samsung Galaxy Core Plus TV',
				description: 'Smartphone Samsung Galaxy Core Plus TV Preto, Dual SIM,3G,Android 4.3, Tela 4.3, Dual core 1.2 Ghz,Câmera 5.0 MP, Memória 4 GB',
				url_image: 'http://webfones.vteximg.com.br/arquivos/ids/186372-1000-1000/Smartphone_Samsung_Galaxy_Core_Plus_TV_Preto_2.jpg',
				price: '599.00'
			}
		];
		
		return responseData;
	};
	
	return service;
	
});