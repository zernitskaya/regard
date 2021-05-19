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

?>
<html>
<head>
	<meta charset="utf-8">
	<title>Griffin-Power</title>
	<meta name="description" content="Регард.com - магазин №1 игровых компьютеров в Украине. Оплата частями и мгновенная рассрочка от ПриватБанка. Официальная гарантия ☑ Бесплатная доставка по всей Украине ✈">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/popup.css">
	<link rel="stylesheet" type="text/css" href="css/jui.css">
	<link rel="stylesheet" type="text/css" href="prod-mob.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed|Roboto:400,500,700" rel="stylesheet">
	<script src="js/jquery.js"></script>
	<script src="js/credit.js"></script>
	<script src="js/popup.js"></script>
	<script src="js/number.js"></script>
	<script src="js/jui.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){

			addToNewPrice = <? echo $base->computers->comp[0]->nacenka->new; ?>;
			addToOldPrice = <? echo $base->computers->comp[0]->nacenka->old; ?>;

			city_name = '<? echo $city_name; ?>';
	   		utm_term = '<? echo $_SESSION["utm_term"]; ?>';
	   		utm_content = '<? echo $_SESSION["utm_content"]; ?>';
	   		utm_compaign = '<? echo $_SESSION["utm_compaign"]; ?>';
	   		utm_medium = '<? echo $_SESSION["utm_medium"]; ?>';
	   		utm_source = '<? echo $_SESSION["utm_source"]; ?>';

			$('.zoom_link').magnificPopup({
  				type: 'image'
			});

			$('.lightbox_link').magnificPopup({
  					type: 'image',
  					 mainClass: 'mfp-fade',
  					gallery:{
    					enabled:true
  						},
  					callbacks: {
					    
					    buildControls: function() {
					      // re-appends controls inside the main container
					      this.contentContainer.append(this.arrowLeft.add(this.arrowRight));
					    }
					    
					  }
			});

			//modal

			$('.buy_button').on('click', function(){
	   				$('.product_buy_modal').fadeIn();
	   		})

	   		$('.bottom_buy_btn').on('click', function(){
	   				$('.product_buy_modal').fadeIn();
	   		})

	   		// privat

	   		$('.privat_credit_btn').on('click', function(){
	   				$('.privat_prod_modal').fadeIn();
	   		})

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

			

		})
	</script>
	<script src="js/script.js"></script>
