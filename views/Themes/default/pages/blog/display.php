





<div class="ui-datepicker-div" data-plugin="datepicker2">
	<div class="ui-datepicker from"></div>
	<div class="ui-datepicker to"></div>
</div>

<style type="text/css">
	#footer-primary, .page-header-top{
		display: none;
	}

	.ui-datepicker-div{

		margin: 20px;
		width: 580px;
		
		min-height: 250px;

		border-radius: 8px;
		box-shadow: 0 0 4px rgba(0,0,0,.2), 0 0 16px rgba(0,0,0,.1); 
		background-color: #fff;

		display: -ms-flexbox;
	    display: flex;
	}

	.ui-datepicker-div .ui-datepicker{
		width: 50%;
		padding: 8px;
		 
	}
	/*.ui-datepicker-div .ui-datepicker:first-child{
		padding-left: 8px;
		
	}
	.ui-datepicker-div .ui-datepicker:last-child{
		padding-right: 8px;
	}*/


	.ui-datepicker-header{
	    text-align: center;
	    position: relative;
	    height: 30px;
	}
	.ui-datepicker-title{
		display: inline-block;
		line-height: 30px;
		font-size: 18px;
		font-weight: bold;
	}
	.ui-datepicker-title .year{
		margin-left: 6px;
		color: #ef5f3c
	}
	.ui-datepicker-header .action{
		position: absolute;
		top: 0;
		width: 30px;
		height: 30px;
		top: 0;
		border-radius: 50%;
		
	}

	.ui-datepicker-header .action:hover{
		background-color: #eee;
	}
	.ui-datepicker-header .action.next{
		right: 0;
	}
	.ui-datepicker-header .action.prev{
		left: 0
	}
	.ui-datepicker-calendar{
		width: 100%;
	}

	.ui-datepicker-calendar th, .ui-datepicker-calendar td {
	    width: 40px;
	    text-align: center;
	    height: 40px;
	}
	.ui-datepicker-calendar th{
		height: auto;
		padding-top: 4px;
		padding-bottom: 4px;
		border-bottom: 1px solid #eee;
		color: #888;
		font-size: 85%;
	}
	.ui-datepicker-calendar td{
		position: relative;
		
	}

	.ui-datepicker-calendar td[data-date]{
		cursor: pointer;
	}
	.ui-datepicker-calendar td span{
		position: relative;
	}
	.ui-datepicker-calendar td:hover span{
		color: #2098f7;
	}
	.ui-datepicker-calendar td.overtime, .ui-datepicker-calendar td.active{
		cursor: default;
	}
	.ui-datepicker-calendar td.overtime span, .ui-datepicker-calendar td.today.overtime span{
		color: #ccc;
	}
	.ui-datepicker-calendar td.today span{
		font-weight: bold;
		color: #2098f7;
	}

	.ui-datepicker-calendar td.active span{
		font-weight: bold;
		color: #fff;
		text-shadow: 0 1px 1px rgba(0,0,0,.2);
		
	}
	.ui-datepicker-calendar td.today.active span{
		font-weight: bold;
		color: #fce400
	}
	.ui-datepicker-calendar td.active:before{
		content: '';
	    background-color: #2098f7;
	    position: absolute;
	    top: 1px;
	    left: 0;
	    right: 0;
	    bottom: 1px;
	}
	.ui-datepicker-calendar td.active.start:before/*, .ui-datepicker-calendar tr td.active:first-child:before*/{
		border-top-left-radius: 20px;
		border-bottom-left-radius: 20px;
	}
	.ui-datepicker-calendar td.active.end:before/*, .ui-datepicker-calendar tr td.active:last-child:before*/{
		border-top-right-radius: 20px;
		border-bottom-right-radius: 20px;
	}
	.ui-datepicker-calendar td.active.noday:before{
		display: none;
	}



	/*.ui-datepicker-header>*{
		display: -ms-flexbox;
    	display: flex;
	}*/
