<?
session_start();

if ( !isset($_SESSION['city_name']) ) {
	include("php/SxGeo.php");

	$ip = $_SERVER['REMOTE_ADDR'];

	$SxGeo = new SxGeo('php/SxGeoCity.dat', SXGEO_FILE);

	$city = $SxGeo->getCity($ip);

	$_SESSION['city_name'] = $city['city']['name_ru'];
}

$city_name = $_SESSION['city_name'];

if ( $_SESSION['utm_source'] == '' || !isset($_SESSION['utm_source']) ) {
	if ( isset($_GET['utm_source']) ) {
		$_SESSION['utm_source'] = $_GET['utm_source'];
	} else{
		$_SESSION['utm_source'] = '';
	}
}

if ( $_SESSION['utm_medium'] == '' || !isset($_SESSION['utm_medium']) ) {
	if ( isset($_GET['utm_medium']) ) {
		$_SESSION['utm_medium'] = $_GET['utm_medium'];
	} else{
		$_SESSION['utm_medium'] = '';
	}
}

if ( $_SESSION['utm_compaign'] == '' || !isset($_SESSION['utm_compaign']) ) {
	if ( isset($_GET['utm_compaign']) ) {
		$_SESSION['utm_compaign'] = $_GET['utm_compaign'];
	} else{
		$_SESSION['utm_compaign'] = '';
	}
}

if ( $_SESSION['utm_content'] == '' || !isset($_SESSION['utm_content']) ) {
	if ( isset($_GET['utm_content']) ) {
		$_SESSION['utm_content'] = $_GET['utm_content'];
	} else{
		$_SESSION['utm_content'] = '';
	}
}

if ( $_SESSION['utm_term'] == '' || !isset($_SESSION['utm_term']) ) {
	if ( isset($_GET['utm_term']) ) {
		$_SESSION['utm_term'] = $_GET['utm_term'];
	} else{
		$_SESSION['utm_term'] = '';
	}
}

$xml_base = 'xml/main.xml';
$base = simplexml_load_file($xml_base);

$downloads = file_get_contents('php/top10.txt');

?>
<html>
<head>
	<meta charset="utf-8">
	<title>Регард</title>
	<meta name="description" content="Регард.com - магазин №1 игровых компьютеров в Украине. Оплата частями и мгновенная рассрочка от ПриватБанка. Официальная гарантия ☑ Бесплатная доставка по всей Украине ✈">
	<link rel="stylesheet" type="text/css" href="css/style-3.css">
	<link rel="stylesheet" type="text/css" href="css/slick.css">
	<link rel="stylesheet" type="text/css" href="css/jui.css">
	<link rel="stylesheet" type="text/css" href="css/popup.css">
	<link rel="stylesheet" type="text/css" href="css/mobile.css">
	<!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet"> -->
	<? 
	$ie8 = strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE');
	$ie11 = strpos($_SERVER['HTTP_USER_AGENT'], 'Trident');
	$ieedge = strpos($_SERVER['HTTP_USER_AGENT'], 'Edge');
	$ief = strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox');
	if ($ie8 === true || $ie11 == true || $ieedge == true || $ief == true) { ?>
	<link rel="stylesheet" type="text/css" href="css/ie.css">
	<? } 
	if ($ief == true) { ?>
	<style type="text/css">
	.product_block_img{
		bottom: -85px !important;
	}
	</style>
	<? } ?>
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Oswald:500" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta property="og:type"   content="website" />
	<meta property="og:title"  content="Регард.com" />
	<meta property="og:description"  content="Регард.com - магазин №1 игровых компьютеров в Украине. Оплата частями и мгновенная рассрочка от ПриватБанка. Официальная гарантия ☑ Бесплатная доставка по всей Украине ✈" />
	<meta property="og:image"  content="http://xn--80afeb8cd.com/img/5-3.jpg" /> 
	<script src="js/jquery.js"></script>
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<script type="text/javascript">
		$(document).ready(function(){
			addToNewPrice = 0;
			addToOldPrice = 0;
		})
	</script>
	<script src="js/jui.js"></script>
	<script src="js/slick.js"></script>
	<script src="js/script.js"></script>
	<script src="js/number.js"></script>
	<script type="text/javascript" src="js/jquery.inputmask.bundle.js"></script>
	<script src="js/popup.js"></script>
	<script src="js/jQuery.yuukCountdown.js"></script>
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
	<script type="text/javascript">
		var ppPercentPrice = 0;
		$(document).ready(function(){

			if($(window).width() < 1540){
				$('.new_computers_container-1').slick({
					infinite: false,
  					slidesToShow: 4,
  					slidesToScroll: 1,
  					prevArrow: $('.slider_prev_arrow-1'),
  					nextArrow: $('.slider_next_arrow-1'),
  					responsive: [
				    {
				      breakpoint: 1220,
				      settings: {
				        slidesToShow: 3
				      }
				    },
				    {
				      breakpoint: 920,
				      settings: {
				        slidesToShow: 2
				      }
				    },
				    {
				    	breakpoint: 620,
				    	settings: {
				    		slidesToShow: 1	
				    	}
				    }
				  ]
				})
				$('.new_computers_container-2').slick({
					infinite: false,
  					slidesToShow: 4,
  					slidesToScroll: 1,
  					prevArrow: $('.slider_prev_arrow-2'),
  					nextArrow: $('.slider_next_arrow-2'),
  					responsive: [
				    {
				      breakpoint: 1220,
				      settings: {
				        slidesToShow: 3
				      }
				    },
				    {
				      breakpoint: 920,
				      settings: {
				        slidesToShow: 2
				      }
				    },
				    {
				    	breakpoint: 620,
				    	settings: {
				    		slidesToShow: 1	
				    	}
				    }
				  ]
				})
			}

			// builder

			$('.custom_builder_item_link').on('mouseenter', function(){
				$('.custom_builder_item_link').removeClass('hover');
				$(this).addClass('hover');
				var currentLink = $(this).attr('data-link')
				$('.custom_builder_block_link').css('display','none')
				$('#custom_builder_0' + currentLink).css('display','block')
			})

			$('#custom_builder_01').css('display','block')

			// end of builder

			$('.phone_mask').inputmask('+38(099)-999-99-99')

			$('#js-countDown').yuukCountDown({
				starttime: '2017/11/10 00:00:00',
				endtime: '2018/02/29 19:59:59',
			});

			
			var payInMonth = 0;
	   		var payNum = 10;
	   		var currentValue = 10000;
	   		city_name = '<? echo $city_name; ?>';
	   		utm_term = '<? echo $_SESSION["utm_term"]; ?>';
	   		utm_content = '<? echo $_SESSION["utm_content"]; ?>';
	   		utm_compaign = '<? echo $_SESSION["utm_compaign"]; ?>';
	   		utm_medium = '<? echo $_SESSION["utm_medium"]; ?>';
	   		utm_source = '<? echo $_SESSION["utm_source"]; ?>';

	   		function changePaySum(){
	   			var comission = (currentValue / 100) * 2.75;
	   			var comissionForPrivat = ((currentValue + comission) / 100) * 2.9;
	   			currentPrice = currentValue / 0.9725;
	   			payInMonth = (currentPrice + (payNum*currentPrice*0.029)) / payNum;

	   			// payInMonth = (currentValue + comission) / payNum  + comissionForPrivat;
				$('.pivat_pay_span').html(payInMonth.toFixed(2))
	   		}

	   		changePaySum();

	   		var blockMinValue = 5000
	   		var blockMaxValue = 60000

			$('.slider_block_price').slider({
				min:5000,
				max:150000,
				range:true,
	   			step:500,
	   			values:[blockMinValue,blockMaxValue],
	   			classes: {
	   				"ui-slider": "ui_slider",
	  				"ui-slider-handle": "ui_handle",
	 				 "ui-slider-range": "ui_range"
	   			},
	   			slide : function (event, ui){
	   				$('.slider_block_price_input_first').val(ui.values[0]);
	   				$('.slider_block_price_input_second').val(ui.values[1]);
	   				}
			});
			$('.slider_block_price_input_first').on('keyup', function(){
	   				blockMinValue = Number( $(this).val() );
	   				if( blockMinValue > 70000 ){
	   					blockMinValue = 70000;
	   					$(this).val(blockMinValue);
	   				}
	   				$('.slider_block_price').slider( { values:[blockMinValue,blockMaxValue], } )
	   		});
	   		$('.slider_block_price_input_second').on('keyup', function(){
	   				blockMaxValue = Number( $(this).val() );
	   				if( blockMaxValue > 150000 ){
	   					blockMaxValue = 150000;
	   					$(this).val(blockMaxValue);
	   				}
	   				$('.slider_block_price').slider( { values:[blockMinValue,blockMaxValue], } )
	   		});

			

	   			// main screen btn

	   			$('.either').on('click', function(){
	   				$('.main_screen_modal').fadeToggle()
	   			})
	   			$('.close_modal').on('click', function(){
	   				$('.main_screen_modal').fadeOut();
	   			})

	   			//callback modal

	   			$('.callback_btn').on('click', function(){
	   				$('.callback_modal').fadeIn();
	   			})
	   			$('.main_screen_modal_consult').on('click', function(){
	   				$('.callback_modal').fadeIn();
	   			})

	   			// price modal

	   			$('.main_screen_modal_price').on('click', function(){
	   				$('.pricelist_modal').fadeIn();
	   			})

	   			// modal access

	   			$('.access_btn_for_mod').on('click', function(){
	   				$('.accessories_modal').fadeIn();
	   			})

	   			// privat modal

	   			$('.privat_btn').on('click', function(){
	   				$('.privat_modal').fadeIn();
	   			})

	   			// comp modals

	   			$('.btn_for_modal_1').on('click', function(){
	   				$('.comp_modal_1').fadeIn();
	   			})

	   			$('.btn_for_modal_2').on('click', function(){
	   				$('.comp_modal_2').fadeIn();
	   			})

	   			$('.btn_for_modal_3').on('click', function(){
	   				$('.comp_modal_3').fadeIn();
	   			})

	   			$('.btn_for_modal_4').on('click', function(){
	   				$('.comp_modal_4').fadeIn();
	   			})	

	   			//close modals

	   			$('.bg_modal').on('click', function(){
	   				$(this).fadeOut();
	   			})
	   			$('.modal_inner').click(function(event){
				    event.stopPropagation();
				});

				$('.mod_close').on('click', function(){
					$(this).parent().parent().fadeOut();
				})

				// mobile

				// $('.mobile_menu_btn').on('click', function(){
				// 	$(this).toggleClass('active');
				// 	$('.mobile_menu_block').slideToggle(300)
				// })
				$('.mobile_menu_block a').on('click', function(){
					$('.mobile_menu_block').slideUp(300)
					$('.mobile_menu_btn').removeClass('active');
				})
		

			})
				function initMap() {
				  var map = new google.maps.Map(document.getElementById('map'), {
				    zoom: 14,
				    center: {lat: 50.432393, lng: 30.450265},
				    scrollwheel: false
				  });

				  var marker = new google.maps.Marker({
				    position: {lat: 50.432393, lng: 30.450265},
				    map: map,
				    title: 'Регард',
				    icon: 'img/marker.png'
				  });

				  var marker2 = new google.maps.Marker({
				    position: {lat: 49.988015, lng: 36.222507},
				    map: map,
				    title: 'Регард',
				    icon: 'img/marker.png'
				  });

				  $('.na_kv').on('click', function(event) {
					event.preventDefault();
					map.setCenter({lat: 50.432393, lng: 30.450265});
				  })

				  $('.na_kh').on('click', function(event) {
					event.preventDefault();
					map.setCenter({lat: 49.988015, lng: 36.222507});
				  })
				}

	</script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCPMdFEIFxDebjNl6Dm7Krd_XlMyvrfWRw&callback=initMap"
        defer></script>
      <script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-86266167-1', 'auto');
	  ga('send', 'pageview');
	</script>