</head>
<body>

	<div class="bg_modal product_buy_modal">
		<div class="modal_inner product_buy_inner">
			<div class="mod_close"></div>
			<h2>Купите компьютер сейчас</h2>
			<h3>Заполните форму и наш консультант<br>
			свяжется с вами для уточнения<br>
			данных по доставке и оплате
			</h3>	
			<div class="input_title">Введите Ваше имя</div>
			<input type="text" placeholder="Иванов Иван" class="modal_input">
			<div class="input_title">Введите Ваш телефон</div>
			<input type="tel" class="form_input_tel input_tel_1" placeholder="+38">
			<input type="tel" class="form_input_tel input_tel_2" placeholder="123" maxlength="3">
			<input type="tel" class="form_input_tel input_tel_3" placeholder="4567890" maxlength="7">
			<div class="modal_sumbit">Жду звонка!</div>
		</div>
	</div>

	<div class="bg_modal privat_prod_modal">
		<div class="modal_inner privat_prod_inner">
			<div class="mod_close"></div>
			<h2>Воспользуйтесь мгновенной рассрочкой от ПриватБанка</h2>
			<div class="privat_info_text_block">
 				<div class="privat_info_title">Мгновенная рассрочка</div>
 				<div class="privat_prod_flex_container">
 					<div>
 						<div class="privat_info_subtitle">Общая сумма:</div>
 						<div class="privat_info_all_price_field"><span>0.00</span> грн</div>
 					</div>
 					<div>
 						<div class="privat_info_subtitle">Сумма платежа в месяц:</div>
 						<div class="privat_info_payment_field"><span>0.00</span> грн</div>
 					</div>
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
 					<option>9 мес.</option>
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
 				<div class="payment_number">платежей <span>2</span></div>
 				<div class="privat_first_slider"></div>
 			</div>
				<div class="tel_mail_container">
					<div class="input_block">
						<div class="input_title">Введите Ваше Имя</div>
						<input type="text" class="form_input_mail" placeholder="Иванов Иван">
					</div>
					<div class="input_block">
						<div class="input_title">Введите Ваш телефон</div>
						<input type="tel" class="form_input_tel input_tel_1" placeholder="+38">
						<input type="tel" class="form_input_tel input_tel_2" placeholder="123" maxlength="3">
						<input type="tel" class="form_input_tel input_tel_3" placeholder="4567890" maxlength="7">
					</div>
					<div class="input_block">
						<input type="submit" class="input_form_btn" value="Купить">
					</div>
				</div>
		</div>
	</div>

	<div class="bottom_price_nav">
		<div class="product_wrapper clearfix">
			<div class="bottom_buy_btn">
				<div class="pulse"></div>
				<img src="img/buy.png">
				купить
			</div>
			<div class="bottom_price_grn">грн</div>
			<div class="bottom_price"><? echo $base->computers->comp[0]->price; ?></div>
			<div class="bottom_computer_title">Griffin Power</div>
		</div>
	</div>
	<div class="header header_product clearfix">
		<div class="product_wrapper">
			<div class="product_header_flex_container">
				<a href="index.html">
					<div class="logo">
						<img src="img/logo.svg">
					</div>
				</a>
				<div class="header_computer_link_flex">
					<a href="pro-gamer-3000.html" class="header_computer_link">
						<div class="header_computer_link_title">PRO Gamer 3000</div>
						<div class="header_computer_link_price"><? echo $base->computers->comp[5]->price; ?> грн</div>
					</a>
					<a href="devastator-xlc.html" class="header_computer_link">
						<div class="header_computer_link_title">DEVASTATOR XLC</div>
						<div class="header_computer_link_price"><? echo $base->computers->comp[1]->price; ?> грн</div>
					</a>
					<a href="raven-x-treme.html" class="header_computer_link">
						<div class="header_computer_link_title">RAVEN X-TREME</div>
						<div class="header_computer_link_price"><? echo $base->computers->comp[2]->price; ?> грн</div>
					</a>
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
				<div class="header_phones">
					<div class="header_phones_title">Бесплатно со всех номеров Украины</div>
					<div class="header_phones_nubmer">0 800 753 853</div>
					<div class="header_phones_inner">
						<div class="header_info_inner_block">
							ПН - ПТ с 09:00 до 21:00
						</div>
						<div class="header_info_inner_block">
							СБ - ВС с 09:00 до 20:00
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
			</div>
		</div>
	</div>
	<div class="sitemap">
		<div class="product_wrapper">
			<a href="index.html">Главная</a> / <span class="product_page_name">Griffin Power</span>
		</div>
	</div>
	<div class="product_page_main_block">
		<div class="product_wrapper">
			<h1 class="product_page_title">Игровой компьютер GRIFFIN POWER</h1>
			<div class="product_page_flex_container">
				<div class="product_page_flex_inner">
					<div class="main_prod_photo">
						<div class="thumbnail">
							<a href="img/RECARD0293.jpg" class="lightbox_link">
								<img src="img/RECARD0293.jpg">
							</a>
						</div>
					</div>
					<div class="mini_photos_container">
						<div class="mini_photo">
							<div class="thumbnail">
								<a href="img/RECARD0276.jpg" class="lightbox_link">
									<img src="img/RECARD0276.jpg">
								</a>
							</div>
						</div>
						<div class="mini_photo">
							<div class="thumbnail">
								<a href="img/RECARD0308.jpg" class="lightbox_link">
									<img src="img/RECARD0308.jpg">
								</a>	
							</div>
						</div>
						<div class="mini_photo">
							<div class="thumbnail">
								<a href="img/RECARD0284.jpg" class="lightbox_link">
									<img src="img/RECARD0284.jpg">
								</a>	
							</div>
						</div>
						<div class="mini_photo">
							<div class="thumbnail">
								<a href="img/RECARD-9.jpg" class="lightbox_link">
									<img src="img/RECARD-9.jpg">
								</a>	
							</div>
						</div>
						<div class="mini_photo">
							<div class="thumbnail">
								<a href="img/RECARD-161.jpg" class="lightbox_link">
									<img src="img/RECARD-161.jpg">
								</a>	
							</div>
						</div>
						<div class="mini_photo">
							<div class="thumbnail">
								<a href="img/RECARD-155.jpg" class="lightbox_link">
									<img src="img/RECARD-155.jpg">
								</a>	
							</div>
						</div>
						<div class="mini_photo">
							<div class="thumbnail">
								<a href="img/RECARD-148.jpg" class="lightbox_link">
									<img src="img/RECARD-148.jpg">
								</a>	
							</div>
						</div>
						<div class="mini_photo">
							<div class="thumbnail">
								<a href="img/RECARD-136.jpg" class="lightbox_link">
									<img src="img/RECARD-136.jpg">
								</a>	
							</div>
						</div>
					</div>
				</div>
				<div class="product_page_flex_inner">
					<div class="super_price">
						<div class="super_price_title">Суперцена до <span class="super_price_date"><? echo $base->promo->word; ?></span> !</div>
						<div class="super_price_end">До конца акции осталось:</div>
						<div class="super_price_timer">
							<script src="<? echo $base->promo->code; ?>"></script>
						</div>
						<a href="super-price.html" class="super_price_learn_more">Подробнее об акции > </a>	
					</div>
					<div class="product_page_price_block">
						<div class="old_price"><? echo $base->computers->comp[0]->oldprice; ?>
							<div class="old_price_inner"></div>
						</div>
						<div class="new_price"><? echo $base->computers->comp[0]->price; ?> <span>грн</span></div>
						<div class="add_features">
							<div class="feature_block clearfix">
								<div class="checkbox_block">
									<input type="checkbox" id="c1" data-price="<? echo $base->dops->dop[0]->price; ?>" class="add_f">
									<label for="c1" class="checkbox_title"><span></span>Установить Windows 10</label>
								</div>
								<div class="feature_price"><? echo $base->dops->dop[0]->price; ?> грн</div>
							</div>
							<div class="feature_block clearfix">
								<div class="checkbox_block">
									<input type="checkbox" id="c2" data-price="<? echo $base->dops->dop[1]->price; ?>" class="add_f">
									<label for="c2" class="checkbox_title"><span></span>Установить Windows 7</label>
								</div>
								<div class="feature_price"><? echo $base->dops->dop[1]->price; ?> грн</div>
							</div>	
							<div class="feature_block clearfix">
								<div class="checkbox_block">
									<input type="checkbox" id="c3" data-price="<? echo $base->dops->dop[2]->price; ?>" class="add_f">
									<label for="c3" class="checkbox_title"><span></span>Установить Microsoft Office</label>
								</div>
								<div class="feature_price"><? echo $base->dops->dop[2]->price; ?> грн</div>
							</div>	
							<div class="feature_block clearfix">
								<div class="checkbox_block">
									<input type="checkbox" id="c4" data-price="<? echo $base->dops->dop[3]->price; ?>" class="add_f">
									<label for="c4" class="checkbox_title"><span></span>Установить Wi-Fi адаптер</label>
								</div>
								<div class="feature_price"><? echo $base->dops->dop[3]->price; ?> грн</div>
							</div>		
						</div>
						<div class="buy_button buy_button_ololo"><img src="img/basket.png">Купить</div>
						<div class="privat_credit_btn">Купить в кредит</div>
					</div>
				</div>
				<div class="product_page_flex_inner">
					<div class="product_page_delivery">
						<div class="main_title">Доставка</div>
						<div class="free_delivery clearfix">
							<img src="img/car.png">
							<div class="title"><span class="green_title">Бесплатная<br>доставка</span><br>
								в г. <? echo $city_name; ?>
							</div>
						</div>
						<div class="product_delivery_inner_block">
							<div class="title green">Самовывоз</div>
							<div class="text">Из наших магазинов в Киеве и Харькове по предварительной договоренности</div>
						</div>
						<div class="product_delivery_inner_block">
							<div class="title green">Курьер</div>
							<div class="text">Мы доставим компьютер курьером Новой Почты по вашему адресу</div>
						</div>
						<div class="product_delivery_inner_block">
							<div class="title">Оплата</div>
							<div class="text">Наличными, Безналичными, Кредит, Мгновенная рассрочка от Приват Банка</div>
						</div>
						<div class="product_delivery_inner_block">
							<div class="title">Гарантия</div>
							<div class="text">До 36 месяцев<br>
								обмен/возврат товара в течении 14 дней
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tabs_block">
				<div class="tabs_nav_bar">
					<div data="tab_conf" class="tab_btn  active">Конфигурация</div>
					<div data="tab_accesories" class="tab_btn">Аксессуары</div>
					<div data="tab_fps" class="tab_btn">FPS в играх</div>
				</div>
				<div class="tab_content_block">
					<div class="tab_content_inner" id="tab_conf_content">
						<div class="tab_content_description">
							Мы подобрали в состав конфигурации лучшие комплектующие для высокой<br>
							производительности в играх. Вы можете изменить состав под свои требования, наши мастера<br>
							все соберут и настроят.
						</div>
						<div class="accordion product_accordion">
							<div class="accordion_block">
								<div class="accordion_btn_title">процессор</div>
								<div class="accordion_btn active proc_btn"></div>
								<div class="accordion_content" style="display:block">
									<label class="radio_label proc_label" data-price="<? echo $base->processors->cpu[11]->price; ?>"><input name="proc" type="radio">
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
											<img src="img/intel1.png">
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">Intel Core i3-7100 3.90 GHz, s1151 <span>Kaby Lake</span>
											</div>
											<div class="radio_description_text">
												Процессор Intel® Core™ i3 7-го поколения. Предназначен для среднего уровня игровых компьютеров. 
