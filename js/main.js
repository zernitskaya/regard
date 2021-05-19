$(document).ready(function(){

	// mobile top systems

	if($(window).width() < 1000){
		$('.top_systems_mobile_container').slick({
			arrows: false,
			dots: true,
			appendDots: $('.mobile_product_blocks_dots')
		})
	}

	if($(window).width() < 1000){
		$('.custom_builder_mobile_container').slick({
			arrows: false,
			dots: true,
			appendDots: $('.custom_builder_mobile_container_dots')
		})
	}

	// promo slider

	$('.promo_slider').slick({
		infinite: true,
		speed: 1000,
		fade: true,
		prevArrow: $('.promo_slider_left'),
		nextArrow: $('.promo_slider_right'),
		dots: true,
		appendDots: $('.promo_slider_dots'),
		autoplay: true
	})

	// promo video modal

	$('.promo_video_inner.first').on('click', function(){
		$('#video_1').fadeIn(400);
	})

	$('.promo_video_inner.second').on('click', function(){
		$('#video_2').fadeIn(400);
	})

	$('.video_modal_close').on('click', function(){
		$('.video_blackout').fadeOut(400);
	})

	$('.video_blackout').on('click', function(){
		$(this).fadeOut(400);
	})


	// open daily deal

	$('.daily_deal_link').on('click', function(){
		$('.daily_deal_blackout').fadeIn(400);
		$('body').css('overflow','hidden')
	})

	$('.daily_deal_blackout').on('click', function(){
		$(this).fadeOut(400);
		$('body').css('overflow','visible')
	})

	$('.daily_deal_modal_close').on('click', function(){
		$('.daily_deal_blackout').fadeOut(400);
		$('body').css('overflow','visible')
	})

	// sort by perfomance

	var sortBy = 'computers'

	$('.sort_by_perfomance_type_switch_button').on('click', function(){
		if($(this).hasClass('acitve') == false){
			$('.sort_by_perfomance_type_switch_button').removeClass('active');
			$(this).addClass('active');
			var sortBy = $(this).attr('data-sort');
			$('.sort_by_perfomance_buttons_container').css('display','none')
			$('#sort_by_'+ sortBy).css('display','block');
		}
	})

		var amdIntelSort = 1

		//  amd-intel sort

		$('.intel-amd_switch_intel_icon').on('click', function(){
			$('.intel-amd_switch_amd_icon').removeClass('active');
			$(this).addClass('active');
			$('.intel-amd_switch_slider_dragger').removeClass('right');
			amdIntelSort = 1
		})

		$('.intel-amd_switch_amd_icon').on('click', function(){
			$('.intel-amd_switch_intel_icon').removeClass('active');
			$(this).addClass('active');
			$('.intel-amd_switch_slider_dragger').addClass('right');
			amdIntelSort = 2
		})

		$('.intel-amd_switch_slider').on('click', function(){
			if(amdIntelSort == 1){
				$('.intel-amd_switch_intel_icon').removeClass('active');
				$('.intel-amd_switch_amd_icon').addClass('active');
				$('.intel-amd_switch_slider_dragger').addClass('right');
				amdIntelSort = 2
			} else {
				$('.intel-amd_switch_amd_icon').removeClass('active');
				$('.intel-amd_switch_intel_icon').addClass('active');
				$('.intel-amd_switch_slider_dragger').removeClass('right');
				amdIntelSort = 1
			}
		})

		// 15-17 inch sort

		displaysSort = 1

		$('.fif-sev_switch_fif_icon').on('click', function(){
			$('.fif-sev_switch_sev_icon').removeClass('active');
			$(this).addClass('active');
			$('.fif-sev_switch_slider_dragger').removeClass('right');
			displaysSort = 1;
		})

		$('.fif-sev_switch_sev_icon').on('click', function(){
			$('.fif-sev_switch_fif_icon').removeClass('active');
			$(this).addClass('active');
			$('.fif-sev_switch_slider_dragger').addClass('right');
			displaysSort = 2;
		})

		$('.fif-sev_switch_slider').on('click', function(){
			if(displaysSort == 1){
				$('.fif-sev_switch_fif_icon').removeClass('active');
				$('.fif-sev_switch_sev_icon').addClass('active');
				$('.fif-sev_switch_slider_dragger').addClass('right');
				displaysSort = 2;
			} else{
				$('.fif-sev_switch_fif_icon').addClass('active');
				$('.fif-sev_switch_sev_icon').removeClass('active');
				$('.fif-sev_switch_slider_dragger').removeClass('right');
			}
		})

		// computer cpu

		var computerCpuSort = 1

		$('#sort_computers_by_cpu_left').on('click', function(){
			$('#sort_computers_by_cpu').removeClass('center right')
			computerCpuSort = 1
		})

		$('#sort_computers_by_cpu_center').on('click', function(){
			$('#sort_computers_by_cpu').removeClass('right')
			$('#sort_computers_by_cpu').addClass('center')
			computerCpuSort = 2
		})

		$('#sort_computers_by_cpu_right').on('click', function(){
			$('#sort_computers_by_cpu').removeClass('center')
			$('#sort_computers_by_cpu').addClass('right')
			computerCpuSort = 3
		})

		// computer gpu

		var computerGpuSort = 1

		$('#sort_computers_by_gpu_left').on('click', function(){
			$('#sort_computers_by_gpu').removeClass('center right')
			computerGpuSort = 1
		})

		$('#sort_computers_by_gpu_center').on('click', function(){
			$('#sort_computers_by_gpu').removeClass('right')
			$('#sort_computers_by_gpu').addClass('center')
			computerGpuSort = 2
		})

		$('#sort_computers_by_gpu_right').on('click', function(){
			$('#sort_computers_by_gpu').removeClass('center')
			$('#sort_computers_by_gpu').addClass('right')
			computerGpuSort = 3
		})

		// laptop gpu

		$('#sort_laptops_by_gpu_left').on('click', function(){
			$('#sort_laptops_by_gpu').removeClass('center right')
		})

		$('#sort_laptops_by_gpu_center').on('click', function(){
			$('#sort_laptops_by_gpu').removeClass('right')
			$('#sort_laptops_by_gpu').addClass('center')
		})

		$('#sort_laptops_by_gpu_right').on('click', function(){
			$('#sort_laptops_by_gpu').removeClass('center')
			$('#sort_laptops_by_gpu').addClass('right')
		})

		// computer memory

		var computerMemorySort = 1

		$('#sort_computers_by_memory_left').on('click', function(){
			$('#sort_computers_by_memory').removeClass('center right')
			computerMemorySort = 1
		})

		// $('#sort_computers_by_memory_center').on('click', function(){
		// 	$('#sort_computers_by_memory').removeClass('right')
		// 	$('#sort_computers_by_memory').addClass('center')
		// 	computerMemorySort = 2
		// })

		$('#sort_computers_by_memory_right').on('click', function(){
			$('#sort_computers_by_memory').removeClass('center')
			$('#sort_computers_by_memory').addClass('right')
			computerMemorySort = 2
		})


	$('.main_page_sort_change').on('click', function(){
		$('.sort_by_perfomance_product_blocks_container_inner').css('opacity','0');
		$('.sort_by_perfomance_product_blocks_container_inner').slick('unslick');
		$.get(
			'php/sort-by-perfomance.php',
			{
				intel_amd_sort : amdIntelSort,
				computer_cpu_sort : computerCpuSort,
				computer_gpu_sort : computerGpuSort,
				computer_memory_sort : computerMemorySort
			},
			function(data){
				$('.sort_by_perfomance_product_blocks_container_inner').html(data);
				sortQuantityCheck();
				Cackle.bootstrap(true);
			}
		);
	})

	// sort by perfomance

	function sortQuantityCheck(){
		var sortBlocksLength = $('.sort_by_perfomance_product_blocks_container_inner .product_block').length

		var sortCoef

		if($(window).width() > 1500){
			sortCoef = 4
		} else if($(window).width() > 1210){
			sortCoef = 3
		} else if($(window).width() > 980){
			sortCoef = 2
		}

		if(sortBlocksLength > sortCoef){
			$('.sort_by_perfomance_product_blocks_container_inner').slick({
				infinite: false,
	  			slidesToShow: sortCoef,
	  			slidesToScroll: 1,
	  			nextArrow: $('.sort_next_arrow'),
	  			prevArrow: $('.sort_prev_arrow')
			})
		}
		$('.sort_by_perfomance_product_blocks_container_inner').animate({'opacity':'1'},300)
	}
	sortQuantityCheck();

	

	// about us

	$('.about_us_block_title').on('click', function(){
		$('.about_us_block_text').slideToggle(400);
		$('.about_us_block_title_arrow').toggleClass('opened');
	})

	// top systems

	var topSystemsBlocksLength = $('.top_systems_inner_length_check').outerWidth()
	$('.top_systems_inner').css('width', topSystemsBlocksLength + 1)

	$('.top_systems_next_arrow').on('click', function(){
		$('.top_systems_inner_container').animate({scrollLeft:'+=295'},600)
	})

	$('.top_systems_prev_arrow').on('click', function(){
		$('.top_systems_inner_container').animate({scrollLeft:'-=295'},600)
	})

	// custom builder

	$('.custom_builder_item_link').on('mouseenter', function(){
		var currentConfig = $(this).attr('data-link')
		$('.custom_builder_item_link').removeClass('hover');
		$(this).addClass('hover');
		$('.custom_builder_block_link').css('display','none')
		$('#config'+ currentConfig).css('display','block')
	})

	// если корзина пустая

})