</head>
<body>
	<div class="bg_modal callback_modal bitrix_recall">
		<div class="callback_inner modal_inner">
			<div class="mod_close"></div>
			<h2>Оставьте свой номер и мы перезвоним</h2>
			<input type="tel" class="form_input_tel input_tel_1" placeholder="+38">
			<input type="tel" class="form_input_tel input_tel_2" placeholder="123" maxlength="3">
			<input type="tel" class="form_input_tel input_tel_3" placeholder="4567890" maxlength="7">
			<div class="callback_inner_submit">Жду звонка</div>
		</div>
	</div>

	<div class="bg_modal pricelist_modal bitrix_pricelist">
		<div class="modal_inner pricelist_inner">
			<div class="mod_close"></div>
			<h2>Скачайте прайс на 70 компьютеров</h2>
			<form class="pricelist_form">
				<div class="tel_mail_container">
					<div class="input_block">
						<div class="input_title">1. Введите Ваш Email</div>
						<input type="text" class="form_input_mail" placeholder="Введите E-mail">
					</div>
					<div class="input_block">
						<div class="input_title">2. Введите Ваш телефон</div>
						<input type="tel" class="form_input_tel input_tel_1" placeholder="+38">
						<input type="tel" class="form_input_tel input_tel_2" placeholder="123" maxlength="3">
						<input type="tel" class="form_input_tel input_tel_3" placeholder="4567890" maxlength="7">
					</div>
					<div class="input_block">
						<input type="submit" class="input_form_btn" value="скачать прайс">
					</div>
				</div>
			</form>
		</div>
	</div>

	<div class="bg_modal accessories_modal bitrix_accessor">
		<div class="modal_inner accessories_inner">
			<div class="mod_close"></div>
			<h2>Подобрать аксессуары</h2>
			<h3>Укажите свои контактные данные<br>
			и наш менеджер подберет вам<br>
			необходимые аксессуары
			</h3>	
			<div class="input_title">Введите Ваше имя</div>
			<input type="text" placeholder="Иванов Иван" class="modal_input">
			<div class="input_title">Введите Ваш телефон</div>
			<input type="tel" class="form_input_tel input_tel_1" placeholder="+38">
			<input type="tel" class="form_input_tel input_tel_2" placeholder="123" maxlength="3">
			<input type="tel" class="form_input_tel input_tel_3" placeholder="4567890" maxlength="7">
			<div class="input_title">Введите сообщение</div>
			<textarea placeholder="Комментарий" class="modal_textarea"></textarea>
			<div class="modal_sumbit">Подобрать аксессуары</div>
		</div>
	</div>

	<div class="bg_modal privat_modal bitrix_rassrochka">
		<div class="modal_inner privat_inner">
			<div class="mod_close"></div>
			<h2>Рассрочка от<br> Приват Банка</h2>
			<h3>Укажите свои контактные данные<br>
				для получения информации по<br>
				мгновенной рассрочке
			</h3>	
			<div class="input_title">Введите Ваше имя</div>
			<input type="text" placeholder="Иванов Иван" class="modal_input">
			<div class="input_title">Введите Ваш телефон</div>
			<input type="tel" class="form_input_tel input_tel_1" placeholder="+38">
			<input type="tel" class="form_input_tel input_tel_2" placeholder="123" maxlength="3">
			<input type="tel" class="form_input_tel input_tel_3" placeholder="4567890" maxlength="7">
			<div class="modal_sumbit">получить информацию</div>
		</div>
	</div>

	<div class="bg_modal comp_modal comp_modal_1 bitrix_makecomp">
		<div class="modal_inner comp_modal_inner">
			<div class="mod_close"></div>
			<h2>Подобрать компьютер<br>
для проектирования</h2>
			<h3>Напишите ваши пожелания<br>
			или требования к компьютеру,<br>
			и мы свяжемся с вами в,<br>
			ближайшее время.
			</h3>	
			<div class="input_title">Введите Ваше имя</div>
			<input type="text" placeholder="Иванов Иван" class="modal_input">
			<div class="input_title">Введите Ваш телефон</div>
			<input type="tel" class="form_input_tel input_tel_1" placeholder="+38">
			<input type="tel" class="form_input_tel input_tel_2" placeholder="123" maxlength="3">
			<input type="tel" class="form_input_tel input_tel_3" placeholder="4567890" maxlength="7">
			<input type="hidden" name="task" value="Для проектирования">
			<div class="input_title">Введите сообщение</div>
			<textarea placeholder="Комментарий" class="modal_textarea"></textarea>
			<div class="modal_sumbit">Подобрать Компьютер</div>
		</div>
	</div>

	<div class="bg_modal comp_modal comp_modal_2 bitrix_makecomp">
		<div class="modal_inner comp_modal_inner">
			<div class="mod_close"></div>
			<h2>Подобрать экстримально<br>
