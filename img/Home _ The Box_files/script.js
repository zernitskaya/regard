$(document).ready(function(){
	
	var boxSize = 'small';
	var deliveryPeriod = 'twoInWeek';
	var deliveryDay = 'wednesday';
	var deliveryTime = '17';
	var price = 400;

	function changePrice(){
		$('.total_price span').text(price);
	};

	changePrice();

	$('.choose_box_size_btn').on('click', function(){
		$('.choose_box_size_btn').removeClass('active');
		$(this).addClass('active');
		boxSize = $(this).attr('data-size');
		price = $(this).attr('data-price');
		changePrice();
	});

	$('.choose_delivery_period_button').on('click', function(){
		$('.choose_delivery_period_button').removeClass('active');
		$(this).addClass('active');
		deliveryPeriod = $(this).attr('data-period');
	});

	$('.choose_day_button').on('click', function(){
		$('.choose_day_button').removeClass('active');
		$(this).addClass('active');
		deliveryDay = $(this).attr('data-day');
	});

	$('.choose_time_button').on('click', function(){
		$('.choose_time_button').removeClass('active');
		$(this).addClass('active');
		deliveryTime = $(this).attr('data-time');
	});
})