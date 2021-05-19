$(document).ready(function(){

payNum = 2;
payNumPp = 2;
// privat slider
	   		function changePaySum(){
	   			currentValue = newPrice;
	   			var comission = (currentValue / 100) * 2.75;
	   			var comissionForPrivat = ((currentValue + comission)/ 100) * 2.9;

	   			var newCommisionPrice = currentValue / 0.9725;
	   			currentPrice = currentValue / 0.9725;
	   			payInMonth = (currentPrice + (payNum*currentPrice*0.029)) / payNum;
				$('.privat_info_payment_field span').html(payInMonth.toFixed());
				// $('.privat_info_all_price_field span').html( (payInMonth * payNum).toFixed(2) );
				$('.privat_info_all_price_field span').html( (currentPrice).toFixed(2) );

				payInMonthPp = currentValue / (payNumPp + 1);
				$('.privat_info_payment_field_pp span').html(payInMonthPp.toFixed());
	   		}

	   		changePaySum();

			var select = $( ".privat_first_slider_select" );
    		var slider = $( ".privat_first_slider" ).slider({
			    min: 1,
			    max: 24,
			    range: "min",
			    value: select[ 0 ].selectedIndex + 1,
			    classes: {
	   				"ui-slider": "privat_first_ui_slider",
	  				"ui-slider-handle": "privat_first_ui_handle",
	  				"ui-slider-range": "privat_first_ui_range"
	   			},
			    slide: function( event, ui ) {
			      select[ 0 ].selectedIndex = ui.value - 1;
			      $('.payment_number span').text(ui.value + 1);
			      payNum = ui.value + 1;
			      changePaySum();
			    }
		    });
		    $( ".privat_first_slider_select" ).on( "change", function() {
		      	slider.slider( "value", this.selectedIndex + 1 );
		      	$('.payment_number span').text(this.selectedIndex + 2);
		      	payNum = this.selectedIndex + 2;
		      	changePaySum();
		    });


		    var selectPp = $( ".privat_pp_slider_select" );
    		var sliderPp = $( ".privat_pp_slider" ).slider({
			    min: 1,
			    max: 3,
			    range: "min",
			    value: selectPp[ 0 ].selectedIndex + 1,
			    classes: {
	   				"ui-slider": "privat_first_ui_slider",
	  				"ui-slider-handle": "privat_first_ui_handle",
	  				"ui-slider-range": "privat_first_ui_range"
	   			},
			    slide: function( event, ui ) {
			      selectPp[ 0 ].selectedIndex = ui.value - 1;
			      $('.payment_number_pp span').text(ui.value + 1);
			      payNumPp = ui.value;
			      changePaySum();
			    }
		    });
		    $( ".privat_pp_slider_select" ).on( "change", function() {
		      	sliderPp.slider( "value", this.selectedIndex + 1);
		      	$('.payment_number_pp span').text(this.selectedIndex + 2);
		      	payNumPp = this.selectedIndex + 1;
		      	changePaySum();
		    });

})