мощный игровой ПК</h2>
			<h3>Напишите ваши пожелания<br>
			или требования к компьютеру,<br>
			и мы свяжемся с вами в,<br>
			ближайшее время.
			</h3>	
			<div class="input_title">Введите Ваше имя</div>
			<input type="text" placeholder="Иванов Иван" class="modal_input">
			<div class="input_title">Введите Ваш телефон</div>
			<input type="tel" class="form_input_tel input_tel_1" placeholder="+38">
			<input type="tel" class="form_input_tel input_tel_2" placeholder="123" maxlength="3">
			<input type="tel" class="form_input_tel input_tel_3" placeholder="4567890" maxlength="7">
			<input type="hidden" name="task" value="Для Игр">
			<div class="input_title">Введите сообщение</div>
			<textarea placeholder="Комментарий" class="modal_textarea"></textarea>
			<div class="modal_sumbit">Подобрать Компьютер</div>
		</div>
	</div>

	<div class="bg_modal comp_modal comp_modal_3 bitrix_makecomp">
		<div class="modal_inner comp_modal_inner">
			<div class="mod_close"></div>
			<h2>Подобрать компьютер для<br>
 3D моделирования</h2>
			<h3>Напишите ваши пожелания<br>
			или требования к компьютеру,<br>
			и мы свяжемся с вами в,<br>
			ближайшее время.
			</h3>	
			<div class="input_title">Введите Ваше имя</div>
			<input type="text" placeholder="Иванов Иван" class="modal_input">
			<div class="input_title">Введите Ваш телефон</div>
			<input type="tel" class="form_input_tel input_tel_1" placeholder="+38">
			<input type="tel" class="form_input_tel input_tel_2" placeholder="123" maxlength="3">
			<input type="tel" class="form_input_tel input_tel_3" placeholder="4567890" maxlength="7">
			<input type="hidden" name="task" value="Для 3D моделирования">
			<div class="input_title">Введите сообщение</div>
			<textarea placeholder="Комментарий" class="modal_textarea"></textarea>
			<div class="modal_sumbit">Подобрать Компьютер</div>
		</div>
	</div>

	<div class="bg_modal comp_modal comp_modal_4 bitrix_makecomp">
		<div class="modal_inner comp_modal_inner">
			<div class="mod_close"></div>
			<h2>Подобрать компьютер<br>
