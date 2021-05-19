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
	<title>Регард</title>
	<meta name="description" content="Регард.com - магазин №1 игровых компьютеров в Украине. Оплата частями и мгновенная рассрочка от ПриватБанка. Официальная гарантия ☑ Бесплатная доставка по всей Украине ✈">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/product-mobile.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<? 
	$ie8 = strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE');
	$ie11 = strpos($_SERVER['HTTP_USER_AGENT'], 'Trident');
	$ieedge = strpos($_SERVER['HTTP_USER_AGENT'], 'Edge');
	$ief = strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox');
	if ($ie8 === true || $ie11 == true || $ieedge == true || $ief == true) { ?>
	<link rel="stylesheet" type="text/css" href="css/ie.css">
	<? } ?>
	<script src="js/jquery.js"></script>
	<script type="text/javascript">
		var ppPercentPrice = 0;
		$(document).ready(function(){
			addToNewPrice = 0;
			addToOldPrice = 0;

			city_name = '<? echo $city_name; ?>';
	   		utm_term = '<? echo $_SESSION["utm_term"]; ?>';
	   		utm_content = '<? echo $_SESSION["utm_content"]; ?>';
	   		utm_compaign = '<? echo $_SESSION["utm_compaign"]; ?>';
	   		utm_medium = '<? echo $_SESSION["utm_medium"]; ?>';
	   		utm_source = '<? echo $_SESSION["utm_source"]; ?>';
		})
	</script>
	<script src="js/number.js"></script>
	<script src="js/script.js"></script>
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div class="header clearfix">
		<div class="wrapper">
			<a href="index.html">
				<div class="logo">
					<img src="img/logo.svg">
					<h3>Компьютеры по цене комплектующих</h3>
				</div>
			</a>
			<!-- <div class="callback_btn">Заказать звонок</div> -->
			<div class="header_phones">
				<div class="header_phones_title">Бесплатно со всех номеров Украины</div>
				<div class="header_phones_nubmer">0 800 753 853</div>
				<div class="header_phones_inner">
					<div class="header_info_inner_block">
						ПН - ПТ с 09:00 до 21:00
					</div>
					<div class="header_info_inner_block">
						СБ с 09:00 до 20:00
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
	<div class="calculator_block">
		<div class="wrapper">
			<h2>Быстрый калькулятор для подбора<br>3-х вариантов компьютера за 15 мин.</h2>
			<h3>Оставьте заявку и наш инженер сделает точный расчет<br>
				3-х вариантов компьютера за 15 минут</h3>
			<form class="calculator_form_block">
				<div class="select_block clearfix">
					<div class="select_long">
						<div class="select_img">
							<img src="img/cpu.svg">
						</div>
						<div class="select_inner">
							<div class="select_title">Процессор</div>
							<select name="cpu">
								<option value="INTEL">INTEL</option>
								<option value="AMD">AMD</option>
								<option value="4-ЯДРА AMD Athlon X4 840 3,8GHz">4-ЯДРА AMD Athlon X4 840 3,8GHz</option>
								<option value="4-ЯДРА AMD Athlon X4 860K 4,0GHz">4-ЯДРА AMD Athlon X4 860K 4,0GHz</option>
								<option value="4-ЯДРА AMD FX-4300 3,8GHz">4-ЯДРА AMD FX-4300 3,8GHz</option>
								<option value="6-ЯДЕР AMD FX-6300 4,1GHz">6-ЯДЕР AMD FX-6300 4,1GHz</option>
								<option value="8-ЯДЕР AMD FX-8300 4,2GHz">8-ЯДЕР AMD FX-8300 4,2GHz</option>
								<option value="Intel Celeron G3900 2,80GHz">Intel Celeron G3900 2,80GHz</option>
								<option value="Intel Pentium G4400 3,30GHz">Intel Pentium G4400 3,30GHz</option>
								<option value="Intel Pentium G4500 3,50GHz">Intel Pentium G4500 3,50GHz</option>
								<option value="Intel Pentium G4560 3,50GHz">Intel Pentium G4560 3,50GHz</option>
								<option value="Intel Core i3-7100 3,90GHz">Intel Core i3-7100 3,90GHz</option>
								<option value="Intel Core i3-7300 4,00GHz">Intel Core i3-7300 4,00GHz</option>
								<option value="Intel Core i5-7400 3,8GHz">Intel Core i5-7400 3,8GHz</option>
								<option value="Intel Core i5-7500 3,8GHz">Intel Core i5-7500 3,8GHz</option>
								<option value="Intel Core i5-7600 4,1GHz">Intel Core i5-7600 4,1GHz</option>
								<option value="Intel Core i5-7600k 4,2GHz">Intel Core i5-7600k 4,2GHz</option>
								<option value="Intel Core i7-7700 4,20GHz">Intel Core i7-7700 4,20GHz</option>
								<option value="Intel Core i7-7700k 4,50GHz">Intel Core i7-7700k 4,50GHz</option>
								<option value="Intel Core i7-6800K 3,80GHz">Intel Core i7-6800K 3,80GHz</option>
								<option value="Intel Core i7-6850K 4,00GHz">Intel Core i7-6850K 4,00GHz</option>
								<option value="Intel Core i7-6900K 4,00GHz">Intel Core i7-6900K 4,00GHz</option>
								<option value="AMD Ryzen 5 1400 3,4GHz">AMD Ryzen 5 1400 3,4GHz</option>
								<option value="AMD Ryzen 5 1600 3,6GHz">AMD Ryzen 5 1600 3,6GHz</option>
								<option value="AMD RYZEN 7 1700 3,7GHz">AMD RYZEN 7 1700 3,7GHz</option>
								<option value="AMD RYZEN 7 1700X 3,8GHz">AMD RYZEN 7 1700X 3,8GHz</option>
								<option value="AMD RYZEN 7 1800X 4.00GHz">AMD RYZEN 7 1800X 4.00GHz</option>								
							</select>
						</div>
					</div>
					<div class="select_short">
						<div class="select_img">
							<img src="img/drive.svg">
						</div>
						<div class="select_inner">
							<div class="select_title">Жесткий диск</div>
							<select name="hdd">
								<option value="Не устанавливать">Не устанавливать</option>
								<option value="320 GB HDD">320 GB HDD</option>
								<option value="500 GB HDD">500 GB HDD</option>
								<option value="1 TB HDD">1 TB HDD</option>
								<option value="2 TB HDD">2 TB HDD</option>
								<option value="3 TB HDD">3 TB HDD</option>
								<option value="4 TB HDD">4 TB HDD</option>
							</select>
						</div>
					</div>
				</div>
				<div class="select_block clearfix">
					<div class="select_long">
						<div class="select_img">
							<img src="img/videocard.svg">
						</div>
						<div class="select_inner">
							<div class="select_title">Видеокарта</div>
							<select name="video">
								<option value="NVIDIA GEFORCE">NVIDIA GEFORCE</option>
								<option value="ATI RАDEON">ATI RАDEON</option>
								<option value="RАDEON R7 250, 2GB DDR5">RАDEON R7 250, 2GB DDR5</option>
								<option value="RАDEON RX 460 2GB DDR5">RАDEON RX 460 2GB DDR5</option>
								<option value="RАDEON RX 460 4GB DDR5">RАDEON RX 460 4GB DDR5</option>
								<option value="RАDEON RX 470 4GB DDR5">RАDEON RX 470 4GB DDR5</option>
								<option value="RАDEON RX 470 8GB DDR5">RАDEON RX 470 8GB DDR5</option>
								<option value="RАDEON RX 480 4GB DDR5">RАDEON RX 480 4GB DDR5</option>
								<option value="RАDEON RX 480 8GB DDR5">RАDEON RX 480 8GB DDR5</option>
								<option value="NVIDIA GeForce GT 730, 2GB">NVIDIA GeForce GT 730, 2GB</option>
								<option value="NVIDIA GeForce GT 740, 2GB">NVIDIA GeForce GT 740, 2GB</option>
								<option value="NVIDIA GeForce GTX 750 Ti, 2GB">NVIDIA GeForce GTX 750 Ti, 2GB</option>
								<option value="NVIDIA GeForce GTX 1050, 2GB">NVIDIA GeForce GTX 1050, 2GB</option>
								<option value="NVIDIA GeForce GTX 1050 Ti, 4GB">NVIDIA GeForce GTX 1050 Ti, 4GB</option>
								<option value="NVIDIA GeForce GTX 1060, 3GB">NVIDIA GeForce GTX 1060, 3GB</option>
								<option value="NVIDIA GeForce GTX 1060, 6GB">NVIDIA GeForce GTX 1060, 6GB</option>
								<option value="NVIDIA GeForce GTX 1070, 8GB">NVIDIA GeForce GTX 1070, 8GB</option>
								<option value="NVIDIA GeForce GTX 1080, 8GB">NVIDIA GeForce GTX 1080, 8GB</option>
								<option value="NVIDIA GeForce GTX 1080 Ti, 11GB">NVIDIA GeForce GTX 1080 Ti, 11GB</option>
								<option value="2 x NVIDIA GeForce GTX 1080, 8GB">2 x NVIDIA GeForce GTX 1080, 8GB</option>
								<option value="2 x NVIDIA GeForce GTX 1080 Ti, 11GB">2 x NVIDIA GeForce GTX 1080 Ti, 11GB</option>
								<option value="Не устанавливать">Не устанавливать</option>
							</select>
						</div>
					</div>
					<div class="select_short">
						<div class="select_img">
							<img src="img/ssd.svg">
						</div>
						<div class="select_inner">
							<div class="select_title">SSD (не обязательно)</div>
							<select name="ssd">
								<option value="Не устанавливать">Не устанавливать</option>
								<option value="120GB SSD">120GB SSD</option>
								<option value="240GB SSD">240GB SSD</option>
								<option value="480GB SSD">480GB SSD</option>
								<option value="512GB SSD">512GB SSD</option>
								<option value="1TB SSD">1TB SSD</option>
							</select>
						</div>
					</div>
				</div>
				<div class="select_block clearfix">
					<div class="select_long">
						<div class="select_img">
							<img src="img/storage.svg">
						</div>
						<div class="select_inner">
							<div class="select_title">Оперативная память</div>
							<select name="ram">
								<option value="2Gb DDR3">2Gb DDR3</option>
								<option value="4Gb DDR3">4Gb DDR3</option>
								<option value="8Gb DDR3">8Gb DDR3</option>
								<option value="16Gb DDR3">16Gb DDR3</option>
								<option value="32Gb DDR3">32Gb DDR3</option>
								<option value="4Gb DDR4">4Gb DDR4</option>
								<option value="8Gb DDR4">8Gb DDR4</option>
								<option value="16Gb DDR4">16Gb DDR4</option>
								<option value="32GB DDR4">32GB DDR4</option>
								<option value="64GB DDR4">64GB DDR4</option>
							</select>
						</div>
					</div>
					<div class="select_short">
						<div class="select_img">
							<img src="img/purse.svg">
						</div>
						<div class="select_inner">
							<div class="select_title">Выберите ваш бюджет</div>
							<select name="budget">
								<option value="5000 ГРH.">5000 ГРH.</option>
								<option value="5500 ГРН.">5500 ГРН.</option>
								<option value="6000 ГРН.">6000 ГРН.</option>
								<option value="7000 ГРН.">7000 ГРН.</option>
								<option value="8000 ГРН.">8000 ГРН.</option>
								<option value="9000 ГРН.">9000 ГРН.</option>
								<option value="10000 ГРН.">10000 ГРН.</option>
								<option value="11000 ГРН.">11000 ГРН.</option>
								<option value="12000 ГРН.">12000 ГРН.</option>
								<option value="13000 ГРН.">13000 ГРН.</option>
								<option value="14000 ГРН.">14000 ГРН.</option>
								<option value="15000 ГРН.">15000 ГРН.</option>
								<option value="16000 ГРН.">16000 ГРН.</option>
								<option value="17000 ГРН.">17000 ГРН.</option>
								<option value="18000 ГРН.">18000 ГРН.</option>
								<option value="19000 ГРН.">19000 ГРН.</option>
								<option value="20000 ГРН.">20000 ГРН.</option>
								<option value="21000 ГРН.">21000 ГРН.</option>
								<option value="22000 ГРН.">22000 ГРН.</option>
								<option value="23000 ГРН.">23000 ГРН.</option>
								<option value="24000 ГРН.">24000 ГРН.</option>
								<option value="25000 ГРН.">25000 ГРН.</option>
								<option value="26000 ГРН.">26000 ГРН.</option>
								<option value="27000 ГРН.">27000 ГРН.</option>
								<option value="28000 ГРН.">28000 ГРН.</option>
								<option value="29000 ГРН.">29000 ГРН.</option>
								<option value="30000 ГРН.">30000 ГРН.</option>
								<option value="31000 ГРН.">31000 ГРН.</option>
								<option value="32000 ГРН.">32000 ГРН.</option>
								<option value="33000 ГРН.">33000 ГРН.</option>
								<option value="34000 ГРН.">34000 ГРН.</option>
								<option value="35000 ГРН.">35000 ГРН.</option>
								<option value="36000 ГРН.">36000 ГРН.</option>
								<option value="37000 ГРН.">37000 ГРН.</option>
								<option value="38000 ГРН.">38000 ГРН.</option>
								<option value="39000 ГРН.">39000 ГРН.</option>
								<option value="40000 ГРН.">40000 ГРН.</option>
								<option value="41000 ГРН.">41000 ГРН.</option>
								<option value="42000 ГРН.">42000 ГРН.</option>
								<option value="43000 ГРН.">43000 ГРН.</option>
								<option value="44000 ГРН.">44000 ГРН.</option>
								<option value="45000 ГРН.">45000 ГРН.</option>
								<option value="50000 ГРН.">50000 ГРН.</option>
								<option value="БОЛЕЕ 50000 ГРН.">БОЛЕЕ 50000 ГРН.</option>
								<option value="НЕ ОПРЕДЕЛИЛСЯ">НЕ ОПРЕДЕЛИЛСЯ</option>
							</select>
						</div>
					</div>
				</div>
				<textarea name="calc_comment" placeholder="ВВЕДИТЕ СООБЩЕНИЕ"></textarea>
				<div class="tel_mail_container">
					<div class="input_block">
						<div class="input_title">1. Почта для получения просчета</div>
						<input type="email" class="form_input_mail" placeholder="Введите E-mail">
					</div>
					<div class="input_block">
						<div class="input_title">2. Телефон для обсуждения скидки</div>
						<input type="tel" class="form_input_tel input_tel_1" placeholder="+38">
						<input type="tel" class="form_input_tel input_tel_2" placeholder="123" maxlength="3">
						<input type="tel" class="form_input_tel input_tel_3" placeholder="4567890" maxlength="7">
					</div>
					<div class="input_block">
						<input type="submit" class="input_form_btn" value="ПОДОБРАТЬ">
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="product_footer calc_footer">
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
				<div class="computers_footer_links">
				<a href="raven-x-treme.html" class="computers_footer_link">
					Raven X-treme
					<div class="cfl_price"><span><? echo $base->computers->comp[2]->price; ?></span> грн</div>
				</a>
				<a href="amd-ryzen.html" class="computers_footer_link">
					AMD Ryzen
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
				<div class="product_footer_inner mobile_hidden">
					<div class="product_footer_title">Адреса магазинов</div>
					<div class="footer_dark_text">Харьков, ул. Полтавский шлях 9<br>
						ул. Авиаконструктора Антонова 43
					</div>
					<div class="product_footer_title">Режим работы</div>
					<div class="footer_dark_text">
						Будни: 9:00—21:00<br>
						СБ-ВС: 9:00—20:00
					</div>
				</div>
				<div class="product_footer_inner mobile_hidden">
					<div class="product_footer_title">Контакты</div>
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
					<a href="https://vk.com/im?sel=-101179801" class="vk_consult vk_consult_main_page" target="_blank" style="display:flex;height:100px;margin-left: -12px;">
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