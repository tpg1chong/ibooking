/*! =========================================================
          .o88
          "888
 .oooo.    888  .oo.    ..o88.     ooo. .oo.    .oooo`88
d88' `8b   88bP"Y88b   888P"Y88b  "888P"Y88b   888' `88b 
888        88b   888   888   888   888   888   888   888
888. .88   888   888   888   888   888   888   888. .880
 8`bo8P'  o888o o888o   8`bod8P'  o888o o888o   .oooo88o
                                                     088`
                                                    .o88
============================================================ */

(function($) {

	$(document).ready(function() {

		function init() {
			console.log(  );
		}

		/*function initClient() {
			app.client.init({
            	clientId: 'a123b',
			}).then( function ( res ) {
				console.log( 'then', res );
			}, function(error) {
				console.log( 'error' );
			});
		}*/

		// var fullWidth = $(window).width();
		init(), $(window).load(function(){

			/*app.load('plugin:lightbox', function () {

				$.lightbox( app.getUri('__test/lightbox/form'), function (e) {
					
				});
			});*/

		}), $(window).resize(function() {
			console.log( 'resize' );
		}), $(window).scroll(function() {
			console.log( 'scroll' );
		}), $(window).on(function() {
			// var height = $(window).height();
			console.log( 'on' );
		});
		
	});

})(jQuery);