для видеомонтажа</h2>
			<h3>Напишите ваши пожелания<br>
			или требования к компьютеру,<br>
			и мы свяжемся с вами в,<br>
			ближайшее время.
			</h3>	
			<div class="input_title">Введите Ваше имя</div>
			<input type="text" placeholder="Иванов Иван" class="modal_input">
			<div class="input_title">Введите Ваш телефон</div>
			<input type="tel" class="form_input_tel input_tel_1" placeholder="+38">
			<input type="tel" class="form_input_tel input_tel_2" placeholder="123" maxlength="3">
			<input type="tel" class="form_input_tel input_tel_3" placeholder="4567890" maxlength="7">
			<input type="hidden" name="task" value="Для видеомонтажа">
			<div class="input_title">Введите сообщение</div>
			<textarea placeholder="Комментарий" class="modal_textarea"></textarea>
			<div class="modal_sumbit">Подобрать Компьютер</div>
		</div>
	</div>

	
	<div class="header header_product clearfix">
		<div class="product_wrapper">
			<div class="product_header_flex_container clearfix">
				<a href="index.html">
					<div class="logo">
						<img src="img/logo-new.png">
					</div>
				</a>
				<div class="mobile_menu_btn">
					<div class="mobile_menu_inner mob_inner_top"></div>
					<div class="mobile_menu_inner mob_inner_mid"></div>
					<div class="mobile_menu_inner mob_inner_bottom"></div>
				</div>
				<span>
					<a href="chast-privatbank.html" class="header_product_nav_menu_item">Купить в рассрочку</a>
					<a href="delivery.html" class="header_product_nav_menu_item">Доставка и оплата</a>
					<a href="faq.html" class="header_product_nav_menu_item">Отзывы</a>
					<a href="contacts.html" class="header_product_nav_menu_item">Контакты</a>
					<a href="konkurs.html" class="header_product_nav_menu_item">Акция<img src="img/new_nav.png"></a>
				</span>
				<div class="header_phones">
					<div class="header_phones_title">Бесплатно со всех номеров Украины</div>
					<div class="header_phones_nubmer">0 800 753 853</div>
					<div class="header_phones_inner">
						<div class="header_info_inner_block">
							ПН - ПТ с 09:00 до 19:00
						</div>
						<div class="header_info_inner_block">
							СБ с 10:00 до 16:00
						</div>
						<div class="header_info_inner_block">
							ВC - выходной
						</div>
						<div class="header_info_inner_block">
							<img src="img/kievstar.png" style="margin-right: 3px;">
							(067) 464-41-50
						</div>
						<div class="header_info_inner_block">
							<img src="img/mts.jpg">
							(050) 324-60-25
						</div>
						<div class="header_info_inner_block">
							<img src="img/lifecell.png">
							(063) 606-53-06
						</div>
					</div>
				</div>
				<a href="https://vk.com/im?sel=-101179801" target="_blank" class="vk_consult vk_consult_main_page">
					<div class="vk_consult_image">
						<div class="vk_pulse_wrapper">
							<div class="pulse"></div>
						</div>
						<img src="img/vk_btn.png">
					</div>
					<div class="vk_consult_info">
						<div class="vk_consult_title">Консультант<br>Вконтакте</div>
						<div class="vk_consult_online">online</div>
					</div>
				</a>
			</div>
		</div>
		<div class="mobile_menu_block">
			<a href="chast-privatbank.html" class="nav_bar_item_mobile nav_bar_item">Купить в рассрочку</a>
			<a href="delivery.html" class="nav_bar_item_mobile nav_bar_item">Доставка и оплата</a>
			<a href="faq.html" class="nav_bar_item_mobile nav_bar_item">Отзывы</a>
			<a href="contacts.html" class="nav_bar_item_mobile nav_bar_item">Контакты</a>
			<a href="konkurs.html" class="nav_bar_item_mobile nav_bar_item">Акция<img src="img/new_nav.png"></a>
			<a href="https://vk.com/im?sel=-101179801" target="_blank" class="nav_bar_item nav_bar_item_mobile"><span style="border-bottom:1px dotted #333333;">Консультант ВК</span></a>
			<a href="tel:0800753853" class="nav_bar_item nav_bar_item_mobile"><span style="border-bottom:1px dotted #333333;">0 800 753 853</span></a>
		</div>
	</div>

	<div class="mean_bg">
	<div class="new_computers_block">
		<div class="wrapper new_computers_wrapper">
			<div class="new_computers_block_title"><span class="comps_title_icon"></span><span class="new_computers_block_title_inner"><span class="red_title">Лучшие</span> игровые Компьютеры 2018</span></div>
			<div class="new_computers_container_wrapper">
				<div class="slider_prev_arrow slider_prev_arrow-1"></div>
				<div class="slider_next_arrow slider_next_arrow-1"></div>
			<div class="new_computers_container new_computers_container-1">
				<div class="new_computer_product_block_container">
					<a href="pro-gamer-3000.html" target="_blank" class="new_computer_product_block">
						<img src="img/top.png" class="new_badge2">
						<img src="img/free-shipping.png" class="new_computer_shipping">
						<div class="new_computer_product_block_photo back_light">
						<img src="http://xn--80afeb8cd.com/cases/pro_gamer3000.png">
						</div>
						<div class="new_computer_title">PRO GAMER 3000</div>
						<div class="new_stars"></div>
						<div class="new_reviews">280 отзывов</div>
						<div class="characteristics">
							<ul>
								<li>Intel Pentium G4560 3.5GHz</li>
								<li>NVIDIA GeForce GTX 1050 TI, 4GB </li>
								<li>8 GB DDR4-2100</li>
								<li>Intel H110 Chipset</li>
								<li>500 GB TOSHIBA Hard Drive</li>
								<li>GreenVision X04</li>
								<li>430W DeepCool</li>
							</ul>
						</div>
						<div class="new_computer_button_block clearfix">
							<div class="new_computer_prices">
								<div class="new_computer_prices_new">15 699</div>
								<div class="new_computer_prices_old">19 090</div>
							</div>
							<div class="new_computer_button">
								<div class="new_button_title">Подробнее</div>
								<div class="new_computer_button_bg"></div>
							</div>
						</div>
					</a>
				</div>
				<div class="new_computer_product_block_container">
				<a href="griffin-power.html" target="_blank" class="new_computer_product_block">
				<img src="img/top.png" class="new_badge2">
					<img src="img/free-shipping.png" class="new_computer_shipping">
					<div class="new_computer_product_block_photo back_light">
						<img src="http://xn--80afeb8cd.com/cases/Griffin-Power.png">
					</div>
					<div class="new_computer_title">Griffin Power</div>
					<div class="reviews_container clearfix">
						<div class="stars_and_reviews">
							<div class="new_stars"></div>
							<div class="new_reviews">137 отзывов</div>
						</div>
						<div class="vr_ready_container">
							<img src="img/vr-ready.png">
						</div>
					</div>
					<div class="characteristics">
						<ul>
							<li>Core i5-7400 4-Ядра 3.5GHz </li>
							<li>NVIDIA GeForce GTX 1050 Ti, 4GB </li>
							<li>8 GB DDR4-2100 </li>
							<li>Intel H110 Chipset, MicroATX</li>
							<li>1TB TOSHIBA Hard Drive</li>
							<li>Frontier Extractor RED</li>
							<li>Deepcool 530W</li>
						</ul>
					</div>
					<div class="new_computer_button_block clearfix">
						<div class="new_computer_prices">
							<div class="new_computer_prices_new">20 249</div>
							<div class="new_computer_prices_old">23 315</div>
						</div>
						<div class="new_computer_button">
							<div class="new_button_title">Подробнее</div>
							<div class="new_computer_button_bg"></div>
						</div>
					</div>
				</a>
				</div>
				<div class="new_computer_product_block_container">
				<a href="amd-ryzen.html" target="_blank" class="new_computer_product_block">
				
					<img src="img/free-shipping.png" class="new_computer_shipping">
					<div class="new_computer_product_block_photo back_light">
						<img src="http://xn--80afeb8cd.com/cases/Ryzen.png">
					</div>
					<div class="new_computer_title">AMD Ryzen</div>
					<div class="reviews_container clearfix">
						<div class="stars_and_reviews">
							<div class="new_stars starsfourandhalf"></div>
							<div class="new_reviews">19 отзывов</div>
						</div>
						<div class="vr_ready_container">
							<img src="img/vr-ready.png">
						</div>
					</div>
					<div class="characteristics">
						<ul>
							<li>Ryzen™ 5 1600 6-Ядер 3.6GHz </li>
							<li>NVIDIA GeForce GTX 1060, 6GB </li>
							<li>16 GB DDR4-2400</li>
							<li>B350M PRO-VDH, Socket AM4</li>
							<li>120 GB Kingston</li>
							<li>1TB TOSHIBA Hard Drive</li>
							<li>Zalman Z11 Plus, 530W</li>
						</ul>
					</div>
					<div class="new_computer_button_block clearfix">
						<div class="new_computer_prices">
							<div class="new_computer_prices_new">34 999</div>
							<div class="new_computer_prices_old">36 499</div>
						</div>
						<div class="new_computer_button">
							<div class="new_button_title">Подробнее</div>
							<div class="new_computer_button_bg"></div>
						</div>
					</div>
				</a>
				</div>
				<div class="new_computer_product_block_container">
				<a href="raven-x-treme.html" target="_blank" class="new_computer_product_block">
				
					<img src="img/free-shipping.png" class="new_computer_shipping">
					<div class="new_computer_product_block_photo back_light">
						<img src="http://xn--80afeb8cd.com/cases/Aventador.png">
					</div>
					<div class="new_computer_title">Raven X-Treme</div>
					<div class="reviews_container clearfix">
						<div class="stars_and_reviews">
							<div class="new_stars"></div>
							<div class="new_reviews">72 отзыва</div>
						</div>
						<div class="vr_ready_container">
							<img src="img/vr-ready.png">
						</div>
					</div>
					<div class="characteristics">
						<ul>
							<li>Core i7-7700 4-Ядра 4.2GHz </li>
							<li>NVIDIA GeForce GTX 1070, 8GB </li>
							<li>16 GB DDR4-2400</li>
							<li>Intel® B250 Chipset, ATX</li>
							<li>120 GB Kingston</li>
							<li>2TB TOSHIBA Hard Drive</li>
							<li>AZZA Gaming X, 700W</li>
						</ul>
					</div>
					<div class="new_computer_button_block clearfix">
						<div class="new_computer_prices">
							<div class="new_computer_prices_new">45 999</div>
							<div class="new_computer_prices_old">48 499</div>
						</div>
						<div class="new_computer_button">
							<div class="new_button_title">Подробнее</div>
							<div class="new_computer_button_bg"></div>
						</div>
					</div>
				</a>
				</div>
				<div class="new_computer_product_block_container">
				<a href="aventador.php" target="_blank" class="new_computer_product_block">
				<img src="img/new-new.png" class="new_badge2">
					<img src="img/free-shipping.png" class="new_computer_shipping">
					<div class="new_computer_product_block_photo back_light">
						<img src="http://xn--80afeb8cd.com/cases/Raven-X-Treme.png">
					</div>
					<div class="new_computer_title">Aventador</div>
					<div class="reviews_container clearfix">
						<div class="stars_and_reviews">
							<div class="new_stars"></div>
							<div class="new_reviews">10 отзывов</div>
						</div>
						<div class="vr_ready_container">
							<img src="img/vr-ready.png">
						</div>
					</div>
					<div class="characteristics">
						<ul>
							<li>Core™ i7-8700 6-Ядер 4.6GHz</li>
							<li>NVIDIA GeForce GTX 1080, 8GB</li>
							<li>16GB DDR4-2100</li>
							<li>GIGABYTE Z370XP SLI</li>
							<li>120 GB SSD Kingston</li>
							<li>2TB TOSHIBA Hard Drive</li>
							<li>Aerocool Project 7, 700W</li>
						</ul>
					</div>
					<div class="new_computer_button_block clearfix">
						<div class="new_computer_prices">
							<div class="new_computer_prices_new">56 949</div>
							<div class="new_computer_prices_old">63 549</div>
						</div>
						<div class="new_computer_button">
							<div class="new_button_title">Подробнее</div>
							<div class="new_computer_button_bg"></div>
						</div>
					</div>
				</a>
				</div>
			</div>
			</div>
		</div>
	</div>
	
	<div class="new_computers_block">
		<div class="wrapper new_computers_wrapper">
			<div class="new_computers_block_title" style="text-align:left"><span class="comps_title_icon"></span><span class="new_computers_block_title_inner"><span class="red_title">ТОП-5 Лучших </span>бюджетных игровых ПК 2018 года</span></div>
			<div class="new_computers_container_wrapper">
				<div class="slider_prev_arrow slider_prev_arrow-2"></div>
				<div class="slider_next_arrow slider_next_arrow-2"></div>
			<div class="new_computers_container new_computers_container-2">
				<div class="new_computer_product_block_container">
				<a href="zeus-evo.html" target="_blank" class="new_computer_product_block">
				
					<img src="img/free-shipping.png" class="new_computer_shipping">
					<div class="new_computer_product_block_photo back_light">
						<img src="http://xn--80afeb8cd.com/cases/Zeus-Evo.png">
					</div>
					<div class="new_computer_title">Zeus Evo</div>
					<div class="new_stars starsfourandhalf"></div>
					<div class="new_reviews">120 отзывов</div>
					<div class="characteristics">
						<ul>
							<li>AMD A4-7300 2-ЯДРА 3.8 ГГц,</li>
							<li>AMD Radeon HD7540D, 2GB</li>
							<li>4 GB DDR3-1600</li>
							<li>FM2+, AMD A68H, MicroATX</li>
							<li>320GB Seagate HDD</li>
							<li>GreenVision X04</li>
							<li>400W LogicPower</li>
						</ul>
					</div>
					<div class="new_computer_button_block clearfix">
						<div class="new_computer_prices">
							<div class="new_computer_prices_new">5 249</div>
							<div class="new_computer_prices_old">6 349</div>
						</div>
						<div class="new_computer_button">
							<div class="new_button_title">Подробнее</div>
							<div class="new_computer_button_bg"></div>
						</div>
					</div>
				</a>
				</div>
				<div class="new_computer_product_block_container">
				<a href="back-to-school.html" target="_blank" class="new_computer_product_block">
				<img src="img/new-new.png" class="new_badge2">
					<img src="img/free-shipping.png" class="new_computer_shipping">
					
					<div class="new_computer_product_block_photo back_light">
						<img src="http://xn--80afeb8cd.com/cases/Back-to-School.png">
					</div>
					<div class="new_computer_title">Back to School</div>
					<div class="new_stars starsfourandhalf"></div>
					<div class="new_reviews">111 отзывов</div>
					<div class="characteristics">
						<ul>
							<li>AMD A6-9500 8-ЯДЕР 3.8 ГГц</li>
							<li>AMD Radeon R5 Graphic, 2ГБ</li>
							<li>4 GB DDR4-2133</li>
							<li>A320MD PRO, Socket AM4</li>
							<li>320GB Seagate HDD</li>
							<li>GreenVision X04</li>
							<li>400W LogicPower</li>
						</ul>
					</div>
					<div class="new_computer_button_block clearfix">
						<div class="new_computer_prices">
							<div class="new_computer_prices_new">6 749</div>
							<div class="new_computer_prices_old">8 349</div>
						</div>
						<div class="new_computer_button">
							<div class="new_button_title">Подробнее</div>
							<div class="new_computer_button_bg"></div>
						</div>
					</div>
				</a>
				</div>
				<div class="new_computer_product_block_container">
				<a href="GTA_5_Edition.php" target="_blank" class="new_computer_product_block">
					<img src="img/free-shipping.png" class="new_computer_shipping">
					
					<div class="new_computer_product_block_photo back_light">
						<img src="http://xn--80afeb8cd.com/cases/World-of-Tans.png">
					</div>
					<div class="new_computer_title">GTA V - SPECIAL EDITION</div>
					<div class="new_stars"></div>
					<div class="new_reviews">208 отзывов</div>
					<div class="characteristics">
						<ul>
							<li>Intel Celeron G3900 2,80GHz</li>
							<li>NVIDIA GeForce GT 730, 2GB </li>
							<li>4 GB DDR4 2100 MHz</li>
							<li>Intel H110 Chipset</li>
							<li>320GB Seagate HDD</li>
							<li>GreenVision X04</li>
							<li>400W LogicPower</li>
						</ul>
					</div>
					<div class="new_computer_button_block clearfix">
						<div class="new_computer_prices">
							<div class="new_computer_prices_new">8 299</div>
							<div class="new_computer_prices_old">9 899</div>
						</div>
						<div class="new_computer_button">
							<div class="new_button_title">Подробнее</div>
							<div class="new_computer_button_bg"></div>
						</div>
					</div>
				</a>
				</div>
				<div class="new_computer_product_block_container">
				<a href="dominator-ultra.html" target="_blank" class="new_computer_product_block">
				
					<img src="img/free-shipping.png" class="new_computer_shipping">
					<div class="new_computer_product_block_photo back_light">
						<img src="http://xn--80afeb8cd.com/cases/Dominator-Ultra.png">
					</div>
					<div class="new_computer_title">Dominator Ultra</div>
					<div class="new_stars starsfourandhalf"></div>
					<div class="new_reviews">112 отзывов</div>
					<div class="characteristics">
						<ul>
							<li>AMD X4-840 4-ЯДРА 3.5 ГГц</li>
							<li>NVIDIA GeForce GTX 1050, 2GB</li>
							<li>8 GB DDR3-1600</li>
							<li>AMD 760G, MicroATX</li>
							<li>320GB Seagate</li>
							<li>GreenVision F01</li>
							<li>430W DeepCool</li>
						</ul>
					</div>
					<div class="new_computer_button_block clearfix">
						<div class="new_computer_prices">
							<div class="new_computer_prices_new">12 099</div>
							<div class="new_computer_prices_old">14 499</div>
						</div>
						<div class="new_computer_button">
							<div class="new_button_title">Подробнее</div>
							<div class="new_computer_button_bg"></div>
						</div>
					</div>
				</a>
				</div>
				<div class="new_computer_product_block_container">
				<a href="hellcat-pro.html" target="_blank" class="new_computer_product_block">
					<img src="img/free-shipping.png" class="new_computer_shipping">
					
					<div class="new_computer_product_block_photo back_light">
						<img src="http://xn--80afeb8cd.com/cases/Hellcat-Pro.png">
					</div>
					<div class="new_computer_title">Hellcat Pro</div>
					<div class="new_stars starsfour"></div>
					<div class="new_reviews">64 отзыва</div>
					<div class="characteristics">
						<ul>
							<li>Ryzen™ 3 1200 4-Ядра 3.4GHz</li>
							<li>NVIDIA GeForce GTX 1050, 2GB </li>
							<li>8 GB DDR4-2100 </li>
							<li>A320MD PRO, Socket AM4</li>
							<li>500GB Seagate Hard Drive</li>
							<li>GreenVision F01</li>
							<li>430W DeepCool</li>
						</ul>
					</div>
					<div class="new_computer_button_block clearfix">
						<div class="new_computer_prices">
							<div class="new_computer_prices_new">15 499</div>
							<div class="new_computer_prices_old">17 799</div>
						</div>
						<div class="new_computer_button">
							<div class="new_button_title">Подробнее</div>
							<div class="new_computer_button_bg"></div>
						</div>
					</div>
				</a>
				</div>
			</div>
			</div>
		</div>
	</div>
	</div>
	<div class="custom_builder">
		<div class="custom_builder_wrapper">
			<div class="custom_builder_title">Кастомный <span>конфигуратор:</span> Начни с платформы</div>
			<div class="custom_builder_container clearfix">
				<div class="custom_builder_list">
					<div class="custom_buider_type_switch clearfix">
						<div class="custom_builder_button desktop active">
							<div class="custom_builder_button_icon desktop"></div>
							<div class="custom_builder_button_title">Стационарные</div>
							<div class="custom_builder_button_triangle"></div>
							<div class="custom_builder_button_underline"></div>
						</div>
						<div class="custom_builder_button laptop" style="display:none">
							<div class="custom_builder_button_icon laptop"></div>
							<div class="custom_builder_button_title">Ноутбуки</div>
							<div class="custom_builder_button_triangle"></div>
							<div class="custom_builder_button_underline"></div>
						</div>
					</div>
					<div class="custom_builder_items">
						<a href="intel_x299.php" class="custom_builder_item_link clearfix hover" data-link="1" target="_blank">
							<div class="custom_builder_item_link_title">Intel X299 Core i7 Конфигуратор</div>
							<div class="custom_builder_item_link_price">73 899 грн</div>
						</a>
						<a href="aventador.php" class="custom_builder_item_link clearfix" data-link="2" target="_blank">
							<div class="custom_builder_item_link_title">Intel Z370 Core i7 Конфигуратор</div>
							<div class="custom_builder_item_link_price">56 949 грн</div>
						</a>
						<a href="raven-x-treme.html" class="custom_builder_item_link clearfix" data-link="3" target="_blank">
							<div class="custom_builder_item_link_title">Intel Z270 Core i7 Конфигуратор</div>
							<div class="custom_builder_item_link_price">45 999 грн</div>
						</a>
						<a href="griffin-power.html" class="custom_builder_item_link clearfix" data-link="4" target="_blank">
							<div class="custom_builder_item_link_title">Intel B250 Core i5 Конфигуратор</div>
							<div class="custom_builder_item_link_price">20 249 грн</div>
						</a>
						<a href="GTA_5_Edition.php" class="custom_builder_item_link clearfix" data-link="5" target="_blank">
							<div class="custom_builder_item_link_title">Intel H110 Pentium Конфигуратор</div>
							<div class="custom_builder_item_link_price">8 299 грн</div>
						</a>
						<div class="custom_builder_items_separator"></div>
						<a href="amd_ryzen_threadripper.php" class="custom_builder_item_link clearfix" data-link="6" target="_blank">
							<div class="custom_builder_item_link_title">AMD Ryzen Threadripper Конфигуратор</div>
							<div class="custom_builder_item_link_price">75 299 грн</div>
						</a>
						<a href="amd-ryzen.html" class="custom_builder_item_link clearfix" data-link="7" target="_blank">
							<div class="custom_builder_item_link_title">AMD Ryzen 5, 7 Конфигуратор</div>
							<div class="custom_builder_item_link_price">34 999 грн</div>
						</a>
						<a href="hellcat-pro.html" class="custom_builder_item_link clearfix" data-link="8" target="_blank">
							<div class="custom_builder_item_link_title">AMD Ryzen 3 Конфигуратор</div>
							<div class="custom_builder_item_link_price">15 499 грн</div>
						</a>
						<a href="dominator-ultra.html" class="custom_builder_item_link clearfix" data-link="9" target="_blank">
							<div class="custom_builder_item_link_title">AMD FX AM3+ Конфигуратор</div>
							<div class="custom_builder_item_link_price">12 099 грн</div>
						</a>
						<a href="back-to-school.html" class="custom_builder_item_link clearfix" data-link="10" target="_blank">
							<div class="custom_builder_item_link_title">AMD APU А-серия Конфигуратор</div>
							<div class="custom_builder_item_link_price">6 749 грн</div>
						</a>
					</div>
				</div>
				<a href="intel_x299.php" class="custom_builder_block_link" id="custom_builder_01" target="_blank">
					<div class="custom_builder_photo_block">
						<img src="img/vr-ready.png" class="custom_builder_vr_badge">
						<img src="http://xn--80afeb8cd.com/cases/Intel-X299-Core-i7.png" class="custom_builder_photo_inner">
					</div>
					<div class="custom_builder_spec_block">
						<div class="custom_builder_spec_title">Intel X299 Core i7 Конфигуратор</div>
						<div class="custom_builder_spec_reviews">
							<div class="new_stars"></div>
							<div class="new_reviews">20 отзывов</div>
						</div>
						<div class="custom_builder_spec_container">
							<div class="custom_builder_spec_block_inner">
								<div class="intel_icon"></div>
								<div class="custom_builder_spec_block_title">Intel Core I7-7820X</div>
							</div>
							<div class="custom_builder_spec_block_inner">
								<div class="nvidia_icon"></div>
								<div class="custom_builder_spec_block_title">NVIDIA GeForce 1080</div>
							</div>
							<div class="custom_builder_spec_block_inner">
								<div class="ddr_icon"></div>
								<div class="custom_builder_spec_block_title">16GB DDR4-3000</div>
							</div>
							<div class="custom_builder_spec_block_inner">
								<div class="harddrive_icon"></div>
								<div class="custom_builder_spec_block_title">2TB HDD</div>
							</div>
						</div>
						<div class="custom_builder_price_and_button clearfix">
							<div class="custom_builder_spec_price">73 899 грн</div>
							<div class="custom_builder_spec_button">Подробнее</div>
						</div>
					</div>
				</a>
				<a href="aventador.php" class="custom_builder_block_link" id="custom_builder_02" target="_blank">
					<div class="custom_builder_photo_block">
						<img src="img/vr-ready.png" class="custom_builder_vr_badge">
						<img src="http://xn--80afeb8cd.com/cases/Raven-X-Treme.png" class="custom_builder_photo_inner">
					</div>
					<div class="custom_builder_spec_block">
						<div class="custom_builder_spec_title">Intel Z370 Core i7 Конфигуратор</div>
						<div class="custom_builder_spec_reviews">
							<div class="new_stars"></div>
							<div class="new_reviews">10 отзывов</div>
						</div>
						<div class="custom_builder_spec_container">
							<div class="custom_builder_spec_block_inner">
								<div class="intel_icon"></div>
								<div class="custom_builder_spec_block_title">Intel Core i7-8700</div>
							</div>
							<div class="custom_builder_spec_block_inner">
								<div class="nvidia_icon"></div>
								<div class="custom_builder_spec_block_title">NVIDIA GeForce GTX 1080</div>
							</div>
							<div class="custom_builder_spec_block_inner">
								<div class="ddr_icon"></div>
								<div class="custom_builder_spec_block_title">16GB DDR4-2100 Memory</div>
							</div>
							<div class="custom_builder_spec_block_inner">
								<div class="harddrive_icon"></div>
								<div class="custom_builder_spec_block_title">2 TB HDD</div>
							</div>
						</div>
						<div class="custom_builder_price_and_button clearfix">
							<div class="custom_builder_spec_price">56 949 грн</div>
							<div class="custom_builder_spec_button">Подробнее</div>
						</div>
					</div>
				</a>
				<a href="raven-x-treme.html" class="custom_builder_block_link" id="custom_builder_03" target="_blank">
					<div class="custom_builder_photo_block">
						<img src="img/vr-ready.png" class="custom_builder_vr_badge">
						<img src="http://xn--80afeb8cd.com/cases/Aventador.png" class="custom_builder_photo_inner">
					</div>
					<div class="custom_builder_spec_block">
						<div class="custom_builder_spec_title">Intel Z270 Core i7 Конфигуратор</div>
						<div class="custom_builder_spec_reviews">
							<div class="new_stars"></div>
							<div class="new_reviews">72 отзыва</div>
						</div>
						<div class="custom_builder_spec_container">
							<div class="custom_builder_spec_block_inner">
								<div class="intel_icon"></div>
								<div class="custom_builder_spec_block_title">Core i7-7700K 4-Ядра 4.5GHz</div>
							</div>
							<div class="custom_builder_spec_block_inner">
								<div class="nvidia_icon"></div>
								<div class="custom_builder_spec_block_title">NVIDIA GeForce GTX 1080 8GB</div>
							</div>
							<div class="custom_builder_spec_block_inner">
								<div class="ddr_icon"></div>
								<div class="custom_builder_spec_block_title">16 GB DDR4-2100</div>
							</div>
							<div class="custom_builder_spec_block_inner">
								<div class="harddrive_icon"></div>
								<div class="custom_builder_spec_block_title">1TB HDD</div>
							</div>
						</div>
						<div class="custom_builder_price_and_button clearfix">
							<div class="custom_builder_spec_price">45 999 грн</div>
							<div class="custom_builder_spec_button">Подробнее</div>
						</div>
					</div>
				</a>
				<a href="griffin-power.html" class="custom_builder_block_link" id="custom_builder_04" target="_blank">
					<div class="custom_builder_photo_block">
						<img src="img/vr-ready.png" class="custom_builder_vr_badge">
						<img src="http://xn--80afeb8cd.com/cases/Griffin-Power.png" class="custom_builder_photo_inner">
					</div>
					<div class="custom_builder_spec_block">
						<div class="custom_builder_spec_title">Intel B250 Core i5 Конфигуратор</div>
						<div class="custom_builder_spec_reviews">
							<div class="new_stars"></div>
							<div class="new_reviews">137 отзывов</div>
						</div>
						<div class="custom_builder_spec_container">
							<div class="custom_builder_spec_block_inner">
								<div class="intel_icon"></div>
								<div class="custom_builder_spec_block_title">Core i5-7400 4-Ядра 3.5GHz</div>
							</div>
							<div class="custom_builder_spec_block_inner">
								<div class="nvidia_icon"></div>
								<div class="custom_builder_spec_block_title">NVIDIA GeForce GTX 1050 Ti, 4GB</div>
							</div>
							<div class="custom_builder_spec_block_inner">
								<div class="ddr_icon"></div>
								<div class="custom_builder_spec_block_title">8 GB DDR4-2100</div>
							</div>
							<div class="custom_builder_spec_block_inner">
								<div class="harddrive_icon"></div>
								<div class="custom_builder_spec_block_title">1TB HDD</div>
							</div>
						</div>
						<div class="custom_builder_price_and_button clearfix">
							<div class="custom_builder_spec_price">20 249 грн</div>
							<div class="custom_builder_spec_button">Подробнее</div>
						</div>
					</div>
				</a>
				<a href="GTA_5_Edition.php" class="custom_builder_block_link" id="custom_builder_05" target="_blank">
					<div class="custom_builder_photo_block">
						<!-- <img src="img/vr-ready.png" class="custom_builder_vr_badge"> -->
						<img src="http://xn--80afeb8cd.com/cases/World-of-Tans.png" class="custom_builder_photo_inner">
					</div>
					<div class="custom_builder_spec_block">
						<div class="custom_builder_spec_title">Intel H110 Pentium Конфигуратор</div>
						<div class="custom_builder_spec_reviews">
							<div class="new_stars"></div>
							<div class="new_reviews">193 отзыва</div>
						</div>
						<div class="custom_builder_spec_container">
							<div class="custom_builder_spec_block_inner">
								<div class="intel_icon"></div>
								<div class="custom_builder_spec_block_title">Intel Celeron G3900 2,80GHz</div>
							</div>
							<div class="custom_builder_spec_block_inner">
								<div class="nvidia_icon"></div>
								<div class="custom_builder_spec_block_title">NVIDIA GeForce GT 730 2GB</div>
							</div>
							<div class="custom_builder_spec_block_inner">
								<div class="ddr_icon"></div>
								<div class="custom_builder_spec_block_title">4 GB DDR4-2100</div>
							</div>
							<div class="custom_builder_spec_block_inner">
								<div class="harddrive_icon"></div>
								<div class="custom_builder_spec_block_title">320GB HDD</div>
							</div>
						</div>
						<div class="custom_builder_price_and_button clearfix">
							<div class="custom_builder_spec_price">8 299 грн</div>
							<div class="custom_builder_spec_button">Подробнее</div>
						</div>
					</div>
				</a>
				<a href="amd_ryzen_threadripper.php" class="custom_builder_block_link" id="custom_builder_06" target="_blank">
					<div class="custom_builder_photo_block">
						<img src="img/vr-ready.png" class="custom_builder_vr_badge">
						<img src="http://xn--80afeb8cd.com/cases/AMD-Ryzen-Threadripper.png" class="custom_builder_photo_inner">
					</div>
					<div class="custom_builder_spec_block">
						<div class="custom_builder_spec_title">AMD Ryzen Threadripper Конфигуратор</div>
						<div class="custom_builder_spec_reviews">
							<div class="new_stars starsfourandhalf"></div>
							<div class="new_reviews">15 отзывов</div>
						</div>
						<div class="custom_builder_spec_container">
							<div class="custom_builder_spec_block_inner">
								<div class="amd_ryzen_icon"></div>
								<div class="custom_builder_spec_block_title">AMD Ryzen Threadripper 1900x</div>
							</div>
							<div class="custom_builder_spec_block_inner">
								<div class="nvidia_icon"></div>
								<div class="custom_builder_spec_block_title">NVIDIA GeForse GTX 1080 8GB</div>
							</div>
							<div class="custom_builder_spec_block_inner">
								<div class="ddr_icon"></div>
								<div class="custom_builder_spec_block_title">16GB DDR4-3000 Memory</div>
							</div>
							<div class="custom_builder_spec_block_inner">
								<div class="harddrive_icon"></div>
								<div class="custom_builder_spec_block_title">2TB HDD</div>
							</div>
						</div>
						<div class="custom_builder_price_and_button clearfix">
							<div class="custom_builder_spec_price">75 299 грн</div>
							<div class="custom_builder_spec_button">Подробнее</div>
						</div>
					</div>
				</a>
				<a href="amd-ryzen.html" class="custom_builder_block_link" id="custom_builder_07" target="_blank">
					<div class="custom_builder_photo_block">
						<img src="img/vr-ready.png" class="custom_builder_vr_badge">
						<img src="http://xn--80afeb8cd.com/cases/Ryzen.png" class="custom_builder_photo_inner">
					</div>
					<div class="custom_builder_spec_block">
						<div class="custom_builder_spec_title">AMD Ryzen 5, 7 Конфигуратор</div>
						<div class="custom_builder_spec_reviews">
							<div class="new_stars starsfourandhalf"></div>
							<div class="new_reviews">16 отзывов</div>
						</div>
						<div class="custom_builder_spec_container">
							<div class="custom_builder_spec_block_inner">
								<div class="amd_ryzen_icon"></div>
								<div class="custom_builder_spec_block_title">Ryzen™ 5 1600 6-Ядер 3.6GHz</div>
							</div>
							<div class="custom_builder_spec_block_inner">
								<div class="nvidia_icon"></div>
								<div class="custom_builder_spec_block_title">NVIDIA GeForce GTX 1060 6GB</div>
							</div>
							<div class="custom_builder_spec_block_inner">
								<div class="ddr_icon"></div>
								<div class="custom_builder_spec_block_title">16 GB DDR4-2400</div>
							</div>
							<div class="custom_builder_spec_block_inner">
								<div class="harddrive_icon"></div>
								<div class="custom_builder_spec_block_title">1TB HDD</div>
							</div>
						</div>
						<div class="custom_builder_price_and_button clearfix">
							<div class="custom_builder_spec_price">34 999 грн</div>
							<div class="custom_builder_spec_button">Подробнее</div>
						</div>
					</div>
				</a>
				<a href="hellcat-pro.html" class="custom_builder_block_link" id="custom_builder_08" target="_blank">
					<div class="custom_builder_photo_block">
						<!-- <img src="img/vr-ready.png" class="custom_builder_vr_badge"> -->
						<img src="http://xn--80afeb8cd.com/cases/Hellcat-Pro.png" class="custom_builder_photo_inner">
					</div>
					<div class="custom_builder_spec_block">
						<div class="custom_builder_spec_title">AMD Ryzen 3 Конфигуратор</div>
						<div class="custom_builder_spec_reviews">
							<div class="new_stars starsfour"></div>
							<div class="new_reviews">64 отзыва</div>
						</div>
						<div class="custom_builder_spec_container">
							<div class="custom_builder_spec_block_inner">
								<div class="amd_ryzen_icon"></div>
								<div class="custom_builder_spec_block_title">Ryzen™ 3 1200 4-Ядра 3.4GHz</div>
							</div>
							<div class="custom_builder_spec_block_inner">
								<div class="nvidia_icon"></div>
								<div class="custom_builder_spec_block_title">NVIDIA GeForce GTX 1050 2GB</div>
							</div>
							<div class="custom_builder_spec_block_inner">
								<div class="ddr_icon"></div>
								<div class="custom_builder_spec_block_title">8 GB DDR4-2100</div>
							</div>
							<div class="custom_builder_spec_block_inner">
								<div class="harddrive_icon"></div>
								<div class="custom_builder_spec_block_title">500GB HDD</div>
							</div>
						</div>
						<div class="custom_builder_price_and_button clearfix">
							<div class="custom_builder_spec_price">15 499 грн</div>
							<div class="custom_builder_spec_button">Подробнее</div>
						</div>
					</div>
				</a>
				<a href="dominator-ultra.html" class="custom_builder_block_link" id="custom_builder_09" target="_blank">
					<div class="custom_builder_photo_block">
						<!-- <img src="img/vr-ready.png" class="custom_builder_vr_badge"> -->
						<img src="http://xn--80afeb8cd.com/cases/Dominator-Ultra.png" class="custom_builder_photo_inner">
					</div>
					<div class="custom_builder_spec_block">
						<div class="custom_builder_spec_title">AMD FX AM3+ Конфигуратор</div>
						<div class="custom_builder_spec_reviews">
							<div class="new_stars starsfourandhalf"></div>
							<div class="new_reviews">120 отзывов</div>
						</div>
						<div class="custom_builder_spec_container">
							<div class="custom_builder_spec_block_inner">
								<div class="amd_ryzen_icon"></div>
								<div class="custom_builder_spec_block_title">AMD FX-4300 4-ЯДРА 4.0 ГГц</div>
							</div>
							<div class="custom_builder_spec_block_inner">
								<div class="nvidia_icon"></div>
								<div class="custom_builder_spec_block_title">NVIDIA GeForce GTX 750 Ti, 2GB</div>
							</div>
							<div class="custom_builder_spec_block_inner">
								<div class="ddr_icon"></div>
								<div class="custom_builder_spec_block_title">8 GB DDR3-1600</div>
							</div>
							<div class="custom_builder_spec_block_inner">
								<div class="harddrive_icon"></div>
								<div class="custom_builder_spec_block_title">500GB HDD</div>
							</div>
						</div>
						<div class="custom_builder_price_and_button clearfix">
							<div class="custom_builder_spec_price">12 099 грн</div>
							<div class="custom_builder_spec_button">Подробнее</div>
						</div>
					</div>
				</a>
				<a href="back-to-school.html" class="custom_builder_block_link" id="custom_builder_010" target="_blank">
					<div class="custom_builder_photo_block">
						<!-- <img src="img/vr-ready.png" class="custom_builder_vr_badge"> -->
						<img src="http://xn--80afeb8cd.com/cases/Back-to-School.png" class="custom_builder_photo_inner">
					</div>
					<div class="custom_builder_spec_block">
						<div class="custom_builder_spec_title">AMD APU А-серия Конфигуратор</div>
						<div class="custom_builder_spec_reviews">
							<div class="new_stars starsfourandhalf"></div>
							<div class="new_reviews">111 отзывов</div>
						</div>
						<div class="custom_builder_spec_container">
							<div class="custom_builder_spec_block_inner">
								<div class="amd_icon"></div>
								<div class="custom_builder_spec_block_title">AMD A6-9500 8-ЯДЕР 3.8 ГГц</div>
							</div>
							<div class="custom_builder_spec_block_inner">
								<div class="amd_icon"></div>
								<div class="custom_builder_spec_block_title">AMD Radeon R5 Graphic 2ГБ</div>
							</div>
							<div class="custom_builder_spec_block_inner">
								<div class="ddr_icon"></div>
								<div class="custom_builder_spec_block_title">4 GB DDR4-2133</div>
							</div>
							<div class="custom_builder_spec_block_inner">
								<div class="harddrive_icon"></div>
								<div class="custom_builder_spec_block_title">320GB HDD</div>
							</div>
						</div>
						<div class="custom_builder_price_and_button clearfix">
							<div class="custom_builder_spec_price">6 749 грн</div>
							<div class="custom_builder_spec_button">Подробнее</div>
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>
	<div class="builder_block bitrix_builder" id="builder">
		<div class="wrapper">
			<h2>НЕ ЗНАЕТЕ КАКОЙ ВЫБРАТЬ КОМПЬЮТЕР?<br>
				НЕ  НАШЛИ НА САЙТЕ НУЖНОЙ МОДЕЛИ?</h2>
			<h3>Получите бесплатную 15 минутную консультацию  нашего эксперта<br>
