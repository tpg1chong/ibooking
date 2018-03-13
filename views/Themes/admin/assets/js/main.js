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


$(document).ready(function() {

	$(window).load(function(){
		$(".navigation-trigger").click(function(e){
			e.preventDefault();
			$("body").toggleClass("is-pushed-left",!$("body").hasClass("is-pushed-left"));
			$.get( app.getUri("admin/navTrigger"), {status:$("body").hasClass("is-pushed-left")?1:0} );
		});

	}), $(window).resize(function() {
	}), $(window).scroll(function() {
	}), $(window).on(function() {
	});
});