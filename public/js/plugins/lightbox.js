// Utility
if ( typeof Object.create !== 'function' ) {
	Object.create = function( obj ) {
		function F() {};
		F.prototype = obj;
		return new F();
	};
}

(function( $, window, document, undefined ) {

	var Lightbox = {
		init: function (options, elem) {
			var self = this;

			self.$elem = $(elem);
			self.set( $.extend( {}, $.fn.lightbox.options, options ) );

			var uri = self.$elem.attr('href');
			self.$elem.removeAttr('href');

			console.log( 'uri: ', uri );
			
			if( !self.options.toggle || !uri ) return false;

			self.$elem.click(function(e) {
				e.preventDefault();
				self.load( uri );
			});
		},

		set: function ( options ) {
			this.options = $.extend( {}, $.fn.lightbox.settings, options );
		},

		load: function (url, post, callback) {
			var self = this;
			Event.showMsg({ load:true });

			self.fetch( url, post ).done(function( results ) {

				if( results.error ){

					if( !results.message || results.message=='' ){
						results.message = 'Error 400';
					}

					Event.showMsg({text: results.message, load: 1, auto: 1});
					return false;
				}

				self.open( results, callback );
			});
		},
		fetch: function(url, getData){

			return $.ajax({
				url: url,
				data: getData,
				dataType: 'json'
			})
			.always(function() {
				Event.hideMsg();
			})
			.fail(function() { 
				Event.showMsg({ text: "Error 404", load: true , auto: true });
			});
		},

		open: function (options, callback) {
			var self = this;

			// set options
			self.settings = $.extend( {}, $.fn.lightbox.settings, options );
			console.log( self.settings );
			// setElemDialog
			
			self.setElemDialog();

			self.resize();
			$(window).resize(function(){
				self.resize();
			});


			if( self.settings.effect ){
				setTimeout(function(){ self.display(); }, 150);
			}
			else{
				self.display();
			}

			// return self;
		},

		newElemDialog: function () {
			var self = this;

			self.classDefault = "model model-dialog"; //hidden_elem
			self.$pop = $('<div/>', {class: 'model-container'});
			self.$dialog = $('<div/>').addClass( self.classDefault ).html( self.$pop ) ;
			self.$doc = $('#doc');
			
			$('body').append( self.$dialog );
		},
		setElemDialog: function () {
			var self = this;

			self.newElemDialog();

			// insert Content
			self.$pop.html( self.setContent( self.settings ) );

			if( self.settings.effect ){
				self.$dialog.addClass( 'effect-' +  self.settings.effect );
			}

			if( self.settings.width ){
				if( self.settings.width=='full'){
					self.settings.width = $(window).width() - 80;
				}
				self.$pop.css("width", self.settings.width);	
			}

			// check btn close
			if( self.$pop.find('[data-action=close]').length==0 ){

				self.$pop.append( $('<button>', { type:"button", 'data-action': 'close' }).addClass('model-close').html( $('<i/>', {class: 'icon-remove'}) ) );
			}

			/* -- actions -- */
			/*self.$actions = $('<div>', {class: 'model-actions'});
			self.$pop.append( self.$actions );
			
			if( self.settings.close==true ){
				self.$actions.append( $('<button>', { type:"button", 'data-action': 'close', 'class': 'action close' }).html( $('<i>', {class: 'icon-remove'}) ) );
			}*/

			self.$dialog.addClass( self.settings.bg || 'black' );
		},
		setContent: function( s ){
			// content
			var $elem = $( s.form || '<div/>' )
				.addClass("model-content")
				.addClass( s.addClass )
				.addClass( s.style ? 'style-'+s.style: '' );

			// Input hidden
			if( s.hiddenInput ){
				$elem.append( this.setHiddenInput( s.hiddenInput ) );
			}

			// Title
			if( s.title ){
				$elem.append( $('<div/>', {class: 'model-title'}).html(s.title) );
			}

			// Summary
			if( s.summary ){
				$elem.append( $('<div/>', {class: 'model-summary'}).html(s.summary) );
			}

			// Body
			if( s.body ){
				$elem.append( $('<div/>', {class: 'model-body'}).html(s.body) );
			}

			// Buttons
			if( s.button || s.bottom_msg ){

				var $buttons = $('<div/>', {class: 'model-buttons clearfix'});

				if ( s.button ){
	                $buttons.append( $('<div/>', {class: 'rfloat mlm'}).html(s.button) );
				}

	            if ( s.bottom_msg ){
	            	$buttons.append( $('<div/>', {class: 'model-buttons-msg'}).html(s.bottom_msg) );
	            }

	            $elem.append($buttons);
			}

			// Footer
			if( s.footer ){
				$elem.append( $('<div/>', {class: 'model-footer'}).html(s.footer) );
			}

			return $elem;
		},
		setHiddenInput: function( data ){
			return $.map( data, function(obj, i){
				return $('<input/>', {
					class: 'hiddenInput',
					type: "hidden",
					autocomplete: "off"
				}).attr( obj )[0];
			});
		},
		resize: function(){
			var self = this;

			var area = $(window).height(), margin = 80;

			if( self.settings.height ){

				var height = self.settings.height;
				var overflow = self.settings.overflowY || 'scroll';
				var $inner = self.$pop.find( self.settings.$height || '.model-body' );

				var outer = 0;
					inner = $inner.outerHeight();

				area -= margin;

				outer += self.$pop.find('.model-title').outerHeight();
				outer += self.$pop.find('.model-summary').outerHeight();
				outer += self.$pop.find('.model-buttons').outerHeight();

				if( height=='auto' && (inner+outer)>area ){
					height = parseInt(area-outer);
				}
				else if( height=='full' ) {
					self.$pop.find('.model-body').css('padding', 0);
					height = parseInt(area-outer);
				}

				$inner.css({
					height: height,
					overflowY: overflow
				});
			}

			// console.log( self.$pop.height(), area-margin );
			if( self.$pop.height() > (area-margin) ){
				$('body').addClass('overflow-page');
			}
			else if($('body').hasClass('overflow-page')){
				$('body').removeClass('overflow-page');
			}
			
			// self.resizeHeight();
			var marginTop = ($(window).height()/2) - (self.$pop.height()/2);

			marginTop = marginTop<25 ? 25:marginTop;
			self.$pop.css( 'margin-top', marginTop);
		},

		display: function () {
			var self = this;

			Event.plugins( self.$dialog );

			// 
			if( !$( 'html' ).hasClass('hasModel') ){
				setTimeout(function () {
					$( 'html' ).addClass('hasModel');
				},200);
				// 
				self.$doc.addClass('fixed_elem').css('top', $(window).scrollTop()*-1 );
			}
			$(window).scrollTop( 0 );

			// show
			self.$dialog.addClass("show").addClass('active');


			// event close
			self.$dialog.find('[data-action=close]').click(function() {
				self.close();
			});
		},

		close: function ( $el ) {
			var self = this;

			var scroll = parseInt( $("#doc").css("top") );
				scroll= scroll < 0 ? scroll*-1:scroll;

			console.log( scroll );
			self.$dialog.removeClass("show");

			console.log( 'close' );

			setTimeout( function(){
				self.$dialog.remove();

				// 
				$('html').removeClass('hasModel');
				$("#doc").removeClass('fixed_elem').css('top', "");
				$(window).scrollTop( scroll );

			}, 250);
		}
	};


	$.fn.lightbox = function( options ) {
		return this.each(function() {
			var $this = Object.create( Lightbox );
			$this.init( options, this );
			$.data( this, 'lightbox', $this );
		});
	};
	$.fn.lightbox.options = {
		toggle: 1,
	};
	$.fn.lightbox.settings = {
		effect: 5,
	};

	$.lightbox = function ( options ) {
		var $this = Object.create( Lightbox );
		$this.set( options );
		return $this;
	};
	
})( jQuery, window, document );