var XdevpusakaDatatable = function( config ) {

	this.error 	= false;

	this.limit 		= 5;
	this.orders 	= {};

	this.page 		= 1;
	this.pages 		= 1;
	this.count  	= 0;

	this.record 	= [];

	this.param 		= {};
	this.search 	= '';

	this.headers 	= {};

	this.resp 	= function( response ) {
		
		return response;

	}

	if( config.response != undefined ) {

		this.resp = config.response;

	}

	if( config.headers != undefined ) {

		this.headers = config.headers;

	}

	this.next 	= function() {

		if( this.page < this.pages ) {
			this.page += 1;
			this.fetch();
		}

	}

	this.prev 	= function() {

		if( this.page > 1 ) {
			this.page -= 1;
			this.fetch();
		}

	}

	this.fetch 	= function() {

		try {

			var ref 	= this;
			var url 	= config.url;

			var params 	= {
				_param	: JSON.stringify(ref.param),
				_page 	: ref.page,
				_search : ref.search,
				_limit 	: ref.limit
			}

			axios
	            .get( url, { params: params, headers: ref.headers } )
	            .then(response => {
	            	response 	= config.response(response);
	                ref.record 	= response.data.record;
	                ref.page 	= response.data._page;
					ref.pages 	= response.data._pages;
					ref.count  	= response.data.count;
	            })
	            .catch(error => {
	                console.log(error)
	                ref.error = true;
	            })
	            .finally(function(){

	            });

	    }catch(e){

	    	console.log(e);

	    }

	}

}