2 ядра, 4 потока, 3МБ кэш, частота процессора - 3.90ГГц.
											</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
									<label class="radio_label proc_label" data-price="<? echo $base->processors->cpu[14]->price; ?>"><input name="proc" type="radio" checked>
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
											<img src="img/intel2.png">
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">Intel Core i5-7400 3.50 GHz, s1151
												<span>Kaby Lake</span></div>
											<div class="radio_description_text">
												Процессор Intel Core™ i5 7-го поколения Kaby Lake. Предназначен для игровых компьютеров.
												4 ядра, 4 потока, 6МБ кэш, частота процессора от 3.00ГГц. до 3.50ГГц.
											</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
									<label class="radio_label proc_label" data-price="<? echo $base->processors->cpu[15]->price; ?>"><input name="proc" type="radio">
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
											<img src="img/intel2.png">
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">Intel Core i5-7600 4.10 GHz, s1151 
												<span>Kaby Lake</span></div>
											<div class="radio_description_text">
												Процессор Intel Core™ i5 7-го поколения Kaby Lake. Предназначен для игровых компьютеров.
												4 ядра, 4 потока, 6МБ кэш, частота процессора от 3.50ГГц. до 4.10ГГц.
											</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
								</div>
							</div>
							<div class="accordion_block">
								<div class="accordion_btn_title">Видеокарта</div>
								<div class="accordion_btn videocard_btn"></div>
								<div class="accordion_content">
									<label class="radio_label videocard_label" data-price="<? echo $base->videocards->videocard[5]->price; ?>"><input name="videocard" type="radio">
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
											<img src="img/nvidia1.png">
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">NVIDIA GeForce GTX 1050 ti, 4GB GDDR5 (128bit)</div>
											<div class="radio_description_text">
												Игровая видеокарта среднего уровня. Обеспечивает высокие настройки во всех новых играх.
												Поддерживает DirectX 12, OpenGL 4.5 Частота памяти - 7008 МГц.  (DVI-D, DisplayPort, HDMI)
											</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
									<label class="radio_label videocard_label" data-price="<? echo $base->videocards->videocard[6]->price; ?>"><input name="videocard" type="radio">
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
											<img src="img/nvidia2.png">
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">NVIDIA GeForce GTX 1060, 3GB GDDR5 (192bit)</div>
											<div class="radio_description_text">
												Игровая видеокарта высокого уровня. Обеспечивает ультра настройки во всех новых играх.
												Поддерживает DirectX 12, OpenGL 4.5 Частота памяти - 8008 МГц.  (DVI-D, 2 x DisplayPort, 2 x HDMI)
											</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
									<label class="radio_label videocard_label" data-price="<? echo $base->videocards->videocard[7]->price; ?>"><input name="videocard" type="radio" checked>
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
											<img src="img/nvidia2.png">
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">NVIDIA GeForce GTX 1060, 6GB GDDR5 (192bit)</div>
											<div class="radio_description_text">
												Игровая видеокарта высокого уровня. Обеспечивает ультра настройки во всех новых играх.
Поддерживает DirectX 12, OpenGL 4.5 Частота памяти - 8008 МГц.  (DVI-D, DisplayPort, HDMI)
											</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
									<label class="radio_label videocard_label" data-price="<? echo $base->videocards->videocard[8]->price; ?>"><input name="videocard" type="radio">
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
											<img src="img/nvidia2.png">
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">AMD Radeon RX 480, 8GB GDDR5 (256bit)</div>
											<div class="radio_description_text">
												Игровая видеокарта высокого уровня. Обеспечивает ультра настройки во всех новых играх.
Поддерживает DirectX 12, OpenGL 4.5 Частота памяти - 8000 МГц.  (DVI-D, 2 x DisplayPort, 2 x HDMI)
											</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
								</div>
							</div>
							<div class="accordion_block">
								<div class="accordion_btn_title">Охлаждение</div>
								<div class="accordion_btn cooler_btn"></div>
								<div class="accordion_content">
									<label class="radio_label cooler_label" data-price="<? echo $base->coolers->cooler[0]->price; ?>"><input name="cooler" type="radio" checked>
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
											<img src="img/cooler1.png">
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">Боксовый кулер процессора</div>
											<div class="radio_description_text">
												Стандартный алюминиевый радиатор. В его основе лежит низкопрофильный алюминиевый сердечник, от которого веером в разные стороны расходятся ребра.
											</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
									<label class="radio_label cooler_label" data-price="<? echo $base->coolers->cooler[1]->price; ?>"><input name="cooler" type="radio">
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
											<img src="img/cooler2.png">
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">Кулер DeepCool Gamma Archer 120мм</div>
											<div class="radio_description_text">
												Алюминиевый радиатор лучевой конструкции с медным сердечником. Большой 120 мм вентилятор обеспечивает мощный воздушный поток при малом шуме. Расчитан на 95 ватт.
											</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
								</div>
							</div>
							<div class="accordion_block">
								<div class="accordion_btn_title">Память DDR4</div>
								<div class="accordion_btn ddr_btn"></div>
								<div class="accordion_content">
									<label class="radio_label ddr_label one_line_label" data-price="<? echo $base->rams->ram[1]->price; ?>"><input name="ddr" type="radio">
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
											<img src="img/ddr1.jpg">
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">8GB, 2133MHz (Team Elite/GooDRAM)</div>
											<div class="radio_description_text">
												Один модуль на 8ГБ сверхнадежной памяти DDR4 с частотой 2100 МГц.
											</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
									<label class="radio_label ddr_label one_line_label" data-price="<? echo $base->rams->ram[2]->price; ?>"><input name="ddr" type="radio">
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
											<img src="img/ddr2.png">
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">8GB, (2x4GB) 2133MHz (Team Elite/GooDRAM)</div>
											<div class="radio_description_text">
												Комплект из 2-х модулей по 4ГБ сверхнадежной памяти DDR4 с частотой 2100 МГц.
											</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
									<label class="radio_label ddr_label one_line_label" data-price="<? echo $base->rams->ram[3]->price; ?>"><input name="ddr" type="radio" checked>
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
											<img src="img/ddr2.png">
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">16GB, (2x8GB) 2133MHz (Team Elite/GooDRAM)</div>
											<div class="radio_description_text">
												Комплект из 2-х модулей по 8ГБ сверхнадежной памяти DDR4 с частотой 2100 МГц.
											</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
								</div>
							</div>
							<div class="accordion_block">
								<div class="accordion_btn_title">Жесткий диск</div>
								<div class="accordion_btn hdd_btn"></div>
								<div class="accordion_content">
									<label class="radio_label hdd_label one_line_label" data-price="<? echo $base->hdds->hdd[0]->price; ?>"><input name="hdd" type="radio">
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
											<img src="img/hdd1.svg" style="height:60px">
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">Не устанавливать жесткий диск</div>
											<div class="radio_description_text">
												Выберите этот пункт, если хотите купить компьютер без жесткого диска.
											</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
									<label class="radio_label hdd_label" data-price="<? echo $base->hdds->hdd[1]->price; ?>"><input name="hdd" type="radio">
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
											<img src="img/hdd2.png">
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">320GB Seagate HDD</div>
											<div class="radio_description_text">
												Высокопроизводительный и надежный жесткий диск. Обеспечивает отличную производительность для типичных повседневных задач.
											</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
									<label class="radio_label hdd_label" data-price="<? echo $base->hdds->hdd[2]->price; ?>"><input name="hdd" type="radio">
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
											<img src="img/hdd2.png">
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">500GB Seagate HDD</div>
											<div class="radio_description_text">
												
