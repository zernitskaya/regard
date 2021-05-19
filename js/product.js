$(document).ready(function(){

    // Сохранить PDF
    $('.print_block').on('click', function(){

        save_com = [];
        // Перебираем все отмеченные компоненты
        $('#tab_configuration_content input[type="checkbox"]:checked, #tab_configuration_content input[type="radio"]:checked, #tab_accesories_content input[type="checkbox"]:checked').each(function(val){
            param = $(this).attr('name');
            if (param != 'ass') {
                save_com.push($(this).attr('value'));
            }
        })

        var coms_id = save_com.join(',');
        var comp_id = $(this).attr('comp-id');

        window.location.href = '../../../../../../php/save_pdf.php?coms_id='+coms_id+'&comp_id='+comp_id;
        // $.post('../../../../php/save_pdf.php', { coms_id: coms_id, comp_id: comp_id }, function(data){

        // })

    })

    // Отправка конфигурации на почту
    $('.product_email_modal_footer_button').on('click', function(){
        var email = $('.product_email_modal_body_input').val();
        var comment = $('.product_email_modal_body_textarea').val();

        save_com = [];
        // Перебираем все отмеченные компоненты
        $('#tab_configuration_content input[type="checkbox"]:checked, #tab_configuration_content input[type="radio"]:checked, #tab_accesories_content input[type="checkbox"]:checked').each(function(val){
            param = $(this).attr('name');
            if (param != 'ass') {
                save_com.push($(this).attr('value'));
            }
        })

        var coms_id = save_com.join(',');
        var comp_id = $(this).attr('comp-id');

        var mailCheck = email.indexOf('@');

        if (mailCheck == -1 || email.length == 0){
            $('.product_email_modal_body_input').addClass('error');
        } else {
            $('.product_email_modal_body_input').removeClass('error');
            $.post('../../../../php/config_mail.php', { email: email, comment: comment, coms_id: coms_id, comp_id: comp_id }, function(data){
                // alert('Спасибо.');
                $('.modals_screen_fade').fadeOut(200);
                $('.product_email_modal').fadeOut(200);
                $('.mail_blackout').fadeIn(400);
                $('.mail_modal').fadeIn(400);
            })
        }


    })

    $('.mail_blackout').on('click',function(){
        $('.mail_blackout').fadeOut(400);
        $('.mail_modal').fadeOut(400);
    })

    $('.mail_modal_button').on('click',function(){
        $('.mail_blackout').fadeOut(400);
        $('.mail_modal').fadeOut(400);
    })

     // кнопка "детали"

    $('.show_config').on('click', function(){
        $('.cart_blackout').fadeIn(400);
        save_com = [];
        // Перебираем все отмеченные компоненты
        $('#tab_configuration_content input[type="checkbox"]:checked, #tab_configuration_content input[type="radio"]:checked, #tab_accesories_content input[type="checkbox"]:checked').each(function(val){
            param = $(this).attr('name');
            if (param != 'ass') {
                save_com.push($(this).attr('value'));
            }
        })

        var coms_id = save_com.join(',');
        var comp_id = $(this).attr('comp-id');

        $.get('../../../../php/get_details.php', { comp_id: comp_id, coms_id: coms_id, price: totalPrice }, function(data){
            $('.cart_blackout .details_modal').html(data);
        })
    })

    $('.cart_blackout').on('click', function(){
        $(this).fadeOut(400)
    })
    // $('.details_modal').click(function(event){
    //     event.stopPropagation();
    // });

    // $('details_modal_close').on('click', function(){
    //     $('.cart_blackout').fadeOut(400)
    // })

    // email modal

    $('.mail_block').on('click', function(){
        $('.modals_screen_fade').fadeIn(400);
        $('.product_email_modal').fadeIn(400);
    })

    $('.save_block').on('click', function(){
        save_com = [];
        save_ass = [];
        // Перебираем все отмеченные компоненты
        $('#tab_configuration_content input[type="checkbox"]:checked, #tab_configuration_content input[type="radio"]:checked, #tab_accesories_content input[type="checkbox"]:checked').each(function(val){
            param = $(this).attr('name');
            if (param != 'ass') {
                save_com.push($(this).attr('value'));
            } else {
                save_ass.push($(this).val());
            }
        })
        $('.product_save_modal_link').html('https://digitalfury.pro/computer/' + url + '/' + save_com.join(',') + '/');
        $('.product_save_modal').fadeIn(400);
        $('.modals_screen_fade').fadeIn(400);
    })

    $('.product_email_modal_close').on('click', function(){
        $('.modals_screen_fade').fadeOut(400);
        $('.product_email_modal').fadeOut(400);
    })

    $('.product_save_modal_close').on('click', function(){
        $('.modals_screen_fade').fadeOut(400);
        $('.product_save_modal').fadeOut(400);
    })

    $('.modals_screen_fade').on('click', function(){
        $(this).fadeOut(400);
        $('.product_email_modal').fadeOut(400);
        $('.product_save_modal').fadeOut(400);
    })


    // copy link

    function copyToClipboard(element) {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(element).text()).select();
        document.execCommand("copy");
        $temp.remove();
    }

    $('.product_save_modal_button').on('click', function(){
        copyToClipboard('.product_save_modal_link')
        $('.product_save_modal_link').text('Ссылка скопирована')
    })

    // Save configuration

    // $('.product_page_title').on('click', function(){

    //     save_com = [];
    //     save_ass = [];
    //     // Перебираем все отмеченные компоненты
    //     $('#tab_configuration_content input[type="checkbox"]:checked, #tab_configuration_content input[type="radio"]:checked, #tab_accesories_content input[type="checkbox"]:checked').each(function(val){
    //         param = $(this).attr('name');
    //         if (param != 'ass') {
    //             save_com.push($(this).attr('value'));
    //         } else {
    //             save_ass.push($(this).val());
    //         }
    //     })

    //     if (save_ass.length == 0) {
    //         alert('Конфигурация доступна по ссылке: https://digitalfury.pro/computer/' + url + '/' + save_com.join(',') + '/');
    //     } else {
    //         alert('Конфигурация доступна по ссылке: https://digitalfury.pro/computer/' + url + '/' + save_com.join(',') + '/' + save_ass.join(',') + '/');
    //     }

    // })

    // mobile photos

    var navSlidesToShow 

    if($(window).width() < 760){
        navSlidesToShow = 4
    } else if($(window).width() < 1210){
        navSlidesToShow = 10
    }

    if($(window).width() < 1210){
        $('.photo_block_mobile').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: '.nav_mobile_photos_container'
        })
        $('.nav_mobile_photos_container').slick({
            slidesToShow: navSlidesToShow,
            slidesToScroll: 1,
            asNavFor: '.photo_block_mobile',
            nextArrow: $('.nav_for_photo_block_mobile_right'),
            prevArrow: $('.nav_for_photo_block_mobile_left'),
        })
    }

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

    // Отмечать акционный, если нажат ТОП 
    $('input.add_f').on('click', function(){
        var v = $(this).attr('value');
        var c = $(this).prop('checked');

        var sale_c = $('input[name=sales][value='+v+']').prop('checked');

        if (sale_c != c) {
            $('input[name=sales][value='+v+']').click();
        } else {
            var tmp_c = !c;
            $('input[name=sales][value='+v+']').prop('checked', tmp_c);
            $('input[name=sales][value='+v+']').click();
        }

    })

    // Отмечать ак, если нажат акционный 
    $('input[name=sales]').on('click', function(){
        var v = $(this).attr('value');
        var c = $(this).prop('checked');
        $('input[name=ass][value='+v+']').prop('checked', c);
    })

    // Отмечать акционный, если нажат ак
    $('input[name=ass]').on('click', function(){
        var v = $(this).attr('value');
        var c = $(this).prop('checked');
        $('input[name=sales][value='+v+']').prop('checked', c);
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
    	$('.main_video_container').css('display','block');
    	$('.side_mini_photo').removeClass('active');
    	$('.side_mini_video').removeClass('active');
    	$(this).addClass('active');
    	var videoUrl = $(this).attr('data-video')
    	$('.video_inner').find('iframe').attr('src',videoUrl)


    	// var currentVideo = $(this).attr('data-video');
    	// $('#'+currentVideo).css('display','block');
    })


    // main photo zoom

    if($(window).width() > 1500){

        $('#zoomImage').imagezoomsl({
      
            magnifiersize: [851,582],
            magnifierborder: 'none',
            magnifiereffectanimate: 'fadeIn',
            disablewheel: false,
            magnifycursor: 'pointer'
       });
   }

    // call main photos modal

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

	// create main lightbox

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
			magnify: 1.2
  		});
	  	$('.main_photo_preview_mini_photo').on('click', function(){
	    	$('.main_photo_preview_main_photo').trigger('zoom.destroy');
	    	$('.main_photo_preview_mini_photo').removeClass('active');
	    	$('.main_photo_preview_video_container').css('display','none');
	    	$(this).addClass('active');
	    	var currentAccessPhoto = $(this).find('img').attr('src');
	    	$('.main_photo_preview_main_photo img').attr('src', currentAccessPhoto);
	    	// $('.photo_preview_mini_photo img').css('height','100%');
		    $('.main_photo_preview_main_photo').zoom({
				on: 'click',
				magnify: 1.2
	  		});
	    })

	    $('.main_photo_preview_mini_video').on('click', function(){
	    	$('.main_photo_preview_main_photo').trigger('zoom.destroy');
	    	$('.main_photo_preview_mini_photo').removeClass('active');
	    	$('.main_photo_preview_mini_video').removeClass('active');
	    	$(this).addClass('active');
	    	$('.main_photo_preview_video_container').css('display','block');
	    	var videoUrl = $(this).attr('data-video');
	    	$('.photo_preview_video_inner').find('iframe').attr('src',videoUrl)

	    })

	    $('.main_photo_preview_main_photo').on('click',function(){
	    	$(this).toggleClass('zoom-out');
	    })

	}

	// close main photo preview

	$('.screen_fade').on('click', function(){
		$(this).fadeOut(400);
		$('.main_photo_preview_bg').fadeOut(400);
		$('.photo_preview_bg').fadeOut(400);
		$('.accessories_modal_bg').fadeOut(400);
	})

	$('.main_photo_preview_close_icon').on('click', function(){
		$('.main_photo_preview_bg').fadeOut(400);
		$('.screen_fade').fadeOut(400);
	})

    // case change 
    $('.corpus_input').on('change', function(){
        $('.photo_preview_main_photo, .photo_preview_side_menu').html('');
        $('.side_photo_container_inner').html('');
        var modalId = parseInt($(this).attr('value'));
        $('.product_page_flex_photo_block .side_mini_photo').remove();

        $.getJSON('../../../php/modals.php', { id: modalId }, function(data){
            //Вставляем фото
            var modalPics = '';
            var modalPicsMobile = '';
            var modalPicsNavMobile = '';
            $.each( data.pics, function( key, val ) {
                if (key == 0) {
                    $('#zoomImage').attr('src', '../../../media/' + val);
                    modalPics += '<div class="side_mini_photo active"><img src="../../../media/' + val + '"></div>';
                    modalPicsMobile += '<div class="photo_block_mobile_photo"><img src="../../../media/' + val + '"></div>';
                    modalPicsNavMobile += '<div class="nav_mobile_photo"><img src="../../../media/' + val + '"></div>';
                } else {
                    modalPics += '<div class="side_mini_photo"><img src="../../../media/' + val + '"></div>';
                    modalPicsMobile += '<div class="photo_block_mobile_photo"><img src="../../../media/' + val + '"></div>';
                    modalPicsNavMobile += '<div class="nav_mobile_photo"><img src="../../../media/' + val + '"></div>';
                }
            });
            
            $('.side_photo_container_inner').prepend(modalPics);
            $('.photo_block_mobile').html(modalPicsMobile);
            $('.nav_mobile_photos_container').html(modalPicsNavMobile);
            sidePhotosArrowsDisplay();
        })
    })


    // Assessories popup
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
        e.stopPropagation();

        $('.access_modal_tab_content.photos').css('display','block');
        $('.access_modal_tab_content.characteristics').css('display','none');
        $('.access_modal_tab_button_characteristics').css('display','block');
        $('.access_modal_header').css('display','block');
        $('.access_modal_tab_button_photos').addClass('active');
        $('.access_modal_tab_button_characteristics').removeClass('active');



        $('.access_char_main_container_title, .access_main_photo_container_inner, .access_side_photo_container').html('');
        $('.access_char_main_container_char_block').remove();
        $('.access_char_main_container table').remove();
        var modalId = parseInt($(this).attr('modal-id'));
        var th = $(this);
        var type = $(this).attr('data-type');
        $.getJSON('../../../php/modals-other.php', { id: modalId, type: type }, function(data){
            //Вставляем фото
            var modalPics = '';

            if (Array.isArray(data.pics)) { // Если это массив, а НЕ всего 1 фото
                $.each( data.pics, function( key, val ) {
                    if (key == 0) {
                        $('.access_main_photo_container_inner').html('<img src="../../../media/' + val + '">');
                        modalPics += '<div class="access_side_photo_block selected"><img src="../../../media/' + val + '"></div>';

                    } else {
                        modalPics += '<div class="access_side_photo_block"><img src="../../../media/' + val + '"></div>';
                    }
                });
            } else { // Если всего 1 фото
                $('.access_main_photo_container_inner').html('<img src="../../../media/' + data.pics + '">');
                modalPics += '<div class="access_side_photo_block selected"><img src="../../../media/' + data.pics + '"></div>';
            }
            $('.access_side_photo_container').html(modalPics);


            if (th.hasClass('cpuPopup') == true) {

                modalOpt = $('.cpu_modals').html();

            } else {
                
                // Вставляем название
                $('.access_char_main_container_title').text(data.name);

                // Вставляем характеристики
                var modalOpt = '';
                if (data.options == undefined) {
                    $('.access_modal_tab_button_characteristics').css('display','none');
                    // modalOpt += '<center>Пока характеристик нет...</center>';
                } else {
                    $.each( data.options.name, function( key, val ) {
                        if (data['options']['value'][key] != '') {
                            modalOpt += '<div class="access_char_main_container_char_block clearfix"><div class="access_char_main_container_char_block_title">' + val + '</div><div class="access_char_main_container_char_block_char">' + data['options']['value'][key] + '</div></div>';
                        };
                    });
                }

            }



            $('.access_char_main_container').append(modalOpt);
            $('.access_side_photo_block:last').addClass('last');
            $('.access_side_photo_block:first').addClass('first');

            // $('.access_main_photo_container_inner').zoom({
            //     on: 'click',
            //     magnify: 3
            // });

            $('.access_side_photo_block').on('click', function(){
                // $('.access_main_photo_container_inner').trigger('zoom.destroy');
                $('.access_side_photo_block').removeClass('selected');
                $(this).addClass('selected');
                var currentAccessPhoto = $(this).find('img').attr('src');
                $('.access_main_photo_container_inner img').attr('src', currentAccessPhoto);
                // $('.access_main_photo_container_inner').zoom({
                //     on: 'click',
                //     magnify: 1.5
                // });
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


    Array.prototype.clean = function(deleteValue) {
      for (var i = 0; i < this.length; i++) {
        if (this[i] == deleteValue) {         
          this.splice(i, 1);
          i--;
        }
      }
      return this;
    };

    // Покупка товара
    $('.buy_button, .privat_confirm_button, .bottom_buy_btn').on('click', function(event){
        event.preventDefault();
        var th = $(this);
        var dataObj = { type: 'buy', comp_id: compIdIs };
        // Перебираем все отмеченные компоненты
        $('#tab_configuration_content input[type="checkbox"]:checked, #tab_configuration_content input[type="radio"]:checked, #tab_accesories_content input[type="checkbox"]:checked').each(function(val){
            param = $(this).attr('name');
            // if case
            val = $(this).attr('value');
            if ($(this).hasClass('corpus_input')) {
                dataObj['case_id'] = val;
            };

            
            if (param != 'ass') {
                dataObj['c'+param] = val;
            } else {
                tmp = 'a' + $(this).val();
                dataObj[tmp] = $(this).val();
            }
        })

        // Передаем все в сессию
        $.post('../../../php/add_to_cart.php', dataObj, function(data){
            if (th.hasClass('privat_confirm_button')) { // кредит
                var bank = '';
                if (th.hasClass('privat_bank')) {
                    bank = 'privat';
                }
                if (th.hasClass('alfa_bank')) {
                    bank = 'alfa';
                }
                if (th.hasClass('privat_bank')) {
                    bank = 'later';
                }
                window.location.href = '../../../cart/?paynum='+payNum+'&bank='+bank;
            } else { // покупка
                window.location.href = '../../../cart/';
            }
        })
    
    })

    // case photo preview

    $('.zoom_modal_show').on('click', function(e){
        e.preventDefault();
        $('.photo_preview_main_photo, .photo_preview_side_menu').html('');
        var modalId = parseInt($(this).attr('modal-id'));
        $.getJSON('../../../php/modals.php', { id: modalId }, function(data){
            //Вставляем фото
            var modalPics = '';
            $.each( data.pics, function( key, val ) {
                if (key == 0) {
                    $('.photo_preview_main_photo').html('<img src="../../../media/' + val + '">');
                    modalPics += '<div class="photo_preview_mini_photo active"><img src="../../../media/' + val + '"></div>';

                } else {
                    modalPics += '<div class="photo_preview_mini_photo"><img src="../../../media/' + val + '"></div>';
                }
            });
            $('.photo_preview_side_menu').html(modalPics);

            //  zoom

            $('.photo_preview_main_photo').zoom({
                on: 'click',
                magnify: 1.2
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
                    magnify: 1.2
                });
            })
        })
        $('.photo_preview_bg').fadeIn(400);
        $('.screen_fade').fadeIn(400);

         $('.photo_preview_main_photo').on('click',function(){
            $(this).toggleClass('zoom-out');
        })
    })

    $('.photo_preview_close_icon').on('click', function(){
        $('.photo_preview_bg').fadeOut(400);
        $('.screen_fade').fadeOut(400);
    })

    // tabs 

    var tabBtn = 'tab_configuration'
    var tabFixedBtn = 'tab_configuration'

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

    // open comments on click

    $('.reviews_block_stars').on('click', function(){
        $('body, html').animate({scrollTop: tabNavOffset}, 400)
        $('#tfo').click();
    })


    // components accordion

    $('.components_accordion_header').on('click', function(){
        $(this).toggleClass('active');
        $(this).next('.components_accordion_body').slideToggle(400);
    })

    // price check

    function numWithSpace(num){  
        if(num > 100000){
          var n = num.toString();
          var result = n.slice(0,3) + ' ' +n.slice(3);
          return result
        } else if(num > 10000){
          var n = num.toString();
          var result = n.slice(0,2) + ' ' +n.slice(2);
          return result
        } else if(num > 1000){
          var n = num.toString();
          var result = n.slice(0,1) + ' ' +n.slice(1);
          return result
        } else {
            return num
        }
    }

    var totalPrice;
    var payInMonth;
    var payNum = 2;

    var oldPrice;

    var discount;



    function updatePrice(){

        var totalComponentsPrice = 0;

        $('.compInput:checked').each(function(){
            //Если это не акционка
            if ($(this).attr('name') != 'sales') {
                var currentComponentPrice = $(this).parent().attr('data-price');
                totalComponentsPrice += +currentComponentPrice;
            };
        })

        totalPrice = totalComponentsPrice + +compNacenkaIs

        oldPrice = totalComponentsPrice + +compNacenkaOldIs

        currentValue = totalPrice;

        currentPrice = currentValue / 0.9725;
        payInMonth = (currentPrice + (payNum*currentPrice*0.029)) / payNum;

        payInMonthTitle = (currentPrice + (25*currentPrice*0.029)) / 25;
        $('.new_credit_sum').text(payInMonthTitle.toFixed())

        var comma_separator_number_step = $.animateNumber.numberStepFactories.separator(' ')

        $('.new_price').text(numWithSpace(totalPrice) + ' грн')
        $('.oldContainer').text(numWithSpace(oldPrice))
        $('.bottom_price').animateNumber({ number : totalPrice,  numberStep: comma_separator_number_step },1000)

        discount = oldPrice - totalPrice;
        $('.bottom_price_difference').text('Скидка: ' + numWithSpace(discount) + ' грн')
    }

    updatePrice();

    // privat modal

            function changePaySum(){
                currentValue = totalPrice;
                var comission = (currentValue / 100) * 2.75;

                currentPrice = currentValue  / 0.9725;
                payInMonth = (currentPrice + (payNum*currentPrice*0.029)) / payNum;
                $('.privat_info_payment_field span').html(payInMonth.toFixed());
                // $('.privat_info_all_price_field span').html( (payInMonth * payNum).toFixed(2) );
                $('.privat_info_all_price_field span').html( (currentPrice).toFixed(2) );

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

    // price plus minus check

    function checkPriceDifference(){
        $('input:checked').each(function(){
            if($(this).parent().hasClass('list_block_w_nesting') == false){
                var currentComponentPrice = $(this).parent().attr('data-price');
                $(this).parent().siblings().each(function(){
                    $(this).find('.compPrice').text(function(){
                        var currentPrice = $(this).parent().attr('data-price') - currentComponentPrice
                        if (currentPrice < 0 ){
                            return '(' + currentPrice + ' грн)'
                        } else{
                            return '(+' + currentPrice + ' грн)'
                        }
                    })
                })
            } else if($(this).parent().hasClass('list_block_w_nesting')){
                var currentNestingComponentPrice = $(this).parent().attr('data-price');
                $(this).parent().siblings().each(function(){
                    $(this).find('.compPrice').text(function(){
                        var currentPrice = $(this).parent().attr('data-price') - currentNestingComponentPrice
                        if (currentPrice < 0 ){
                            return '(' + currentPrice + ' грн)'
                        } else{
                            return '(+' + currentPrice + ' грн)'
                        }
                    })
                })
                $(this).parent().parent().parent().siblings('.component_list_block').each(function(){
                    $(this).find('.compPrice').text(function(){
                        var currentPrice = $(this).parent().attr('data-price') - currentNestingComponentPrice
                        if (currentPrice < 0 ){
                            return '(' + currentPrice + ' грн)'
                        } else{
                            return '(+' + currentPrice + ' грн)'
                        }
                    })
                })
                $(this).parent().parent().parent().siblings('.component_with_nesting_block').each(function(){
                    $(this).find('.component_with_nesting_block_dropdown').find('.component_list_block').find('.compPrice').text(function(){
                        var currentPrice = $(this).parent().attr('data-price') - currentNestingComponentPrice
                        if (currentPrice < 0 ){
                            return '(' + currentPrice + ' грн)'
                        } else{
                            return '(+' + currentPrice + ' грн)'
                        }
                    })
                })
            }
        })
    }
    checkPriceDifference()

    // nesting button price

    function updateNestingButtonPrice(){
        $('.component_with_nesting_block_button').each(function(){
            var currentButtonPrice = $(this).siblings('.component_with_nesting_block_dropdown').find('.component_list_block:first').find('.compPrice').text();
            $(this).find('.component_with_nesting_block_button_price').text(currentButtonPrice)
        })
    }

    // price color

    function setPriceDifferenceColor(){
        $('.compPrice').each(function(){

            var priceFirstSymbol = $(this).text().substr(0,2);

            if (priceFirstSymbol === '(+'){
                $(this).css('color','#349916');
            } else if (priceFirstSymbol === '(-'){
                $(this).css('color','#DE5251');
            } 
        })

        $('.component_with_nesting_block_button_price').each(function(){

            var priceFirstSymbol = $(this).text().substr(0,2);

            if (priceFirstSymbol === '(+'){
                $(this).css('color','#349916');
            } else if (priceFirstSymbol === '(-'){
                $(this).css('color','#DE5251');
            } 
        })
    }

    function setRedNameOfComponent(){
        $('.components_accordion_header_component_name').each(function(){

            var currentComponentName = $(this).text().substr(0,6)

            if(currentComponentName === 'Не уст'){
             $(this).css({
                'color':'#be1e2d',
                'font-weight':'700'
             })
            } else {
             $(this).css({
                'color':'#000',
                'font-weight':'400'
             }) 
            }
        })
    }

    setPriceDifferenceColor()
    updateNestingButtonPrice()

    // component square change

    $('.compotent_square_block input:checked').parent('.compotent_square_block').addClass('checked');

    $('.component_list_block input:checked').parent('.component_list_block').addClass('checked')

    $('.compotent_square_block input').on('change', function(){
        $('.compotent_square_block').removeClass('checked');
        $('.compotent_square_block input:checked').parent('.compotent_square_block').addClass('checked');
        setSquareComponentBlockName()
        updatePrice()
        checkPriceDifference()
        updateNestingButtonPrice()
        setPriceDifferenceColor()
        setShortTitles()
        setRedNameOfComponent()
    })

    function setSquareComponentBlockName(){
        $('.compotent_square_block.checked').each(function(){
            var squareComponentBlockName = $(this).find('.component_square_block_title').text();
            $(this).parent().parent().siblings('.components_accordion_header').find('.components_accordion_header_component_name').text(squareComponentBlockName);
        })
    }

    setSquareComponentBlockName()
    setRedNameOfComponent()

    //  component list

    $('.component_list_block input:checked').parent('.component_list_block').addClass('checked')

    function setSidePhoto(){
        $('.component_list_block.checked').each(function(){
            var componentSidePhoto =  $(this).attr('data-img')
            $(this).parent().siblings('.components_container_list_side_photo').find('img').attr('src', componentSidePhoto)
        })
    }

    function setComponentBlockName(){
        $('.component_list_block.checked').each(function(){
            var componentBlockName =  $(this).find('.component_list_block_title span').text()
            $(this).parent().parent().parent().siblings('.components_accordion_header').find('.components_accordion_header_component_name').text(componentBlockName);
        })
    }

    setSidePhoto();
    setComponentBlockName()

    $('.component_list_block input').on('change', function(){
        $('.component_list_block').removeClass('checked');
        $('.component_list_block input:checked').parent('.component_list_block').addClass('checked');
        setSidePhoto();
        setComponentBlockName();
        $(this).parent().siblings('.component_with_nesting_block').removeClass('checked');
        updatePrice();
        checkPriceDifference()
        updateNestingButtonPrice()
        setPriceDifferenceColor()
        setShortTitles()
        setRedNameOfComponent()
    })

    // component with nesting

    $('.list_block_w_nesting input:checked').parent('.component_list_block').addClass('checked')
    $('.list_block_w_nesting input:checked').parent('.component_list_block').parent().parent().addClass('checked')
    setSideNestingPhoto()
    setComponentNestingBlockName()
    setShortTitles()
    setRedNameOfComponent()

    function setSideNestingPhoto(){
        $('.list_block_w_nesting.checked').each(function(){
            var componentSidePhoto =  $(this).attr('data-img')
            $(this).parent().parent().parent().siblings('.components_container_list_side_photo').find('img').attr('src', componentSidePhoto)
        })
    }

    function setComponentNestingBlockName(){
        $('.list_block_w_nesting.checked').each(function(){
            var componentBlockName =  $(this).find('.component_list_block_title span').text()
            $(this).parent().parent().parent().parent().parent().siblings('.components_accordion_header').find('.components_accordion_header_component_name').text(componentBlockName);
        })
    }

    $('.list_block_w_nesting input').on('change', function(){
        $('.list_block_w_nesting').removeClass('checked');
        $('.list_block_w_nesting input:checked').parent('.component_list_block').addClass('checked')
        setSideNestingPhoto()
        setComponentNestingBlockName()
        setShortTitles()
        setRedNameOfComponent()
    })

    $('.component_with_nesting_block_button').on('click', function(){
        $(this).parent().siblings('.component_with_nesting_block').removeClass('checked');
        $(this).parent().addClass('checked');
        var currentInput = $(this).parent().find('.component_with_nesting_block_dropdown').find('.list_block_w_nesting:first input');
        currentInput.click()
        $('.list_block_w_nesting').removeClass('checked');
        $('.list_block_w_nesting input:checked').parent('.component_list_block').addClass('checked')
        setSideNestingPhoto()
        setComponentNestingBlockName()
        setShortTitles()
        setRedNameOfComponent()
    })


    // short names


    function setShortTitles(){

        var shortTitle = [];

        $('.mainComponent input:checked').each(function(){
            var currentShort = $(this).parent().attr('data-short');
            shortTitle.push(currentShort);
        })

        var positiveArr = shortTitle.filter(function(position){

            var firstSymbol = position.substr(0,2);
            if( firstSymbol != 'Не'){
                return position
            }
        })

        var shortTitleModified = positiveArr.join(' / ')

        $('.product_short_info').text(shortTitleModified)
    }

    setShortTitles();

    // modals

             // close modal

            $('.bg_modal').on('click', function(){
                    $(this).fadeOut();
            })
            $('.modal_inner').click(function(event){
                    event.stopPropagation();
            });
            $('.mod_close').on('click', function(){
                    $(this).parent().parent().fadeOut();
            })



            // delivery modals

            $('#db').on('click', function(){
                $('#dp').fadeIn();
                $('.delivery_popups_blackout').fadeIn()
            })

            $('#db2').on('click', function(){
                $('#dp').fadeIn();
                $('.delivery_popups_blackout').fadeIn()
            })

            $('.span_call_modal').on('click', function(){
                $('#smvp').fadeIn();
                $('.delivery_popups_blackout').fadeIn()
            })

            $('#payb').on('click', function(){
                $('#payp').fadeIn();
                $('.delivery_popups_blackout').fadeIn()
            })

            $('#garb').on('click', function(){
                $('#garp').fadeIn();
                $('.delivery_popups_blackout').fadeIn()
            })

            $('#backb').on('click', function(){
                $('#backp').fadeIn();
                $('.delivery_popups_blackout').fadeIn()
            })

            $('#winb').on('click', function(){
                $('#winp').fadeIn();
                $('.delivery_popups_blackout').fadeIn()
            })


            $('.follow_price_block').on('click', function(){
                $('#pchk').fadeIn();
            })

            // delivery close

            $('.delivery_close_icon').on('click', function(){
                $('.delivery_popup').fadeOut();
            })
            $('.delivery_popups_blackout').on('click', function(){
                $('.delivery_popup').fadeOut();
                $(this).fadeOut();  
            })
            $(document).keyup(function(e) {
                if (e.keyCode == 27) { 
                    $('.delivery_popup').fadeOut(200);
                    $('.delivery_popups_blackout').fadeOut(200);
                    $('.bg_modal').fadeOut(200);
                    $('.modals_screen_fade').fadeOut(200);
                    $('.product_email_modal').fadeOut(200);
                    $('.product_save_modal').fadeOut(200);
                    $('.cart_blackout').fadeOut(200)
                }
            });

            // privat modal

            $('.new_credit_button').on('click', function(){
                    $('.privat_prod_modal').fadeIn();
            })

            $('.bottom_credit_btn').on('click', function(){
                $('.privat_prod_modal').fadeIn();
            })

            // to top

            $('.to_top_btn').on('click', function(){
                $('html, body').animate({scrollTop: 0},400)
            })


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

    // price to bottom

    $('.compotent_square_block').on('click', function(){
        if($(this).hasClass('checked') == false){
            var offset = $(this).find('.component_square_block_price').offset()
            var bottomOffset = $('.bottom_price').offset()

            $('body').css('overflow-x','hidden')

            $(this).find('.component_square_block_price')
            .clone()
            .css({
                'position' : 'absolute',
                'z-index' : '11100',
                'top' : offset.top,
                'left' : offset.left,
                'display': 'block'

            })
            .appendTo('body')
            .animate({
                opacity : 0.05 , left : bottomOffset.left , top : bottomOffset.top 
            }, 1000 , function () {
                $(this).remove()
                $('body').css('overflow-x','visible')
            });
        }
    });

    $('.component_list_block').on('click' ,function(){
        var offset = $(this).find('.component_list_block_price').offset()
        var bottomOffset = $('.bottom_price').offset()

        $('body').css('overflow-x','hidden')

         $(this).find('.component_list_block_price')
            .clone()
            .css({
                'position' : 'absolute',
                'z-index' : '11100',
                'top' : offset.top,
                'left' : offset.left,
                'display': 'block'

            })
            .appendTo('body')
            .animate({
                opacity : 0.05 , left : bottomOffset.left , top : bottomOffset.top 
            }, 1000 , function () {
                $(this).remove()
                $('body').css('overflow-x','visible')
            });
        });

     $('a.scrolltoBlock').click(function () {
        elementClick = jQuery(this).attr("href")
        destination = jQuery(elementClick).offset().top - 50;
        jQuery("html:not(:animated),body:not(:animated)").animate({scrollTop: destination}, 1000);
        return false;
    });


    $(window).on('scroll', function(){
        if($(window).scrollTop() + 55 > $('#comto20').offset().top){
            $('.side_nav_link').removeClass('active');
            $('.side_nav_link.diskrom').addClass('active');
        } else if($(window).scrollTop() + 55 > $('#comto18').offset().top){
            $('.side_nav_link').removeClass('active');
            $('.side_nav_link.harddrive').addClass('active');
        } else if($(window).scrollTop() + 55 > $('#comto15').offset().top){
            $('.side_nav_link').removeClass('active');
            $('.side_nav_link.power').addClass('active');
        } else if($(window).scrollTop() + 55 > $('#comto14').offset().top){
            $('.side_nav_link').removeClass('active');
            $('.side_nav_link.motherboard').addClass('active');
        } else if($(window).scrollTop() + 55 > $('#comto11').offset().top){
            $('.side_nav_link').removeClass('active');
            $('.side_nav_link.video').addClass('active');
        } else if($(window).scrollTop() + 55 > $('#comto10').offset().top){
            $('.side_nav_link').removeClass('active');
            $('.side_nav_link.memory').addClass('active');
        } else if($(window).scrollTop() + 55 > $('#comto9').offset().top){
            $('.side_nav_link').removeClass('active');
            $('.side_nav_link.cooler').addClass('active');
        } else if($(window).scrollTop() + 55 > $('#comto7').offset().top){
            $('.side_nav_link').removeClass('active');
            $('.side_nav_link.proc').addClass('active');
        } else if($(window).scrollTop() + 55 > $('#comto3').offset().top){
            $('.side_nav_link').removeClass('active');
            $('.side_nav_link.fans').addClass('active');
        } else if($(window).scrollTop() + 55 > $('#comto1').offset().top){
            $('.side_nav_link').removeClass('active');
            $('.side_nav_link.case').addClass('active');
        } else if($(window).scrollTop() + 55 > $('#limited_offer').offset().top){
            $('.side_nav_link').removeClass('active');
            $('.side_nav_link.limited_offer').addClass('active');
        } else {
            $('.side_nav_link').removeClass('active');
        }
    })

});






