</style>

<script type="text/javascript">
	
	var DatePicker2 = {
		init: function ( options, elem ) {
			var self = this;

			self.$elem = $(elem);
			self.today = new Date();
			self.today.setHours(0, 0, 0, 0);

			self.options = {
				startDate: new Date(),
				endDate: new Date(),
				firstDayOfWeek: 1,
				lang: 'th',

				min: 1,
				max: 30,
				period: 1,

				overStartDate: new Date(),
			};

			if( self.options.overStartDate ){
				self.overStartDate = new Date(self.options.overStartDate);
				self.overStartDate.setHours(0, 0, 0, 0);
			}

			if( self.options.overEndDate ){
				self.overEndDate = new Date(self.options.overEndDate);
				self.overEndDate.setHours(0, 0, 0, 0);
			}
			
			

			self.startDate = new Date(self.today);
			self.endDate = new Date(self.startDate);
			self.endDate.setDate( self.endDate.getDate() + self.options.period );


			// set Data
			self.calendar = [
				{
					$elem: self.$elem.find('.ui-datepicker.from'),
					selectDate: new Date( self.startDate ),
					action: {
						prev: true
					}
				}, 
				{
					$elem: self.$elem.find('.ui-datepicker.to'),
					selectDate: new Date(),
					action: {
						next: true
					}
				}
			];

			self.updateCalendar();
			self.event();
		},

		setCalendar: function (data) {
			var self = this;

 			var theDate = new Date( data.selectDate );
			var firstDate = new Date( theDate.getFullYear(), theDate.getMonth(), 1);
			firstDate = new Date(theDate);
	        firstDate.setDate(1);
	        var firstTime = firstDate.getTime();
			var lastDate = new Date(firstDate);
	        lastDate.setMonth(lastDate.getMonth() + 1);
	        lastDate.setDate(0);
	        var lastTime = lastDate.getTime();
	        var lastDay = lastDate.getDate();

			// Calculate the last day in previous month
	        var prevDateLast = new Date(firstDate);
	        prevDateLast.setDate(0);
	        var prevDateLastDay = prevDateLast.getDay();
	        var prevDateLastDate = prevDateLast.getDate();

	        var prevweekDay = self.options.firstDayOfWeek;
	
			prevweekDay = prevweekDay>prevDateLastDay
				? 7-prevweekDay
				: prevDateLastDay-prevweekDay;

			var $tbody = $('<tbody>');
			var lists = [];
			for (var y = 0, i = 0; y < 7; y++){

				var $tr = $('<tr>');
				var row = [];
				var weekInMonth = false;

				for (var x = 0; x < 7; x++, i++) {
					var p = ((prevDateLastDate - prevweekDay ) + i);

					var call = {};
					var n = p - prevDateLastDate;
					call.date = new Date( theDate ); 
					call.date.setHours(0, 0, 0, 0); 
					call.date.setDate( n );

					call.date_str = call.date.getFullYear();
					m = call.date.getMonth()+1; 
					call.date_str += "-" + (m < 10 ? "0"+m:m);

					d = call.date.getDate(); 
					call.date_str += "-" + (d < 10 ? "0"+d:d);

					$td = $('<td>');


					if( self.startDate.getTime()==call.date.getTime() ){
						$td.addClass('start');
					}

					if( self.endDate.getTime()==call.date.getTime() ){
						$td.addClass('end');
					}

					if( self.overStartDate ){
						if( self.overStartDate.getTime() > call.date.getTime() ){
							$td.addClass('overtime');
						}
					}

					if( self.overEndDate ){
						if( self.overEndDate.getTime() < call.date.getTime() ){
							$td.addClass('overtime');
						}
					}

					if( self.startDate.getTime() <= call.date.getTime() && self.endDate.getTime() >= call.date.getTime() ){
						$td.addClass('active');
					}

					// If value is outside of bounds its likely previous and next months
	            	if (n >= 1 && n <= lastDay){
	            		weekInMonth = true;

	            		$td.attr('data-date', call.date_str );

	            		$td.append( $('<span>', {text: n}) );

	            		if( self.today.getTime()==call.date.getTime()){
	            			$td.addClass('today');
	                    	call.today = true;
	                    }

	                    /*if( theDate.getTime()==call.date.getTime() ){

	                    	$td.addClass('selected');
	                    	call.selected = true;
	                    }*/
	            	}
	            	else{
	            		call.noday = true;

	            		$td.addClass('noday');
	            	}

	            	/*if( self.date.startDate ){
                    	if( self.date.startDate.getTime()>call.date.getTime() ){
                    		call.empty = true;
                    	}
                    }*/

	            	$tr.append( $td );                    
					row.push(call);
				}

				if( row.length>0 && weekInMonth ){

					// console.log( row );
					$tbody.append( $tr ) ;
					lists.push(row);
				}
			}

			var $header = $('<div>', {class: 'ui-datepicker-header'});
			var $title = $('<div>', {class: 'ui-datepicker-title'}).append(
				  $('<span>', {class: 'month', text: Datelang.month( theDate.getMonth(), 'normal', self.options.lang )} )
				, $('<span>', {class: 'year', text: Datelang.year( theDate.getFullYear(), 'normal', self.options.lang )} )
			);

			var $actionPrev = $('<button>', {type: 'button', class: 'action prev', 'data-action': 'prev'}).html( $('<i>', {class: 'icon-chevron-left'}) );
			var $actionNext = $('<button>', {type: 'button', class: 'action next', 'data-action': 'next'}).html( $('<i>', {class: 'icon-chevron-right'}) );


			var $thead = $("<tr>", {class: 'header'});
			for (var x=0,i=self.options.firstDayOfWeek; x<7; x++, i++) {
				$thead.append( $('<th>', {text: Datelang.day(i, 'short', self.options.lang ) }) );
				if( i>=6 ){ i = -1; }
			};
			$thead = $('<thead/>').html( $thead );


			$header.append( data.action.prev ? $actionPrev: '', $title, data.action.next ?$actionNext:'' );
			var $table = $('<table>', {class: 'ui-datepicker-calendar'});

			$table.append( $thead, $tbody );
			data.$elem.empty().append( $header, $table );
		},

		updateCalendar: function () {
			var self = this;

			self.calendar[1].selectDate.setMonth( self.calendar[0].selectDate.getMonth()+1 );
			if( typeof self.calendar === 'object'  ){
				$.each(self.calendar, function(i, obj) {
					self.setCalendar( obj );
				});
			}
			else{
				self.setCalendar( self.calendar );
			}
		},

		event: function () {
			var self = this;

			self.$elem.delegate('[data-action=next], [data-action=prev]', 'click', function(event) {
				var action = $(this).data('action');

				if( action=='next' ){
					self.calendar[0].selectDate.setMonth( self.calendar[0].selectDate.getMonth()+1 );
					
				}
				else{
					self.calendar[0].selectDate.setMonth( self.calendar[0].selectDate.getMonth()-1 );
				}

				self.updateCalendar();
			});

			self.$elem.delegate('[data-date]', 'click', function() {

				if( $(this).hasClass('overtime') ) return false;

				var date = new Date( $(this).data('date') );
				date.setHours(0, 0, 0, 0);
				var time = date.getTime();


				self.startDate = date;
				self.endDate = new Date(date);

				self.endDate.setDate( self.endDate.getDate() + self.options.period );

				/*if( time < self.endDate.getTime() ){
					self.startDate = date;
				}
				else{
					self.endDate = date;
				}*/

				self.updateCalendar();
			});
		}
	};

	$.each( $('[data-plugin=datepicker2]'), function() {
		var $this = Object.create( DatePicker2 );
		$this.init( {}, this );
		// $.data( this, 'datepicker2', $this );
	});

	
</script>