Высокопроизводительный, экологичный и тихий диск. Интерфейс SATA 6 Гбит/с позволяет достичь максимальной производительности при работе с данными.
											</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
									<label class="radio_label hdd_label" data-price="<? echo $base->hdds->hdd[3]->price; ?>"><input name="hdd" type="radio" checked>
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
											<img src="img/hdd3.png">
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">1000GB TOSHIBA HDD</div>
											<div class="radio_description_text">
												Надежный и очень быстрый диск! Огромный буфер в сочетании с превосходной производительностью и высокой надежностью - вот отличительные особенности.
											</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
								</div>
							</div>
							<div class="accordion_block">
								<div class="accordion_btn_title">SSD накопитель</div>
								<div class="accordion_btn ssd_btn"></div>
								<div class="accordion_content">
									<label class="radio_label ssd_label one_line_label" data-price="<? echo $base->ssds->ssd[0]->price; ?>"><input name="ssd" type="radio">
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
											<img src="img/ssd1.svg" style="height:60px">
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">Не устанавливать SSD накопитель</div>
											<div class="radio_description_text">
												Выберите этот пункт, если хотите купить компьютер без SSD.
											</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
									<label class="radio_label ssd_label big_line_label" data-price="<? echo $base->ssds->ssd[1]->price; ?>"><input name="ssd" type="radio" checked>
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
											<img src="img/ssd2.jpg">
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">120GB Team L3 EVO, TRIM SATA III</div>
											<div class="radio_description_text">
												Отличный вариант высокопроизводительного накопителя. Мгновенный запуск системы и любимых игр! Превосходные показатели скорости: благодаря технологии TurboWrite и режиму RAPID скорость передачи данных возрастает до 530 МБ/с в режиме чтения и до 400 МБ/с в режиме записи.
											</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
									<label class="radio_label ssd_label big_line_label" data-price="<? echo $base->ssds->ssd[2]->price; ?>"><input name="ssd" type="radio">
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
											<img src="img/ssd3.png">
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">240GB Team L7 EVO, TRIM SATA III</div>
											<div class="radio_description_text">
												Твердотельный накопитель Team с интерфейсом SATA III позволяет ускорить запуск и, увеличить скорость загрузки приложений и игр в 10 раз, в сравнении с жестким диском. Накопитель имеет контроллер  Phison PS3110-S10, у которого нет деградации скорости. Производится из лучших компонентов своего класса. Скорость чтения 530 МБ/с, скорость записи 370 МБ/с
											</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
								</div>
							</div>
							<div class="accordion_block">
								<div class="accordion_btn_title">Материнка</div>
								<div class="accordion_btn mat_btn"></div>
								<div class="accordion_content">
									<label class="radio_label mat_label" data-price="<? echo $base->materinkas->materinka[0]->price; ?>"><input name="mat" type="radio" checked>
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
											<img src="img/materinka.png">
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">Socket 1151 GigaByte, (Intel H110 Chipset, 2 x DDR4, MicroATX)</div>
											<div class="radio_description_text">
												Универсальная, недорогая и надежная материнская плата. Создана на базе высококачественных компонентов. Предназначена для игровых компьютеров.
											</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
								</div>
							</div>
							<div class="accordion_block">
								<div class="accordion_btn_title">Блок питания</div>
								<div class="accordion_btn block_btn"></div>
								<div class="accordion_content">
									<label class="radio_label block_label one_line_label" data-price="<? echo $base->blocks->block[0]->price; ?>"><input name="block" type="radio" checked>
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
											<img src="img/block.png">
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">500W Great Wall</div>
											<div class="radio_description_text">
												Тихий надежный блок питания мощностью 500Вт. Предназначен для игровых компьютеров.
											</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
								</div>
							</div>
							<div class="accordion_block">
								<div class="accordion_btn_title">Дисковод</div>
								<div class="accordion_btn disk_btn"></div>
								<div class="accordion_content">
									<label class="radio_label disk_label one_line_label" data-price="<? echo $base->disks->disk[0]->price; ?>"><input name="disk" type="radio" checked>
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
											<img src="img/disk1.svg" style="height:60px">
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">Не устанавливать дисковод</div>
											<div class="radio_description_text">
												Выберите этот пункт, если хотите купить компьютер без дисковода
											</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
									<label class="radio_label disk_label" data-price="<? echo $base->disks->disk[1]->price; ?>"><input name="disk" type="radio">
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
											<img src="img/disk2.png">
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">Оптический привод LG DVD±R/RW SATA Super Multi</div>
											<div class="radio_description_text">
												Оптимальный DVD-привод с поддержкой всех существующих необходимых форматов дисков.
Имеет 24x скорости записи DVD + R и 48x скоростей записи CD-R.
											</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
								</div>
							</div>
							<div class="accordion_block">
								<div class="accordion_btn_title">Корпус</div>
								<div class="accordion_btn comp_btn"></div>
								<div class="accordion_content">
									<label class="radio_label comp_label one_line_label" data-price="<? echo $base->corpuses->corpus[0]->price; ?>"><input name="comp" type="radio">
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
											<a href="img/RECARD-51.jpg" class="zoom_link">
												<img src="img/56.png">
											</a>
											<div class="zoom_link_hover">
												<img src="img/lupa.png">
											</div>
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">GreenVision 1, Mid-Tower (42,5 х 17,5 х 41 см)</div>
											<div class="radio_description_text">
												Яркий и стильный корпус черного цвета формата Mid-Tower со стильной синей подсветкой
											</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
									<label class="radio_label comp_label one_line_label" data-price="<? echo $base->corpuses->corpus[1]->price; ?>"><input name="comp" type="radio">
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
											<a href="img/RECARD-128.jpg" class="zoom_link">
												<img src="img/54.png">
											</a>
											<div class="zoom_link_hover">
												<img src="img/lupa.png">
											</div>
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">GreenVision 2, Mid-Tower (42,5 х 17,5х 41 см)</div>
											<div class="radio_description_text">
												Яркий и стильный корпус черного цвета формата Mid-Tower со стильной синей подсветкой
											</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
									<label class="radio_label comp_label one_line_label" data-price="<? echo $base->corpuses->corpus[2]->price; ?>"><input name="comp" type="radio">
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
											<a href="img/RECARD-88.jpg" class="zoom_link">
												<img src="img/53.png">
											</a>
											<div class="zoom_link_hover">
												<img src="img/lupa.png">
											</div>
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">GreenVision 3, Mid-Tower (41,5 х 18 х 43 см)</div>
											<div class="radio_description_text">
												Яркий и стильный корпус черного цвета формата Mid-Tower со стильной синей подсветкой
											</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
									<label class="radio_label comp_label one_line_label" data-price="<? echo $base->corpuses->corpus[3]->price; ?>"><input name="comp" type="radio">
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
											<a href="img/77013.jpg" class="zoom_link">
												<img src="img/7701.png">
											</a>
											<div class="zoom_link_hover">
												<img src="img/lupa.png">
											</div>
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">GreenVision 4, Mid-Tower (40 х 18 х 46,5 см)</div>
											<div class="radio_description_text">
												Яркий и стильный корпус черного цвета. На лицевой панели 1 x USB 3.0, 2 x USB 2.0
											</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
									<label class="radio_label comp_label" data-price="<? echo $base->corpuses->corpus[4]->price; ?>"><input name="comp" type="radio" checked>
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
											<a href="img/RECARD0320.jpg" class="zoom_link">
												<img src="img/52.png">
											</a>	
											<div class="zoom_link_hover">
												<img src="img/lupa.png">
											</div>
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">Raidmax Viper 2, Mid-Tower (49 x 20,6 x 46,2 см)</div>
											<div class="radio_description_text">
												Превосходная вентиляция корпуса. 120-миллиметровый вентилятор. На лицевой панели 1 x USB 3.0, 1 x USB 2.0 и аудио-порты. Крутой игровой дизайн корпуса никого не оставит равнодушным.
											</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
									<label class="radio_label comp_label" data-price="<? echo $base->corpuses->corpus[5]->price; ?>"><input name="comp" type="radio">
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
											<a href="img/RECARD-4.jpg" class="zoom_link">
												<img src="img/51.png">
											</a>	
											<div class="zoom_link_hover">
												<img src="img/lupa.png">
											</div>
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">Raidmax NINJA 2 Black, Mid-Tower (49,1 x 20,6 x 46,2 см)</div>
											<div class="radio_description_text">
												Спереди: 1 x 120 мм White LED, Сзади: 1 x 120 мм. На лицевой панели 1 x USB 3.0, 1 x USB 2.0 и аудио-порты. Крутой игровой дизайн корпуса никого не оставит равнодушным.
											</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
								</div>
							</div>
						</div>
					</div>
					<div class="tab_content_inner" id="tab_accesories_content">
						<div class="tab_content_description">
							Здесь мы подобрали все самое лучшее дополнительное оборудование для игрового<br>
							компьютера, которое вам наверняка понадобится. Просто установите галочку на нужном<br>
							устройстве, когда все будет готово нажмите кнопку "Купить" :)
						</div>
						<div class="accordion product_accordion">
							<div class="accordion_block monitor_block">
									<div class="accordion_btn_title">Монитор</div>
								<div class="accordion_btn">Не выбрано</div>
								<div class="accordion_content">
									<label class="radio_label"><input type="checkbox" data-price="<? echo $base->monitors->monitor[0]->price; ?>">
										<div class="tabs_checkbox">
										</div>
										<div class="radio_img">
											<img src="img/mon1.png">
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">Монитор 19" LG 19M38A-B black</div>
											<div class="radio_description_text">
												Максимальное разрешение дисплея 1366x768. Тип матрицы: TN+film. Интерфейсы: VGA.
