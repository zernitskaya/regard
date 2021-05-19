$(document).ready(function(){


    // Сохранение введенных параметров
    if (typeof(Storage) !== "undefined") {
        $('input[name=name]').on('input change', function(){
            localStorage.username = $(this).val();
        })

        $('input[name=city]').on('input change', function(){
            localStorage.usercity = $(this).val();
        })

        $('input[name=tel]').on('change input', function(){
            localStorage.usertel = $(this).val();
        })

        $('input[name=email]').on('change input', function(){
            localStorage.useremail = $(this).val();
        })

        $('input[name=name]').val(localStorage.username);
        $('input[name=city]').val(localStorage.usercity);
        $('input[name=tel]').val(localStorage.usertel);
        $('input[name=email]').val(localStorage.useremail);
    }

    // deliv modal

    $('#db').on('click', function(){
        $('#dp').fadeIn();
        $('.cart_modals_blackout').fadeIn(400);
    })

    $('#payb').on('click', function(){
        $('#payp').fadeIn();
        $('.cart_modals_blackout').fadeIn(400);
    })

    $('.delivery_close_icon').on('click', function(){
        $('.delivery_popup').fadeOut();
        $('.cart_modals_blackout').fadeOut(400);
    })

    $('.cart_modals_blackout').on('click', function(){
        $(this).fadeOut()
        $('.delivery_popup').fadeOut();
    })


    // nums w/ space

    function numWithSpace(num){  

        if(num > 100000){
          var n = num.toString();
          var result = n.slice(0,3) + ' ' +n.slice(3);
          return result
        } else if(num > 10000){
          var n = num.toString();
          var result = n.slice(0,2) + ' ' +n.slice(2);
          return result
        } else {
          var n = num.toString();
          var result = n.slice(0,1) + ' ' +n.slice(1);
          return result
        }

    }

	$('.userPhone').inputmask('+38(099)-999-99-99');

	// cart quantity

    var allPrice = 0; // общая цена товаров
    var couponPrice = 0; // скидка по купону
    var couponCode = ''; // код купона

    $('.cart_coupon_block_checkout_buy_btn').on('click', function(){
        
        delivery = $('input[name=delivery]:checked').val();
        paytype = $('input[name=paytype]:checked').val();
        filial = '';
        street = '';
        house = '';
        flat = '';
        fop = '';
        bank = $('input[name=privat]:checked').val();

        if (delivery == 'Самовывоз из Новой Почты') {
            filial = $('input[name=filial]').val();
        };

        if (delivery == 'Новая Почта курьером' || delivery == 'Курьером по Киеву') {
            street = $('input[name=street]').val();
            house = $('input[name=house]').val();
            flat = $('input[name=flat]').val();
        };

        if (delivery == 'Самовывоз из магазина') {
            filial = $('.selected_shop').text();
        };

        if (paytype == 'Безналичный расчет') {
            fop = $('input[name=fop]').val();
        };

        $.post('../../../php/test_mail.php', {pay_num: payNum, coupon: couponCode, delivery: delivery, paytype: paytype, bank: bank, fop: fop, filial: filial, street: street, house: house, flat: flat, name: userName, tel: userPhone, city: userCity, email: userMail}, function(data){
            if (data != 'no') {
                
                if (paytype == 'Кредит') {
                    if (bank == 'privat') {
                        window.location.href = 'https://payparts2.privatbank.ua/ipp/v2/payment?token='+data;
                    }
                    
                    if (bank == 'later') {
                        $('body').html(data);
                        $('.later_btn').click();
                    }

                    if (bank == 'alfa') {
                        window.location.href = data;
                    }

                } else {
                    // window.location.href = '../success/';
                    console.log(data);
                }

            } else {
                alert('В корзине нет ни одного компьютера');
            }


        })

    })

    // Подсчет всего
    function updatePrice(){
        allPrice = 0;
        // Перебираем цены каждого блока
        $('.cart_item').each(function(val){

            // count = $(this).find('.quantity_select_num').text();
            count = $(this).find('.cart_item_quantity_block_field').text();
            
            priceIs = $(this).find('.cart_item_info_price_block span price').text();
            priceIs = parseInt(priceIs.replace(' ', '')); // цена данного товара за 1 ед.

            tmp = count*priceIs;
            allPrice += tmp;
            // console.log(tmp);

        })

        // Вписываем цену 
        $('.promeshutok').text(numWithSpace(allPrice) + ' грн');
        total = allPrice - couponPrice;
        $('.main_price').text(numWithSpace(total) + ' грн');
        
    }

    // Чекбоксы с дополнениями
    $('.additional_items_block_item_label input').on('click', function(event){
        dop_id = $(this).parent().attr('data-dop-id');
        action = $(this).parent().attr('data-action');
        comp_id = $(this).parent().attr('data-comp');

        $.post('../../../php/add_dop_to_comp.php', {comp_key: comp_id, action: action, dop_id: dop_id}, function(data){
            window.location.reload();
        })
    })

    // Смена кол-во
    // $('.cart_item_info_quantity_block_dropdown_item').on('click', function(){
    $('.cart_item_quantity_block_minus, .cart_item_quantity_block_plus').on('click', function(){
        
        type = $(this).parent().attr('data-type');
        key = $(this).parent().attr('data-id');
        key = key.replace('c', '');
        key = key.replace('a', '');
        curCount = $(this).parent().find('.cart_item_quantity_block_field').text();
        
        if ($(this).hasClass('cart_item_quantity_block_minus')) {
            
            if (curCount <= 1) {
                // $(this).parent().parent().find('.remove_button').click();
                return 0;
            } else {
                curCount--;
            }

        } else {
            curCount++;
        }
        console.log(curCount);
        
        if (type == 'comp') {
            $('.cart_item_quantity_block[data-id=c'+key+'] .cart_item_quantity_block_field').text(curCount);
            $('.cart_step_two_product_block[data-id=c'+key+'] .cart_step_two_product_block_num span').text(curCount);
        } else{
            $('.cart_item_quantity_block[data-id=a'+key+'] .cart_item_quantity_block_field').text(curCount);
            $('.cart_step_two_product_block[data-id=a'+key+'] .cart_step_two_product_block_num span').text(curCount);
        }

        $.post('../../../php/change_count.php', { type: type, key: key, count: curCount }, function(){
            updatePrice();
        })
    })

    // Удаление компонента
    $('.remove_button').on('click', function(){
        
        type = $(this).attr('data-type');
        key = $(this).attr('data-id');
        th = $(this);

        $.post('../../../php/remove_item.php', { type: type, key: key }, function(){
            // window.location.reload();
            th.parent().parent().parent().parent().remove();
            if (type == 'comp') {
                $('.cart_products_side_container_block[data-id=c'+key+']').remove();
                $('.cart_step_two_product_block[data-id=c'+key+']').remove();
            } else{
                $('.cart_products_side_container_block[data-id=a'+key+']').remove();
                $('.cart_step_two_product_block[data-id=a'+key+']').remove();
            }
            updatePrice();
            var tmpcount = $('.header_cart_circle:lt(1)').text();
            tmpcount--;
            $('.header_cart_circle').text(tmpcount);
            if (tmpcount == 0) {
                $('.header_cart_circle').hide();  
                // $('.cart_items_container').text('В корзине пусто...');
                $('.cart_left_part').hide();
                $('.cart_right_part').hide();
                $('.emty_cart').show();
            }
            
        })
    })

    // Применить промо-код
    $('.cart_coupon_block_submit').on('click', function(event){
        
        event.preventDefault();

        code = $('.cart_coupon_block_input').val();

        $.post('../../../php/promocode.php', { code: code }, function(data){
            if (data != 'no') {
                couponPrice = data;
                couponCode = code;
                $('.cart_main_info_block_info_block_price.coupon').text(couponPrice);
                updatePrice();
            } else {
                // alert('Такого купона не существует...');
                $('.coupon_error_blackout').fadeIn(400);
                $('.coupon_error_modal').fadeIn(400);
            }
        })
    })

    $('.coupon_error_blackout').on('click',function(){
        $('.coupon_error_blackout').fadeOut(400);
        $('.coupon_error_modal').fadeOut(400);
    })

    $('.error_modal_button').on('click',function(){
        $('.coupon_error_blackout').fadeOut(400);
        $('.coupon_error_modal').fadeOut(400);
    })

    

    updatePrice();

	var cartQuantity = 1


	$('.quantity_select').on('click', function(){
		$(this).siblings('.cart_item_info_quantity_block_dropdown').toggleClass('opened')
	})

	$('.cart_item_info_quantity_block_dropdown_item').on('click', function(){
		var currentQuantity = $(this).text();
		var cartQuantity = +currentQuantity;
		$(this).parent().siblings('.quantity_select').find('.quantity_select_num').text(currentQuantity);
		$('.cart_item_info_quantity_block_dropdown').removeClass('opened')
	})

	var userName
	var userCity
	var userPhone
	var userMail

	// to checkout

	$('.cart_coupon_block_buy_btn').on('click', function(){

        // проверяем есть ли комп среди заказов
		$.post('../php/checkout_start.php', {}, function(data){
            if (data == 'no') {
                alert('Вы не можете оформить заказ без единого компьютера...');
            } else {
                $('.cart_items_container').css('display','none');
        		$('.checkout_block').css('display','block');
        		$('.cart_coupon_block_buy_btn').css('display','none');
        		$('.cart_main_info_block').css('display','none');
        		$('.cart_coupon_block').css('display','none');
        		$('.cart_products_side_container').css('display','block');
                $('.cart_coupon_block_title').css('display','none');
                $('.cart_coupon_block_input_block').css('display','none');
                $('.cart_left_part').addClass('checkout');
                $('.cart_body').addClass('checkout');
            }
        })
        
	})

	// checkout to step 2

    $('.userPhone').keydown(function(key){
        if(key.which == 48 && $(this).val() == ''){
            return false
        } else if(key.which == 96 && $(this).val() == ''){
            return false
        }
    })


	$('.checkout_to_step_two_button').on('click', function(){
		userName = $('.userName').val()
		userCity = $('.userCity').val()
		userPhone = $('.userPhone').val()
		userMail = $('.userMail').val()

		if (userName.length == 0) {
			$('.userName').addClass('error');
    	} else {
    		$('.userName').removeClass('error');
    	}

    	if (userCity.length == 0) {
			$('.userCity').addClass('error');
    	} else {
    		$('.userCity').removeClass('error');
    	}

   //  	var mailCheck = userMail.indexOf('@');

   //  	if (mailCheck == -1 || userMail.length == 0) {
			// $('.userMail').addClass('error');
   //  	} else {
   //  		$('.userMail').removeClass('error');
   //  	}

		var phonemaskCheck = userPhone.indexOf('_');

    	if (phonemaskCheck != -1 || userPhone.length == 0) {
			$('.userPhone').addClass('error');
    	} else {
    		$('.userPhone').removeClass('error');
    	}

    	if($('.error').length == 0){
            var nameAndTel = ( userName + ' ' + userPhone).length;
            if(nameAndTel > 32){
                $('.name_and_tel').css('font-size','14px');
            }
			$('.changed_name_and_tel .name_and_tel').text( userName + ' ' + userPhone )
			$('.checkout_step_one').css('display','none');
			$('.checkout_step_two').css('display','block');
			$('.cart_coupon_block_checkout_buy_btn').css('display','block');
			$('.cart_main_info_block').css('display','block')
			$('.cart_coupon_block').css('display','block')
			$('.cart_products_side_container').css('display','none')

    	}

        cutCheckoutTitle();

	})


	$('.changed_name_and_tel .edit').on('click', function(){
		$('.checkout_step_two').css('display','none');
		$('.checkout_step_one').css('display','block');
		$('.cart_main_info_block').css('display','none')
		$('.cart_coupon_block').css('display','none')
		$('.cart_products_side_container').css('display','block')
	})


	// delivery

	$('.deliveryLabel input:checked').parent().addClass('checked');
	$('.np_post').css('display','block');

	$('.deliveryLabel input').on('change', function(){
        $('.deliveryLabel').removeClass('checked');
        $('.deliveryLabel input:checked').parent('.deliveryLabel').addClass('checked')

        if($('.deliveryLabel input:checked').val() == 'Самовывоз из Новой Почты'){
        	$('.np_post').css('display','block');
        	$('.np_address').css('display','none');
        	$('.kiev_address').css('display','none');
        	$('.shop_city_select_block').css('display','none');
        } else if($('.deliveryLabel input:checked').val() == 'Новая Почта курьером'){
        	$('.np_address').css('display','block');
        	$('.np_post').css('display','none');
        	$('.kiev_address').css('display','none');
        	$('.shop_city_select_block').css('display','none');
        } else if($('.deliveryLabel input:checked').val() == 'Курьером по Киеву'){
        	$('.np_address').css('display','none');
        	$('.np_post').css('display','none');
        	$('.kiev_address').css('display','block');
        	$('.shop_city_select_block').css('display','none');
        } else if($('.deliveryLabel input:checked').val() == 'Самовывоз из магазина'){
        	$('.np_address').css('display','none');
        	$('.np_post').css('display','none');
        	$('.kiev_address').css('display','none');
        	$('.shop_city_select_block').css('display','block');
        }
    })	



	var checkOutShopSelect = 'Киев'

    $('.shop_city_select').on('click', function(){
    	$('.shop_city_select_dropdown').toggleClass('opened')
    })
    $('.shop_city_select_dropdown_item').on('click', function(){
    	checkOutShopSelect = $(this).attr('data-shop')
    	var currentShopName = $(this).text()
    	$('.selected_shop').text(currentShopName)
    	$('.shop_city_select_dropdown').removeClass('opened')
    })


    // paytype

    $('.payLabel input:checked').parent().addClass('checked');
	$('.np_post').css('display','block');

	$('.payLabel input').on('change', function(){
        $('.payLabel').removeClass('checked');
        $('.payLabel input:checked').parent('.payLabel').addClass('checked')

        if($('.payLabel input:checked').val() == 'Кредит'){
        	$('.privat_in_cart').css('display','block')
            $('.paytype_beznal_additional_block').css('display','none')
        } else  if($('.payLabel input:checked').val() == 'Безналичный расчет'){
            $('.paytype_beznal_additional_block').css('display','block')
        	$('.privat_in_cart').css('display','none')
        } else{
            $('.paytype_beznal_additional_block').css('display','none')
            $('.privat_in_cart').css('display','none')
        }
    })	




    var payInMonth;
    var payNum = payNumIs;

    function changePaySum(){
                // currentValue = 12000;
                currentValue = allPrice;
                var comission = (currentValue / 100) * 2.75;

                currentPrice = currentValue  / 0.9725;
                payInMonth = (currentPrice + (payNum*currentPrice*0.029)) / payNum;
                $('.privat_info_payment_field span').html(payInMonth.toFixed());

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

    // кнопка "детали"

    $('.details_button').on('click', function(){
        $('.cart_blackout').fadeIn(400);
        var elemet_id = $(this).attr('data-id');

        $.get('../../../../php/get_details.php', { comp: elemet_id }, function(data){
            $('.cart_blackout .details_modal').html(data);
        })
    })

    $('.cart_additional_products_slide_button').on('click', function(){
        var ass_id = $(this).attr('data-id');

        $.post('../../../../php/dop_sale.php', { ass_id: ass_id }, function(data){
            window.location.reload();
        })
    })

    $('.cart_blackout').on('click', function(){
        $(this).fadeOut(400)
    })
    // $('.details_modal').click(function(event){
    //     event.stopPropagation();
    // });

    // $('body').on('click', '.details_modal_close', function(){
    //     $('.cart_blackout').fadeOut(400)
    // })

    // additional items input change

    $('.additional_items_block_item_label input:checked').parent('.additional_items_block_item_label').addClass('checked');

    $('.additional_items_block_item_label input').on('change', function(){
        $('.additional_items_block_item_label').removeClass('checked');
        $('.additional_items_block_item_label input:checked').parent('.additional_items_block_item_label').addClass('checked');
    })

    // additional items modal

    $('.additional_items_block_item_info').on('click', function(){
        $('.add_items_blackout').fadeIn(400);
        $('.add_items_modal').fadeIn(400);
    })

    $('.add_items_close').on('click', function(){
        $('.add_items_blackout').fadeOut(400);
        $('.add_items_modal').fadeOut(400);  
    })
    
    $('.add_items_blackout').on('click', function(){
        $('.add_items_blackout').fadeOut(400);
        $('.add_items_modal').fadeOut(400);  
    })
})

$(document).keyup(function(e) {
    if (e.keyCode == 27) { 
        $('.add_items_blackout').fadeOut(400);
        $('.add_items_modal').fadeOut(400);  
        $('.cart_modals_blackout').fadeOut()
        $('.delivery_popup').fadeOut();
        $('.cart_blackout').fadeOut(400);
    }
});


function cutCheckoutTitle(){
    $('.cart_step_two_product_block_title').each(function(){
        var titleText = $(this).text()
        var titleLength = titleText.length
        if(titleLength > 25){
            var newTitleText = titleText.slice(0,23)
            $(this).text(newTitleText + '...')
        }
    })
}













