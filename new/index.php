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
	<title>Купить компьютер - Регард.com | Продажа компьютеров в Киеве, Харькове, Одессе, Львове: цена, отзывы.</title>
	<meta name="description" content="Купить компьютер в интернет-магазине Регард.com Тел. ☎ 0(800)753-853. Продажа компьютеров, ❤ лучшие цены, ❤ бесплатная доставка, ❤ гарантия!">
	<meta name="keywords" content="Настольные компьютеры купить, цены, отзывы, характеристики, видео, аксессуары, описание, рейтинг, регард, regard, игровой компьютер">
	<link rel="stylesheet" type="text/css" href="css/style.css">
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
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta property="og:type"   content="website" />
	<meta property="og:title"  content="Регард.com" />
	<meta property="og:description"  content="Купить компьютер в интернет-магазине Регард.com Тел. ☎ 0(800)753-853. Продажа компьютеров, ❤ лучшие цены, ❤ бесплатная доставка, ❤ гарантия!" />
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
	<script src="js/script.js"></script>
	<script src="js/number.js"></script>
	<script src="js/popup.js"></script>
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
	<script type="text/javascript">
		var ppPercentPrice = 0;
		$(document).ready(function(){

			$('.certificate_link').magnificPopup({
  				type: 'image'
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
				max:70000,
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
	   				if( blockMaxValue > 70000 ){
	   					blockMaxValue = 70000;
	   					$(this).val(blockMaxValue);
	   				}
	   				$('.slider_block_price').slider( { values:[blockMinValue,blockMaxValue], } )
	   		});

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

		    $('.privat_second_slider').slider({
		    	min: 0,
			    max: 100000,
			    value: 10000,
			    range: "min",
			    classes: {
	   				"ui-slider": "privat_first_ui_slider",
	  				"ui-slider-handle": "privat_first_ui_handle",
	  				"ui-slider-range": "privat_first_ui_range"
	   			},
			    slide : function (event, ui){
	   				$('.item_cost_field').val(ui.value);
	   				currentValue = ui.value
	   				changePaySum();
	   			}
			    })
	   			$('.item_cost_field').on('keyup', function(){
	   				currentValue = Number( $(this).val() );
	   				if( currentValue > 100000 ){
	   					currentValue = 100000;
	   					$(this).val(currentValue);
	   				}
	   				$('.privat_second_slider').slider( 'value', currentValue )
	   				changePaySum();
	   			})

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

	<div class="scroll_nav_bar">
		<div class="wrapper">
			<div class="nav_bar">
				<a href="#computers" class="nav_bar_item scrolltoTop">Компьютеры</a>
				<div class="nav_bar_separator"></div>
				<a href="#builder" class="nav_bar_item scrollto yellow_nav_item">
					Easy builder
					<img src="img/new_nav.png">
				</a>
				<div class="nav_bar_separator"></div>
				<a href="#price" class="nav_bar_item scrollto">Скачать прайс</a>
				<div class="nav_bar_separator"></div>
				<a href="#how_to_buy" class="nav_bar_item scrollto">Как купить компьютер</a>
				<div class="nav_bar_separator"></div>
				<a href="#comments" class="nav_bar_item scrollto">Отзывы</a>
				<div class="nav_bar_separator"></div>
				<a href="#contacts" class="nav_bar_item scrollto">Контакты</a>
			</div>
		</div>
	</div>
	<div class="header clearfix">
		<div class="wrapper">
			<a href="">
				<div class="logo">
					<img src="img/logo.svg">
					<h3>Компьютеры по цене комплектующих</h3>
				</div>
			</a>
			<div class="mobile_menu_btn">
				<div class="mobile_menu_inner mob_inner_top"></div>
				<div class="mobile_menu_inner mob_inner_mid"></div>
				<div class="mobile_menu_inner mob_inner_bottom"></div>
			</div>
			<div class="callback_btn">Заказать звонок
				<div class="pulse"></div>
			</div>
			<div class="header_phones">
				<div class="header_phones_title">Бесплатно со всех номеров Украины</div>
				<div class="header_phones_nubmer">0 800 753 853</div>
				<div class="header_phones_inner">
					<div class="header_info_inner_block">
						ПН - ПТ с 10:00 до 19:00
					</div>
					<div class="header_info_inner_block">
						СБ - выходной
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
			<div class="mobile_menu_block">
				<a href="#computers" class="nav_bar_item  nav_bar_item_mobile scrollto">Компьютеры</a>
				<a href="#builder" class="nav_bar_item nav_bar_item_mobile  scrollto yellow_nav_item">
					Easy builder
					<img src="img/new_nav.png">
				</a>
				<a href="#price" class="nav_bar_item nav_bar_item_mobile  scrollto">Скачать прайс</a>
				<a href="#how_to_buy" class="nav_bar_item nav_bar_item_mobile  scrollto">Как купить компьютер</a>
				<a href="#comments" class="nav_bar_item nav_bar_item_mobile  scrollto">Отзывы</a>
				<a href="#contacts" class="nav_bar_item nav_bar_item_mobile  scrollto">Контакты</a>
				<a href="https://vk.com/im?sel=-101179801" target="_blank" class="nav_bar_item nav_bar_item_mobile"><span style="border-bottom:1px dotted #333333;">Консультант ВК</span></a>
				<a href="tel:0800753853" class="nav_bar_item nav_bar_item_mobile"><span style="border-bottom:1px dotted #333333;">0 800 753 853</span></a>
			</div>
		</div>
	</div>
	<div class="main_screen">
		<div class="wrapper clearfix">
			<div class="nav_bar">
				<a href="#computers" class="nav_bar_item scrolltoTop">Компьютеры</a>
				<div class="nav_bar_separator"></div>
				<a href="#builder" class="nav_bar_item scrollto yellow_nav_item">
					Easy builder
					<img src="img/new_nav.png">
				</a>
				<div class="nav_bar_separator"></div>
				<a href="#price" class="nav_bar_item scrollto">Скачать прайс</a>
				<div class="nav_bar_separator"></div>
				<a href="#how_to_buy" class="nav_bar_item scrollto">Как купить компьютер</a>
				<div class="nav_bar_separator"></div>
				<a href="#comments" class="nav_bar_item scrollto">Отзывы</a>
				<div class="nav_bar_separator"></div>
				<a href="#contacts" class="nav_bar_item scrollto">Контакты</a>
			</div>
			<h1>Купи игровой компьютер<br>по цене комплектующих<br>с доставкой в г. <span class="user_city"><? echo $city_name; ?></span>
			</h1>
			<h2><div class="red_line"></div>Бесплатная доставка в г. <span class="user_city"><? echo $city_name; ?></span></h2>
			<h2><div class="red_line"></div>Мгновенная рассрочка от Приват Банка</h2>
			<h2><div class="red_line"></div>Цены ниже среднерыночных на 15-17%</h2>
			<div class="main_screen_btn">
				<a href="#computers" class="pick_computer scrolltoTop">Подобрать компьютер
					<div class="big_pulse"></div>
				</a>
				<div class="either">Или</div>
				<div class="main_screen_modal">
					<div class="main_screen_modal_price">СКАЧАТЬ ПРАЙС НА 70 КОМПЬЮТЕРОВ</div>
					<div class="main_screen_modal_consult">Получить бесплатную консультацию</div>
					<div class="close_modal">
					</div>
				</div>
			</div>
			<img class="main_screen_computer" src="img/bg_computer.png">
		</div>
	</div>
	<div class="products_block" id="computers">
		<div class="wrapper">
			<h2>Лучшие игровые компьютеры 2017</h2>
			<h3>Каждый компьютер Регард протестирован
			в новейших играх,<br> FPS измерен в разных разрешениях на разных настройках качества</h3>
			<div class="products_container">
				<div class="product_block">
				<a href="AVENTADOR_X299.php" target="_blank">
					<div class="blue_part">
						<img class="product_block_img" src="img/aventador.png">
					</div>
					<div class="white_part">
						<div class="product_title"><span>AVENTADOR X299</span></div>
						<div class="product_subtitle">FPS FullHD 1920x1080 Ultra</div>
						<div class="fps_container clearfix">
							<div class="fps_game">Doom 4</div>
							<div class="fps_scale">
								<div class="fps_scale_filler" style="width:<? echo $base->computers->comp[9]->games->game[0]->percent[2]; ?>%; background-color: <? echo $base->computers->comp[9]->games->game[0]->color[2]; ?>"></div>
							</div>
							<div class="fps_num" style="color: <? echo $base->computers->comp[9]->games->game[0]->color[2]; ?>"><? echo $base->computers->comp[9]->games->game[0]->fps; ?> fps</div>
						</div>
						<div class="fps_container clearfix">
							<div class="fps_game">Overwatch</div>
							<div class="fps_scale">
								<div class="fps_scale_filler" style="width:<? echo $base->computers->comp[9]->games->game[5]->percent[2]; ?>%; background-color: <? echo $base->computers->comp[9]->games->game[5]->color[2]; ?>"></div>
							</div>
							<div class="fps_num" style="color: <? echo $base->computers->comp[9]->games->game[5]->color[2]; ?>"><? echo $base->computers->comp[9]->games->game[5]->fps; ?> fps</div>
						</div>
						<div class="fps_container clearfix">
							<div class="fps_game">Battlefield 1</div>
							<div class="fps_scale">
								<div class="fps_scale_filler" style="width:<? echo $base->computers->comp[9]->games->game[1]->percent[2]; ?>%; background-color: <? echo $base->computers->comp[9]->games->game[1]->color[2]; ?>"></div>
							</div>
							<div class="fps_num" style="color: <? echo $base->computers->comp[9]->games->game[1]->color[2]; ?>"><? echo $base->computers->comp[9]->games->game[1]->fps; ?> fps</div>
						</div>
						<div class="fps_container clearfix">
							<div class="fps_game">CS:GO</div>
							<div class="fps_scale">
								<div class="fps_scale_filler" style="width:<? echo $base->computers->comp[9]->games->game[2]->percent[2]; ?>%; background-color: <? echo $base->computers->comp[9]->games->game[2]->color[2]; ?>"></div>
							</div>
							<div class="fps_num" style="color: <? echo $base->computers->comp[9]->games->game[2]->color[2]; ?>"><? echo $base->computers->comp[9]->games->game[2]->fps; ?> fps</div>
						</div>
						<div class="fps_container clearfix">
							<div class="fps_game">GTA 5</div>
							<div class="fps_scale">
								<div class="fps_scale_filler" style="width:<? echo $base->computers->comp[9]->games->game[3]->percent[2]; ?>%; background-color: <? echo $base->computers->comp[9]->games->game[3]->color[2]; ?>"></div>
							</div>
							<div class="fps_num" style="color: <? echo $base->computers->comp[9]->games->game[3]->color[2]; ?>"><? echo $base->computers->comp[9]->games->game[3]->fps; ?> fps</div>
						</div>
						<table>
							<tr>
								<td>i7-7700K 4 ЯДРА</td>
								<td>2 x GTX 1080 8GB</td>
							</tr>
							<tr>
								<td>DDR4 16GB</td>
								<td>SSD 240GB</td>
							</tr>
						</table>
						<div class="btn_container clearfix">
							<div class="price_block">
								<div class="old_price_main_page"><? echo $base->computers->comp[9]->oldprice; ?></div>
								<div class="new_price_main_page"><? echo $base->computers->comp[9]->price; ?></div>
							</div>
							<div class="product_link"><img src="img/configurator.svg">Изменить</div>
						</div>
					</div>
				</a>
				</div>
				<div class="product_block">
				<a href="raven-x-treme.html" target="_blank">
					<div class="blue_part">
						<img class="product_block_img" src="img/i7+1070.png">
					</div>
					<div class="white_part">
						<div class="product_title"><span>Raven X-Treme</span></div>
						<div class="product_subtitle">FPS FullHD 1920x1080 Ultra</div>
						<div class="fps_container clearfix">
							<div class="fps_game">Doom 4</div>
							<div class="fps_scale">
								<div class="fps_scale_filler" style="width:<? echo $base->computers->comp[2]->games->game[0]->percent[2]; ?>%; background-color: <? echo $base->computers->comp[2]->games->game[0]->color[2]; ?>"></div>
							</div>
							<div class="fps_num" style="color: <? echo $base->computers->comp[2]->games->game[0]->color[2]; ?>"><? echo $base->computers->comp[2]->games->game[0]->fps; ?> fps</div>
						</div>
						<div class="fps_container clearfix">
							<div class="fps_game">Overwatch</div>
							<div class="fps_scale">
								<div class="fps_scale_filler" style="width:<? echo $base->computers->comp[2]->games->game[5]->percent[2]; ?>%; background-color: <? echo $base->computers->comp[2]->games->game[5]->color[2]; ?>"></div>
							</div>
							<div class="fps_num" style="color: <? echo $base->computers->comp[2]->games->game[5]->color[2]; ?>"><? echo $base->computers->comp[2]->games->game[5]->fps; ?> fps</div>
						</div>
						<div class="fps_container clearfix">
							<div class="fps_game">Battlefield 1</div>
							<div class="fps_scale">
								<div class="fps_scale_filler" style="width:<? echo $base->computers->comp[2]->games->game[1]->percent[2]; ?>%; background-color: <? echo $base->computers->comp[2]->games->game[1]->color[2]; ?>"></div>
							</div>
							<div class="fps_num" style="color: <? echo $base->computers->comp[2]->games->game[1]->color[2]; ?>"><? echo $base->computers->comp[2]->games->game[1]->fps; ?> fps</div>
						</div>
						<div class="fps_container clearfix">
							<div class="fps_game">CS:GO</div>
							<div class="fps_scale">
								<div class="fps_scale_filler" style="width:<? echo $base->computers->comp[2]->games->game[2]->percent[2]; ?>%; background-color: <? echo $base->computers->comp[2]->games->game[2]->color[2]; ?>"></div>
							</div>
							<div class="fps_num" style="color: <? echo $base->computers->comp[2]->games->game[2]->color[2]; ?>"><? echo $base->computers->comp[2]->games->game[2]->fps; ?> fps</div>
						</div>
						<div class="fps_container clearfix">
							<div class="fps_game">GTA 5</div>
							<div class="fps_scale">
								<div class="fps_scale_filler" style="width:<? echo $base->computers->comp[2]->games->game[3]->percent[2]; ?>%; background-color: <? echo $base->computers->comp[2]->games->game[3]->color[2]; ?>"></div>
							</div>
							<div class="fps_num" style="color: <? echo $base->computers->comp[2]->games->game[3]->color[2]; ?>"><? echo $base->computers->comp[2]->games->game[3]->fps; ?> fps</div>
						</div>
						<table>
							<tr>
								<td>i7-7700K 4 ЯДРА</td>
								<td>GTX 1080 8GB</td>
							</tr>
							<tr>
								<td>DDR4 16GB</td>
								<td>SSD 240GB</td>
							</tr>
						</table>
						<div class="btn_container clearfix">
							<div class="price_block">
								<div class="old_price_main_page"><? echo $base->computers->comp[2]->oldprice; ?></div>
								<div class="new_price_main_page"><? echo $base->computers->comp[2]->price; ?></div>
							</div>
							<div class="product_link"><img src="img/configurator.svg">Изменить</div>
						</div>
					</div>
				</a>
				</div>
				<div class="product_block">
				<a href="amd-ryzen.html" target="_blank">
					<div class="blue_part">
						<img class="product_block_img" src="img/rizen.png">
					</div>
					<div class="white_part">
						<div class="product_title"><span>AMD RYZEN</span></div>
						<div class="product_subtitle">FPS FullHD 1920x1080 Ultra</div>
						<div class="fps_container clearfix">
							<div class="fps_game">Doom 4</div>
							<div class="fps_scale">
								<div class="fps_scale_filler" style="width:<? echo $base->computers->comp[1]->games->game[0]->percent[2]; ?>%; background-color: <? echo $base->computers->comp[1]->games->game[0]->color[2]; ?>"></div>
							</div>
							<div class="fps_num" style="color: <? echo $base->computers->comp[1]->games->game[0]->color[2]; ?>"><? echo $base->computers->comp[1]->games->game[0]->fps; ?> fps</div>
						</div>
						<div class="fps_container clearfix">
							<div class="fps_game">Overwatch</div>
							<div class="fps_scale">
								<div class="fps_scale_filler" style="width:<? echo $base->computers->comp[1]->games->game[5]->percent[2]; ?>%; background-color: <? echo $base->computers->comp[1]->games->game[5]->color[2]; ?>"></div>
							</div>
							<div class="fps_num" style="color: <? echo $base->computers->comp[1]->games->game[5]->color[2]; ?>"><? echo $base->computers->comp[1]->games->game[5]->fps; ?> fps</div>
						</div>
						<div class="fps_container clearfix">
							<div class="fps_game">Battlefield 1</div>
							<div class="fps_scale">
								<div class="fps_scale_filler" style="width:<? echo $base->computers->comp[1]->games->game[1]->percent[2]; ?>%; background-color: <? echo $base->computers->comp[1]->games->game[1]->color[2]; ?>"></div>
							</div>
							<div class="fps_num" style="color: <? echo $base->computers->comp[1]->games->game[1]->color[2]; ?>"><? echo $base->computers->comp[1]->games->game[1]->fps; ?> fps</div>
						</div>
						<div class="fps_container clearfix">
							<div class="fps_game">CS:GO</div>
							<div class="fps_scale">
								<div class="fps_scale_filler" style="width:<? echo $base->computers->comp[1]->games->game[2]->percent[2]; ?>%; background-color: <? echo $base->computers->comp[1]->games->game[2]->color[2]; ?>"></div>
							</div>
							<div class="fps_num" style="color: <? echo $base->computers->comp[1]->games->game[2]->color[2]; ?>"><? echo $base->computers->comp[1]->games->game[2]->fps; ?> fps</div>
						</div>
						<div class="fps_container clearfix">
							<div class="fps_game">GTA 5</div>
							<div class="fps_scale">
								<div class="fps_scale_filler" style="width:<? echo $base->computers->comp[1]->games->game[3]->percent[2]; ?>%; background-color: <? echo $base->computers->comp[1]->games->game[3]->color[2]; ?>"></div>
							</div>
							<div class="fps_num" style="color: <? echo $base->computers->comp[1]->games->game[3]->color[2]; ?>"><? echo $base->computers->comp[1]->games->game[3]->fps; ?> fps</div>
						</div>
						<table>
							<tr>
								<td>AMD RYZEN 5 6-ЯДЕР</td>
								<td>GTX 1060 6GB</td>
							</tr>
							<tr>
								<td>DDR4 16GB</td>
								<td>SSD 120GB</td>
							</tr>
						</table>
						<div class="btn_container clearfix">
							<div class="price_block">
								<div class="old_price_main_page"><? echo $base->computers->comp[1]->oldprice; ?></div>
								<div class="new_price_main_page"><? echo $base->computers->comp[1]->price; ?></div>
							</div>
							<div class="product_link"><img src="img/configurator.svg">Изменить</div>
						</div>
					</div>
				</a>
				</div>
				<div class="product_block">
				<a href="griffin-power.html" target="_blank">
					<div class="blue_part">
						<img class="product_block_img" src="img/griffin_power.png">
					</div>
					<div class="white_part">
						<div class="product_title"><span>Griffin Power</span></div>
						<div class="product_subtitle">FPS FullHD 1920x1080 Ultra</div>
						<div class="fps_container clearfix">
							<div class="fps_game">Doom 4</div>
							<div class="fps_scale">
								<div class="fps_scale_filler" style="width:<? echo $base->computers->comp[0]->games->game[0]->percent[2]; ?>%; background-color: <? echo $base->computers->comp[0]->games->game[0]->color[2]; ?>"></div>
							</div>
							<div class="fps_num" style="color: <? echo $base->computers->comp[0]->games->game[0]->color[2]; ?>"><? echo $base->computers->comp[0]->games->game[0]->fps; ?> fps</div>
						</div>
						<div class="fps_container clearfix">
							<div class="fps_game">Overwatch</div>
							<div class="fps_scale">
								<div class="fps_scale_filler" style="width:<? echo $base->computers->comp[0]->games->game[5]->percent[2]; ?>%; background-color: <? echo $base->computers->comp[0]->games->game[5]->color[2]; ?>"></div>
							</div>
							<div class="fps_num" style="color: <? echo $base->computers->comp[0]->games->game[5]->color[2]; ?>"><? echo $base->computers->comp[0]->games->game[5]->fps; ?> fps</div>
						</div>
						<div class="fps_container clearfix">
							<div class="fps_game">Battlefield 1</div>
							<div class="fps_scale">
								<div class="fps_scale_filler" style="width:<? echo $base->computers->comp[0]->games->game[1]->percent[2]; ?>%; background-color: <? echo $base->computers->comp[0]->games->game[1]->color[2]; ?>"></div>
							</div>
							<div class="fps_num" style="color: <? echo $base->computers->comp[0]->games->game[1]->color[2]; ?>"><? echo $base->computers->comp[0]->games->game[1]->fps; ?> fps</div>
						</div>
						<div class="fps_container clearfix">
							<div class="fps_game">For honor</div>
							<div class="fps_scale">
								<div class="fps_scale_filler" style="width:<? echo $base->computers->comp[0]->games->game[2]->percent[2]; ?>%; background-color: <? echo $base->computers->comp[0]->games->game[2]->color[2]; ?>"></div>
							</div>
							<div class="fps_num" style="color: <? echo $base->computers->comp[0]->games->game[2]->color[2]; ?>"><? echo $base->computers->comp[0]->games->game[2]->fps; ?> fps</div>
						</div>
						<div class="fps_container clearfix">
							<div class="fps_game">GTA 5</div>
							<div class="fps_scale">
								<div class="fps_scale_filler" style="width:<? echo $base->computers->comp[0]->games->game[3]->percent[2]; ?>%; background-color: <? echo $base->computers->comp[0]->games->game[3]->color[2]; ?>"></div>
							</div>
							<div class="fps_num" style="color: <? echo $base->computers->comp[0]->games->game[3]->color[2]; ?>"><? echo $base->computers->comp[0]->games->game[3]->fps; ?> fps</div>
						</div>
						<table>
							<tr>
								<td>i5-7400 4 ЯДРА</td>
								<td>GTX 1060 6GB</td>
							</tr>
							<tr>
								<td>DDR4 16GB</td>
								<td>SSD 120GB</td>
							</tr>
						</table>
						<div class="btn_container clearfix">
							<div class="price_block">
								<div class="old_price_main_page"><? echo $base->computers->comp[0]->oldprice; ?></div>
								<div class="new_price_main_page"><? echo $base->computers->comp[0]->price; ?></div>
							</div>
							<div class="product_link"><img src="img/configurator.svg">Изменить</div>
						</div>
					</div>
				</a>
				</div>
				<div class="product_block">
				<a href="pro-gamer-3000.html" target="_blank">
					<div class="blue_part">
						<img class="product_block_img" src="img/progamer3000.png">
						<!-- <div class="top_sale">Топ Продаж</div> -->
					</div>
					<div class="white_part">
						<div class="product_title"><span>Pro Gamer 3000</span></div>
						<div class="product_subtitle">FPS FullHD 1920x1080 High</div>
						<div class="fps_container clearfix">
							<div class="fps_game">Doom 4</div>
							<div class="fps_scale">
								<div class="fps_scale_filler fps_scale_filler_2" style="width:<? echo $base->computers->comp[5]->games->game[0]->percent[2]; ?>%; background-color: <? echo $base->computers->comp[5]->games->game[0]->color[2]; ?>"></div>
							</div>
							<div class="fps_num fps_num_2" style="color: <? echo $base->computers->comp[5]->games->game[0]->color[2]; ?>"><? echo $base->computers->comp[5]->games->game[0]->fps; ?> fps</div>
						</div>
						<div class="fps_container clearfix">
							<div class="fps_game">Overwatch</div>
							<div class="fps_scale">
								<div class="fps_scale_filler fps_scale_filler_2" style="width:<? echo $base->computers->comp[5]->games->game[5]->percent[2]; ?>%; background-color: <? echo $base->computers->comp[5]->games->game[5]->color[2]; ?>"></div>
							</div>
							<div class="fps_num fps_num_2" style="color: <? echo $base->computers->comp[5]->games->game[5]->color[2]; ?>"><? echo $base->computers->comp[5]->games->game[5]->fps; ?> fps</div>
						</div>
						<div class="fps_container clearfix">
							<div class="fps_game">Battlefield 1</div>
							<div class="fps_scale">
								<div class="fps_scale_filler fps_scale_filler_2" style="width:<? echo $base->computers->comp[5]->games->game[1]->percent[2]; ?>%; background-color: <? echo $base->computers->comp[5]->games->game[1]->color[2]; ?>"></div>
							</div>
							<div class="fps_num fps_num_2" style="color: <? echo $base->computers->comp[5]->games->game[1]->color[2]; ?>"><? echo $base->computers->comp[5]->games->game[1]->fps; ?> fps</div>
						</div>
						<div class="fps_container clearfix">
							<div class="fps_game">For honor</div>
							<div class="fps_scale">
								<div class="fps_scale_filler fps_scale_filler_2" style="width:<? echo $base->computers->comp[5]->games->game[2]->percent[2]; ?>%; background-color: <? echo $base->computers->comp[5]->games->game[2]->color[2]; ?>"></div>
							</div>
							<div class="fps_num fps_num_2" style="color: <? echo $base->computers->comp[5]->games->game[2]->color[2]; ?>"><? echo $base->computers->comp[5]->games->game[2]->fps; ?> fps</div>
						</div>
						<div class="fps_container clearfix">
							<div class="fps_game">GTA 5</div>
							<div class="fps_scale">
								<div class="fps_scale_filler fps_scale_filler_2" style="width:<? echo $base->computers->comp[5]->games->game[3]->percent[2]; ?>%; background-color: <? echo $base->computers->comp[5]->games->game[3]->color[2]; ?>"></div>
							</div>
							<div class="fps_num fps_num_2" style="color: <? echo $base->computers->comp[5]->games->game[3]->color[2]; ?>"><? echo $base->computers->comp[5]->games->game[3]->fps; ?> fps</div>
						</div>
						<table>
							<tr>
								<td>Intel G4560 2 ЯДРА</td>
								<td>GTX 1050 Ti 4GB</td>
							</tr>
							<tr>
								<td>DDR4 8GB</td>
								<td>HDD 500GB</td>
							</tr>
						</table>
						<div class="btn_container clearfix">
							<div class="price_block">
								<div class="old_price_main_page"><? echo $base->computers->comp[5]->oldprice; ?></div>
								<div class="new_price_main_page"><? echo $base->computers->comp[5]->price; ?></div>
							</div>
							<div class="product_link"><img src="img/configurator.svg">Изменить</div>
						</div>
					</div>
				</a>
				</div>
				<div class="product_block">
				<a href="dominator-ultra.html" target="_blank">
					<div class="blue_part">
						<img class="product_block_img" src="img/dominator.png">
						<!-- <div class="top_sale">Топ Продаж</div> -->
					</div>
					<div class="white_part">
						<div class="product_title"><span>Dominator Ultra</span></div>
						<div class="product_subtitle">FPS FullHD 1920x1080 High</div>
						<div class="fps_container clearfix">
							<div class="fps_game">Doom 4</div>
							<div class="fps_scale">
								<div class="fps_scale_filler fps_scale_filler_2" style="width:<? echo $base->computers->comp[3]->games->game[0]->percent[2]; ?>%; background-color: <? echo $base->computers->comp[3]->games->game[0]->color[2]; ?>"></div>
							</div>
							<div class="fps_num fps_num_2" style="color: <? echo $base->computers->comp[3]->games->game[0]->color[2]; ?>"><? echo $base->computers->comp[3]->games->game[0]->fps; ?> fps</div>
						</div>
						<div class="fps_container clearfix">
							<div class="fps_game">Overwatch</div>
							<div class="fps_scale">
								<div class="fps_scale_filler fps_scale_filler_2" style="width:<? echo $base->computers->comp[3]->games->game[5]->percent[2]; ?>%; background-color: <? echo $base->computers->comp[3]->games->game[5]->color[2]; ?>"></div>
							</div>
							<div class="fps_num fps_num_2" style="color: <? echo $base->computers->comp[3]->games->game[5]->color[2]; ?>"><? echo $base->computers->comp[3]->games->game[5]->fps; ?> fps</div>
						</div>
						<div class="fps_container clearfix">
							<div class="fps_game">Battlefield 1</div>
							<div class="fps_scale">
								<div class="fps_scale_filler fps_scale_filler_2" style="width:<? echo $base->computers->comp[3]->games->game[1]->percent[2]; ?>%; background-color: <? echo $base->computers->comp[3]->games->game[1]->color[2]; ?>"></div>
							</div>
							<div class="fps_num fps_num_2" style="color: <? echo $base->computers->comp[3]->games->game[1]->color[2]; ?>"><? echo $base->computers->comp[3]->games->game[1]->fps; ?> fps</div>
						</div>
						<div class="fps_container clearfix">
							<div class="fps_game">For honor</div>
							<div class="fps_scale">
								<div class="fps_scale_filler fps_scale_filler_2" style="width:<? echo $base->computers->comp[3]->games->game[2]->percent[2]; ?>%; background-color: <? echo $base->computers->comp[3]->games->game[2]->color[2]; ?>"></div>
							</div>
							<div class="fps_num fps_num_2" style="color: <? echo $base->computers->comp[3]->games->game[2]->color[2]; ?>"><? echo $base->computers->comp[3]->games->game[2]->fps; ?> fps</div>
						</div>
						<div class="fps_container clearfix">
							<div class="fps_game">GTA 5</div>
							<div class="fps_scale">
								<div class="fps_scale_filler fps_scale_filler_2" style="width:<? echo $base->computers->comp[3]->games->game[3]->percent[2]; ?>%; background-color: <? echo $base->computers->comp[3]->games->game[3]->color[2]; ?>"></div>
							</div>
							<div class="fps_num fps_num_2" style="color: <? echo $base->computers->comp[3]->games->game[3]->color[2]; ?>"><? echo $base->computers->comp[3]->games->game[3]->fps; ?> fps</div>
						</div>
						<table>
							<tr>
								<td>FX-4300 4 ЯДРА</td>
								<td>GTX 750 Ti 2GB</td>
							</tr>
							<tr>
								<td>DDR3 8GB</td>
								<td>HDD 500GB</td>
							</tr>
						</table>
						<div class="btn_container clearfix">
							<div class="price_block">
								<div class="old_price_main_page"><? echo $base->computers->comp[3]->oldprice; ?></div>
								<div class="new_price_main_page"><? echo $base->computers->comp[3]->price; ?></div>
							</div>
							<div class="product_link"><img src="img/configurator.svg">Изменить</div>
						</div>
					</div>
				</a>
				</div>
				<div class="product_block">
					<!-- <div class="cashback">
								вернем<br><span>10%</span>
								<div class="caschback_inner">
									<div class="left_triangle"></div>
									<div class="cashback_popup">
										<h3>Вернем 10%</h3>
										<p><span>ОФОРМИТЕ ЗАКАЗ НА САЙТЕ И ПОЛУЧИТЕ ПЕРСОНАЛЬНУЮ ВЫГОДУ 10%.</span>
										 Акция доступна только при покупке за наличный расчет и в доставку Новой Почтой. Не распространяется на заказы оформленные в оплату частями.</p>
									</div>
								</div>
							</div>
							<div class="pp_mini_block">Оплата частями<br>
								<img src="img/pp_logo.jpg" class="pp_mini_block_img"><span>7</span>
								<div class="pp_inner">
									<div class="left_triangle"></div>
									<div class="pp_popup">
										<h3>Оплата частями от<br>приватбанкa!</h3>
										<p>Этот товар можно оплатить частями. Без переплат!</p>
										<div class="pp_bold">Все, что вам нужно:</div>
										<div>
											<div class="pp_num">1</div>
											<div class="pp_title">Наличие карты ПриватБанк</div>
										</div>
										<div class="pp_img">
											<img src="img/cards.png">
										</div>
										<div>
											<div class="pp_num">2</div>
											<div class="pp_title">Доступный лимит</div>
										</div>
										<p style="padding-left:20px;font-size:12px;margin-top:10px;">Как узнать максимальную сумму покупки по сервису Оплата Частями? Отпавьте SMS на номер <span style="font-size:12px;font-weight:700;">10060</span> с текстом <span style="font-size:12px;font-weight:700;">chast</span></p>
										<div class="pp_bold">У Вас нет карты? Оформить карту <a href="https://privatbank.ua/platezhnie-karty/universalna" target="_blank">сейчас</a></div>
									</div>
								</div>
							</div> -->
				<a href="world-of-tanks.html" target="_blank">
					<div class="blue_part">
						<img class="product_block_img" src="img/wot730.png">
						<!-- <img src="img/skidka.png" class="skidka_img"> -->
						<!-- <div class="top_sale">Топ Продаж</div> -->
					</div>
					<div class="white_part">
						<div class="product_title"><span>World of Tanks</span></div>
						<div class="product_subtitle">FPS HD 1366x768 Medium</div>
						<div class="fps_container clearfix">
							<div class="fps_game">GTA 5</div>
							<div class="fps_scale">
								<div class="fps_scale_filler fps_scale_filler_3" style="width:<? echo $base->computers->comp[8]->games->game[5]->percent[2]; ?>%; background-color: <? echo $base->computers->comp[8]->games->game[5]->color[2]; ?>"></div>
							</div>
							<div class="fps_num fps_num_3" style="color: <? echo $base->computers->comp[8]->games->game[5]->color[2]; ?>"><? echo $base->computers->comp[8]->games->game[5]->fps; ?> fps</div>
						</div>
						<div class="fps_container clearfix">
							<div class="fps_game">CS:GO</div>
							<div class="fps_scale">
								<div class="fps_scale_filler fps_scale_filler_3" style="width:<? echo $base->computers->comp[8]->games->game[0]->percent[2]; ?>%; background-color: <? echo $base->computers->comp[8]->games->game[0]->color[2]; ?>"></div>
							</div>
							<div class="fps_num fps_num_3" style="color: <? echo $base->computers->comp[8]->games->game[0]->color[2]; ?>"><? echo $base->computers->comp[8]->games->game[0]->fps; ?> fps</div>
						</div>
						<div class="fps_container clearfix">
							<div class="fps_game">Warships</div>
							<div class="fps_scale">
								<div class="fps_scale_filler fps_scale_filler_3" style="width:<? echo $base->computers->comp[8]->games->game[3]->percent[2]; ?>%; background-color: <? echo $base->computers->comp[8]->games->game[3]->color[2]; ?>"></div>
							</div>
							<div class="fps_num fps_num_3" style="color: <? echo $base->computers->comp[8]->games->game[3]->color[2]; ?>"><? echo $base->computers->comp[8]->games->game[3]->fps; ?> fps</div>
						</div>
						<div class="fps_container clearfix">
							<div class="fps_game" style="text-transform:none;">World of Tanks</div>
							<div class="fps_scale">
								<div class="fps_scale_filler fps_scale_filler_3" style="width:<? echo $base->computers->comp[8]->games->game[1]->percent[2]; ?>%; background-color: <? echo $base->computers->comp[8]->games->game[1]->color[2]; ?>"></div>
							</div>
							<div class="fps_num fps_num_3" style="color: <? echo $base->computers->comp[8]->games->game[1]->color[2]; ?>"><? echo $base->computers->comp[8]->games->game[1]->fps; ?> fps</div>
						</div>
						<div class="fps_container clearfix">
							<div class="fps_game">War Thunder</div>
							<div class="fps_scale">
								<div class="fps_scale_filler fps_scale_filler_3" style="width:<? echo $base->computers->comp[8]->games->game[4]->percent[2]; ?>%; background-color: <? echo $base->computers->comp[8]->games->game[4]->color[2]; ?>"></div>
							</div>
							<div class="fps_num fps_num_3" style="color: <? echo $base->computers->comp[8]->games->game[4]->color[2]; ?>"><? echo $base->computers->comp[8]->games->game[4]->fps; ?> fps</div>
						</div>
						<table>
							<tr>
								<td>Intel G3900 2 ЯДРА</td>
								<td>GT 730 2GB</td>
							</tr>
							<tr>
								<td>DDR4 4GB</td>
								<td>HDD 320GB</td>
							</tr>
						</table>
						<div class="btn_container clearfix">
							<div class="price_block">
								<div class="old_price_main_page"><? echo $base->computers->comp[8]->oldprice; ?></div>
								<div class="new_price_main_page"><? echo $base->computers->comp[8]->price; ?></div>
							</div>
							<div class="product_link"><img src="img/configurator.svg">Изменить</div>
						</div>
					</div>
				</a>
				</div>
				<div class="product_block">
					<!-- <div class="cashback">
								вернем<br><span>15%</span>
								<div class="caschback_inner">
									<div class="left_triangle"></div>
									<div class="cashback_popup">
										<h3>Вернем 15%</h3>
										<p><span>ОФОРМИТЕ ЗАКАЗ НА САЙТЕ И ПОЛУЧИТЕ ПЕРСОНАЛЬНУЮ ВЫГОДУ 15%.</span>
										 Акция доступна только при покупке за наличный расчет и в доставку Новой Почтой. Не распространяется на заказы оформленные в оплату частями.</p>
									</div>
								</div>
							</div> -->
							<div class="pp_mini_block">Оплата частями<br>
								<img src="img/pp_logo.jpg" class="pp_mini_block_img"><span>3</span>
								<div class="pp_inner">
									<div class="left_triangle"></div>
									<div class="pp_popup">
										<h3>Оплата частями от<br>приватбанкa!</h3>
										<p>Этот товар можно оплатить частями. Без переплат!</p>
										<div class="pp_bold">Все, что вам нужно:</div>
										<div>
											<div class="pp_num">1</div>
											<div class="pp_title">Наличие карты ПриватБанк</div>
										</div>
										<div class="pp_img">
											<img src="img/cards.png">
										</div>
										<div>
											<div class="pp_num">2</div>
											<div class="pp_title">Доступный лимит</div>
										</div>
										<p style="padding-left:20px;font-size:12px;margin-top:10px;">Как узнать максимальную сумму покупки по сервису Оплата Частями? Отпавьте SMS на номер <span style="font-size:12px;font-weight:700;">10060</span> с текстом <span style="font-size:12px;font-weight:700;">chast</span></p>
										<div class="pp_bold">У Вас нет карты? Оформить карту <a href="https://privatbank.ua/platezhnie-karty/universalna" target="_blank">сейчас</a></div>
									</div>
								</div>
							</div>
							<div class="lider"><span style="font-size:13px;">лидер</span><br>продаж</div>
				<a href="back-to-school.html" target="_blank">
					<div class="blue_part">
						<img class="product_block_img" src="img/backtoschool.png">
					</div>
					<div class="white_part">
						<div class="product_title"><span>Back To School</span></div>
						<div class="product_subtitle">FPS HD 1366x768 Medium</div>
						<div class="fps_container clearfix">
							<div class="fps_game">GTA 5</div>
							<div class="fps_scale">
								<div class="fps_scale_filler fps_scale_filler_3" style="width:<? echo $base->computers->comp[7]->games->game[5]->percent[2]; ?>%; background-color: <? echo $base->computers->comp[7]->games->game[5]->color[2]; ?>"></div>
							</div>
							<div class="fps_num fps_num_3" style="color: <? echo $base->computers->comp[7]->games->game[5]->color[2]; ?>"><? echo $base->computers->comp[7]->games->game[5]->fps; ?> fps</div>
						</div>
						<div class="fps_container clearfix">
							<div class="fps_game">CS:GO</div>
							<div class="fps_scale">
								<div class="fps_scale_filler fps_scale_filler_3" style="width:<? echo $base->computers->comp[7]->games->game[0]->percent[2]; ?>%; background-color: <? echo $base->computers->comp[7]->games->game[0]->color[2]; ?>"></div>
							</div>
							<div class="fps_num fps_num_3" style="color: <? echo $base->computers->comp[7]->games->game[0]->color[2]; ?>"><? echo $base->computers->comp[7]->games->game[0]->fps; ?> fps</div>
						</div>
						<div class="fps_container clearfix">
							<div class="fps_game">Warships</div>
							<div class="fps_scale">
								<div class="fps_scale_filler fps_scale_filler_3" style="width:<? echo $base->computers->comp[7]->games->game[3]->percent[2]; ?>%; background-color: <? echo $base->computers->comp[7]->games->game[3]->color[2]; ?>"></div>
							</div>
							<div class="fps_num fps_num_3" style="color: <? echo $base->computers->comp[7]->games->game[3]->color[2]; ?>"><? echo $base->computers->comp[7]->games->game[3]->fps; ?> fps</div>
						</div>
						<div class="fps_container clearfix">
							<div class="fps_game" style="text-transform:none;">World of Tanks</div>
							<div class="fps_scale">
								<div class="fps_scale_filler fps_scale_filler_3" style="width:<? echo $base->computers->comp[7]->games->game[1]->percent[2]; ?>%; background-color: <? echo $base->computers->comp[7]->games->game[1]->color[2]; ?>"></div>
							</div>
							<div class="fps_num fps_num_3" style="color: <? echo $base->computers->comp[7]->games->game[1]->color[2]; ?>"><? echo $base->computers->comp[7]->games->game[1]->fps; ?> fps</div>
						</div>
						<div class="fps_container clearfix">
							<div class="fps_game">War Thunder</div>
							<div class="fps_scale">
								<div class="fps_scale_filler fps_scale_filler_3" style="width:<? echo $base->computers->comp[7]->games->game[4]->percent[2]; ?>%; background-color: <? echo $base->computers->comp[7]->games->game[4]->color[2]; ?>"></div>
							</div>
							<div class="fps_num fps_num_3" style="color: <? echo $base->computers->comp[7]->games->game[4]->color[2]; ?>"><? echo $base->computers->comp[7]->games->game[4]->fps; ?> fps</div>
						</div>
						<table>
							<tr>
								<td>A8-7600 10 ЯДЕР</td>
								<td>Radeon R7 2GB</td>
							</tr>
							<tr>
								<td>DDR3 8GB</td>
								<td>HDD 320GB</td>
							</tr>
						</table>
						<div class="btn_container clearfix">
							<div class="price_block">
								<div class="old_price_main_page"><? echo $base->computers->comp[7]->oldprice; ?></div>
								<div class="new_price_main_page"><? echo $base->computers->comp[7]->price; ?></div>
							</div>
							<div class="product_link"><img src="img/configurator.svg">Изменить</div>
						</div>
					</div>
				</a>
				</div>
				<div class="product_block">
							<!-- <div class="cashback">
								вернем<br><span>15%</span>
								<div class="caschback_inner">
									<div class="left_triangle"></div>
									<div class="cashback_popup">
										<h3>Вернем 15%</h3>
										<p><span>ОФОРМИТЕ ЗАКАЗ НА САЙТЕ И ПОЛУЧИТЕ ПЕРСОНАЛЬНУЮ ВЫГОДУ 15%.</span>
										 Акция доступна только при покупке за наличный расчет и в доставку Новой Почтой. Не распространяется на заказы оформленные в оплату частями.</p>
									</div>
								</div>
							</div> -->
							<div class="pp_mini_block">Оплата частями<br>
								<img src="img/pp_logo.jpg" class="pp_mini_block_img"><span>3</span>
								<div class="pp_inner">
									<div class="left_triangle"></div>
									<div class="pp_popup">
										<h3>Оплата частями от<br>приватбанкa!</h3>
										<p>Этот товар можно оплатить частями. Без переплат!</p>
										<div class="pp_bold">Все, что вам нужно:</div>
										<div>
											<div class="pp_num">1</div>
											<div class="pp_title">Наличие карты ПриватБанк</div>
										</div>
										<div class="pp_img">
											<img src="img/cards.png">
										</div>
										<div>
											<div class="pp_num">2</div>
											<div class="pp_title">Доступный лимит</div>
										</div>
										<p style="padding-left:20px;font-size:12px;margin-top:10px;">Как узнать максимальную сумму покупки по сервису Оплата Частями? Отпавьте SMS на номер <span style="font-size:12px;font-weight:700;">10060</span> с текстом <span style="font-size:12px;font-weight:700;">chast</span></p>
										<div class="pp_bold">У Вас нет карты? Оформить карту <a href="https://privatbank.ua/platezhnie-karty/universalna" target="_blank">сейчас</a></div>
									</div>
								</div>
							</div>
							<div class="lider"><span style="font-size:13px;">лидер</span><br>продаж</div>
				<a href="zeus-evo.html" target="_blank">
					<div class="blue_part">
						<img class="product_block_img" src="img/zeusevo.png">
					</div>
					<div class="white_part">
						<div class="product_title"><span>Zeus Evo</span></div>
						<div class="product_subtitle">FPS HD 1366x768 Low</div>
						<div class="fps_container clearfix">
							<div class="fps_game">GTA 5</div>
							<div class="fps_scale">
								<div class="fps_scale_filler fps_scale_filler_3" style="width:<? echo $base->computers->comp[6]->games->game[5]->percent[2]; ?>%; background-color: <? echo $base->computers->comp[6]->games->game[5]->color[2]; ?>"></div>
							</div>
							<div class="fps_num fps_num_3" style="color: <? echo $base->computers->comp[6]->games->game[5]->color[2]; ?>"><? echo $base->computers->comp[6]->games->game[5]->fps; ?> fps</div>
						</div>
						<div class="fps_container clearfix">
							<div class="fps_game">CS:GO</div>
							<div class="fps_scale">
								<div class="fps_scale_filler fps_scale_filler_3" style="width:<? echo $base->computers->comp[6]->games->game[0]->percent[2]; ?>%; background-color: <? echo $base->computers->comp[6]->games->game[0]->color[2]; ?>"></div>
							</div>
							<div class="fps_num fps_num_3" style="color: <? echo $base->computers->comp[6]->games->game[0]->color[2]; ?>"><? echo $base->computers->comp[6]->games->game[0]->fps; ?> fps</div>
						</div>
						<div class="fps_container clearfix">
							<div class="fps_game">Warships</div>
							<div class="fps_scale">
								<div class="fps_scale_filler fps_scale_filler_3" style="width:<? echo $base->computers->comp[6]->games->game[3]->percent[2]; ?>%; background-color: <? echo $base->computers->comp[6]->games->game[3]->color[2]; ?>"></div>
							</div>
							<div class="fps_num fps_num_3" style="color: <? echo $base->computers->comp[6]->games->game[3]->color[2]; ?>"><? echo $base->computers->comp[6]->games->game[3]->fps; ?> fps</div>
						</div>
						<div class="fps_container clearfix">
							<div class="fps_game" style="text-transform:none;">World of Tanks</div>
							<div class="fps_scale">
								<div class="fps_scale_filler fps_scale_filler_3" style="width:<? echo $base->computers->comp[6]->games->game[1]->percent[2]; ?>%; background-color: <? echo $base->computers->comp[6]->games->game[1]->color[2]; ?>"></div>
							</div>
							<div class="fps_num fps_num_3" style="color: <? echo $base->computers->comp[6]->games->game[1]->color[2]; ?>"><? echo $base->computers->comp[6]->games->game[1]->fps; ?> fps</div>
						</div>
						<div class="fps_container clearfix">
							<div class="fps_game">War Thunder</div>
							<div class="fps_scale">
								<div class="fps_scale_filler fps_scale_filler_3" style="width:<? echo $base->computers->comp[6]->games->game[4]->percent[2]; ?>%; background-color: <? echo $base->computers->comp[6]->games->game[4]->color[2]; ?>"></div>
							</div>
							<div class="fps_num fps_num_3" style="color: <? echo $base->computers->comp[6]->games->game[4]->color[2]; ?>"><? echo $base->computers->comp[6]->games->game[4]->fps; ?> fps</div>
						</div>
						<table>
							<tr>
								<td>A6-5400 2 ЯДРА</td>
								<td>HD 8470D 2GB</td>
							</tr>
							<tr>
								<td>DDR3 4GB</td>
								<td>HDD 320GB</td>
							</tr>
						</table>
						<div class="btn_container clearfix">
							<div class="price_block">
								<div class="old_price_main_page"><? echo $base->computers->comp[6]->oldprice; ?></div>
								<div class="new_price_main_page"><? echo $base->computers->comp[6]->price; ?></div>
							</div>
							<div class="product_link"><img src="img/configurator.svg">Изменить</div>
						</div>
					</div>
				</a>
				</div>
			</div>
		</div>
	</div>
	<div class="builder_block bitrix_builder" id="builder">
		<div class="wrapper">
			<h2>НЕ ЗНАЕТЕ КАКОЙ ВЫБРАТЬ КОМПЬЮТЕР?<br>
				НЕ  НАШЛИ НА САЙТЕ НУЖНОЙ МОДЕЛИ?</h2>
			<h3>Получите бесплатную 15 минутную консультацию  нашего эксперта<br>
Оставьте заявку  — и мы свяжется с вами в ближайшее время</h3>
			<form class="builder_form_block">
				<div class="builder_left">
					<div class="builder_input_title">Введите Ваше имя</div>
					<input type="text" class="builder_input" name="name" placeholder="Иванов Иван">
					<div class="builder_input_title">Введите Ваш телефон</div>
					<input type="tel" class="form_input_tel input_tel_1" placeholder="+38">
					<input type="tel" class="form_input_tel input_tel_2" placeholder="123" maxlength="3">
					<input type="tel" class="form_input_tel input_tel_3" placeholder="4567890" maxlength="7">
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
	<div class="top_ten bitrix_top" style="display:none;">
		<div class="wrapper">
			<div class="present_for_you">У нас для вас подарок!</div>
			<h2>ТОП 10 МИФОВ И ЗАБЛУЖДЕНИЙ<br>
			О КОМПЬЮТЕРАХ И КОМПЛЕКТУЮЩИХ</h2>
			<h3>Подробная информация про все мифы о компьютерах, ответы на часто<br>
				задаваемые вопросы и таблицы совместимости комплектующих</h3>
			<div class="top_ten_inner_flex">
				<div class="top_ten_left">
					<img src="img/frame.png" class="bookframe">
					<img src="img/book.jpg" class="book_img">
					<img src="img/bookarrow.png" class="book_arrow">
					<div class="book_arrow_text">
						Документ<br>
						уже получили<br>
						<span><? echo $downloads; ?><span> человек
					</div>
				</div>
				<div class="top_ten_right">
					<h3>Заполните форму прямо сейчас</h3>
					<h4>и получите топ 10 мифов в формате<br>
					pdf на указанную почту в ту же минуту</h4>
					<div class="top_ten_input_title">Введите Ваше имя</div>
					<input type="text" class="top_ten_input" name="name" placeholder="Иван Иванов">
					<div class="top_ten_input_title">Введите Ваш E-mail</div>
					<input type="email" class="top_ten_input" name="email" placeholder="ivanov@ivan.ua">
					<div class="top_ten_input_title">Введите Ваш телефон</div>
					<input type="tel" class="form_input_tel input_tel_1" placeholder="+38">
					<input type="tel" class="form_input_tel input_tel_2" placeholder="123" maxlength="3">
					<input type="tel" class="form_input_tel input_tel_3" placeholder="4567890" maxlength="7">
					<div class="top_ten_btn">Получить топ 10 мифов и заблуждений<br>
						о компьютеах и железе <span>бесплатно</span>
						<div class="top_ten_pulse_wrapper">
							<div class="big_pulse"></div>
						</div>
						<img src="img/openbook.png">
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="save_pricelist_block bitrix_save" id="price">
		<div class="wrapper">
			<h2>Скачайте прайс на 70 компьютеров</h2>
			<h3>Прайс с ценами обновлён 2 дня назад</h3>
			<form class="pricelist_form">
				<div class="tel_mail_container">
					<div class="input_block">
						<div class="input_title">1. Введите Ваш Email</div>
						<input type="email" class="form_input_mail" placeholder="ivanov@ivan.ua">
					</div>
					<div class="input_block">
						<div class="input_title">2. Введите Ваш телефон</div>
						<input type="tel" class="form_input_tel input_tel_1" placeholder="+38">
						<input type="tel" class="form_input_tel input_tel_2" placeholder="123" maxlength="3">
						<input type="tel" class="form_input_tel input_tel_3" placeholder="4567890" maxlength="7">
					</div>
					<div class="input_block">
						<div class="input_form_btn" value="скачать прайс">Скачать прайс
							<div class="pricelist_pulse_wrapper">
								<div class="big_pulse"></div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	</div>
    <div class="privat_block">
    	<div class="wrapper">
    		<h2>РАБОТАЙ И ИГРАЙ СЕЙЧАС, ПЛАТИ ПОТОМ!<br>
С МГНОВЕННОЙ РАССРОЧКОЙ<br>
ОТ ПРИВАТ БАНКА</h2>
    		<h3>Все, что Вам нужно для покупки в мгновенную<br>
 рассрочку - карта ПриватБанка.</h3>
 			<div class="privat_info_block clearfix">
 				<div class="privat_info_img">
 					<img src="img/installments.png">
 				</div>
 				<div class="privat_info_text_block">
 					<div class="privat_info_title">Мгновенная рассрочка</div>
 					<div class="privat_info_subtitle">Сумма платежа в месяц</div>
 					<div class="privat_info_payment_field"><span class="pivat_pay_span">0.00</span> грн</div>
 				</div>
 			</div>
 			<div class="privat_main_title">Срок кредитования</div>
 			<div class="privat_slider_wrapper">
 				<select class="privat_first_slider_select">
 					<option>1 мес.</option>
 					<option>2 мес.</option>
 					<option>3 мес.</option>
 					<option>4 мес.</option>
 					<option>5 мес.</option>
 					<option>6 мес.</option>
 					<option>7 мес.</option>
 					<option>8 мес.</option>
 					<option selected>9 мес.</option>
 					<option>10 мес.</option>
 					<option>11 мес.</option>
 					<option>12 мес.</option>
 					<option>13 мес.</option>
 					<option>14 мес.</option>
 					<option>15 мес.</option>
 					<option>16 мес.</option>
 					<option>17 мес.</option>
 					<option>18 мес.</option>
 					<option>19 мес.</option>
 					<option>20 мес.</option>
 					<option>21 мес.</option>
 					<option>22 мес.</option>
 					<option>23 мес.</option>
 					<option>24 мес.</option>
 				</select>
 				<div class="payment_number">платежей <span>10</span></div>
 				<div class="privat_first_slider"></div>
 			</div>
 			<div class="privat_main_title">Стоимость товара</div>
 			<div class="privat_slider_wrapper">
 				<input class="item_cost_field" value="10000">
 				<span class="grn">грн</span>
 				<div class="privat_second_slider"></div>
 			</div>
 			<div class="privat_message"><span>Внимание.</span> Максимальная сумма покупки расчитывается индивидуально для каждого клиента. Чтобы узнать<br>максимально доступную Вам сумму, отправьте SMS на номер <span>10060</span> с кодом <span>chast</span>.</div>
 			<div class="privat_btn">Воспользоватся рассрочкой
 				<div class="privat_btn_pulse_wrapper">
 					<div class="big_pulse"></div>
 				</div>	
 			</div>
    	</div>
    </div>
	<div class="how_to_buy" id="how_to_buy">
		<div class="wrapper">
			<h2>Как купить компьютер</h2>
			<div class="how_to_buy_block">
				<div class="how_to_num">1</div>
				<div class="how_to_img">
					<img src="img/how_to_1.svg">
				</div>
				<div class="how_to_txt" style="padding-top: 10px;">
				Наш эксперт подбирает вам компьютер на основе<br>ваших задач или желаемых FPS и настроек в игре<br>
				<a href="#builder" class="scrollto">Подобрать компьютер</a>
				</div>
			</div>
			<div class="how_to_buy_block">
				<div class="how_to_num">2</div>
				<div class="how_to_img">
					<img src="img/how_to_2.svg">
				</div>
				<div class="how_to_txt">
				Менеджер подтверждает заказ по телефону. Компьютер<br>до 15 000 грн. отправляется без предоплаты, свыше<br>
15 000 грн. - предоплата 5%
				</div>
			</div>
			<div class="how_to_buy_block">
				<div class="how_to_num">3</div>
				<div class="how_to_img">
					<img src="img/how_to_3.svg">
				</div>
				<div class="how_to_txt">
				Компьютер собирается нашими специалистами,<br> производится грамотная укладка кабелей,<br> устанавливается Windows и драйвера
				</div>
			</div>
			<div class="how_to_buy_block">
				<div class="how_to_num">4</div>
				<div class="how_to_img">
					<img src="img/how_to_4.svg">
				</div>
				<div class="how_to_txt">
				После успешного прохождения нагрузочного стрес-теста<br> системный блок отправляется Новой Почтой,<br> наложенным платежем
				</div>
			</div>
			<div class="how_to_buy_block">
				<div class="how_to_num">5</div>
				<div class="how_to_img">
					<img src="img/how_to_5.svg">
				</div>
				<div class="how_to_txt" style="padding-top: 10px;">
				После отправки компьютера вы получите в смс<br> сообщении номер ТТН, по которому сможете<br>
				<a href="https://novaposhta.ua/ru/tracking" target="_blank">отследить ваш заказ</a>
				</div>
			</div>
			<div class="how_to_buy_block">
				<div class="how_to_num">6</div>
				<div class="how_to_img">
					<img src="img/how_to_6.png">
				</div>
				<div class="how_to_txt">
				На отделении Новой Почты вы распаковываете,<br> осматриваете и подключаете компьютер к розетке. Если<br> все устраивает - оплачиваете и забираете ваш заказ
				</div>
			</div>
		</div>
	</div>
	<div class="delivery_block delivery_paytype">
		<div class="wrapper">
			<h2>ВЫБИРАЙТЕ ЛЮБОЙ СПОСОБ ОПЛАТЫ</h2>
			<div class="delivery_container">
				<div class="delivery_inner_block">
					<div class="delivery_img">
						<img src="img/paytype1.png">
					</div>
					<div class="delivery_title">В нашем магазине</div>
					<p class="delivery_txt">Самовывоз осуществляется по предварительной договоренности о времени</p>
				</div>
				<div class="delivery_inner_block">
					<div class="delivery_img">
						<img src="img/paytype2.png">
					</div>
					<div class="delivery_title">Наличкой курьеру</div>
					<p class="delivery_txt">Бесплатная адресная
доставка  курьером по Киеву (с подключением)</p>
				</div>
				<div class="delivery_inner_block">
					<div class="delivery_img">
						<img src="img/paytype3.png" style="width:200px;">
					</div>
					<div class="delivery_title">Наложенным платежом</div>
					<p class="delivery_txt">Получите заказ на отделении Новой Почты без предоплаты</p>
				</div>
				<div class="delivery_inner_block">
					<div class="delivery_img">
						<img src="img/paytype4.png">
					</div>
					<div class="delivery_title">Мгновенная рассрочка</div>
					<p class="delivery_txt">Оформите мгновенную рассрочку от ПриватБанка</p>
				</div>
			</div>
		</div>
	</div>

	<div class="questions">
		<div class="wrapper">
			<h2>Часто задаваемые вопросы</h2>
			<div class="accordion">
				<div class="accordion_block">
					<div class="accordion_btn"><span>Как доставляют игровой компьютер? Где забрать самовывозом?</span></div>
					<div class="accordion_content">
						<p>
						Доставка Новой Почтой по Украине - БЕСПЛАТНО. Наложенный платеж оплачивает клиент (2%). Сроки доставки 1-2 дня.
						</p>
						<p>
						Доставка курьером по Киеву с подключением и проверкой - БЕСПЛАТНО.
						</p>
 						<p>
						Самовывоз из нашего магазина в Киеве (ул. Авиаконструктора Антонова 43)
						С понедельника по пятницу с 10:00 до 19:00. Суббота, Воскресенье - выходной. Самовывоз осуществляется после согласования.
						<p>
						Самовывоз из нашего магазина в Харькове (ул. Полтавский Шлях 9)
						С понедельника по пятницу с 10:00 до 19:00. В субботу с 10:00 до 15:00, Воскресенье - выходной. 
						Самовывоз осуществляется после согласования.
						</p>
					</div>
				</div>

				<div class="accordion_block">
					<div class="accordion_btn"><span>Как купить и оплатить игровой компьютер?</span></div>
					<div class="accordion_content">
						<p>
						1. Наложенный платеж (оплата при получении на Новой Почте)
						- Пересылку денег оплачивает клиент: 2% от суммы товара.
						 </p>
						<p>
						2. Оплата курьеру при получении в Киеве (доставка курьером в Киеве бесплатно)
						</p>
						<p>
						3. Безналичными. Мы не являемся плательщиками НДС. Мы являемся ФОП на 2 и 3 группе единого налога. Счет может быть отправлен по электронной почте.
						</p>
 						<p>
						4. Мновенная рассрочка и оплата частями от ПриватБанка
						</p>
					</div>
				</div>
				<div class="accordion_block">
					<div class="accordion_btn"><span>Какая гарантия дается на купленный компьютер?</span></div>
					<div class="accordion_content">
					<p>
					Купив компьютер в интернет-магазине "Регард" вы получаете гарантийный талон.
					</p>
 					<p>
					Гарантийное обслуживание распространяется на каждое комплектующее отдельно,
					сроком от 12 до 36 месяцев.
					</p>
 					<p>
					Гарантийный талон необходимо сохранить на протяжении всего срока эксплуатации компьютера.
					</p>
 					<p> 
					Консультацию по вопросам гарантийного обслуживания Вы можете получить по телефону указанному в гарантии, либо по электронной почте service@регард.com
					</p>
					</div>
				</div>
				<div class="accordion_block">
					<div class="accordion_btn"><span>Я могу обменять или вернуть товар?</span></div>
					<div class="accordion_content">
						<p>
						Да, вы можете обменять или вернуть компьютер в течение 14 дней после покупки. Гарантирует вам это право «Закон о защите прав потребителя».
 						</p>
 					<p>
						Клиент теряет право на бесплатное гарантийное обслуживание компьютера в следующих случаях:
						</p>
 					<p> 
						- Нарушение пломб, стикеров, наклеек, обнаружение следов их переклеивание или ремаркирование, потертостей на системном блоке приведших к невозможности прочитать серийный номер, марку тип и т. п.
						- системный блок не полностью укомплектован или нарушена целостность упаковки
						- не сохранены все ярлыки и заводская маркировка
						- отсутствие на гарантийном талоне фирменной печати или подписи и фамилии менеджера.
						</p>
					</div>
				</div>
				<div class="accordion_block">
					<div class="accordion_btn"><span>Куда обращаться при возникновении проблем с ПК?</span></div>
					<div class="accordion_content">
						<p>
						Для владельцев компьютеров  работает телефонная "горячая линия"
 						</p>
 					<p> 
						(063)-606-53-06, (067)-464-41-50, (050)-324-60-25.
						</p>
 					<p>  
						"Горячая линия" Регард доступна с 10:00 до 19:00. Позвонив по указанным телефонам, вы сможете бесплатно получить оперативную консультацию специалистов компании по любым вопросам, связанным с компьютерами Регард.
						</p>
 					<p>  
						Также для устранения неполадок вы можете приехать в наш магазин, где будет сделана диагностика и ремонт компьютера.
						</p>
					</div>
				</div>
				<div class="accordion_block">
					<div class="accordion_btn"><span>Системный блок будет опечатан пломбами?</span></div>
					<div class="accordion_content">
						<p>
						Ни один системный блок не опечатывается заводскими пломбами.
						Это необходимо для того, чтобы Вы имели полный доступ к внутренностям системного блока.
						При этом сохраняется гарантия на все комплектующие.
						Также вы получите возможность самостоятельно модернизировать и обслуживать данный компьютер.
						</p>
					</div>
				</div>
				<div class="accordion_block">
					<div class="accordion_btn"><span>Какие сроки сборки компьютера на заказ?</span></div>
					<div class="accordion_content">
						<p>
						Специалисты интернет-магазина компьютеров "Регард" соберут любую сборку компьютера по Вашим требованиям в течении 1 дня.
						Проводим обязательный 3-х часовой нагрузочный стресс-тест всех комплектующих для выявления неполадок данного компьютера.
						</p>
					</div>
				</div>
				<div class="accordion_block">
					<div class="accordion_btn"><span>Возможно ли изменить конфигурацию компьютера?</span></div>
					<div class="accordion_content">
						<p>		
						Благодаря большому опыту наших специалистов мы подобрали максимально сбалансированные варианты компьютеров. Каждый из этих вариантов компьютеров Вы можете изменить на свое усмотрение.
 						</p>
 						<p>
						Обратитесь за бесплатной консультацией по сборке компьютера к специалистам компании Регард:<br>
						(063)-606-53-06, (067)-464-41-50, (050)-324-60-25
						</p>
					</div>
				</div>
				<div class="accordion_block">
					<div class="accordion_btn"><span>Как купить компьютер в рассрочку от ПриватБанка?</span></div>
					<div class="accordion_content">
						<p>		
						Все что вам нужно:<br>
						1) Наличие кредитной карты ПриватБанка.<br>
						2) Доступный лимит (Отправьте бесплатную SMS на номер 10060 с текстом chast)<br>
						3) Наличие на карте суммы для списания первого платежа (равна ежемесячному платежу)<br>
						</p>
						<p>
						На странице компьютера после изменения конфигурации нажмите кнопку “в рассрочку”.<br>

						В появившемся окне выберите количество платежей, а также введите фамилию, имя, телефон и нажмите кнопку “Купить”.<br>
						Вас перекинет на страницу ПриватБанка. Введите всю необходимую информацию на странице ПриватБанка и подтвердите ваш платеж.<br>
						<p>
						После подтверждения, с вашей карты будет списан первый платеж. Вы получите SMS от Приватбанка о покупке в рассрочку, а также договор на ваш email.
						</p>
						<p>
						Средства от ПриватБанка поступают в среднем через 5-6 часов. Позвоните нам, как только получите SMS о покупке. Мы уточним у вас детали о доставке и отправим компьютер после получения средств от ПриватБанка. Доставка полностью бесплатно.
 						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="hypercomments" id="comments">
		<div class="wrapper">
			<h2>Задайте свой вопрос<br>или оставьте отзыв</h2>
			<div id="hypercomments_widget"></div>
			<script type="text/javascript">
			_hcwp = window._hcwp || [];
			_hcwp.push({widget:"Stream", widget_id: 81051, href:"http://xn--80afeb8cd.com/"});
			(function() {
			if("HC_LOAD_INIT" in window)return;
			HC_LOAD_INIT = true;
			var lang = (navigator.language || navigator.systemLanguage || navigator.userLanguage || "en").substr(0, 2).toLowerCase();
			var hcc = document.createElement("script"); hcc.type = "text/javascript"; hcc.async = true;
			hcc.src = ("https:" == document.location.protocol ? "https" : "http")+"://w.hypercomments.com/widget/hc/81051/"+lang+"/widget.js";
			var s = document.getElementsByTagName("script")[0];
			s.parentNode.insertBefore(hcc, s.nextSibling);
			})();
			</script>
			<a href="http://hypercomments.com" class="hc-link" title="comments widget">comments powered by HyperComments</a>
		</div>
	</div>
	<div class="contacts_block clearfix" id="contacts">
		<!-- <div class="map" id="map"></div> -->
		<div class="contacts_left">
			<h2>Звоните прямо<br>сейчас</h2>
			<div class="contacts_flex">
				<div class="contacts_inner">
					<div class="contacts_title">Киев</div>
					<div class="contacts_txt">
						Киев,<br>
						ул. Авиаконструктора <br>
						Антонова 43<br>
						Пн-Пт с 10:00 до 19:00<br>
						Сб-Вс выходной
					</div>
					<a href="" class="contacts_link na_kv">на карте</a>
					<div class="contacts_title">Харьков</div>
					<div class="contacts_txt">
						Харьков,<br>
						ул. Полтавский Шлях 9<br>
						Пн-Пт с 10:00 до 19:00<br>
						Сб с 10:00 до 15:00<br>
						(цокольный этаж)
					</div>
					<a href="" class="contacts_link na_kh">на карте</a>
				</div>
				<div class="contacts_inner">
					<div class="contacts_title">Горячая линия</div>
					<div class="contacts_txt">
						<span>0 800 753 853</span>
						Бесплатно по Украине
						со стационарных и
						мобильных 
						с 10:00 до 19:00
					</div>
					<div class="contacts_title">Контакты</div>
					<div class="contacts_txt">
						(063) 606-53-06<br>
						(067) 464-41-50<br>
						(050) 324-60-25
					</div>
					<a href="mailto:mail@регард.com" class="contacts_mail">mail@регард.com</a>
					<div class="contacts_txt">
						Cледите за нами:
					</div>	
					<div class="social_flex">
						<a href="https://vk.com/regard_ukraine" class="social_block" target="_blank">
							<img src="img/vk.png">
						</a>
						<a href="" class="social_block" target="_blank">
							<img src="img/youtube.png">
						</a>
						<a href="https://instagram.com/_u/regard_pc?r=sun1" class="social_block" target="_blank">
							<img src="img/instagram.png">
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="map" id="map"></div>
	</div>
	<footer class="footer">
		<div class="wrapper clearfix">
			<div class="logo">
				<img src="img/logo.svg">
			</div>	
			<div class="computers_footer_links">
				<a href="raven-x-treme.html" class="computers_footer_link">
					Raven X-treme
					<div class="cfl_price"><span><? echo $base->computers->comp[2]->price; ?></span> грн</div>
				</a>
				<a href="amd-ryzen.html" class="computers_footer_link">
					AMD RYZEN
					<div class="cfl_price"><span><? echo $base->computers->comp[1]->price; ?></span> грн</div>
				</a>
				<a href="griffin-power.html" class="computers_footer_link">
					Griffin power
					<div class="cfl_price"><span><? echo $base->computers->comp[0]->price; ?></span> грн</div>
				</a>
				<a href="pro-gamer-3000.html" class="computers_footer_link">
					Pro gamer 3000
					<div class="cfl_price"><span><? echo $base->computers->comp[5]->price; ?></span> грн</div>
				</a>
				<a href="hellcat-pro.html" class="computers_footer_link">
					Hellcat pro
					<div class="cfl_price"><span><? echo $base->computers->comp[4]->price; ?></span> грн</div>
				</a>
				<a href="dominator-ultra.html" class="computers_footer_link">
					Dominator ultra
					<div class="cfl_price"><span><? echo $base->computers->comp[3]->price; ?></span> грн</div>
				</a>
				<a href="world-of-tanks.html" class="computers_footer_link">
					World of tanks
					<div class="cfl_price"><span><? echo $base->computers->comp[8]->price; ?></span> грн</div>
				</a>
				<a href="back-to-school.html" class="computers_footer_link">
					Back to school
					<div class="cfl_price"><span><? echo $base->computers->comp[7]->price; ?></span> грн</div>
				</a>
				<a href="zeus-evo.html" class="computers_footer_link">
					Zeus evo
					<div class="cfl_price"><span><? echo $base->computers->comp[6]->price; ?></span> грн</div>
				</a>
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
			<a href="tel:0800753853" class="vk_consult vk_consult_main_page phone_consult">
				<div class="vk_consult_image">
					<div class="vk_pulse_wrapper">
						<div class="pulse"></div>
					</div>
					<img src="img/phone-consult.png">
				</div>
				<div class="vk_consult_info">
					<div class="vk_consult_title">Консультация<br>По телефону</div>
					<div class="vk_consult_online">0 800 753 853</div>
				</div>
			</a>
		</div>
	</footer>
		<!-- BEGIN JIVOSITE CODE {literal} -->
<script type='text/javascript'>
(function(){ var widget_id = 'AXWIoi04ap';var d=document;var w=window;function l(){
var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();</script>
<!-- {/literal} END JIVOSITE CODE -->
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

<script type="text/javascript">
  (function(d, w, s) {
	var widgetHash = 'rzh96hs8qge3efgxzwcr', gcw = d.createElement(s); gcw.type = 'text/javascript'; gcw.async = true;
	gcw.src = '//widgets.binotel.com/getcall/widgets/'+ widgetHash +'.js';
	var sn = d.getElementsByTagName(s)[0]; sn.parentNode.insertBefore(gcw, sn);
  })(document, window, 'script');
</script> 
</body>
</html>