Матовое покрытие экрана. Подсветка WLED (светодиодная подсветка). Соотношение сторон 16:9
											</div>
											</div>
											<div class="radio_price"><? echo $base->monitors->monitor[0]->price; ?> грн</div>
										</div>
									</label>
									<label class="radio_label"><input type="checkbox" data-price="<? echo $base->monitors->monitor[1]->price; ?>">
										<div class="tabs_checkbox">
										</div>
										<div class="radio_img">
											<img src="img/mon2.png">
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">Монитор 19" SAMSUNG S19F350HNI</div>
											<div class="radio_description_text">
												Максимальное разрешение дисплея 1366x768. Тип матрицы: PLS. Интерфейсы: VGA.
Матовое покрытие экрана. Подсветка WLED (светодиодная подсветка). Соотношение сторон 16:9
											</div>
											</div>
											<div class="radio_price"><? echo $base->monitors->monitor[1]->price; ?> грн</div>
										</div>
									</label>
									<label class="radio_label"><input type="checkbox" data-price="<? echo $base->monitors->monitor[2]->price; ?>">
										<div class="tabs_checkbox">
										</div>
										<div class="radio_img">
											<img src="img/mon3.png">
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">Монитор 20" Asus VS207DF</div>
											<div class="radio_description_text">
												Максимальное разрешение дисплея 1600x900. Тип матрицы: TN+film. Интерфейсы: VGA.
Матовое покрытие экрана. Подсветка WLED (светодиодная подсветка). Соотношение сторон 16:9
											</div>
											</div>
											<div class="radio_price"><? echo $base->monitors->monitor[2]->price; ?> грн</div>
										</div>
									</label>
									<label class="radio_label"><input type="checkbox" data-price="<? echo $base->monitors->monitor[3]->price; ?>">
										<div class="tabs_checkbox">
										</div>
										<div class="radio_img">
											<img src="img/mon4.png">
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">Монитор 22" SAMSUNG S22D300N</div>
											<div class="radio_description_text">
												Максимальное разрешение дисплея 1920x1080. Тип матрицы: TN. Интерфейсы: VGA.
Матовое покрытие экрана. Подсветка WLED (светодиодная подсветка). Соотношение сторон 16:9
											</div>
											</div>
											<div class="radio_price"><? echo $base->monitors->monitor[3]->price; ?> грн</div>
										</div>
									</label>
									<label class="radio_label"><input type="checkbox" data-price="<? echo $base->monitors->monitor[4]->price; ?>">
										<div class="tabs_checkbox">
										</div>
										<div class="radio_img">
											<img src="img/mon5.png">
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">Монитор 24" LG 24M38A-B</div>
											<div class="radio_description_text">
												Максимальное разрешение дисплея 1920x1080. Тип матрицы: MVA. Интерфейсы: DVI, VGA.
Матовое покрытие экрана. Подсветка WLED (светодиодная подсветка). Соотношение сторон 16:9
											</div>
											</div>
											<div class="radio_price"><? echo $base->monitors->monitor[4]->price; ?> грн</div>
										</div>
									</label>
									<label class="radio_label"><input type="checkbox" data-price="<? echo $base->monitors->monitor[5]->price; ?>">
										<div class="tabs_checkbox">
										</div>
										<div class="radio_img">
											<img src="img/mon6.png">
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">Монитор 23" LG 23MP68VQ-P</div>
											<div class="radio_description_text">
												Разрешение 1920x1080. Тип матрицы: IPS. "Безрамочный" (Сinema screen)
Матовое покрытие экрана. Подсветка WLED. Интерфейсы: DVI, HDMI, VGA
											</div>
											</div>
											<div class="radio_price"><? echo $base->monitors->monitor[5]->price; ?> грн</div>
										</div>
									</label>
									<label class="radio_label"><input type="checkbox" data-price="<? echo $base->monitors->monitor[6]->price; ?>">
										<div class="tabs_checkbox">
										</div>
										<div class="radio_img">
											<img src="img/mon7.png">
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">Монитор 24" Dell UltraSharp U2414H Black</div>
											<div class="radio_description_text">
												Разрешение: 1920 x 1080. Тип матрицы: IPS. Поворотный экран (Pivot). Регулировка по высоте.
Матовое покрытие экрана. Подсветка WLED. 5 портов USB 3.0
											</div>
											</div>
											<div class="radio_price"><? echo $base->monitors->monitor[6]->price; ?> грн</div>
										</div>
									</label>
									<label class="radio_label"><input type="checkbox" data-price="<? echo $base->monitors->monitor[7]->price; ?>">
										<div class="tabs_checkbox">
										</div>
										<div class="radio_img">
											<img src="img/mon7.png">
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">Монитор 25" Dell UltraSharp U2515H</div>
											<div class="radio_description_text">
												Разрешение: 2560 x 1440. Тип матрицы: IPS. Поворотный экран (Pivot). Регулировка по высоте.
Матовое покрытие экрана. Подсветка WLED. 5 портов USB 3.0
											</div>
											</div>
											<div class="radio_price"><? echo $base->monitors->monitor[7]->price; ?> грн</div>
										</div>
									</label>
								</div>
							</div>
							<div class="accordion_block keyboard_block">
								<div class="accordion_btn_title">Клавиатура</div>
								<div class="accordion_btn">Не выбрано</div>
								<div class="accordion_content">
									<label class="radio_label"><input type="checkbox" data-price="<? echo $base->keyboards->keyboard[0]->price; ?>">
										<div class="tabs_checkbox">
										</div>
										<div class="radio_img">
											<a href="img/key1b.jpg" class="zoom_link">
												<img src="img/key1.png">
											</a>
											<div class="zoom_link_hover">
												<img src="img/lupa.png">
											</div>
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">Клавиатура LogicPower LP-KB 000</div>
											<div class="radio_description_text">
												Доступная по своей стоимости, функциональная и надежная универсальная клавиатура для компьютера, представленная модель — это оптимальное решение.
											</div>
											</div>
											<div class="radio_price"><? echo $base->keyboards->keyboard[0]->price; ?> грн</div>
										</div>
									</label>
									<label class="radio_label"><input type="checkbox" data-price="<? echo $base->keyboards->keyboard[1]->price; ?>">
										<div class="tabs_checkbox">
										</div>
										<div class="radio_img">
											<a href="img/key2b.jpg" class="zoom_link">
												<img src="img/key2.png">
											</a>
											<div class="zoom_link_hover">
												<img src="img/lupa.png">
											</div>
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">Клавиатура Genius KB110 Black</div>
											<div class="radio_description_text">
												Классическая клавиатура среднего уровня с крупными клавишами и тихим ходом.
