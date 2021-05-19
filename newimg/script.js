$(document).ready(function(){

	
	// Header cart click
	$('.header_cart_link').on('click', function(event){
		if ($('.header_cart_circle:lt(1)').text() == 0) {
			event.preventDefault();
			// alert('В корзине пока что пусто...');
			 $('.cart_error_blackout').fadeIn(400);
             $('.cart_error_modal').fadeIn(400);
		};
	})

	$('.cart_error_blackout').on('click',function(){
        $('.cart_error_blackout').fadeOut(400);
        $('.cart_error_modal').fadeOut(400);
    })

    $('.cart_error_button').on('click',function(){
        $('.cart_error_blackout').fadeOut(400);
        $('.cart_error_modal').fadeOut(400);
    })

	// mobile menu

	$('.hamb_menu').on('click', function(){
		$('.mobile_menu').toggleClass('opened');
		$('body').toggleClass('fixed_body');
	})

	// header search

	$('.header_search_button').on('click', function(){
		$('.search_block').toggleClass('active');
	})

	// Если корпус без дисковода
	$('.corpus_input').on('click', function(){
		var diskrom = $(this).attr('data-diskovod');
		if (diskrom == 'Нет') {
			$('#comto21').hide();
			$('.side_nav_link.diskrom').hide();
		} else {
			$('#comto21').show();
			$('.side_nav_link.diskrom').show();
		}
	})
 //С главной "Easy Builder"
 $('.bitrix_builder .builder_form_btn').on('click', function(event){
	event.preventDefault();
	var tel = '';
	tel += $('.bitrix_builder .form_input_tel').val();

	if (isNaN(tel.substr(-1))) {
			$('.bitrix_builder .form_input_tel').addClass('error');
			return 0;
	};

	var email = $('.bitrix_builder input[name="email"]').val();
	var name = $('.bitrix_builder input[name="name"]').val();
	var summa = $('.slider_title_inner_input.slider_block_price_input_first').val() + ' - ' + $('.slider_title_inner_input.slider_block_price_input_second').val();
	var comment = $('.bitrix_builder .builder_textarea').val();
	var tasks = '';
	$('.bitrix_builder input[type="checkbox"]:checked').each(function(event) {
		tasks += $(this).val() + '; ';
	})
	ga('send', 'event', 'consultacia', 'click');
	$.post('php/new_lid.php', { type: 'easybuilder', summa: summa, comment: comment, tasks: tasks, email: email, name: name, tel: tel, city: city_name, utm_source: utm_source, utm_medium: utm_medium, utm_compaign: utm_compaign, utm_content: utm_content, utm_term: utm_term }, function(data) {
		window.location.href = 'http://регард.com/thanks.html';
	})
})


	// Подписаться на рассылку
	$('.newsletter_submit').on('click', function(event){
		event.preventDefault();
		var email = $('.newsletter_input').val();
		th = $(this);
		th.prop('disabled', true);

		var mailCheck = email.indexOf('@');
		console.log(mailCheck);
		console.log(email.length);
    	if (mailCheck == -1 || email.length == 0) {
			$('.newsletter_input').addClass('error');
			th.prop('disabled', false);
    	} else {
			$('.newsletter_input').removeClass('error');
			$.post('../../../php/subscribe.php', {email: email}, function(data){
				th.prop('disabled', false);
				// alert('Спасибо');
				 $('.newsletter_blackout').fadeIn(400);
	             $('.newsletter_modal').fadeIn(400);
			});
    	}


	})

	// Следить за ценой
	$('.pchk_submit').on('click', function(event){
		event.preventDefault();
		var email = $('.pchk_input').val();
		th = $(this);
		th.prop('disabled', true);

		$.post('../../../php/subscribe_price.php', {email: email}, function(data){
			th.prop('disabled', false);
			// alert('Спасибо');
			$('#pchk').fadeOut(200);
			$('.newsletter_blackout').fadeIn(400);
	        $('.newsletter_modal').fadeIn(400);
		});

	})

	$('.newsletter_blackout').on('click',function(){
        $('.newsletter_blackout').fadeOut(400);
        $('.newsletter_modal').fadeOut(400);
    })

    $('.newsletter_modal_button').on('click',function(){
        $('.newsletter_blackout').fadeOut(400);
        $('.newsletter_modal').fadeOut(400);
    })

	// let page = 1;
	// let price_from = 0;
	// let price_before = 60000;
	// let sort = 'popular';
	// let cpu_level = 1;
	// let gpu_level = 1;
	// $('body').on('click', '.change_filter', function(){

	// 	var dataObj = {page: page, price_from: price_from, price_before: price_before, sort: sort, cpu_level: cpu_level, gpu_level: gpu_level };
	// 	var param = '';
	// 	$('input.change_filter:checked').each(function(val){
	// 		if (param == $(this).attr('name')) {
	// 			dataObj[$(this).attr('name')] += ',' + $(this).attr('value');
	// 		} else {
	// 			param = $(this).attr('name');
	// 			dataObj[$(this).attr('name')] = $(this).attr('value');
	// 		}
	// 	})

	// 	$.get('../../php/product-filter.php', dataObj, function(data){
	// 		// $('.catalog_products_container_table_view').remove();
	// 		// $('.catalog_products_container_list_view').remove();
	// 		// $('.paginator').remove();
	// 		$('.filters_product_blocks_container').html(data);
	// 		// console.log(data);
	// 		// $('.catalog_products_container_table_view').css('display','none');
	// 		// $('.catalog_products_container_list_view').css('display','none');
	// 		// $('.catalog_products_container_'+view+'_view').show();
	// 	})

	// })

})