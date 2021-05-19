	var newPrice;
	var oldPrice;
$(document).ready(function(){

	var thanx = 'Спасибо! Наш менеджер свяжется с вами в ближайшее время.';
	 // scroll

	  $('a.scrolltoBlock').click(function () {
        elementClick = jQuery(this).attr("href")
        destination = jQuery(elementClick).offset().top - 50;
        jQuery("html:not(:animated),body:not(:animated)").animate({scrollTop: destination}, 1000);
        return false;
	});

	 $('a.scrollto').click(function () {
        elementClick = jQuery(this).attr("href")
        destination = jQuery(elementClick).offset().top - 50;
        jQuery("html:not(:animated),body:not(:animated)").animate({scrollTop: destination}, 1000);
        return false;
	});

	  $('a.scrolltoTop').click(function () {
        elementClick = jQuery(this).attr("href")
        destination = jQuery(elementClick).offset().top;
        jQuery("html:not(:animated),body:not(:animated)").animate({scrollTop: destination}, 1000);
        return false;
	});

	 // 

	 $('.mobile_menu_btn').on('click', function(){
		$(this).toggleClass('active');
		$('.mobile_menu_block').slideToggle(300)
	})

     // nav bar

	$(window).scroll(function() {
   	   if ($(this).scrollTop() > 2700) {
          $('.scroll_nav_bar').fadeIn(400);
       } else {
         $('.scroll_nav_bar').fadeOut(400);
       }
	});

	// product page bottom price

	// $(window).scroll(function() {
 //   	   if ($(this).scrollTop() > 600) {
 //          $('.bottom_price_nav').fadeIn(400);
 //       } else {
 //         $('.bottom_price_nav').fadeOut(400);
 //       }
	// });

	// accordion

	$('.accordion_btn').on('click', function(){
		$(this).next().slideToggle();
		$(this).toggleClass('active');
	})

	// tabs

	var tabBtn = 'tab_conf'
	var tabFixedBtn = 'tab_conf'

	$('#'+tabBtn+'_content').css('display','block');

	$('.tcibb_prev').on('click', function(){
		tabBtn = $(this).attr('data');
		tabFixedBtn = $(this).attr('data')
		$('.tab_btn').removeClass('active');
		$(this).addClass('active');
		$('.tab_content_inner').fadeOut();
		$('#'+tabBtn+'_content').fadeIn();
	})
	$('.tcibb_next').on('click', function(){
		tabBtn = $(this).attr('data');
		tabFixedBtn = $(this).attr('data')
		$('.tab_btn').removeClass('active');
		$(this).addClass('active');
		$('.tab_content_inner').fadeOut();
		$('#'+tabBtn+'_content').fadeIn();
	})

	$('.tabs_fixed_btn').on('click', function(){
		tabBtn = $(this).attr('data');
		tabFixedBtn = $(this).attr('data')
		$('.tabs_fixed_btn').removeClass('active');
		$(this).addClass('active');
		$('.tabs_fixed_btn .tabs_fixed_triangle_border').css('display','block');
		$('.tabs_fixed_btn.active .tabs_fixed_triangle_border').css('display','none');
		$(this).prev().find('.tabs_fixed_triangle_border').css('display','none')
		$('.tab_content_inner').fadeOut();
		$('#'+tabBtn+'_content').fadeIn();
	})

	$('#backToConf').on('click', function(){
		$('.tabs_fixed_btn').removeClass('active');
		$('#tfc').addClass('active')
		$('.tabs_fixed_btn .tabs_fixed_triangle_border').css('display','block');
		$('.tabs_fixed_btn.active .tabs_fixed_triangle_border').css('display','none');
		$('#tfc').prev().find('.tabs_fixed_triangle_border').css('display','none')
		$('body, html').animate({scrollTop: tabNavOffset}, 400)
	})
	$('#toAccess').on('click', function(){
		$('.tabs_fixed_btn').removeClass('active');
		$('#tfa').addClass('active')
		$('.tabs_fixed_btn .tabs_fixed_triangle_border').css('display','block');
		$('.tabs_fixed_btn.active .tabs_fixed_triangle_border').css('display','none');
		$('#tfa').prev().find('.tabs_fixed_triangle_border').css('display','none')
		$('body, html').animate({scrollTop: tabNavOffset}, 400)
	})
	$('#backToAccess').on('click', function(){
		$('.tabs_fixed_btn').removeClass('active');
		$('#tfa').addClass('active')
		$('.tabs_fixed_btn .tabs_fixed_triangle_border').css('display','block');
		$('.tabs_fixed_btn.active .tabs_fixed_triangle_border').css('display','none');
		$('#tfa').prev().find('.tabs_fixed_triangle_border').css('display','none')
		$('body, html').animate({scrollTop: tabNavOffset}, 400)
	})
	$('#toFps').on('click', function(){
		$('.tabs_fixed_btn').removeClass('active');
		$('#tff').addClass('active')
		$('.tabs_fixed_btn .tabs_fixed_triangle_border').css('display','block');
		$('.tabs_fixed_btn.active .tabs_fixed_triangle_border').css('display','none');
		$('#tff').prev().find('.tabs_fixed_triangle_border').css('display','none')
		$('body, html').animate({scrollTop: tabNavOffset}, 400)
	})
	$('#backToFps').on('click', function(){
		$('.tabs_fixed_btn').removeClass('active');
		$('#tff').addClass('active')
		$('.tabs_fixed_btn .tabs_fixed_triangle_border').css('display','block');
		$('.tabs_fixed_btn.active .tabs_fixed_triangle_border').css('display','none');
		$('#tff').prev().find('.tabs_fixed_triangle_border').css('display','none')
		$('body, html').animate({scrollTop: tabNavOffset}, 400)
	})
	$('#toComments').on('click', function(){
		$('.tabs_fixed_btn').removeClass('active');
		$('#tfo').addClass('active')
		$('.tabs_fixed_btn .tabs_fixed_triangle_border').css('display','block');
		$('.tabs_fixed_btn.active .tabs_fixed_triangle_border').css('display','none');
		$('#tfo').prev().find('.tabs_fixed_triangle_border').css('display','none')
		$('body, html').animate({scrollTop: tabNavOffset}, 400)
	})
	$('#backToVideo').on('click', function(){
		$('.tabs_fixed_btn').removeClass('active');
		$('#tfv').addClass('active')
		$('.tabs_fixed_btn .tabs_fixed_triangle_border').css('display','block');
		$('.tabs_fixed_btn.active .tabs_fixed_triangle_border').css('display','none');
		$('#tfv').prev().find('.tabs_fixed_triangle_border').css('display','none')
		$('body, html').animate({scrollTop: tabNavOffset}, 400)
	})
	$('#toVideo').on('click', function(){
		$('.tabs_fixed_btn').removeClass('active');
		$('#tfv').addClass('active')
		$('.tabs_fixed_btn .tabs_fixed_triangle_border').css('display','block');
		$('.tabs_fixed_btn.active .tabs_fixed_triangle_border').css('display','none');
		$('#tfv').prev().find('.tabs_fixed_triangle_border').css('display','none')
		$('body, html').animate({scrollTop: tabNavOffset}, 400)
	})
	$('#tfc').on('click', function(){
		$('.tab_btn').removeClass('active');
		$('#tc').addClass('active');
	})
	$('#tfa').on('click', function(){
		$('.tab_btn').removeClass('active');
		$('#ta').addClass('active');
	})
	$('#tff').on('click', function(){
		$('.tab_btn').removeClass('active');
		$('#tf').addClass('active');
	})
	$('#tfo').on('click', function(){
		$('.tab_btn').removeClass('active');
		$('#to').addClass('active');
	})

	

	// конфигуратор


	var additionalPrice = 0;


	var procPrice
	var procTitle 

	var videocardPrice
	var videocardTitle
	var newVideocardTitle

	var coolerPrice
	var coolerTitle

	var fanPrice
	var fanTitle

	var ddrPrice
	var ddrTitle
	var newDdrTitle

	var hddPrice
	var hddTitle

	var ssdPrice
	var ssdTitle

	var matPrice
	var matTitle

	var blockPrice
	var blockTitle

	var diskPrice
	var diskTitle

	var compPrice
	var compTitle

	payInMonth = 0;
	payNum = 2;
	currentValue = newPrice;
	payNumPp = 2;

	function numWithSpace(num){	

		if(num > 10000){
			var n = num.toString();
			var result = n.slice(0,2) + ' ' +n.slice(2);
			return result
		} else {
			var n = num.toString();
			var result = n.slice(0,1) + ' ' +n.slice(1);
			return result
		}
	}

	function labelColorCheck(){
		$('.radio_label input').parent().removeClass('active')
		$('.radio_label input:checked').parent().addClass('active')
	}

	function titleCheck(){
		procTitle = $('.proc_label input:checked').siblings('.radio_description').find('.radio_description_title').text()
		$('.proc_btn').text(procTitle)

		videocardTitle = $('.videocard_label input:checked').siblings('.radio_description').find('.radio_description_title').text()
		$('.videocard_btn').text(videocardTitle)

		newVideocardTitle = $('.videocard_label input:checked').parent('.videocard_label').attr('data-title');

		coolerTitle = $('.cooler_label input:checked').siblings('.radio_description').find('.radio_description_title').text()
		$('.cooler_btn').text(coolerTitle)

		fanTitle = $('.fan_label input:checked').siblings('.radio_description').find('.radio_description_title').text()
		$('.fan_btn').text(fanTitle)

		ddrTitle = $('.ddr_label input:checked').siblings('.radio_description').find('.radio_description_title').text()
		$('.ddr_btn').text(ddrTitle)

		newDdrTitle = $('.ddr_label input:checked').parent('.ddr_label').attr('data-title');

		hddTitle = $('.hdd_label input:checked').siblings('.radio_description').find('.radio_description_title').text()
		$('.hdd_btn').text(hddTitle)

		ssdTitle = $('.ssd_label input:checked').siblings('.radio_description').find('.radio_description_title').text()
		$('.ssd_btn').text(ssdTitle)

		matTitle = $('.mat_label input:checked').siblings('.radio_description').find('.radio_description_title').text()
		$('.mat_btn').text(matTitle)

		blockTitle = $('.block_label input:checked').siblings('.radio_description').find('.radio_description_title').text()
		$('.block_btn').text(blockTitle)

		diskTitle = $('.disk_label input:checked').siblings('.radio_description').find('.radio_description_title').text()
		$('.disk_btn').text(diskTitle)

		compTitle = $('.comp_label input:checked').siblings('.radio_description').find('.radio_description_title').text()
		$('.comp_btn').text(compTitle)
	}

	function checkPrice(){
		procPrice = $('.proc_label input:checked').parent().attr('data-price');
		$('.proc_label').find('.radio_description').find('.radio_price').text(function(){
			var currentPrice = $(this).parent().parent().attr('data-price') - procPrice
			if (currentPrice < 0 ){
				return '(' + currentPrice + ' грн)'
			} else{
				return '(+' + currentPrice + ' грн)'
			}
		})

		videocardPrice = $('.videocard_label input:checked').parent().attr('data-price');
		$('.videocard_label').find('.radio_description').find('.radio_price').text(function(){
			var currentPrice = $(this).parent().parent().attr('data-price') - videocardPrice
			if (currentPrice < 0 ){
				return '(' + currentPrice + ' грн)'
			} else{
				return '(+' + currentPrice + ' грн)'
			}
		})

		coolerPrice = $('.cooler_label input:checked').parent().attr('data-price');
		$('.cooler_label').find('.radio_description').find('.radio_price').text(function(){
			var currentPrice = $(this).parent().parent().attr('data-price') - coolerPrice
			if (currentPrice < 0 ){
				return '(' + currentPrice + ' грн)'
			} else{
				return '(+' + currentPrice + ' грн)'
			}
		})

		fanPrice = $('.fan_label input:checked').parent().attr('data-price');
		$('.fan_label').find('.radio_description').find('.radio_price').text(function(){
			var currentPrice = $(this).parent().parent().attr('data-price') - fanPrice
			if (currentPrice < 0 ){
				return '(' + currentPrice + ' грн)'
			} else{
				return '(+' + currentPrice + ' грн)'
			}
		})
		
		ddrPrice = $('.ddr_label input:checked').parent().attr('data-price');
		$('.ddr_label').find('.radio_description').find('.radio_price').text(function(){
			var currentPrice = $(this).parent().parent().attr('data-price') - ddrPrice
			if (currentPrice < 0 ){
				return '(' + currentPrice + ' грн)'
			} else{
				return '(+' + currentPrice + ' грн)'
			}
		})

		hddPrice = $('.hdd_label input:checked').parent().attr('data-price');
		$('.hdd_label').find('.radio_description').find('.radio_price').text(function(){
			var currentPrice = $(this).parent().parent().attr('data-price') - hddPrice
			if (currentPrice < 0 ){
				return '(' + currentPrice + ' грн)'
			} else{
				return '(+' + currentPrice + ' грн)'
			}
		})

		ssdPrice = $('.ssd_label input:checked').parent().attr('data-price');
		$('.ssd_label').find('.radio_description').find('.radio_price').text(function(){
			var currentPrice = $(this).parent().parent().attr('data-price') - ssdPrice
			if (currentPrice < 0 ){
				return '(' + currentPrice + ' грн)'
			} else{
				return '(+' + currentPrice + ' грн)'
			}
		})

		matPrice = $('.mat_label input:checked').parent().attr('data-price');
		$('.mat_label').find('.radio_description').find('.radio_price').text(function(){
			var currentPrice = $(this).parent().parent().attr('data-price') - matPrice
			if (currentPrice < 0 ){
				return '(' + currentPrice + ' грн)'
			} else{
				return '(+' + currentPrice + ' грн)'
			}
		})

		blockPrice = $('.block_label input:checked').parent().attr('data-price');
		$('.block_label').find('.radio_description').find('.radio_price').text(function(){
			var currentPrice = $(this).parent().parent().attr('data-price') - blockPrice
			if (currentPrice < 0 ){
				return '(' + currentPrice + ' грн)'
			} else{
				return '(+' + currentPrice + ' грн)'
			}
		})

		diskPrice = $('.disk_label input:checked').parent().attr('data-price');
		$('.disk_label').find('.radio_description').find('.radio_price').text(function(){
			var currentPrice = $(this).parent().parent().attr('data-price') - diskPrice
			if (currentPrice < 0 ){
				return '(' + currentPrice + ' грн)'
			} else{
				return '(+' + currentPrice + ' грн)'
			}
		})

		compPrice = $('.comp_label input:checked').parent().attr('data-price');
		$('.comp_label').find('.radio_description').find('.radio_price').text(function(){
			var currentPrice = $(this).parent().parent().attr('data-price') - compPrice
			if (currentPrice < 0 ){
				return '(' + currentPrice + ' грн)'
			} else{
				return '(+' + currentPrice + ' грн)'
			}
		})


		$('.radio_label input[type=radio]:checked').siblings('.radio_description').find('.radio_price').text('')
		labelPriceSet();
		labelVideoPriceSet();
	}

	function setPrice(){
		newPrice = +procPrice + +videocardPrice + +coolerPrice + +fanPrice + +ddrPrice + +hddPrice + +ssdPrice + +matPrice + +blockPrice + +diskPrice + +compPrice + addToNewPrice + additionalPrice;
		oldPrice = +procPrice + +videocardPrice + +coolerPrice + +fanPrice + +ddrPrice + +hddPrice + +ssdPrice + +matPrice + +blockPrice + +diskPrice + +compPrice + addToOldPrice + additionalPrice;
		currentValue = newPrice;
		// comission = (currentValue / 100) * 2.75;
	 //   	comissionForPrivat = ((currentValue + comission) / 100) * 2.9;
	   	// currentPrice = currentValue + comission;
	   	// payInMonth = (currentValue + comission) / payNum  + comissionForPrivat;
	   	currentPrice = (currentValue - ppPercentPrice) / 0.9725;
	   	payInMonth = (currentPrice + (payNum*currentPrice*0.029)) / payNum;
	   	payInMonthPp = currentValue / (payNumPp + 1);

	   	payInMonthTitle = (currentPrice + (25*currentPrice*0.029)) / 25;
	   	$('.new_credit_sum').text(payInMonthTitle.toFixed())

		var comma_separator_number_step = $.animateNumber.numberStepFactories.separator(' ')
		$('.bottom_price').animateNumber({ number : newPrice,  numberStep: comma_separator_number_step },1000)
		$('.new_price').html(numWithSpace(newPrice) + '<span> грн</span>')
		$('.old_price').html(numWithSpace(oldPrice) + '<span> грн</span>' + '<div class="old_price_inner"></div>')
		$('.credit-price').html(numWithSpace(newPrice));
		// $('.privat_info_all_price_field span').html( (payInMonth * payNum).toFixed() );
		$('.privat_info_all_price_field span').html( (currentPrice).toFixed(2) );
		$('.privat_info_payment_field span').html(payInMonth.toFixed())
		// $('.bottom_price').delay(2000).text(numWithSpace(newPrice) + ' грн')
		$('.privat_info_payment_field_pp span').html(payInMonthPp.toFixed());
	}

	checkPrice();
	titleCheck();
	labelColorCheck();
	setPrice();

	$('.radio_label input[type=radio]').change(function(){
		var offset = $(this).parent().find('.radio_description').find('.radio_price').offset()
		var bottomOffset = $('.bottom_price').offset()

		$(this).parent().find('.radio_description').find('.radio_price')
		.clone()
		.css({
			'postition' : 'absolute',
			'z-index' : '11100',
			'top' : offset.top,
			'left' : offset.left
		})
		.appendTo('body')
		.animate({
			opacity : 0.05 , left : bottomOffset.left , top : bottomOffset.top 
		}, 1000 , function () {
			$(this).remove()
		});

		checkPrice();
		titleCheck();
		labelColorCheck();
		setPrice();
		setPriceDifferenceColor();
		setShortNames()
	})

	function checkAccessories(){
		$('.radio_label:not(.noCheck) input[type=checkbox]:checked').each(function(){
			var currentPrice = $(this).attr('data-price');
    		additionalPrice = additionalPrice + +currentPrice;
    		setPrice();
		})
	}
	checkAccessories();


	$(".add_f").change(function() {
    	if(this.checked) {
    		var currentPrice = $(this).attr('data-price');
    		additionalPrice = additionalPrice + +currentPrice;
    	} else {
    		var currentPrice = $(this).attr('data-price');
    		additionalPrice = additionalPrice - +currentPrice;
    	}
    	setPrice();
	});

	$('.radio_label input[type=checkbox]').change(function() {
    	
    	if(this.checked) {
    		var currentPrice = $(this).attr('data-price');
    		additionalPrice = additionalPrice + +currentPrice;

    		var currentTitle = $(this).siblings('.radio_description').find('.radio_description_flex_container').find('.radio_description_title').text()
    		$(this).parent().parent().parent().siblings('.accordion_btn').text(currentTitle)

    		var offset = $(this).parent().find('.radio_description').find('.radio_price').offset()
			var bottomOffset = $('.bottom_price').offset()

			$(this).parent().find('.radio_description').find('.radio_price')
			.clone()
			.css({
				'postition' : 'absolute',
				'z-index' : '11100',
				'top' : offset.top,
				'left' : offset.left
			})
			.appendTo('body')
			.animate({
				opacity : 0.05 , left : bottomOffset.left , top : bottomOffset.top 
			}, 1000 , function () {
				$(this).remove()
			});

			$(this).siblings('.radio_description').find('.radio_price').text('')

    	} else {

    		var currentPrice = $(this).attr('data-price');
    		additionalPrice = additionalPrice - +currentPrice;

    		if($(this).parent().parent().find('input[type=checkbox]').is('.radio_label input[type=checkbox]:checked')) {
    			var currentTitle = $(this).parent().parent().find('input[type=checkbox]:checked').siblings('.radio_description').find('.radio_description_title').last().text()
    		} else {
    			var currentTitle = 'Не выбрано';
    		}

    		$(this).parent().parent().siblings('.accordion_btn').text(currentTitle)
    		$(this).siblings('.radio_description').find('.radio_price').text('(+ ' + $(this).attr('data-price') + ' грн)')
    	}

    	setPrice();
    	labelColorCheck();


	});

	$('.screens_block .radio_label input[type=checkbox]').change(function() {
    	
    	if(this.checked) {
    		// var currentPrice = $(this).attr('data-price');
    		// additionalPrice = additionalPrice + +currentPrice;

    		var currentTitle = $(this).siblings('.radio_description').find('.radio_description_flex_container').find('.radio_description_title').text()
    		$(this).parent().parent().parent().parent().siblings('.accordion_btn').text(currentTitle)

    		var offset = $(this).parent().find('.radio_description').find('.radio_price').offset()
			var bottomOffset = $('.bottom_price').offset()

			$(this).parent().find('.radio_description').find('.radio_price')
			.clone()
			.css({
				'postition' : 'absolute',
				'z-index' : '11100',
				'top' : offset.top,
				'left' : offset.left
			})
			.appendTo('body')
			.animate({
				opacity : 0.05 , left : bottomOffset.left , top : bottomOffset.top 
			}, 1000 , function () {
				$(this).remove()
			});

			$(this).siblings('.radio_description').find('.radio_price').text('')

    	} else {

    		// var currentPrice = $(this).attr('data-price');
    		// additionalPrice = additionalPrice - +currentPrice;

    		if($(this).parent().parent().find('input[type=checkbox]').is('.radio_label input[type=checkbox]:checked')) {
    			var currentTitle = $(this).parent().parent().find('input[type=checkbox]:checked').siblings('.radio_description').find('.radio_description_title').last().text()
    		} else {
    			var currentTitle = 'Не выбрано';
    		}

    		$(this).parent().parent().parent().parent().siblings('.accordion_btn').text(currentTitle)
    		$(this).siblings('.radio_description').find('.radio_price').text('(+ ' + $(this).attr('data-price') + ' грн)')
    	}

    	// setPrice();
    	labelColorCheck();


	});

	// форма на странице товара
	$('.product_buy_inner .modal_sumbit').on('click', function(event) {
		event.preventDefault();
		var post_price = $('.new_price').text();
		var comp_name = $('.product_page_name').text();
		var monitor = '';
		var keyboard = '';
		var mouse = '';
		var complect = '';
		var windows = '';
		var msoffice = '';
		var wifi = '';
		var email = '';
		var carpet = '';
		var cabel = '';
		var garn = '';
		var wifiadapt = '';
		var software = '';
		var dopVents = '';
		var offer = '';
		var webcams = '';
		var speakers = '';

		var name = $('.product_buy_inner .modal_input').val();
		var tel = '';
    	tel += $('.product_buy_inner .phone_mask').val()

		var phonemaskCheck = tel.indexOf('_');

    	if (phonemaskCheck != -1 || tel.length == 0) {
    			// $('.product_buy_inner .input_tel_1').addClass('error');
				// $('.product_buy_inner .input_tel_2').addClass('error');
				$('.product_buy_inner .phone_mask').addClass('error');
				return 0;
    	} else {
    		$('.product_buy_inner .phone_mask').removeClass('error');
    	}

		if ( $('#c1').prop('checked') == true) {
			windows += 'Windows 10; ';
		};

		if ( $('#c2').prop('checked') == true) {
			windows += 'Windows 7; ';
		};

		if ( $('#c3').prop('checked') == true) {
			msoffice += 'Да';
		};

		if ( $('#c4').prop('checked') == true) {
			wifi += 'Да';
		};


		$('.monitor_block input:checked').each(function(){
			monitor += $(this).parent().find('.radio_description_title').text() + '; ';
		})

		$('.keyboard_block input:checked').each(function(){
			keyboard += $(this).parent().find('.radio_description_title').text() + '; ';
		})

		$('.mouse_block input:checked').each(function(){
			mouse += $(this).parent().find('.radio_description_title').text() + '; ';
		})

		$('.complect_block input:checked').each(function(){
			complect += $(this).parent().find('.radio_description_title').text() + '; ';
		})

		$('.carpet_block input:checked').each(function(){
			carpet += $(this).parent().find('.radio_description_title').text() + '; ';
		})
		$('.cable_block input:checked').each(function(){
			cabel += $(this).parent().find('.radio_description_title').text() + '; ';
		})
		$('.garniture_block input:checked').each(function(){
			garn += $(this).parent().find('.radio_description_title').text() + '; ';
		})
		$('.wifi_block input:checked').each(function(){
			wifiadapt += $(this).parent().find('.radio_description_title').text() + '; ';
		})
		$('.software_block input:checked').each(function(){
			software += $(this).parent().find('.radio_description_title').text() + '; ';
		})
		$('.cooler_access_block input:checked').each(function(){
			dopVents += $(this).parent().find('.radio_description_title').text() + '; ';
			// console.log(dopVents);
		})
		$('.super_offer_block input:checked').each(function(){
			offer += $(this).parent().find('.radio_description_title').text() + '; ';
			// console.log(offer);
		})
		$('.webcams_block input:checked').each(function(){
			webcams += $(this).parent().find('.radio_description_title').text() + '; ';
			// console.log(offer);
		})
		$('.speakers_block input:checked').each(function(){
			speakers += $(this).parent().find('.radio_description_title').text() + '; ';
			// console.log(offer);
		})

		// console.log(hddTitle);

		if($('.phone_mask').hasClass('error') == false ){

			ga('send', 'event', 'kupit', 'zhdu_zvonka');
			$.post('php/new_lid.php', { device: device, city: city_name, utm_term: utm_term, utm_content: utm_content, utm_compaign: utm_compaign, utm_source: utm_source, utm_medium: utm_medium, name: name, tel: tel, wifi: wifi, msoffice: msoffice, windows: windows, price: newPrice, type: 'product', monitor: monitor, keyboard: keyboard, complect: complect, mouse: mouse, cpu: procTitle, hdd: hddTitle, video: newVideocardTitle, budget: post_price, ram: newDdrTitle, ssd: ssdTitle, cooler: coolerTitle, materinka: matTitle, block_pit: blockTitle, disk: diskTitle, corpus: compTitle, comp_name: comp_name, email: email, tel: tel, carpet: carpet, cabel: cabel, garn: garn, wifiadapt: wifiadapt, fan: fanTitle, soft: software, dop_vents: dopVents, offer: offer, webcams: webcams, speakers: speakers}, function(data) {
				// console.log(data);
				window.location.href = 'http://регард.com/thanks-for-order.php';
			})
		}

	})

	// Следить за ценой
	$('.pchk_submit').on('click', function(event){
		event.preventDefault();
		var email = $('.pchk_input').val();
		var comp_name = $('.product_page_name').text();

		if (email.length != 0) {	
			$('.pchk_input').addClass('error');
			return 0;
    	};

    	$.post('php/new_lid.php', { city: city_name, email: email, utm_term: utm_term, utm_content: utm_content, utm_compaign: utm_compaign, utm_source: utm_source, utm_medium: utm_medium, comp_name: comp_name, type: 'follow'}, function(){
    		window.location.href = 'http://регард.com/thanks.html';
    	});
	})

	// Формы телефона
	$('.input_tel_1').on('click focus', function(event) {
		$(this).parent().find('.input_tel_2').focus();
	})

	$('.input_tel_2').on('paste change keyup', function(event) {
		$(this).removeClass('error');
		if ( $(this).val().length >= 3 ) {
			$(this).parent().find('.input_tel_3').focus();
		};
	})

	$('.input_tel_3').on('paste change keyup', function(event) {
		$(this).removeClass('error');
		if ( $(this).val().length <= 0 ) {
			$(this).parent().find('.input_tel_2').focus();
		};
	})

	$('.bitrix_top input[name="email"]').on('paste change keyup', function(event) {
		$(this).removeClass('error');
	});


	// модальное окно кредита
	// $('.popup-modal').magnificPopup({
 //          type: 'inline',
 //          preloader: false,
 //          focus: '#username',
 //          closeBtnInside: true,
 //          callbacks: {
	// 	    open: function() {
	// 	      $('.credit-parts').text(2);
 //    		  var partPrice = newPrice/2;
 //    		  $('.credit-part-price').text(partPrice);
	// 	    }
	// 	  }
 //    });

    var parts;

    // $('.credit-slider').slider({
    // 	min: 2,
    // 	max: 24,
    // 	value: 2,
    // 	change: function( event, ui ) {
    // 		$('.credit-parts').text(ui.value);
    // 		parts = ui.value;
    // 		partPrice = newPrice/ui.value;
    // 		$('.credit-part-price').text(partPrice);
    // 	}
    // })

    //С главной "позвонить"
    $('.bitrix_recall .callback_inner_submit').on('click', function(event){
    	event.preventDefault();
    	var tel = '';
		
    	tel += $('.bitrix_recall .input_tel_2').val() + $('.bitrix_recall .input_tel_3').val();

    	if (tel.length != 10) {
    			// $('.bitrix_recall .input_tel_1').addClass('error');
				$('.bitrix_recall .input_tel_2').addClass('error');
				$('.bitrix_recall .input_tel_3').addClass('error');
				return 0;
    	};

		ga('send', 'event', 'callback', 'zhdu_zvonka');
    	$.post('php/new_lid.php', { type: 'recall', tel: tel, city: city_name, utm_source: utm_source, utm_medium: utm_medium, utm_compaign: utm_compaign, utm_content: utm_content, utm_term: utm_term }, function(data) {
    		window.location.href = 'http://регард.com/thanks.html';
		})

    })

    //С главной "скачать прайс" - модальное окно
    $('.bitrix_pricelist .input_form_btn').on('click', function(event){
    	event.preventDefault();
    	yaCounter39573860.reachGoal('price');
    	var tel = '';
    	
    	tel += $('.bitrix_pricelist .input_tel_2').val() + $('.bitrix_pricelist .input_tel_3').val();

    	if (tel.length != 10) {
    			// $('.bitrix_pricelist .input_tel_1').addClass('error');
				$('.bitrix_pricelist .input_tel_2').addClass('error');
				$('.bitrix_pricelist .input_tel_3').addClass('error');
				return 0;
    	};

    	var email = $('.bitrix_pricelist .form_input_mail').val();


    	$.post('php/new_lid.php', { type: 'pricelist', email: email, tel: tel, city: city_name, utm_source: utm_source, utm_medium: utm_medium, utm_compaign: utm_compaign, utm_content: utm_content, utm_term: utm_term }, function(data) {
    		window.location.href = "php/price.php";
    		// console.log(data);
		})
    })

    //С главной "скачать прайс" - блок
    $('.bitrix_save .input_form_btn').on('click', function(event){
    	event.preventDefault();
    	yaCounter39573860.reachGoal('price');
    	var tel = '';
    	tel += $('.bitrix_save .input_tel_2').val() + $('.bitrix_save .input_tel_3').val();
    	var email = $('.bitrix_save .form_input_mail').val();

    	if (tel.length != 10) {
    			// $('.bitrix_save .input_tel_1').addClass('error');
				$('.bitrix_save .input_tel_2').addClass('error');
				$('.bitrix_save .input_tel_3').addClass('error');
				return 0;
    	};

    	$.post('php/new_lid.php', { type: 'pricelist', email: email, tel: tel, city: city_name, utm_source: utm_source, utm_medium: utm_medium, utm_compaign: utm_compaign, utm_content: utm_content, utm_term: utm_term }, function(data) {
    		// window.open("php/price.php");
    		window.location.href = "php/price.php";
    		// console.log(data);
		})
    })

    //С главной "Подобрать аксессуары"
    $('.bitrix_accessor .modal_sumbit').on('click', function(event){
    	event.preventDefault();
    	var tel = '';
    	tel += $('.bitrix_accessor .input_tel_2').val() + $('.bitrix_accessor .input_tel_3').val();

    	if (tel.length != 10) {
    			// $('.bitrix_accessor .input_tel_1').addClass('error');
				$('.bitrix_accessor .input_tel_2').addClass('error');
				$('.bitrix_accessor .input_tel_3').addClass('error');
				return 0;
    	};

    	var name = $('.bitrix_accessor .modal_input').val();
    	var comment = $('.bitrix_accessor .modal_textarea').val();

    	$.post('php/new_lid.php', { type: 'acsessor', name: name, comment: comment, tel: tel, city: city_name, utm_source: utm_source, utm_medium: utm_medium, utm_compaign: utm_compaign, utm_content: utm_content, utm_term: utm_term }, function(data) {
    		window.location.href = 'http://регард.com/thanks.html';
		})
    })

    //С главной "Рассрочки от привата"
    $('.bitrix_rassrochka .modal_sumbit').on('click', function(event){
    	event.preventDefault();
    	var tel = '';

    	tel += $('.bitrix_rassrochka .input_tel_2').val() + $('.bitrix_rassrochka .input_tel_3').val();
    	
    	if (tel.length != 10) {
    			// $('.bitrix_rassrochka .input_tel_1').addClass('error');
				$('.bitrix_rassrochka .input_tel_2').addClass('error');
				$('.bitrix_rassrochka .input_tel_3').addClass('error');
				return 0;
    	};

    	var name = $('.bitrix_rassrochka .modal_input').val();

    	$.post('php/new_lid.php', { type: 'rassrochka', name: name, tel: tel, city: city_name, utm_source: utm_source, utm_medium: utm_medium, utm_compaign: utm_compaign, utm_content: utm_content, utm_term: utm_term }, function(data) {
    		window.location.href = 'http://регард.com/thanks.html';
		})
    })

    //С главной "Подборка компа"
    $('.bitrix_makecomp .modal_sumbit').on('click', function(event){
    	event.preventDefault();
    	var tel = '';

    	tel += $(this).parent().find('.input_tel_2').val() + $(this).parent().find('.input_tel_3').val();
    	
    	if (tel.length != 10) {
    			// $('.bitrix_makecomp .input_tel_1').addClass('error');
				$('.bitrix_makecomp .input_tel_2').addClass('error');
				$('.bitrix_makecomp .input_tel_3').addClass('error');
				return 0;
    	};

    	var name = $(this).parent().find('.modal_input').val();
    	var comment = $(this).parent().find('.modal_textarea').val();
    	var comp = $(this).parent().find('input[name="task"]').val();

    	$.post('php/new_lid.php', { type: 'makecomp', comp: comp, comment: comment, name: name, tel: tel, city: city_name, utm_source: utm_source, utm_medium: utm_medium, utm_compaign: utm_compaign, utm_content: utm_content, utm_term: utm_term }, function(data) {
    		window.location.href = 'http://регард.com/thanks.html';
		})
    })

    //С главной "Top 10"
    $('.bitrix_top .top_ten_btn').on('click', function(event){
    	event.preventDefault();
    	var email = $('.bitrix_top input[name="email"]').val();

    	if ( $('.bitrix_top input[name="email"]').val().length <= 4 ) {
			$('.bitrix_top input[name="email"]').addClass('error');
			return 0;
		};
		
    	var tel = '';
    	tel += $('.bitrix_top .input_tel_2').val() + $('.bitrix_top .input_tel_3').val();

    	if (tel.length != 10) {
    			// $('.bitrix_top .input_tel_1').addClass('error');
				$('.bitrix_top .input_tel_2').addClass('error');
				$('.bitrix_top .input_tel_3').addClass('error');
				return 0;
    	};



    	var name = $('.bitrix_top input[name="name"]').val();

    	$.post('php/new_lid.php', { type: 'top10', email: email, name: name, tel: tel, city: city_name, utm_source: utm_source, utm_medium: utm_medium, utm_compaign: utm_compaign, utm_content: utm_content, utm_term: utm_term }, function(data) {
    		window.open("php/top10.php");
    		var downloads = parseInt($('.book_arrow_text span').text());
    		downloads = 1 + downloads;
    		$('.book_arrow_text span').html(downloads);
		})
    })

    //С главной "Easy Builder"
    $('.bitrix_builder .builder_form_btn').on('click', function(event){
    	event.preventDefault();
    	var tel = '';
    	tel += $('.bitrix_builder .input_tel_2').val() + $('.bitrix_builder .input_tel_3').val();

    	if (tel.length != 10) {
    			// $('.bitrix_builder .input_tel_1').addClass('error');
				$('.bitrix_builder .input_tel_2').addClass('error');
				$('.bitrix_builder .input_tel_3').addClass('error');
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

    //С главной "ПОЛУЧИТЕ КОНСУЛЬТАЦИЮ ПРЯМО СЕЙЧАС"
    $('.bitrix_consult .consultation_submit').on('click', function(event){
    	event.preventDefault();
    	var tel = '';

    	tel += $('.bitrix_consult .input_tel_2').val() + $('.bitrix_consult .input_tel_3').val();

    	if (tel.length != 10) {
    			// $('.bitrix_consult .input_tel_1').addClass('error');
				$('.bitrix_consult .input_tel_2').addClass('error');
				$('.bitrix_consult .input_tel_3').addClass('error');
				return 0;
    	};

    	var name = $('.bitrix_consult .consult_inner_input').val();

    	$.post('php/new_lid.php', { type: 'consult', name: name, tel: tel, city: city_name, utm_source: utm_source, utm_medium: utm_medium, utm_compaign: utm_compaign, utm_content: utm_content, utm_term: utm_term }, function(data) {
    		window.location.href = 'http://регард.com/thanks.html';
		})
    })

    

    // создание кредита
    $('.privat_prod_inner .input_form_btn').click(function(event){
    	event.preventDefault();
    	var post_price = currentPrice;
    	// var summa = (payInMonth * payNum).toFixed(2);
    	var summa = currentPrice.toFixed(2);
		var comp_name = $('.product_page_name').text();
		var monitor = '';
		var keyboard = '';
		var mouse = '';
		var complect = '';
		var windows = '';
		var msoffice = '';
		var wifi = '';
		var email = '';
		var name = $('.privat_prod_inner .form_input_mail').val();
		var tel = '';
		var merch_type = $('input[name="privat"]:checked').val();
		var carpet = '';
		var cabel = '';
		var garn = '';
		var wifiadapt = '';
		var software = '';
		var dopVents = '';
		var offer = '';
		var webcams = '';
		var speakers = '';

		if (merch_type == 'PP') {
			parts = $('.privat_prod_inner .payment_number_pp span').text();
		} else {
			parts = $('.privat_prod_inner .payment_number span').text();
			post_price = currentPrice - ppPercentPrice;
			summa = currentPrice.toFixed(2) - ppPercentPrice;
		}


    	tel += $('.privat_prod_inner .phone_mask').val() 

    	var phonemaskCheck = tel.indexOf('_');

    	if (phonemaskCheck != -1 || tel.length == 0) {
    			// $('.privat_prod_inner .input_tel_1').addClass('error');
				// $('.privat_prod_inner .input_tel_2').addClass('error');
				$('.privat_prod_inner .phone_mask').addClass('error');
				return 0;
    	};
    	// tel = parseInt(tel);
    	// console.log(tel);

		if ( $('#c1').prop('checked') == true) {
			windows += 'Windows 10; ';
		};

		if ( $('#c2').prop('checked') == true) {
			windows += 'Windows 7; ';
		};

		if ( $('#c3').prop('checked') == true) {
			msoffice += 'Да';
		};

		if ( $('#c4').prop('checked') == true) {
			wifi += 'Да';
		};


		$('.monitor_block input:checked').each(function(){
			monitor += $(this).parent().find('.radio_description_title').text() + '; ';
		})

		$('.keyboard_block input:checked').each(function(){
			keyboard += $(this).parent().find('.radio_description_title').text() + '; ';
		})

		$('.mouse_block input:checked').each(function(){
			mouse += $(this).parent().find('.radio_description_title').text() + '; ';
		})

		$('.complect_block input:checked').each(function(){
			complect += $(this).parent().find('.radio_description_title').text() + '; ';
		})

		$('.carpet_block input:checked').each(function(){
			carpet += $(this).parent().find('.radio_description_title').text() + '; ';
		})
		$('.cable_block input:checked').each(function(){
			cabel += $(this).parent().find('.radio_description_title').text() + '; ';
		})
		$('.garniture_block input:checked').each(function(){
			garn += $(this).parent().find('.radio_description_title').text() + '; ';
		})
		$('.wifi_block input:checked').each(function(){
			wifiadapt += $(this).parent().find('.radio_description_title').text() + '; ';
		})
		$('.software_block input:checked').each(function(){
			software += $(this).parent().find('.radio_description_title').text() + '; ';
		})
		$('.cooler_access_block input:checked').each(function(){
			dopVents += $(this).parent().find('.radio_description_title').text() + '; ';
		})
		$('.super_offer_block input:checked').each(function(){
			offer += $(this).parent().find('.radio_description_title').text() + '; ';
		})
		$('.webcams_block input:checked').each(function(){
			webcams += $(this).parent().find('.radio_description_title').text() + '; ';
			// console.log(offer);
		})
		$('.speakers_block input:checked').each(function(){
			speakers += $(this).parent().find('.radio_description_title').text() + '; ';
			// console.log(offer);
		})
		


		if (merch_type != undefined) {

			ga('send', 'event', 'rassrochka', 'kupit');

			$.post('php/create_credit.php', { device: device, merch_type: merch_type, parts: parts, email: email, city: city_name, utm_term: utm_term, utm_content: utm_content, utm_compaign: utm_compaign, utm_source: utm_source, utm_medium: utm_medium, name: name, tel: tel, wifi: wifi, msoffice: msoffice, windows: windows,  parts: parts, price: summa, type: 'product', monitor: monitor, keyboard: keyboard, complect: complect, mouse: mouse, cpu: procTitle, hdd: hddTitle, video: newVideocardTitle, budget: post_price, ram: newDdrTitle, ssd: ssdTitle, cooler: coolerTitle, materinka: matTitle, block_pit: blockTitle, disk: diskTitle, corpus: compTitle, comp_name: comp_name, tel: tel, carpet: carpet, cabel: cabel, garn: garn, wifiadapt: wifiadapt, fan: fanTitle, soft: software, dop_vents: dopVents, offer: offer, webcams: webcams, speakers: speakers}, function(data) {
				// console.log(data);
				window.location.href = 'https://payparts2.privatbank.ua/ipp/v2/payment?token=' + data;
			})
		} else {
			alert('Выберите, пожалуйста, тип кредита...');
		}

    })

    // radio_price color set

    function setPriceDifferenceColor(){
    	$('.radio_price').each(function(){

	    	var priceFirstSymbol = $(this).text().substr(0,2);

	    	if (priceFirstSymbol === '(+'){
	    		$(this).css('color','#349916');
	    	} else if (priceFirstSymbol === '(-'){
	    		$(this).css('color','#DE5251');
	    	} else if( priceFirstSymbol === 'В '){
	    		$(this).css('color','#454545');
	    	}
    	})
    }

    setPriceDifferenceColor();

    // fixed tab bar

    var tabNavOffset = $('.tabs_navbar_fixed').offset().top;

    $(window).on('scroll', function(){
    	if( $(this).scrollTop() >= tabNavOffset ){
    		$('.tabs_navbar_fixed').addClass('fixed')
    		$('.tabs_block').css('padding-top','54px')
    	} else {
    		$('.tabs_navbar_fixed').removeClass('fixed')
    		$('.tabs_block').css('padding-top','0')
    	}
    })

    


    // comments scroll

    $('.comments_num').on('click', function(){
    	tabFixedBtn = 'tab_comments'
		$('.tabs_fixed_btn').removeClass('active');
		$('#tfo').addClass('active');
		$('.tab_content_inner').fadeOut();
		$('#'+tabFixedBtn+'_content').fadeIn();
    })

    // Следить за ценой
    $('.pchk_submit').on('click', function(event){
    	event.preventDefault();
    	var email = $('.pchk_input').val();

    	if(email.length < 3){
    		$('.pchk_input').addClass('error')
    	} else {
    		$('.pchk_input').removeClass('error')
			$.post('../php/price-tracker.php', { email: email }, function(data){
				alert('Запрос отправлен');
			});
    	}
    })


    // Обновляем изображения корпуса
	$('.comp_label input').on('click', function(event){
		var mid = parseInt($(this).parent().find('.zoom_in_hover').attr('modal-id'));
		$('.photo_preview_main_photo, .photo_preview_side_menu').html('');
		$('.product_page_flex_photo_block .side_mini_photo').remove();
		// console.log(mid);

   		$.getJSON('php/modals.php', { id: mid }, function(data){
   			//Вставляем фото
   			var modalPics = '';
   			$.each( data.pics.pic, function( key, val ) {
   				if (key == 0) {
   					$('#zoomImage').attr('src', val);
   					modalPics += '<div class="side_mini_photo active"><img src="' + val + '"></div>';

   				} else {
	   				modalPics += '<div class="side_mini_photo"><img src="' + val + '"></div>';
	   			}
 			});
 			$('.side_photo_container_inner').prepend(modalPics);
 			sidePhotosArrowsDisplay();
   		})

	})

    // side photos

    $('body').on('mouseover', '.side_mini_photo', function(){
    	$('iframe').each(function(){
    		$(this).attr('src', $(this).attr('src'));
    	})
    	$('.side_mini_photo').removeClass('active')
    	$('.side_mini_video').removeClass('active')
    	$('.main_video_container').css('display','none');
    	$(this).addClass('active');
    	var currentImgSrc = $(this).find('img').attr('src');

    	$('.main_photo_image').attr('src', currentImgSrc)
    })

    var sidePhotosNum 

    var sidePhotosDifference 

    var sidePhotosCounter

    var sidePhotoVar

    if($(window).width() > 580){
    	sidePhotoVar = 10
    } else {
    	sidePhotoVar = 4
    }

    function sidePhotosArrowsDisplay(){
    	sidePhotosNum = $('.side_mini_photo').length + $('.side_mini_video').length
    	if(sidePhotosNum > sidePhotoVar){
    		$('.side_arrowbottom').css('display','block');
    	}
    	sidePhotosDifference = sidePhotosNum - sidePhotoVar

    	sidePhotosCounter = sidePhotosDifference

    	$('.side_photo_container_inner').css('top','0');
    	$('.side_arrowtop').css('display','none');


    }

    sidePhotosArrowsDisplay();

    $('.side_arrowbottom').on('click', function(){
    	$('.side_photo_container_inner').animate({top: '-=52'},400)
    	$('.side_arrowtop').css('display','block');
    	sidePhotosCounter -= 1;
    	if( sidePhotosCounter == 0){
    		$('.side_arrowbottom').css('display','none');
    	}
    })

    $('.side_arrowtop').on('click', function(){
    	$('.side_photo_container_inner').animate({top: '+=52'},400)
    	$('.side_arrowbottom').css('display','block');
    	sidePhotosCounter += 1;
    	if( sidePhotosCounter == sidePhotosDifference){
    		$('.side_arrowtop').css('display','none');
    	}
    })

    $('.side_mini_video').on('mouseover', function(){
    	$('iframe').each(function(){
    		$(this).attr('src', $(this).attr('src'));
    	})
    	$('.main_video_container').css('display','block');
    	$('.side_mini_photo').removeClass('active');
    	$('.side_mini_video').removeClass('active');
    	$(this).addClass('active');
    	$('.video_innner').css('display','none');
    	var currentVideo = $(this).attr('data-video');
    	$('#'+currentVideo).css('display','block');
    })


    // accessories lightbox

    
    $('.access_right_arrow').on('click', function(){
    	if( $('.access_side_photo_block.selected').hasClass('last') ){
    		$('.access_main_photo_container_inner').trigger('zoom.destroy');
    		$('.access_side_photo_block').removeClass('selected');
	    	$('.access_side_photo_block.first').addClass('selected');
	    	var currentAccessPhoto = $('.access_side_photo_block.first').find('img').attr('src');
	    	$('.access_main_photo_container_inner img').attr('src', currentAccessPhoto)
	    	// $('.access_main_photo_container_inner img').css('height','100%');
	    	// $('.access_zoom_line_inner').css('left','0');
	    	$('.access_main_photo_container_inner').zoom({
				on: 'click',
				magnify: 1.5
  			});
    	} else {
    		$('.access_main_photo_container_inner').trigger('zoom.destroy');
	    	var prevPhoto = $('.access_side_photo_block.selected')
	    	prevPhoto.addClass('prev')
	    	prevPhoto.removeClass('selected')
	    	var targetPhoto = $('.access_side_photo_block.prev').next()
	    	targetPhoto.addClass('selected')
	    	$('.access_side_photo_block.prev').removeClass('prev');
	    	var currentAccessPhoto = targetPhoto.find('img').attr('src');
	    	$('.access_main_photo_container_inner img').attr('src', currentAccessPhoto)
	    	// $('.access_main_photo_container_inner img').css('height','100%');
	    	// $('.access_zoom_line_inner').css('left','0');
	    	$('.access_main_photo_container_inner').zoom({
				on: 'click',
				magnify: 1.5
  			});
    	}
    })

    $('.access_left_arrow').on('click', function(){
    	if( $('.access_side_photo_block.selected').hasClass('first') ){
    		$('.access_main_photo_container_inner').trigger('zoom.destroy');
    		$('.access_side_photo_block').removeClass('selected');
	    	$('.access_side_photo_block.last').addClass('selected');
	    	var currentAccessPhoto = $('.access_side_photo_block.last').find('img').attr('src');
	    	$('.access_main_photo_container_inner img').attr('src', currentAccessPhoto)
	    	// $('.access_main_photo_container_inner img').css('height','100%');
	    	// $('.access_zoom_line_inner').css('left','0');
	    	$('.access_main_photo_container_inner').zoom({
				on: 'click',
				magnify: 1.5
  			});
    	} else {
    		$('.access_main_photo_container_inner').trigger('zoom.destroy');
	    	var prevPhoto = $('.access_side_photo_block.selected')
	    	prevPhoto.addClass('prev')
	    	prevPhoto.removeClass('selected')
	    	var targetPhoto = $('.access_side_photo_block.prev').prev()
	    	targetPhoto.addClass('selected')
	    	$('.access_side_photo_block.prev').removeClass('prev');
	    	var currentAccessPhoto = targetPhoto.find('img').attr('src');
	    	$('.access_main_photo_container_inner img').attr('src', currentAccessPhoto)
	    	// $('.access_main_photo_container_inner img').css('height','100%');
	    	// $('.access_zoom_line_inner').css('left','0');
	    	$('.access_main_photo_container_inner').zoom({
				on: 'click',
				magnify: 1.5
  			});
    	}
    })


   $('.access_modal_tab_button_characteristics').on('click', function(){
   		$('.access_modal_tab_button_photos').removeClass('active');
   		$(this).addClass('active');
   		$('.access_modal_tab_content.photos').css('display','none');
   		$('.access_modal_tab_content.characteristics').css('display','block');
   })

   $('.access_modal_tab_button_photos').on('click', function(){
   		$('.access_modal_tab_button_characteristics').removeClass('active');
   		$(this).addClass('active');
   		$('.access_modal_tab_content.characteristics').css('display','none');
   		$('.access_modal_tab_content.photos').css('display','block');
   })


   $('.accessoriesPopup').on('click', function(e){
   		e.preventDefault();
   		$('.access_char_main_container_title, .access_main_photo_container_inner, .access_side_photo_container').html('');
   		$('.access_char_main_container_char_block').remove();
   		var modalId = parseInt($(this).attr('modal-id'));
   		$.getJSON('php/modals.php', { id: modalId }, function(data){
   			//Вставляем фото
   			var modalPics = '';

   			if (Array.isArray(data.pics.pic)) { // Если это массив, а НЕ всего 1 фото
	   			$.each( data.pics.pic, function( key, val ) {
	   				if (key == 0) {
	   					$('.access_main_photo_container_inner').html('<img src="' + val + '">');
	   					modalPics += '<div class="access_side_photo_block selected"><img src="' + val + '"></div>';

	   				} else {
		   				modalPics += '<div class="access_side_photo_block"><img src="' + val + '"></div>';
		   			}
	 			});
   			} else { // Если всего 1 фото
   				$('.access_main_photo_container_inner').html('<img src="' + data.pics.pic + '">');
   				modalPics += '<div class="access_side_photo_block selected"><img src="' + data.pics.pic + '"></div>';
   			}
   			$('.access_side_photo_container').html(modalPics);

   			// Вставляем название
   			$('.access_char_main_container_title').text(data.name);

   			// Вставляем характеристики
   			var modalOpt = '';
   			$.each( data.options.option, function( key, val ) {
    			modalOpt += '<div class="access_char_main_container_char_block clearfix"><div class="access_char_main_container_char_block_title">' + val.name + '</div><div class="access_char_main_container_char_block_char">' + val.value + '</div></div>';
 			});
   			$('.access_char_main_container').append(modalOpt);
   			$('.access_side_photo_block:last').addClass('last');
    		$('.access_side_photo_block:first').addClass('first');

    		$('.access_main_photo_container_inner').zoom({
				on: 'click',
				magnify: 1.5
  			});

  			$('.access_side_photo_block').on('click', function(){
		    	$('.access_main_photo_container_inner').trigger('zoom.destroy');
		    	$('.access_side_photo_block').removeClass('selected');
		    	$(this).addClass('selected');
		    	var currentAccessPhoto = $(this).find('img').attr('src');
		    	$('.access_main_photo_container_inner img').attr('src', currentAccessPhoto);
		    	// $('.access_main_photo_container_inner img').css('height','100%');
			    // $('.access_zoom_line_inner').css('left','0');
			    $('.access_main_photo_container_inner').zoom({
					on: 'click',
					magnify: 1.5
		  		});
		    })
   		})
   		$('.accessories_modal_bg').fadeIn(400);
   		$('.screen_fade').fadeIn(400);


	    $('.access_main_photo_container_inner').on('click',function(){
	    	$(this).toggleClass('zoom-out');
	    })
   })

   $('.access_modal_close_icon').on('click', function(){
   		$('.accessories_modal_bg').fadeOut(400);
   		$('.screen_fade').fadeOut(400);
   })

   if($(window).width() > 1500){

		$('#zoomImage').imagezoomsl({
	  
            magnifiersize: [851,582],
            magnifierborder: 'none',
            magnifiereffectanimate: 'fadeIn',
            disablewheel: false,
            magnifycursor: 'pointer'
       });
   }

	$('.photoPopup').on('click', function(e){
		e.preventDefault();
		$('.photo_preview_main_photo, .photo_preview_side_menu').html('');
   		var modalId = parseInt($(this).attr('modal-id'));
   		$.getJSON('php/modals.php', { id: modalId }, function(data){
   			//Вставляем фото
   			var modalPics = '';
   			$.each( data.pics.pic, function( key, val ) {
   				if (key == 0) {
   					$('.photo_preview_main_photo').html('<img src="' + val + '">');
   					modalPics += '<div class="photo_preview_mini_photo active"><img src="' + val + '"></div>';

   				} else {
	   				modalPics += '<div class="photo_preview_mini_photo"><img src="' + val + '"></div>';
	   			}
 			});
   			$('.photo_preview_side_menu').html(modalPics);
   			$('.photo_preview_main_photo').zoom({
				on: 'click',
				magnify: 1.5
  			});
  			$('.photo_preview_mini_photo').on('click', function(){
		    	$('.photo_preview_main_photo').trigger('zoom.destroy');
		    	$('.photo_preview_mini_photo').removeClass('active');
		    	$(this).addClass('active');
		    	var currentAccessPhoto = $(this).find('img').attr('src');
		    	$('.photo_preview_main_photo img').attr('src', currentAccessPhoto);
		    	// $('.photo_preview_mini_photo img').css('height','100%');
			    $('.photo_preview_main_photo').zoom({
					on: 'click',
					magnify: 1.5
		  		});
		    })
   		})
		$('.photo_preview_bg').fadeIn(400);
		$('.screen_fade').fadeIn(400);

		 $('.photo_preview_main_photo').on('click',function(){
	    	$(this).toggleClass('zoom-out');
	    })
	})

	// $('.photo_preview_bg').on('click', function(){
	// 	$(this).fadeOut(400);
	// });

	
	$('.photo_preview_close_icon').on('click', function(){
		$('.photo_preview_bg').fadeOut(400);
		$('.screen_fade').fadeOut(400);
	})

	$(document).keyup(function(e) {
    	if (e.keyCode == 27) { 
     		$('.photo_preview_bg').fadeOut(400);
     		$('.main_photo_preview_bg').fadeOut(400);
     		$('.accessories_modal_bg').fadeOut(400);
     		$('.screen_fade').fadeOut(400);
     		$('iframe').each(function(){
	    		$(this).attr('src', $(this).attr('src'));
	    	})
 	   	}
	});



	

	// createMainLightbox()
	
	function createMainLightbox(){
		var miniPhotos = $('.side_photo_container_inner').html();
		$('.main_photo_preview_side_menu').html(miniPhotos);
		$('.main_photo_preview_side_menu .side_mini_photo').each(function(){
			$(this).removeClass('side_mini_photo').addClass('main_photo_preview_mini_photo')
		})
		$('.main_photo_preview_side_menu .side_mini_video').each(function(){
			$(this).removeClass('side_mini_video').addClass('main_photo_preview_mini_video')
		})

  		var mainPhotoInLightBox = $('.main_photo_preview_mini_photo.active').find('img').attr('src');
  		$('.main_photo_preview_main_photo img').attr('src', mainPhotoInLightBox)


		$('.main_photo_preview_main_photo').zoom({
			on: 'click',
			magnify: 1.5 
  		});
	  	$('.main_photo_preview_mini_photo').on('click', function(){
	  		$('iframe').each(function(){
    			$(this).attr('src', $(this).attr('src'));
    		})
	    	$('.main_photo_preview_main_photo').trigger('zoom.destroy');
	    	$('.main_photo_preview_mini_photo').removeClass('active');
	    	$('.photo_preview_video_innner').css('display','none');
	    	$('.main_photo_preview_video_container').css('display','none');
	    	$(this).addClass('active');
	    	var currentAccessPhoto = $(this).find('img').attr('src');
	    	$('.main_photo_preview_main_photo img').attr('src', currentAccessPhoto);
	    	// $('.photo_preview_mini_photo img').css('height','100%');
		    $('.main_photo_preview_main_photo').zoom({
				on: 'click',
				magnify: 1.5
	  		});
	    })

	    $('.main_photo_preview_mini_video').on('click', function(){
	    	$('iframe').each(function(){
    			$(this).attr('src', $(this).attr('src'));
    		})
	    	$('.main_photo_preview_main_photo').trigger('zoom.destroy');
	    	$('.main_photo_preview_mini_photo').removeClass('active');
	    	$('.main_photo_preview_mini_video').removeClass('active');
	    	$('.photo_preview_video_innner').css('display','none');
	    	$(this).addClass('active');
	    	$('.main_photo_preview_video_container').css('display','block');
	    	var currentVideo = $(this).attr('data-video');
    		$('#lightbox_'+currentVideo).css('display','block');
	    })

	    $('.main_photo_preview_main_photo').on('click',function(){
	    	$(this).toggleClass('zoom-out');
	    })

	}

	$('body').on('click','.tracker', function(){
		$('.main_photo_preview_bg').fadeIn(400);
		$('.screen_fade').fadeIn(400);
		createMainLightbox();
	})

	$('#zoomImage').on('click', function(){
		$('.main_photo_preview_bg').fadeIn(400);
		$('.screen_fade').fadeIn(400);
		createMainLightbox();
	})

	$('.screen_fade').on('click', function(){
		$(this).fadeOut(400);
		$('.main_photo_preview_bg').fadeOut(400);
		$('.photo_preview_bg').fadeOut(400);
		$('.accessories_modal_bg').fadeOut(400);
		$('iframe').each(function(){
    		$(this).attr('src', $(this).attr('src'));
    	})
	})

	$('.main_photo_preview_close_icon').on('click', function(){
		$('.main_photo_preview_bg').fadeOut(400);
		$('.screen_fade').fadeOut(400);
		$('iframe').each(function(){
    		$(this).attr('src', $(this).attr('src'));
    	})
	})


	

	// windows 10 checkbox

	$('#c1').change(function(){
		if($('#c1').prop('checked')){
			$('#w10bottom').prop('checked',true)
			$('#w10bottom').parent().addClass('active')
			$('#w10bottom').siblings('.radio_description').find('.radio_price').css('font-size','0')
			$('#super_offer_windows').prop('checked',true)
			$('#super_offer_windows').parent().addClass('active')
			$('#super_offer_windows').siblings('.radio_description').find('.radio_price').css('font-size','0')
		} else {
			$('#w10bottom').prop('checked',false)
			$('#w10bottom').parent().removeClass('active')
			$('#w10bottom').siblings('.radio_description').find('.radio_price').css('font-size','13px')
			$('#super_offer_windows').prop('checked',false)
			$('#super_offer_windows').parent().removeClass('active')
			$('#super_offer_windows').siblings('.radio_description').find('.radio_price').css('font-size','13px')
		}
	})

	$('#w10bottom').change(function(){
		if($('#w10bottom').prop('checked')){
			$('#c1').prop('checked',true)
			$('#super_offer_windows').prop('checked',true)
			$('#super_offer_windows').parent().addClass('active')
			$('#super_offer_windows').siblings('.radio_description').find('.radio_price').css('font-size','0')
		} else {
			$('#c1').prop('checked',false)
			$('#super_offer_windows').prop('checked',false)
			$('#super_offer_windows').parent().removeClass('active')
			$('#super_offer_windows').siblings('.radio_description').find('.radio_price').css('font-size','13px')
		}
	})

	$('#super_offer_windows').change(function(){
		if($('#super_offer_windows').prop('checked')){
			$('#c1').prop('checked',true)
			$('#w10bottom').prop('checked',true)
			$('#w10bottom').parent().addClass('active')
			$('#w10bottom').siblings('.radio_description').find('.radio_price').css('font-size','0')
		} else {
			$('#c1').prop('checked',false)
			$('#w10bottom').prop('checked',false)
			$('#w10bottom').parent().removeClass('active')
			$('#w10bottom').siblings('.radio_description').find('.radio_price').css('font-size','13px')
		}
	})

	
	$('#c3').change(function(){
		if($('#c3').prop('checked')){
			$('#micOffBottom').prop('checked',true)
			$('#micOffBottom').parent().addClass('active')
			$('#micOffBottom').siblings('.radio_description').find('.radio_price').css('font-size','0')
			$('#super_offer_office').prop('checked',true)
			$('#super_offer_office').parent().addClass('active')
			$('#super_offer_office').siblings('.radio_description').find('.radio_price').css('font-size','0')
		} else {
			$('#micOffBottom').prop('checked',false)
			$('#micOffBottom').parent().removeClass('active')
			$('#micOffBottom').siblings('.radio_description').find('.radio_price').css('font-size','13px')
			$('#super_offer_office').prop('checked',false)
			$('#super_offer_office').parent().removeClass('active')
			$('#super_offer_office').siblings('.radio_description').find('.radio_price').css('font-size','13px')
		}
	})

	$('#micOffBottom').change(function(){
		if($('#micOffBottom').prop('checked')){
			$('#c3').prop('checked',true)
			$('#super_offer_office').prop('checked',true)
			$('#super_offer_office').parent().addClass('active')
			$('#super_offer_office').siblings('.radio_description').find('.radio_price').css('font-size','0')
		} else {
			$('#c3').prop('checked',false)
			$('#super_offer_office').prop('checked',false)
			$('#super_offer_office').parent().removeClass('active')
			$('#super_offer_office').siblings('.radio_description').find('.radio_price').css('font-size','13px')
		}
	})

	$('#super_offer_office').change(function(){
		if($('#super_offer_office').prop('checked')){
			$('#c3').prop('checked',true)
			$('#micOffBottom').prop('checked',true)
			$('#micOffBottom').parent().addClass('active')
			$('#micOffBottom').siblings('.radio_description').find('.radio_price').css('font-size','0')
		} else {
			$('#c3').prop('checked',false)
			$('#micOffBottom').prop('checked',false)
			$('#micOffBottom').parent().removeClass('active')
			$('#micOffBottom').siblings('.radio_description').find('.radio_price').css('font-size','13px')
		}
	})


	$('#c4').change(function(){
		if($('#c4').prop('checked')){
			$('#wifiBottom').prop('checked',true)
			$('#wifiBottom').parent().addClass('active')
			$('#wifiBottom').siblings('.radio_description').find('.radio_price').css('font-size','0')
			$('#super_offer_wifi').prop('checked',true)
			$('#super_offer_wifi').parent().addClass('active')
			$('#super_offer_wifi').siblings('.radio_description').find('.radio_price').css('font-size','0')
		} else {
			$('#wifiBottom').prop('checked',false)
			$('#wifiBottom').parent().removeClass('active')
			$('#wifiBottom').siblings('.radio_description').find('.radio_price').css('font-size','13px')
			$('#super_offer_wifi').prop('checked',false)
			$('#super_offer_wifi').parent().removeClass('active')
			$('#super_offer_wifi').siblings('.radio_description').find('.radio_price').css('font-size','13px')
		}
	})

	$('#wifiBottom').change(function(){
		if($('#wifiBottom').prop('checked')){
			$('#c4').prop('checked',true)
			$('#super_offer_wifi').prop('checked',true)
			$('#super_offer_wifi').parent().addClass('active')
			$('#super_offer_wifi').siblings('.radio_description').find('.radio_price').css('font-size','0')
		} else {
			$('#c4').prop('checked',false)
			$('#super_offer_wifi').prop('checked',false)
			$('#super_offer_wifi').parent().removeClass('active')
			$('#super_offer_wifi').siblings('.radio_description').find('.radio_price').css('font-size','13px')
		}
	})
	
	$('#super_offer_wifi').change(function(){
		if($('#super_offer_wifi').prop('checked')){
			$('#c4').prop('checked',true)
			$('#wifiBottom').prop('checked',true)
			$('#wifiBottom').parent().addClass('active')
			$('#wifiBottom').siblings('.radio_description').find('.radio_price').css('font-size','0')
		} else {
			$('#c4').prop('checked',false)
			$('#wifiBottom').prop('checked',false)
			$('#wifiBottom').parent().removeClass('active')
			$('#wifiBottom').siblings('.radio_description').find('.radio_price').css('font-size','13px')
		}
	})


	//

	$('.new_credit_button').on('click', function(){
	   	$('.privat_prod_modal').fadeIn();
	})

	$('.bottom_credit_btn').on('click', function(){
	   	$('.privat_prod_modal').fadeIn();
	})
	
	// tabs side block height

	$('.tab_labels_container').each(function(){
		var labelHeight = $(this).outerHeight();
		if(labelHeight < 200){
			$(this).css('height','200px');
		}
	})

	$('.radio_label').on('click',function(){
		var currentImgSrc = $(this).find('.radio_img').find('img').attr('src');
		$(this).parent().siblings('.new_side_photo_container').find('img').attr('src',currentImgSrc);
	})

	$('.ddr_label').on('click',function(){
		var currentImgSrc = $(this).find('.radio_img').find('img').attr('src');
		$(this).parent().parent().parent().siblings('.new_side_photo_container').find('img').attr('src',currentImgSrc);
	})

	$('.video_double_label').on('click',function(){
		var currentImgSrc = $(this).find('.radio_img').find('img').attr('src');
		$(this).parent().parent().parent().siblings('.new_side_photo_container').find('img').attr('src',currentImgSrc);
	})


	

	// label dropdown

	$('.label_dropdown_btn').on('click', function(){
		if( $(this).hasClass('active') == false){
			$('.label_dropdown_btn').removeClass('active');
			$('.label_dropdown_content').slideUp(400);
			$('.label_dropdown_content').removeClass('active');
			$('.radio_label').removeClass('subactive');
			$(this).addClass('active');
			$(this).siblings('.label_dropdown_content').slideDown(400);
			$(this).siblings('.label_dropdown_content').addClass('active')
			$(this).siblings('.label_dropdown_content').find('.radio_label:first').click();
			$(this).siblings('.label_dropdown_content').find('.radio_label').each(function(){
				$(this).addClass('subactive')
			})
			labelPriceSet();
		}
	})

	$('.label_dropdown_btn_video').on('click', function(){
		if( $(this).hasClass('active') == false){
			$('.label_dropdown_btn_video').removeClass('active');
			$('.label_dropdown_content_video').slideUp(400);
			$('.label_dropdown_content_video').removeClass('active');
			$('.videocard_label').removeClass('subactive_video');
			$(this).addClass('active');
			$(this).siblings('.label_dropdown_content_video').slideDown(400);
			$(this).siblings('.label_dropdown_content_video').addClass('active')
			// $(this).parent().siblings('.videocard_label').find('input').removeProp('checked')
			$(this).siblings('.label_dropdown_content_video').find('.radio_label:first').click();
			$(this).siblings('.label_dropdown_content_video').find('.radio_label').each(function(){
				$(this).addClass('subactive_video')
			})
			labelVideoPriceSet();
		}
	})

	$('.video_label_outer').on('click', function(){
		$('.label_dropdown_btn_video').removeClass('active');
			$('.label_dropdown_content_video').slideUp(400);
			$('.label_dropdown_content_video').removeClass('active');
			$('.videocard_label').removeClass('subactive');
	})

	function labelPriceSet(){
		$('.label_dropdown_btn').each(function(){
			 var labelBtnPrice = $(this).siblings('.label_dropdown_content').find('.radio_label:first').find('.radio_description').find('.radio_price').text();
			 $(this).find('.label_dropdown_btn_price').text(labelBtnPrice);
		})
		$('.label_dropdown_btn_price').each(function(){

	    	var priceFirstSymbol = $(this).text().substr(0,2);

	    	if (priceFirstSymbol === '(+'){
	    		$(this).css('color','#349916');
	    	} else if (priceFirstSymbol === '(-'){
	    		$(this).css('color','#DE5251');
	    	} else if( priceFirstSymbol === 'В '){
	    		$(this).css('color','#454545');
	    	}
    	})
	}

	function labelVideoPriceSet(){
		$('.label_dropdown_btn_video').each(function(){
			 var labelBtnPrice = $(this).siblings('.label_dropdown_content_video').find('.radio_label:first').find('.radio_description').find('.radio_price').text();
			 $(this).find('.label_dropdown_btn_price_video').text(labelBtnPrice);
		})
		$('.label_dropdown_btn_price_video').each(function(){

	    	var priceFirstSymbol = $(this).text().substr(0,2);

	    	if (priceFirstSymbol === '(+'){
	    		$(this).css('color','#349916');
	    	} else if (priceFirstSymbol === '(-'){
	    		$(this).css('color','#DE5251');
	    	} else if( priceFirstSymbol === 'В '){
	    		$(this).css('color','#454545');
	    	}
    	})
	}

	labelPriceSet();
	labelVideoPriceSet();


	function setShortNames(){
		var shortProc = $('.proc_label input:checked').parent().attr('data-short');
		var shortVideo = $('.videocard_label input:checked').parent().attr('data-short');
		var shortFan = $('.fan_label input:checked').parent().attr('data-short');
		var shortCooler = $('.cooler_label input:checked').parent().attr('data-short');
		var shortRam = $('.ddr_label input:checked').parent().attr('data-short');
		var shortHdd = $('.hdd_label input:checked').parent().attr('data-short');
		var shortSsd = $('.ssd_label input:checked').parent().attr('data-short');
		var shortMat = $('.mat_label input:checked').parent().attr('data-short');
		var shortBlock = $('.block_label input:checked').parent().attr('data-short');
		var shortDisk = $('.disk_label input:checked').parent().attr('data-short');

		$('.product_short_info').text(shortProc + ' / ' + shortVideo + ' / ' + shortRam + ' / ' + shortFan + ' / ' + shortCooler + ' / ' + shortHdd + ' / ' + shortSsd + ' / ' + shortMat + ' / ' + shortBlock + ' / ' + shortDisk)
	}

	setShortNames();



	// форма подбора компьютера (builder.html)

	$('.calculator_form_block .input_form_btn').on('click', function(event) {
		event.preventDefault();
		var cpu = $('.calculator_form_block select[name="cpu"] option:selected').html();
		var hdd = $('.calculator_form_block select[name="hdd"] option:selected').html();
		var video = $('.calculator_form_block select[name="video"] option:selected').html();
		var budget = $('.calculator_form_block select[name="budget"] option:selected').html();
		var ram = $('.calculator_form_block select[name="ram"] option:selected').html();
		var ssd = $('.calculator_form_block select[name="ssd"] option:selected').html();
		var comment = $('.calculator_form_block .calc_comment').val();
		var email = $('.calculator_form_block .form_input_mail').val();
		var tel = '' + $('.calculator_form_block .input_tel_2').val() + $('.calculator_form_block .input_tel_3').val();

		if (tel.length != 10) {
    			// $('.calculator_form_block .input_tel_1').addClass('error');
				$('.calculator_form_block .input_tel_2').addClass('error');
				$('.calculator_form_block .input_tel_3').addClass('error');
				return 0;
    	};

		$.post('php/new_lid.php', { type: 'builder', city: city_name, utm_term: utm_term, utm_content: utm_content, utm_compaign: utm_compaign, utm_source: utm_source, utm_medium: utm_medium, cpu: cpu, hdd: hdd, video: video, budget: budget, ram: ram, ssd: ssd, comment: comment, email: email, tel: tel}, function(data) {
			window.location.href = 'http://регард.com/thanks.html';	
		})
	})

})