Защищена от случайного попадания воды. Интерфейс: USB. Тип: проводная.
											</div>
											</div>
											<div class="radio_price"><? echo $base->keyboards->keyboard[1]->price; ?> грн</div>
										</div>
									</label>
									<label class="radio_label"><input type="checkbox" data-price="<? echo $base->keyboards->keyboard[2]->price; ?>">
										<div class="tabs_checkbox">
										</div>
										<div class="radio_img">
											<a href="img/key3b.jpg" class="zoom_link">
												<img src="img/key3.png">
											</a>
											<div class="zoom_link_hover">
												<img src="img/lupa.png">
											</div>	
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">Клавиатура K120 Logitech USB (920-002522)</div>
											<div class="radio_description_text">
												Качественная, удобная и бесшумная  клавиатура с низкопрофильными клавишами.
Влагозащищенная конструкция. Прочные и хорошо различимые клавиши. USB, проводная.
											</div>
											</div>
											<div class="radio_price"><? echo $base->keyboards->keyboard[2]->price; ?> грн</div>
										</div>
									</label>
									<label class="radio_label"><input type="checkbox" data-price="<? echo $base->keyboards->keyboard[3]->price; ?>">
										<div class="tabs_checkbox">
										</div>
										<div class="radio_img">
											<a href="img/key4b.jpg" class="zoom_link">
												<img src="img/key4.png">
											</a>
											<div class="zoom_link_hover">
												<img src="img/lupa.png">
											</div>
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">Клавиатура Genius Scorpion K215 Black</div>
											<div class="radio_description_text">
												Агрессивная игровая клавиатура с разноцветной контурной подсветкой клавиш.
Имеет надежную конструкцию и защищена от пролива жидкости. Интерфейс: USB, проводная.
											</div>
											</div>
											<div class="radio_price"><? echo $base->keyboards->keyboard[3]->price; ?> грн</div>
										</div>
									</label>
									<label class="radio_label big_line_label"><input type="checkbox" data-price="<? echo $base->keyboards->keyboard[4]->price; ?>">
										<div class="tabs_checkbox">
										</div>
										<div class="radio_img">
											<a href="img/key5b.png" class="zoom_link">
												<img src="img/key5.png">
											</a>
											<div class="zoom_link_hover">
												<img src="img/lupa.png">
											</div>	
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">Клавиатура Aula Expert Gaming Keyboard Be Fire</div>
											<div class="radio_description_text">
												Три варианта светодиодной подсветки с регулируемой яркостью (красный / синий / фиолетовый)
Возможность одновременного нажатия до 10 клавиш (Anti-Ghosting). Многоклавишные сочетания, переключатель игрового режима, мгновенный доступ к функциям мультимедиа (12 клавиш).
											</div>
											</div>
											<div class="radio_price"><? echo $base->keyboards->keyboard[4]->price; ?> грн</div>
										</div>
									</label>
									<label class="radio_label big_line_label"><input type="checkbox" data-price="<? echo $base->keyboards->keyboard[5]->price; ?>">
										<div class="tabs_checkbox">
										</div>
										<div class="radio_img">
											<a href="img/key6b.jpg" class="zoom_link">
												<img src="img/key6.png">
											</a>
											<div class="zoom_link_hover">
												<img src="img/lupa.png">
											</div>	
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">Клавиатура SteelSeries Apex Raw Black</div>
											<div class="radio_description_text">
												Игровая клавиатура с утонченным дизайном, оптимальное решение для профессиональных и начинающих игроков. Кабель защищен качественной тканевой оплеткой. Четкий ход клавиш, встроенная регулируемая подсветка с 8 градациями, наличие 17 программируемых клавиш.
											</div>
											</div>
											<div class="radio_price"><? echo $base->keyboards->keyboard[5]->price; ?> грн</div>
										</div>
									</label>
								</div>
							</div>
							<div class="accordion_block mouse_block">
								<div class="accordion_btn_title">Мышь</div>
								<div class="accordion_btn">Не выбрано</div>
								<div class="accordion_content">
									<label class="radio_label"><input type="checkbox" data-price="<? echo $base->mouses->mouse[0]->price; ?>">
										<div class="tabs_checkbox">
										</div>
										<div class="radio_img">
											<a href="img/mouse1b.jpg" class="zoom_link">
												<img src="img/mouse1.png">
											</a>
											<div class="zoom_link_hover">
												<img src="img/lupa.png">
											</div>	
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">Мышь LogicFox LF-MS 111 USB</div>
											<div class="radio_description_text">
												Доступная по своей стоимости, функциональная и надежная мышь, выполнена из прочного пластика. Представленная модель — это оптимальное решение начального уровня.
											</div>
											</div>
											<div class="radio_price"><? echo $base->mouses->mouse[0]->price; ?> грн</div>
										</div>
									</label>
									<label class="radio_label"><input type="checkbox" data-price="<? echo $base->mouses->mouse[1]->price; ?>">
										<div class="tabs_checkbox">
										</div>
										<div class="radio_img">
											<a href="img/mouse2b.jpg" class="zoom_link">
												<img src="img/mouse2.png">
											</a>
											<div class="zoom_link_hover">
												<img src="img/lupa.png">
											</div>	
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">Мышь  Logitech B100</div>
											<div class="radio_description_text">
												Удобная простая оптическая мышь из качественного пластика. Проводная, USB.
