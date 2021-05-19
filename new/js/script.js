	var newPrice;
	var oldPrice;
$(document).ready(function(){

	var thanx = 'Спасибо! Наш менеджер свяжется с вами в ближайшее время.';
	 // scroll

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

	$(window).scroll(function() {
   	   if ($(this).scrollTop() > 600) {
          $('.bottom_price_nav').fadeIn(400);
       } else {
         $('.bottom_price_nav').fadeOut(400);
       }
	});

	// accordion

	$('.accordion_btn').on('click', function(){
		$(this).next().slideToggle();
		$(this).toggleClass('active');
	})

	// tabs

	var tabBtn = 'tab_conf'

	$('#'+tabBtn+'_content').css('display','block');

	$('.tab_btn').on('click', function(){
		tabBtn = $(this).attr('data');
		$('.tab_btn').removeClass('active');
		$(this).addClass('active');
		$('.tab_content_inner').fadeOut();
		$('#'+tabBtn+'_content').fadeIn();
	})
	

	// конфигуратор


	var additionalPrice = 0;


	var procPrice
	var procTitle 

	var videocardPrice
	var videocardTitle

	var coolerPrice
	var coolerTitle

	var ddrPrice
	var ddrTitle

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

		coolerTitle = $('.cooler_label input:checked').siblings('.radio_description').find('.radio_description_title').text()
		$('.cooler_btn').text(coolerTitle)

		ddrTitle = $('.ddr_label input:checked').siblings('.radio_description').find('.radio_description_title').text()
		$('.ddr_btn').text(ddrTitle)

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
				return currentPrice + ' грн'
			} else{
				return '+' + currentPrice + ' грн'
			}
		})

		videocardPrice = $('.videocard_label input:checked').parent().attr('data-price');
		$('.videocard_label').find('.radio_description').find('.radio_price').text(function(){
			var currentPrice = $(this).parent().parent().attr('data-price') - videocardPrice
			if (currentPrice < 0 ){
				return currentPrice + ' грн'
			} else{
				return '+' + currentPrice + ' грн'
			}
		})

		coolerPrice = $('.cooler_label input:checked').parent().attr('data-price');
		$('.cooler_label').find('.radio_description').find('.radio_price').text(function(){
			var currentPrice = $(this).parent().parent().attr('data-price') - coolerPrice
			if (currentPrice < 0 ){
				return currentPrice + ' грн'
			} else{
				return '+' + currentPrice + ' грн'
			}
		})
		
		ddrPrice = $('.ddr_label input:checked').parent().attr('data-price');
		$('.ddr_label').find('.radio_description').find('.radio_price').text(function(){
			var currentPrice = $(this).parent().parent().attr('data-price') - ddrPrice
			if (currentPrice < 0 ){
				return currentPrice + ' грн'
			} else{
				return '+' + currentPrice + ' грн'
			}
		})

		hddPrice = $('.hdd_label input:checked').parent().attr('data-price');
		$('.hdd_label').find('.radio_description').find('.radio_price').text(function(){
			var currentPrice = $(this).parent().parent().attr('data-price') - hddPrice
			if (currentPrice < 0 ){
				return currentPrice + ' грн'
			} else{
				return '+' + currentPrice + ' грн'
			}
		})

		ssdPrice = $('.ssd_label input:checked').parent().attr('data-price');
		$('.ssd_label').find('.radio_description').find('.radio_price').text(function(){
			var currentPrice = $(this).parent().parent().attr('data-price') - ssdPrice
			if (currentPrice < 0 ){
				return currentPrice + ' грн'
			} else{
				return '+' + currentPrice + ' грн'
			}
		})

		matPrice = $('.mat_label input:checked').parent().attr('data-price');
		$('.mat_label').find('.radio_description').find('.radio_price').text(function(){
			var currentPrice = $(this).parent().parent().attr('data-price') - matPrice
			if (currentPrice < 0 ){
				return currentPrice + ' грн'
			} else{
				return '+' + currentPrice + ' грн'
			}
		})

		blockPrice = $('.block_label input:checked').parent().attr('data-price');
		$('.block_label').find('.radio_description').find('.radio_price').text(function(){
			var currentPrice = $(this).parent().parent().attr('data-price') - blockPrice
			if (currentPrice < 0 ){
				return currentPrice + ' грн'
			} else{
				return '+' + currentPrice + ' грн'
			}
		})

		diskPrice = $('.disk_label input:checked').parent().attr('data-price');
		$('.disk_label').find('.radio_description').find('.radio_price').text(function(){
			var currentPrice = $(this).parent().parent().attr('data-price') - diskPrice
			if (currentPrice < 0 ){
				return currentPrice + ' грн'
			} else{
				return '+' + currentPrice + ' грн'
			}
		})

		compPrice = $('.new_block_label input:checked').parent().attr('data-price');
		$('.new_block_label').find('.new_block_label_info').find('.radio_price').text(function(){
			var currentPrice = $(this).parent().parent().attr('data-price') - compPrice
			if (currentPrice < 0 ){
				return currentPrice + ' грн'
			} else{
				return '+' + currentPrice + ' грн'
			}
		})


		$('.radio_label input[type=radio]:checked').siblings('.radio_description').find('.radio_price').text('В составе')
		$('.new_block_label input[type=radio]:checked').siblings('.new_block_label_info').find('.radio_price').text('В составе')
	}

	function setPrice(){
		newPrice = +procPrice + +videocardPrice + +coolerPrice + +ddrPrice + +hddPrice + +ssdPrice + +matPrice + +blockPrice + +diskPrice + +compPrice + addToNewPrice + additionalPrice;
		oldPrice = +procPrice + +videocardPrice + +coolerPrice + +ddrPrice + +hddPrice + +ssdPrice + +matPrice + +blockPrice + +diskPrice + +compPrice + addToOldPrice + additionalPrice;
		currentValue = newPrice;
		// comission = (currentValue / 100) * 2.75;
	 //   	comissionForPrivat = ((currentValue + comission) / 100) * 2.9;
	   	// currentPrice = currentValue + comission;
	   	// payInMonth = (currentValue + comission) / payNum  + comissionForPrivat;
	   	currentPrice = (currentValue - ppPercentPrice) / 0.9725;
	   	payInMonth = (currentPrice + (payNum*currentPrice*0.029)) / payNum;
	   	payInMonthPp = currentValue / (payNumPp + 1);

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
	})


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

    		var currentTitle = $(this).siblings('.radio_description').find('.radio_description_title').text()
    		$(this).parent().parent().siblings('.accordion_btn').text(currentTitle)

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

			$(this).siblings('.radio_description').find('.radio_price').text('В составе')

    	} else {

    		var currentPrice = $(this).attr('data-price');
    		additionalPrice = additionalPrice - +currentPrice;

    		if($(this).parent().parent().find('input[type=checkbox]').is('.radio_label input[type=checkbox]:checked')) {
    			var currentTitle = $(this).parent().parent().find('input[type=checkbox]:checked').siblings('.radio_description').find('.radio_description_title').last().text()
    		} else {
    			var currentTitle = 'Не выбрано';
    		}

    		$(this).parent().parent().siblings('.accordion_btn').text(currentTitle)
    		$(this).siblings('.radio_description').find('.radio_price').text($(this).attr('data-price') + ' грн')
    	}

    	setPrice();

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
		

		var name = $('.product_buy_inner .modal_input').val();
		var tel = '';
    	tel += $('.product_buy_inner .input_tel_2').val() + $('.product_buy_inner .input_tel_3').val();
    	
    	if (tel.length != 10) {
    			// $('.product_buy_inner .input_tel_1').addClass('error');
				$('.product_buy_inner .input_tel_2').addClass('error');
				$('.product_buy_inner .input_tel_3').addClass('error');
				return 0;
    	};

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


		$.post('php/new_lid.php', { city: city_name, utm_term: utm_term, utm_content: utm_content, utm_compaign: utm_compaign, utm_source: utm_source, utm_medium: utm_medium, name: name, tel: tel, wifi: wifi, msoffice: msoffice, windows: windows, price: newPrice, type: 'product', monitor: monitor, keyboard: keyboard, complect: complect, mouse: mouse, cpu: procTitle, hdd: hddTitle, video: videocardTitle, budget: post_price, ram: ddrTitle, ssd: ssdTitle, cooler: coolerTitle, materinka: matTitle, block_pit: blockTitle, disk: diskTitle, corpus: compTitle, comp_name: comp_name, email: email, tel: tel}, function(data) {
			console.log(data);
			window.location.href = 'http://регард.com/thanks.html';
		})
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

		if (merch_type == 'PP') {
			parts = $('.privat_prod_inner .payment_number_pp span').text();
		} else {
			parts = $('.privat_prod_inner .payment_number span').text();
			post_price = currentPrice - ppPercentPrice;
			summa = currentPrice.toFixed(2) - ppPercentPrice;
		}


    	tel += $('.privat_prod_inner .input_tel_2').val() + $('.privat_prod_inner .input_tel_3').val();

    	if (tel.length != 10) {
    			// $('.privat_prod_inner .input_tel_1').addClass('error');
				$('.privat_prod_inner .input_tel_2').addClass('error');
				$('.privat_prod_inner .input_tel_3').addClass('error');
				return 0;
    	};

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


		if (merch_type != undefined) {
			$.post('php/create_credit.php', { merch_type: merch_type, parts: parts, email: email, city: city_name, utm_term: utm_term, utm_content: utm_content, utm_compaign: utm_compaign, utm_source: utm_source, utm_medium: utm_medium, name: name, tel: tel, wifi: wifi, msoffice: msoffice, windows: windows,  parts: parts, price: summa, type: 'product', monitor: monitor, keyboard: keyboard, complect: complect, mouse: mouse, cpu: procTitle, hdd: hddTitle, video: videocardTitle, budget: post_price, ram: ddrTitle, ssd: ssdTitle, cooler: coolerTitle, materinka: matTitle, block_pit: blockTitle, disk: diskTitle, corpus: compTitle, comp_name: comp_name, tel: tel}, function(data) {
				window.location.href = 'https://payparts2.privatbank.ua/ipp/v2/payment?token=' + data;
			})
		} else {
			alert('Выберите, пожалуйста, тип кредита...');
		}

    })

    // radio_price color set

    function setPriceDifferenceColor(){
    	$('.radio_price').each(function(){

	    	var priceFirstSymbol = $(this).text().substr(0,1);

	    	if (priceFirstSymbol === '+'){
	    		$(this).css('color','#349916');
	    	} else if (priceFirstSymbol === '-'){
	    		$(this).css('color','#FB515D');
	    	} else if( priceFirstSymbol === 'В'){
	    		$(this).css('color','#454545');
	    	}
    	})
    }

    setPriceDifferenceColor();

    // fixed tab bar

    var tabNavOffset = $('.tabs_nav_bar').offset().top

    $(window).on('scroll', function(){
    	if( $(this).scrollTop() >= tabNavOffset ){
    		$('.tabs_nav_bar').addClass('fixed');
    		$('.tabs_block').addClass('fixed');
    	} else {
    		$('.tabs_nav_bar').removeClass('fixed');
    		$('.tabs_block').removeClass('fixed');
    	}
    })

    // comments num

     var commentsNumFunction = setInterval(function(){

    	var commentsNum = $('.hc__menu__count').text()

    	$('.tab_btn_inner').text(commentsNum);
    	$('.comments_num span').text(commentsNum);

    	// alert(commentsNum)

    	if(commentsNum != ''){
    		clearInterval(commentsNumFunction);
    	}

    }, 100)


    // comments scroll

    $('.comments_num').on('click', function(){
    	tabBtn = 'tab_comments'
		$('.tab_btn').removeClass('active');
		$('.comments_tab_btn').addClass('active');
		$('.tab_content_inner').fadeOut();
		$('#'+tabBtn+'_content').fadeIn();
    })

    // side photos

    $('.side_mini_photo').on('mouseover', function(){
    	var currentImgSrc = $(this).find('img').attr('src');

    	$('.main_photo_image').attr('src', currentImgSrc)
    })

    var sidePhotosNum = $('.side_mini_photo').length

    var sidePhotosDifference = sidePhotosNum - 8

    var sidePhotosCounter = sidePhotosDifference

    function sidePhotosArrowsDisplay(){
    	if(sidePhotosNum > 8){
    		$('.side_arrowbottom').css('display','block');
    	}
    }

    sidePhotosArrowsDisplay();

    $('.side_arrowbottom').on('click', function(){
    	$('.side_photo_container_inner').animate({top: '-=62'},400)
    	$('.side_arrowtop').css('display','block');
    	sidePhotosCounter -= 1;
    	if( sidePhotosCounter == 0){
    		$('.side_arrowbottom').css('display','none');
    	}
    })

    $('.side_arrowtop').on('click', function(){
    	$('.side_photo_container_inner').animate({top: '+=62'},400)
    	$('.side_arrowbottom').css('display','block');
    	sidePhotosCounter += 1;
    	if( sidePhotosCounter == sidePhotosDifference){
    		$('.side_arrowtop').css('display','none');
    	}
    })
    

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