Оставьте заявку  — и мы свяжемся с вами в ближайшее время</h3>
			<form class="builder_form_block">
				<div class="builder_left">
					<div class="builder_input_title">Введите Ваше имя</div>
					<input type="text" class="builder_input" name="name" placeholder="Иванов Иван">
					<div class="builder_input_title">Введите Ваш телефон</div>
					<input type="tel" class="form_input_tel phone_mask" placeholder="Введите телефон">
					<div class="builder_input_title">Введите Вам E-mail</div>
					<input type="text" class="builder_input" name="email" placeholder="ivanon@ivan.ua">
					<div class="slider_title">Цена: 
						<div class="slider_title_inner_block">
							<input class="slider_title_inner_input slider_block_price_input_first" value="5000">
							-
							<input class="slider_title_inner_input slider_block_price_input_second" value="60000">
						</div>
						 грн
					</div>
					<div class="slider_block_price"></div>
				</div>
				<div class="builder_right">
					<div class="builder_input_title">Выберите задачи, для которых вам нужен компьютер</div>
					<div class="checkboxes_wrapper">
						<label class="builder_checkbox_label">
							<input type="checkbox" value="Шутеры - FPS">
							<div class="builder_checkbox"></div>
							<div class="builder_checkbox_title">Шутеры - FPS
								<div class="builder_checkbox_subtitle">Battlefield 1, Call of Duty, Doom</div>
							</div>
						</label>
						<label class="builder_checkbox_label">
							<input type="checkbox" value="Экшен">
							<div class="builder_checkbox"></div>
							<div class="builder_checkbox_title">Экшен
								<div class="builder_checkbox_subtitle">GTA 5, Ведьмак 3, For Honor</div>
							</div>
						</label>
					</div>
					<div class="checkboxes_wrapper">
						<label class="builder_checkbox_label">
							<input type="checkbox" value="Online - FPS">
							<div class="builder_checkbox"></div>
							<div class="builder_checkbox_title">Online - FPS
								<div class="builder_checkbox_subtitle">CS-GO, OverWatch, WarFace</div>
							</div>
						</label>
						<label class="builder_checkbox_label">
							<input type="checkbox" value="MMO/Moba">
							<div class="builder_checkbox"></div>
							<div class="builder_checkbox_title">MMO/MOBA
								<div class="builder_checkbox_subtitle">Warcraft, LoL, Dota 2, WoT</div>
							</div>
						</label>
					</div>
					<div class="checkboxes_wrapper">
						<label class="builder_checkbox_label">
							<input type="checkbox" value="Видео и Стриминг">
							<div class="builder_checkbox"></div>
							<div class="builder_checkbox_title">Видео и Стриминг
								<div class="builder_checkbox_subtitle">Монтаж видео, TWITCH</div>
							</div>
						</label>
						<label class="builder_checkbox_label">
							<input type="checkbox" value="Работа и офис">
							<div class="builder_checkbox"></div>
							<div class="builder_checkbox_title">Работа и офис
								<div class="builder_checkbox_subtitle">Photoshop, AutoCAD, 1С, Excel</div>
							</div>
						</label>
					</div>
					<div class="builder_input_title">Введите сообщение</div>
					<textarea class="builder_textarea" placeholder="Комментарий"></textarea>
				</div>
			</form>
			<div class="builder_form_btn">Получить консультацию
				<div class="big_pulse"></div>
			</div>
		</div>
	</div>
	
	<footer class="footer footer_add">
		<div class="wrapper clearfix">
			<div class="logo">
				<img src="img/logo-new.png">
			</div>	
				<div class="who_made">Разработка сайта <a href="http://pynex.co" target="_blank"> PYNEX STUDIO</a></div>
			<div class="header_phones">
				<div class="header_phones_title">Бесплатно со всех номеров Украины</div>
				<div class="header_phones_nubmer">0 800 753 853</div>	
			</div>
			<a href="https://vk.com/im?sel=-101179801" class="vk_consult vk_consult_main_page" target="_blank">
				<div class="vk_consult_image">
					<div class="vk_pulse_wrapper">
						<div class="pulse"></div>
					</div>
					<img src="img/vk_btn.png">
				</div>
				<div class="vk_consult_info">
					<div class="vk_consult_title">Консультант<br>Вконтакте</div>
					<div class="vk_consult_online">online</div>
				</div>
			</a>
		</div>
	</footer>
		