Для обеих рук (симметричный дизайн). Чувствительность: 800 dpi
											</div>
											</div>
											<div class="radio_price"><? echo $base->mouses->mouse[1]->price; ?> грн</div>
										</div>
									</label>
									<label class="radio_label"><input type="checkbox" data-price="<? echo $base->mouses->mouse[2]->price; ?>">
										<div class="tabs_checkbox">
										</div>
										<div class="radio_img">
											<a href="img/mouse3b.jpg" class="zoom_link">
												<img src="img/mouse3.png">
											</a>
											<div class="zoom_link_hover">
												<img src="img/lupa.png">
											</div>	
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">Мышь  LogicFox Gaming Series LF-GM 046</div>
											<div class="radio_description_text">
												Геймерская мышь с оптическим сенсором. 4-х уровневый переключатель разрешения со светодиодным индикатором. Симметричная форма, качественный пластик.  6 кнопок + скрол
											</div>
											</div>
											<div class="radio_price"><? echo $base->mouses->mouse[2]->price; ?> грн</div>
										</div>
									</label>
									<label class="radio_label"><input type="checkbox" data-price="<? echo $base->mouses->mouse[3]->price; ?>">
										<div class="tabs_checkbox">
										</div>
										<div class="radio_img">
											<a href="img/mouse4b.jpg" class="zoom_link">
												<img src="img/mouse4.png">
											</a>
											<div class="zoom_link_hover">
												<img src="img/lupa.png">
											</div>	
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">Мышь SteelSeries Rival 100 Black</div>
											<div class="radio_description_text">
												Вооруженная лучшим в своем роде сенсором и 6-ти программируемыми кнопками, может похвастаться разгоняемым до 4000 показателем CPI, переключателями со сроком жизни в 30 миллионов кликов и 16.8 миллионной цветовой RGB-подсветкой.
											</div>
											</div>
											<div class="radio_price"><? echo $base->mouses->mouse[3]->price; ?> грн</div>
										</div>
									</label>
									<label class="radio_label big_line_label"><input type="checkbox" data-price="<? echo $base->mouses->mouse[4]->price; ?>">
										<div class="tabs_checkbox">
										</div>
										<div class="radio_img">
											<a href="img/mouse5b.jpg" class="zoom_link">
												<img src="img/mouse5.png">
											</a>
											<div class="zoom_link_hover">
												<img src="img/lupa.png">
											</div>	
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">Мышь Razer Mamba Tournament Edition</div>
											<div class="radio_description_text">
												Самый точный в мире сенсор для игровой мыши. Razer Mamba оснащена сверхчувствительными кнопками с регулируемым механизмом силы нажатия, который вы можете отрегулировать согласно своим предпочтениям. Вы сами выбираете цвет своей мыши, который подсвечивает колесика и боковые линии.
											</div>
											</div>
											<div class="radio_price"><? echo $base->mouses->mouse[4]->price; ?> грн</div>
										</div>
									</label>
								</div>
							</div>
							<div class="accordion_block complect_block">
								<div class="accordion_btn_title">Комплекты</div>
								<div class="accordion_btn">Не выбрано</div>
								<div class="accordion_content">
									<label class="radio_label"><input type="checkbox" data-price="<? echo $base->complects->complect[0]->price; ?>">
										<div class="tabs_checkbox">
										</div>
										<div class="radio_img">
											<a href="img/k1b.jpg" class="zoom_link">
												<img src="img/k1.png">
											</a>	
											<div class="zoom_link_hover">
												<img src="img/lupa.png">
											</div>
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">Комплект LogicFox Combo black</div>
											<div class="radio_description_text">
												Клавиатура + Мышь. Беспроводной комплект начального уровня. Тип подключения: 2.4G wireless Корпус изготовлен из высококачественного ABS пластика. Рабочее расстояние: до 10 метров.
											</div>
											</div>
											<div class="radio_price"><? echo $base->complects->complect[0]->price; ?> грн</div>
										</div>
									</label>
									<label class="radio_label"><input type="checkbox" data-price="<? echo $base->complects->complect[1]->price; ?>">
										<div class="tabs_checkbox">
										</div>
										<div class="radio_img">
											<a href="img/k2b.jpg" class="zoom_link">
												<img src="img/k2.png">
											</a>
											<div class="zoom_link_hover">
												<img src="img/lupa.png">
											</div>	
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">Комплект Genius SlimStar 2.4G Black</div>
											<div class="radio_description_text">
												Клавиатура + Мышь.  Беспроводной комплект среднего уровня. Более качественный пластик.
