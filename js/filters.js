$(document).ready(function(){

	// price slider

	let page = 1;
	let price_from = 0;
	let price_before = 150000;
	let sort = 'popular';
	let cpu_level = 0;
	let gpu_level = 0;
	let game_id = 12;
	let resolution = '2k';
	let settings = 'min';

	$('.change_fps_show').on('click', function(){
		
		if ($(this).hasClass('game_select_dropdown_item')) {
			game_id = $(this).attr('data-game');
		};

		if ($(this).hasClass('resolution_select_dropdown_item')) {
			resolution = $(this).attr('data-resolution');
		};

		if ($(this).hasClass('quality_select_dropdown_item')) {
			settings = $(this).attr('data-settings');
		};

		let products = [];

		$('.product_block').each(function(val){
			products.push($(this).attr('data-prod'));
		})

		products_str = products.join(',');

		$.getJSON('../php/get_fps.php', {game_id: game_id, settings: settings, resolution: resolution, products: products_str}, function(data){
			
			$('.product_block .fliters_fps_line_block_line_inner').removeClass('short');

			$.each( data, function( key, val ) {

				
				res_fps = 0;
				cur_fps = parseInt(val['fps']);
				
				if (cur_fps < 140) {
					res_fps = parseInt(cur_fps)  + 45;
				}

				if (cur_fps >= 140 ) {
					cur_fps = 140;
					res_fps = parseInt(cur_fps) + 60;
				}

				$('.product_block[data-prod=' + val['comp_id'] + '] .fliters_fps_line_block_title_num').html(cur_fps);
				$('.product_block[data-prod=' + val['comp_id'] + '] .fliters_fps_line_block_line_inner').css('width', res_fps + 'px');

				if (res_fps < 100) {
					$('.product_block[data-prod=' + val['comp_id'] + '] .fliters_fps_line_block_line_inner').addClass('short');
				};
			
			})

		});


	})

	$('.filters_reset_button').on('click', function(){
		price_from = 0;
		price_before = 150000;
		sort = 'popular';
		cpu_level = 0;
		gpu_level = 0;
		setValueOfInputs();
		// changeHandlesTooltips()
		$('.filters_perfomance_button').removeClass('selected');
		$('.filters_slider_block_slider').slider({
			values: [0, 150000]
		})
		$('.change_filter').attr('checked', false);
		$('.filters_block_filter_label:nth-child(1) input').prop('checked', true);
	})


	$('body').on('click change', '.change_filter', function(){

		if ($(this).hasClass('price_change') == false) { // Если это не "Применить цену"
			
			if ($(this).hasClass('firstL') == false) { // Если нажато что-то, кроме "Все"
				$(this).parent().parent().find('.firstL').prop('checked', false);
				
				// Если нет больше никаких чекнутых
				if ($(this).parent().parent().find('input:checked').length == 0) {
					$(this).parent().parent().find('input.firstL').prop('checked', true);
				};

			} else {
				$(this).parent().parent().find('input').prop('checked', false);
				$(this).prop('checked', true);
			}

		}
		// console.log(search);

		var dataObj = {page: page, price_from: price_from, price_before: price_before, sort: sort, cpu_level: cpu_level, gpu_level: gpu_level, search: search, game_id: game_id, resolution: resolution, settings: settings };
		var param = '';
		$('input.change_filter:checked').each(function(val){
			if (param == $(this).attr('name')) {
				dataObj[$(this).attr('name')] += ',' + $(this).attr('value');
			} else {
				param = $(this).attr('name');
				dataObj[$(this).attr('name')] = $(this).attr('value');
			}
		})

		$.get('../../php/product-filter-2.php', dataObj, function(data){
			// $('.catalog_products_container_table_view').remove();
			// $('.catalog_products_container_list_view').remove();
			// $('.paginator').remove();
			$('.filters_product_blocks_container').html();
			$('.filters_product_blocks_container').html(data);
			var compCountIs = $('.ajax_comps_count').html();
			$('.filter_comp_count').html(compCountIs);
			if (compCountIs == 0) {
				$('.filters_product_blocks_container').html('<isn style="color: #fff;font-size: 18px;font-weight: 400;margin-left: 20px;">По вашему запросу ничего не найдено...<isn>');	
			}
			
			// console.log(data);
			// $('.catalog_products_container_table_view').css('display','none');
			// $('.catalog_products_container_list_view').css('display','none');
			// $('.catalog_products_container_'+view+'_view').show();
			Cackle.bootstrap(true);
			
		})

	})

	const setValueOfInputs = () => {
		$('.filters_slider_input_to').val(price_before)
		$('.filters_slider_input_from').val(price_from)
	}

	setValueOfInputs();

	$('.filters_slider_block_slider').slider({
		range: true,
		min: 0,
		max: 150000,
		values: [0, 150000],
		classes: {
			"ui-slider": "filters_slider",
  			"ui-slider-handle": "filters_slider_handle",
  			"ui-slider-range": "filters_slider_range"
		},
		slide: function( event, ui){
			let currentValues = ui.values;
			price_from = currentValues[0];
			price_before = currentValues[1];
			setValueOfInputs();
			$('.filters_slider_block_apply_button').css('display','block');
			// changeHandlesTooltips()
		}
	})

	$('.filters_slider_input_from').on('change, keyup', function(){
		let currentVal = $(this).val()
		if(currentVal > 150000){
			currentVal = 150000
			$('.filters_slider_input_from').val(currentVal)
		}
		$('.filters_slider_block_slider').slider('values', 0, currentVal);
		price_from = currentVal;
		// changeHandlesTooltips()
		$('.filters_slider_block_apply_button').css('display','block');
	})

	$('.filters_slider_input_from').on('change', function(){
		let currentVal = $(this).val()
		if(currentVal == ''){
			currentVal = 0;
			$('.filters_slider_input_from').val(currentVal)
		}
		$('.filters_slider_block_slider').slider('values', 0, currentVal);
		price_from = currentVal;
		// changeHandlesTooltips()
		$('.filters_slider_block_apply_button').css('display','block');
	})

	$('.filters_slider_input_to').on('change, keyup', function(){
		let currentVal = $(this).val()
		if(currentVal > 150000){
			currentVal = 150000
			$('.filters_slider_input_to').val(currentVal)
		}
		$('.filters_slider_block_slider').slider('values', 1, currentVal);
		price_before = currentVal;
		// changeHandlesTooltips()
		$('.filters_slider_block_apply_button').css('display','block');
	})

	$('.filters_slider_input_to').on('change', function(){
		let currentVal = $(this).val()
		if(currentVal == ''){
			currentVal = 0;
			$('.filters_slider_input_to').val(currentVal)
		}
		$('.filters_slider_block_slider').slider('values', 1, currentVal);
		price_before = currentVal;
		// changeHandlesTooltips()
		$('.filters_slider_block_apply_button').css('display','block');
	})

	// $('.filters_slider_handle').append('<div class="filters_slider_handle_tooltip"></div>')

	// const changeHandlesTooltips = () => {
	// 	$('.filters_slider_handle_tooltip:first').text(price_from)
	// 	$('.filters_slider_handle_tooltip:last').text(price_before)
	// }

	// changeHandlesTooltips()

	$('.filters_slider_block_apply_button').on('click', function(){
		$(this).css('display', 'none');
	})


	// cpu gpu

	$('.filters_perfomance_button').on('click', function(){
		$(this).siblings('.filters_perfomance_button').removeClass('selected');
		$(this).addClass('selected');
	})

	$('.filters_perfomance_button.cpu').on('click', function(){
		cpu_level = $(this).attr('data-value')
	})

	$('.filters_perfomance_button.gpu').on('click', function(){
		gpu_level = $(this).attr('data-value')
	})

	// sort select

	$('.sort_select').on('click', function(){
		$('.sort_dropdown').toggleClass('opened');
		$('.sort_select').toggleClass('opened');
	})

	$('.sort_dropdown_item').on('click', function(){
		let currentSort = $(this).text();
		sort = $(this).attr('data-sort');
		$('.sort_select').text(currentSort);
		$('.sort_dropdown').removeClass('opened');
		$('.sort_select').removeClass('opened');

	})

	// open closed filters 

	$('.filters_block_title.closed').on('click', function(){
		$(this).toggleClass('active');
		$(this).next().slideToggle();
	})

	// FPS selects

	$('.game_select').on('click', function(){
		$('.game_select_dropdown').toggleClass('opened');
	})

	$('.game_select_dropdown_item').on('click', function(){
		var currentVal = $(this).text()
		$('.game_select').text(currentVal);
		$('.game_select_dropdown').removeClass('opened');
		changeFpsImage()
	})

	$('.resolution_select').on('click', function(){
		$('.resolution_select_dropdown').toggleClass('opened');
	})

	$('.resolution_select_dropdown_item').on('click', function(){
		var currentVal = $(this).text()
		$('.resolution_select').text(currentVal);
		$('.resolution_select_dropdown').removeClass('opened');
	})

	$('.quality_select').on('click', function(){
		$('.quality_select_dropdown').toggleClass('opened');
	})

	$('.quality_select_dropdown_item').on('click', function(){
		var currentVal = $(this).text()
		$('.quality_select').text(currentVal);
		$('.quality_select_dropdown').removeClass('opened');
	})

	// FPS image change


	function changeFpsImage(){
		$('.filters_fps_block_image').css('display','none')
		var currentGame = $('.game_select').text();
		if(currentGame == 'Dota 2'){
			$('#dota').css('display','block');
		} else if(currentGame == 'GTA 5'){
			$('#gta').css('display','block');
		} else if(currentGame == 'World of Tanks'){
			$('#wot').css('display','block');
		} else if(currentGame == 'PUBG'){
			$('#pubg').css('display','block');
		} else if(currentGame == 'Battlefield 1'){
			$('#battlefield').css('display','block');
		} else if(currentGame == 'Call of Duty: WWII'){
			$('#cod').css('display','block');
		}


	}

	changeFpsImage();


	


})


