<!— Yandex.Metrika counter —>
<script type="text/javascript">
(function (d, w, c) {
(w[c] = w[c] || []).push(function() {
try {
w.yaCounter39573860 = new Ya.Metrika({
id:39573860,
clickmap:true,
trackLinks:true,
accurateTrackBounce:true,
webvisor:true,
trackHash:true
});
} catch(e) { }
});

var n = d.getElementsByTagName("script")[0],
s = d.createElement("script"),
f = function () { n.parentNode.insertBefore(s, n); };
s.type = "text/javascript";
s.async = true;
s.src = "https://mc.yandex.ru/metrika/watch.js";

if (w.opera == "[object Opera]") {
d.addEventListener("DOMContentLoaded", f, false);
} else { f(); }
})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/39573860" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!— /Yandex.Metrika counter —>
<script type="text/javascript">(window.Image ? (new Image()) : document.createElement('img')).src = location.protocol + '//vk.com/rtrg?r=ZVAYFxvg/jkiju3YBH6sWFdRItFtZh75tsHv6Qka7Q*IGob4QogkLZWM*T6lyCI0wOXQ4n3OPwvvXB7Dmh8XbRq3zpxw4enADadJ8P8xFZMiQthkln9bxaGns8JXiX9ucoVuvbflmQCzlrC2ZppaTWuG/26NhIVx1QaG5/Zok/U-&pixel_id=1000034299';</script>

<!— /binotel —>	
<script type="text/javascript">
	  (function(d, w, s) {
		var widgetHash = 'uu234o00g51slsn9vyfg', gcw = d.createElement(s); gcw.type = 'text/javascript'; gcw.async = true;
		gcw.src = '//widgets.binotel.com/getcall/widgets/'+ widgetHash +'.js';
		var sn = d.getElementsByTagName(s)[0]; sn.parentNode.insertBefore(gcw, sn);
	  })(document, window, 'script');
	</script>
	
<!— /jumpout —>	

<script async src="//files.jumpoutpopup.ru/57647c5a1861c79d22c4.js"></script>

<script src="//assets.pcrl.co/js/jstracker.min.js"></script>


<!— BEGIN JIVOSITE CODE {literal} —>
<script type='text/javascript'>
(function(){ var widget_id = 'TMTTm0slZf';var d=document;var w=window;function l(){
var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();</script>
<!— {/literal} END JIVOSITE CODE —>




</body>
</html>


