Плоская клавиатура защищена от брызг. Мышь оптическая, с разрешением 1000 dpi.
											</div>
											</div>
											<div class="radio_price"><? echo $base->complects->complect[1]->price; ?> грн</div>
										</div>
									</label>
									<label class="radio_label big_line_label"><input type="checkbox" data-price="<? echo $base->complects->complect[2]->price; ?>">
										<div class="tabs_checkbox">
										</div>
										<div class="radio_img">
											<a href="img/k3b.png" class="zoom_link">
												<img src="img/k3.png">
											</a>
											<div class="zoom_link_hover">
												<img src="img/lupa.png">
											</div>	
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">Комплект Logitech Wireless Combo MK220</div>
											<div class="radio_description_text">
												Клавиатура + Мышь.  Качественный беспроводной комплект высокого уровня. Клавиатура работает практически бесшумно. Дизайн в стиле минимализма.  Надежная беспроводная связь позволяет работать и играть в радиусе до 10 метров. Мышь оптическая, с разрешением 1000 dpi.
											</div>
											</div>
											<div class="radio_price"><? echo $base->complects->complect[2]->price; ?> грн</div>
										</div>
									</label>
								</div>
							</div>
						</div>
					</div>
					<div class="tab_content_inner" id="tab_fps_content">
						<div class="tab_content_description">
							Мы отслеживаем новые выпуски самых интересных игр и тестируем FPS<br>
							наших компьютеров на различных настройках качества<br>
							в различных разрешениях экрана
						</div>
						<div class="tabs_fps_container">
							<div class="tabs_fps_inner_block clearfix">
								<div class="tabs_fps_image">
									<img src="img/doom-4.jpg">
								</div>
								<div class="tabs_fps_info">
									<div class="tabs_fps_game">Doom 4</div>
									<div class="tabs_fps_settings">Ультра настройки</div>
									<div class="tabs_fps_scale_block">
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_title">Full HD</div>
											<div class="fps_scale">
												<div class="fps_scale_filler filler_green" style="background-color:<? echo $base->computers->comp[0]->games->game[0]->color[0]; ?>; width:<? echo $base->computers->comp[0]->games->game[0]->percent[0]; ?>%;"></div>
											</div>
										</div>
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_number fps_number_green"><? echo $base->computers->comp[0]->games->game[0]->fps[0]; ?></div>
											<div class="fps_fps">FPS</div>
										</div>
									</div>
									<div class="tabs_fps_scale_block">
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_title">2K 2560X1440</div>
											<div class="fps_scale">
												<div class="fps_scale_filler" style="background-color:<? echo $base->computers->comp[0]->games->game[0]->color[1]; ?>; width:<? echo $base->computers->comp[0]->games->game[0]->percent[1]; ?>%;"></div>
											</div>
										</div>
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_number"><? echo $base->computers->comp[0]->games->game[0]->fps[1]; ?></div>
											<div class="fps_fps">FPS</div>
										</div>
									</div>
								</div>
							</div>
							<div class="tabs_fps_inner_block clearfix">
								<div class="tabs_fps_image">
									<img src="img/battlefield1.jpg">
								</div>
								<div class="tabs_fps_info">
									<div class="tabs_fps_game">Battlefield 1</div>
									<div class="tabs_fps_settings">Ультра настройки</div>
									<div class="tabs_fps_scale_block">
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_title">Full HD</div>
											<div class="fps_scale">
												<div class="fps_scale_filler filler_green" style="background-color:<? echo $base->computers->comp[0]->games->game[1]->color[0]; ?>; width:<? echo $base->computers->comp[0]->games->game[1]->percent[0]; ?>%;"></div>
											</div>
										</div>
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_number fps_number_green"><? echo $base->computers->comp[0]->games->game[1]->fps[0]; ?></div>
											<div class="fps_fps">FPS</div>
										</div>
									</div>
									<div class="tabs_fps_scale_block">
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_title">2K 2560X1440</div>
											<div class="fps_scale">
												<div class="fps_scale_filler" style="background-color:<? echo $base->computers->comp[0]->games->game[1]->color[1]; ?>; width:<? echo $base->computers->comp[0]->games->game[1]->percent[1]; ?>%;"></div>
											</div>
										</div>
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_number"><? echo $base->computers->comp[0]->games->game[1]->fps[1]; ?></div>
											<div class="fps_fps">FPS</div>
										</div>
									</div>
								</div>
							</div>
							<div class="tabs_fps_inner_block clearfix">
								<div class="tabs_fps_image">
									<img src="img/for-honor.jpg">
								</div>
								<div class="tabs_fps_info">
									<div class="tabs_fps_game">For Honor</div>
									<div class="tabs_fps_settings">Ультра настройки</div>
									<div class="tabs_fps_scale_block">
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_title">Full HD</div>
											<div class="fps_scale">
												<div class="fps_scale_filler filler_green" style="background-color:<? echo $base->computers->comp[0]->games->game[2]->color[0]; ?>; width:<? echo $base->computers->comp[0]->games->game[2]->percent[0]; ?>%;"></div>
											</div>
										</div>
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_number fps_number_green"><? echo $base->computers->comp[0]->games->game[2]->fps[0]; ?></div>
											<div class="fps_fps">FPS</div>
										</div>
									</div>
									<div class="tabs_fps_scale_block">
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_title">2K 2560X1440</div>
											<div class="fps_scale">
												<div class="fps_scale_filler" style="background-color:<? echo $base->computers->comp[0]->games->game[2]->color[1]; ?>; width:<? echo $base->computers->comp[0]->games->game[2]->percent[1]; ?>%;"></div>
											</div>
										</div>
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_number"><? echo $base->computers->comp[0]->games->game[2]->fps[1]; ?></div>
											<div class="fps_fps">FPS</div>
										</div>
									</div>
								</div>
							</div>
							<div class="tabs_fps_inner_block clearfix">
								<div class="tabs_fps_image">
									<img src="img/gta-5.jpg">
								</div>
								<div class="tabs_fps_info">
									<div class="tabs_fps_game">GTA 5</div>
									<div class="tabs_fps_settings">Ультра настройки</div>
									<div class="tabs_fps_scale_block">
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_title">Full HD</div>
											<div class="fps_scale">
												<div class="fps_scale_filler filler_green" style="background-color:<? echo $base->computers->comp[0]->games->game[3]->color[0]; ?>; width:<? echo $base->computers->comp[0]->games->game[3]->percent[0]; ?>%;"></div>
											</div>
										</div>
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_number fps_number_green"><? echo $base->computers->comp[0]->games->game[3]->fps[0]; ?></div>
											<div class="fps_fps">FPS</div>
										</div>
									</div>
									<div class="tabs_fps_scale_block">
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_title">2K 2560X1440</div>
											<div class="fps_scale">
												<div class="fps_scale_filler" style="background-color:<? echo $base->computers->comp[0]->games->game[3]->color[1]; ?>; width:<? echo $base->computers->comp[0]->games->game[3]->percent[1]; ?>%;"></div>
											</div>
										</div>
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_number"><? echo $base->computers->comp[0]->games->game[3]->fps[1]; ?></div>
											<div class="fps_fps">FPS</div>
										</div>
									</div>
								</div>
							</div>
							<div class="tabs_fps_inner_block clearfix">
								<div class="tabs_fps_image">
									<img src="img/witcher.jpg">
								</div>
								<div class="tabs_fps_info">
									<div class="tabs_fps_game">Ведьмак 3</div>
									<div class="tabs_fps_settings">Ультра настройки</div>
									<div class="tabs_fps_scale_block">
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_title">Full HD</div>
											<div class="fps_scale">
												<div class="fps_scale_filler filler_green" style="background-color:<? echo $base->computers->comp[0]->games->game[4]->color[0]; ?>; width:<? echo $base->computers->comp[0]->games->game[4]->percent[0]; ?>%;"></div>
											</div>
										</div>
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_number fps_number_green"><? echo $base->computers->comp[0]->games->game[4]->fps[0]; ?></div>
											<div class="fps_fps">FPS</div>
										</div>
									</div>
									<div class="tabs_fps_scale_block">
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_title">2K 2560X1440</div>
											<div class="fps_scale">
												<div class="fps_scale_filler" style="background-color:<? echo $base->computers->comp[0]->games->game[4]->color[1]; ?>; width:<? echo $base->computers->comp[0]->games->game[4]->percent[1]; ?>%;"></div>
											</div>
										</div>
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_number"><? echo $base->computers->comp[0]->games->game[4]->fps[1]; ?></div>
											<div class="fps_fps">FPS</div>
										</div>
									</div>
								</div>
							</div>
							<div class="tabs_fps_inner_block clearfix">
								<div class="tabs_fps_image">
									<img src="img/overwatch.jpg">
								</div>
								<div class="tabs_fps_info">
									<div class="tabs_fps_game">Overwatch</div>
									<div class="tabs_fps_settings">Ультра настройки</div>
									<div class="tabs_fps_scale_block">
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_title">Full HD</div>
											<div class="fps_scale">
												<div class="fps_scale_filler filler_green" style="background-color:<? echo $base->computers->comp[0]->games->game[5]->color[1]; ?>; width:<? echo $base->computers->comp[0]->games->game[5]->percent[1]; ?>%;"></div>
											</div>
										</div>
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_number fps_number_green"><? echo $base->computers->comp[0]->games->game[5]->fps[0]; ?></div>
											<div class="fps_fps">FPS</div>
										</div>
									</div>
									<div class="tabs_fps_scale_block">
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_title">2K 2560X1440</div>
											<div class="fps_scale">
												<div class="fps_scale_filler" style="background-color:<? echo $base->computers->comp[0]->games->game[5]->color[1]; ?>; width:<? echo $base->computers->comp[0]->games->game[5]->percent[1]; ?>%;"></div>
											</div>
										</div>
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_number"><? echo $base->computers->comp[0]->games->game[5]->fps[1]; ?></div>
											<div class="fps_fps">FPS</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="footer_colored_separator clearfix">
				<div class="color c1"></div>
				<div class="color c2"></div>
				<div class="color c3"></div>
				<div class="color c4"></div>
				<div class="color c5"></div>
			</div>
		</div>
	</div>
	<div class="product_footer">
		<div class="product_wrapper">
			<div class="product_footer_container">
				<div class="product_footer_inner">
					<div class="product_footer_logo">
						<img src="img/logo.svg">
					</div>	
					<div class="footer_text">
						Мы собираем мощные игровые компьютеры.<br>
						Индивидуальная ручная сборка под заказ,<br>
						разгон процессоров и видеокарт, установка<br>
						систем воздушного и водяного охлаждения.
					</div>
					<div class="footer_social_share">
						<script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
<script src="//yastatic.net/share2/share.js"></script>
<div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,moimir,gplus,viber,skype,telegram"></div>
					</div>
				</div>
				<div class="product_footer_inner">
					<div class="product_footer_title">Покупателям</div>
					<div class="footer_link_wrapper">
						<a href="builder.html" class="product_footer_link">Собрать компьютер</a>
					</div>
					<div class="footer_link_wrapper">
						<a href="delivery.html" class="product_footer_link">Доставка и оплата</a>
					</div>
					<div class="footer_link_wrapper">	
						<a href="service.html" class="product_footer_link">Гарантия и сервис</a>
					</div>
					<div class="footer_link_wrapper">	
						<a href="exchange.html" class="product_footer_link">Возврат и обмен</a>
					</div>
				</div>
				<div class="product_footer_inner">
					<div class="product_footer_title">Харьков</div>
					<div class="footer_dark_text">Харьков, ул. Полтавский шлях 9</div>
					<div class="product_footer_title">Киев</div>
					<div class="footer_dark_text">ул. Авиаконструктора Антонова 43</div>
				</div>
				<div class="product_footer_inner">
					<div class="product_footer_title">Режим работы</div>
					<div class="footer_dark_text">
						Будни: 9:00—21:00<br>
						СБ-ВС: 9:00—20:00
					</div>
					<div class="footer_tel_block">
						<img src="img/mail.png">
						<a href="mailto:mail@регард.com">mail@регард.com</a>
					</div>
					<div class="footer_tel_block">
						<img src="img/kievstar.png">
					(067) 464-41-50
					</div>
					<div class="footer_tel_block">
						<img src="img/mts.jpg">
						(050) 324-60-25
					</div>
					<div class="footer_tel_block">
						<img src="img/lifecell.png">
					(063) 606-53-06
					</div>
				</div>
			</div>
		</div>
	</div>
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
</body>
</html>























