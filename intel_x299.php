
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
$xml_base2 = 'xml/modals.xml';
$base2 = simplexml_load_file($xml_base2);

?>
<html>
<head>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-86266167-1', 'auto');
	  ga('send', 'pageview');
	  ga('set', 'userId', 'USER_ID'); 
	</script>
	<meta charset="utf-8">
	<title>Intel X299 Core i7 Конфигуратор</title>
	<meta name="description" content="Регард.com - магазин №1 игровых компьютеров в Украине. Мгновенная рассрочка от ПриватБанка. Официальная гарантия ☑ Бесплатная доставка по всей Украине ✈">
	<link rel="stylesheet" type="text/css" href="css/style-2.css">
	<link rel="stylesheet" type="text/css" href="css/popup.css">
	<link rel="stylesheet" type="text/css" href="css/jui.css">
	<link rel="stylesheet" type="text/css" href="css/product-mobile-2.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed|Roboto:400,500,700,900" rel="stylesheet">
	<style type="text/css">
		.tabs_fps_image{
			position: relative;
			width: 50%
		}
		.tabs_fps_image img{
			position: absolute;
			margin: auto;
			bottom: 0;
			min-width: 100%;
			min-height: 100%
		}
		.tabs_fps_info{
			width: 50%;
			padding: 30px;
		}
		.tabs_fps_scale_block .fps_scale{
			width: 190px;
		}
		.tabs_fps_scale_block{
			margin-top: 20px;
		}
		@media screen and (max-width: 1600px){
			.tabs_fps_scale_block .fps_scale{
				width: 110px;
			}
		}
		@media screen and (max-width: 580px){
			.tabs_fps_image{
				position: static;
				width: 100%
			}
			.tabs_fps_image img{
				position: static;
				margin: auto;
				bottom: initial;
				min-width: 100%;
				min-height: 100%
			}
			.tabs_fps_info{
				width: 100%;
			}
		}
	</style>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta property="og:type"   content="product" />
	<meta property="og:title"  content="Griffin Power" />
	<meta property="og:description"  content="Регард.com - магазин №1 игровых компьютеров в Украине. Мгновенная рассрочка от ПриватБанка. Официальная гарантия ☑ Бесплатная доставка по всей Украине ✈" />
	<meta property="og:image"  content="http://xn--80afeb8cd.com/img/griffin-power1.jpg" /> 
	<? 
	$ie8 = strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE');
	$ie11 = strpos($_SERVER['HTTP_USER_AGENT'], 'Trident');
	$ieedge = strpos($_SERVER['HTTP_USER_AGENT'], 'Edge');
	$ief = strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox');
	if ($ie8 === true || $ie11 == true || $ieedge == true || $ief == true) { ?>
	<link rel="stylesheet" type="text/css" href="css/ie.css">
	<? } ?>
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<script src="js/jquery.js"></script>
	<script src="js/credit.js"></script>
	<script src="js/zoomsl-3.0.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/popup.js"></script>
	<script src="js/number.js"></script>
	<script type="text/javascript" src="js/jquery.inputmask.bundle.js"></script>
	<script src="js/accessories.js"></script>
	<script src="js/jui.js"></script>
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
	<script type="text/javascript">
		var	ppPercentPrice = <? echo $base->computers->comp[10]->pp; ?>;
		var device = "<?=$_SERVER['HTTP_USER_AGENT'];?>";
		$(document).ready(function(){

			addToNewPrice = <? echo $base->computers->comp[10]->nacenka->new; ?>;
			addToOldPrice = <? echo $base->computers->comp[10]->nacenka->old; ?>;

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

	   		$('#toBuy').on('click', function(){
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


			// delivery modals

			$('#db').on('click', function(){
				$('#dp').fadeIn();
			})

			$('#db2').on('click', function(){
				$('#dp').fadeIn();
			})

			$('.span_call_modal').on('click', function(){
				$('#smvp').fadeIn();
			})

			$('#payb').on('click', function(){
				$('#payp').fadeIn();
			})

			$('#garb').on('click', function(){
				$('#garp').fadeIn();
			})

			$('#backb').on('click', function(){
				$('#backp').fadeIn();
			})

			$('#winb').on('click', function(){
				$('#winp').fadeIn();
			})


			$('.follow_price_block').on('click', function(){
				$('#pchk').fadeIn();
			})

			// delivery close

			$('.delivery_close_icon').on('click', function(){
				$('.delivery_popup').fadeOut();
			})

			// to top

			$('.to_top_btn').on('click', function(){
				$('body').animate({scrollTop: 0},400)
			})

			 $('.phone_mask').inputmask('+38(099)-999-99-99')
			

		})
	</script>
	<script src="js/script-2.js"></script>
	<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '907189952768727');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=907189952768727&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->

</head>
<body class="product_body">
	<div class="screen_fade"></div>

	<!-- photo preview lightbox -->

	<div class="side_nav_photos">
		<a href="#accordion_blocks" class="side_nav_link scrolltoBlock">
			<img src="img/side-block.png">
			<div class="side_nav_link_tooltip">Корпуса</div>
		</a>
		<a href="#accordion_proc" class="side_nav_link scrolltoBlock">
			<img src="img/side-proc.png">
			<div class="side_nav_link_tooltip">Процессоры</div>
		</a>
		<a href="#accordion_cooler" class="side_nav_link scrolltoBlock">
			<img src="img/side-psu.png">
			<div class="side_nav_link_tooltip">Кулер</div>
		</a>
		<a href="#accordion_video" class="side_nav_link scrolltoBlock">
			<img src="img/side-video-card.png">
			<div class="side_nav_link_tooltip">Видеокарты</div>
		</a>
		<a href="#accordion_memory" class="side_nav_link scrolltoBlock">
			<img src="img/side-memory.png">
			<div class="side_nav_link_tooltip">Оперативка</div>
		</a>
		<a href="#accordion_storage" class="side_nav_link scrolltoBlock">
			<img src="img/side-storage.png">
			<div class="side_nav_link_tooltip">Накопитель</div>
		</a>
		<a href="#accordion_motherboard" class="side_nav_link scrolltoBlock">
			<img src="img/side-motherboard.png">
			<div class="side_nav_link_tooltip">Материнки</div>
		</a>
		<a href="#accordion_optical" class="side_nav_link scrolltoBlock">
			<img src="img/side-optical.png">
			<div class="side_nav_link_tooltip">Дисковод</div>
		</a>
	</div>

	<div class="photo_preview_bg">
		<div class="photo_preview_modal clearfix">
			<div class="photo_preview_close_icon">
				×
			</div>
			<div class="photo_preview_main_photo_container">
				<div class="photo_preview_main_photo">
					<img src="img/roundphoto01.jpg">
				</div>
			</div>
			<div class="photo_preview_side_menu">
				<div class="photo_preview_mini_photo active">
					<img src="img/roundphoto01.jpg">
				</div>
				<div class="photo_preview_mini_photo">
					<img src="img/roundphoto02.jpg">
				</div>
				<div class="photo_preview_mini_photo">
					<img src="img/roundphoto01.jpg">
				</div>
				<div class="photo_preview_mini_photo">
					<img src="img/roundphoto02.jpg">
				</div>
				<div class="photo_preview_mini_photo">
					<img src="img/roundphoto01.jpg">
				</div>
				<div class="photo_preview_mini_photo">
					<img src="img/roundphoto02.jpg">
				</div>
				<div class="photo_preview_mini_photo">
					<img src="img/roundphoto01.jpg">
				</div>
			</div>
		</div>
	</div>

	<!-- main photos preview block -->

	<div class="main_photo_preview_bg">
		<div class="main_photo_preview_modal clearfix">
			<div class="main_photo_preview_close_icon">
				×
			</div>
			<div class="main_photo_preview_main_photo_container">
				<div class="main_photo_preview_main_photo stopProp">
					<img src="img/roundphoto01.jpg">
				</div>
				<div class="main_photo_preview_video_container">
					
					<<div class="photo_preview_video_innner" id="lightbox_video02">
						<iframe width="100%" height="100%" src="https://www.youtube.com/embed/ewG98Gw4Res?rel=0" frameborder="0" allowfullscreen></iframe>
					</div>
					<div class="photo_preview_video_innner" id="lightbox_video01">
						<iframe width="100%" height="100%" src="https://https://www.youtube.com/embed/E2Z0zaVOick?rel=0" frameborder="0" allowfullscreen></iframe>
					</div>
					<div class="photo_preview_video_innner" id="lightbox_video01">
						<iframe width="100%" height="100%" src="https://www.youtube.com/embed/gltupxf5jK4?rel=0" frameborder="0" allowfullscreen></iframe>
					</div>
				</div>
			</div>
			<div class="main_photo_preview_side_menu">
				
			</div>
		</div>
	</div>

	<!-- modals for blocks and accessories -->

	<div class="accessories_modal_bg">
		<div class="access_modal">
			<div class="access_modal_header clearfix">
				<div class="access_modal_tab_button_photos active">Фотографии
					<div class="access_btn_line"></div>
				</div>
				<div class="access_modal_tab_button_characteristics">Характеристики
					<div class="access_btn_line"></div>
				</div>
				<div class="access_modal_close_icon">×</div>
			</div>
			<div class="access_modal_body">
				<div class="access_modal_tab_content photos clearfix">
					<div class="access_main_photo_container">
						<div class="access_main_photo_container_inner">
							<img src="img/roundphoto02.jpg">
						</div>
						<div class="access_left_arrow">
							<img src="img/arrowleftblack.png">
						</div>
						<div class="access_right_arrow">
							<img src="img/arrowrightblack.png">
						</div>
					</div>
					<div class="access_side_photo_container">
						<div class="access_side_photo_block selected">
							<img src="img/roundphoto02.jpg">
						</div>
						<div class="access_side_photo_block">
							<img src="img/roundphoto01.jpg">
						</div>
						<div class="access_side_photo_block">
							<img src="img/roundphoto02.jpg">
						</div>
						<div class="access_side_photo_block">
							<img src="img/roundphoto01.jpg">
						</div>
					</div>
				</div>
				<div class="access_modal_tab_content characteristics clearfix">
					<div class="access_char_main_container">
						<div class="access_char_main_container_title">Монитор Samsung 19'</div>
						<div class="access_char_main_container_char_block clearfix">
							<div class="access_char_main_container_char_block_title">Название Характеристики</div>
							<div class="access_char_main_container_char_block_char">Значение Характеристики</div>
						</div>
						<div class="access_char_main_container_char_block clearfix">
							<div class="access_char_main_container_char_block_title">Название Характеристики</div>
							<div class="access_char_main_container_char_block_char">Значение Характеристики</div>
						</div>
						<div class="access_char_main_container_char_block clearfix">
							<div class="access_char_main_container_char_block_title">Название Характеристики</div>
							<div class="access_char_main_container_char_block_char">Значение Характеристики</div>
						</div>
						<div class="access_char_main_container_char_block clearfix">
							<div class="access_char_main_container_char_block_title">Название Характеристики</div>
							<div class="access_char_main_container_char_block_char">Значение Характеристики</div>
						</div>
						<div class="access_char_main_container_char_block clearfix">
							<div class="access_char_main_container_char_block_title">Название Характеристики</div>
							<div class="access_char_main_container_char_block_char">Значение Характеристики</div>
						</div>
					</div>
					<div class="access_char_side_info">Цена, спецификация и условия могут быть изменены без предварительного уведомления. РЕГАРД.COM не несет ответственности за ошибки в описании, фотографиях или упущениях относительно цен или другой информации. Пожалуйста, смотрите подробные спецификации на сайте производителя.</div>
				</div>
			</div>
		</div>
	</div>

	<!-- end of modals for blocks and accessories -->

	<div class="bg_modal product_buy_modal">
		<div class="modal_inner product_buy_inner">
			<div class="mod_close">×</div>
			<h2>Купите компьютер сейчас</h2>
			<h3>Заполните форму и наш консультант<br>
			свяжется с вами для уточнения<br>
			данных по доставке и оплате
			</h3>	
			<div class="input_title">Введите Ваше имя и фамилию</div>
			<input type="text" placeholder="Иванов Иван" class="modal_input">
			<div class="input_title">Введите Ваш телефон</div>
			<input type="tel" class="form_input_tel phone_mask" placeholder="Введите телефон">
			
			<div class="modal_sumbit" onClick="ga('send', 'pageview', '/virtual/zhdu_zvonka');">Жду звонка!</div>
		</div>
	</div>

	<div class="bg_modal privat_prod_modal">
		<div class="modal_inner privat_prod_inner">
			<div class="mod_close">×</div>
			<h2>Воспользуйтесь мгновенной рассрочкой от ПриватБанка</h2>
			<div class="privat_info_all_price_title">Рассрочка оформляется на безналичную стоимость товара - <div class="privat_info_all_price_field"><span>0.00</span> грн.</div> б/н.</div>
 				<div class="privat_prod_flex_container">
 					<div class="privat_flex_inner" style="text-align:left;">
 						<label class="privat_radio_label" style="padding-left:0"><input type="radio" name="privat" class="privat_radio_input" value="II" checked>
 							<div class="privat_radio" style="display:none"></div>
 							<div class="privat_info_title">Мгновенная рассрочка</div>
 							<img src="img/installments.png" class="pr_cr_img_1">
 							<img src="img/privat_logo.png" class="pr_cr_img_2">
 						</label>	
 					</div>
 					<div class="privat_flex_inner">
 						<div class="privat_slider_wrapper">
 							<div class="payment_number"><span>2</span> платежей на 
			 				<select class="privat_first_slider_select">
			 					<option>1</option>
			 					<option>2</option>
			 					<option>3</option>
			 					<option>4</option>
			 					<option>5</option>
			 					<option>6</option>
			 					<option>7</option>
			 					<option>8</option>
			 					<option>9</option>
			 					<option>10</option>
			 					<option>11</option>
			 					<option>12</option>
			 					<option>13</option>
			 					<option>14</option>
			 					<option>15</option>
			 					<option>16</option>
			 					<option>17</option>
			 					<option>18</option>
			 					<option>19</option>
			 					<option>20</option>
			 					<option>21</option>
			 					<option>22</option>
			 					<option>23</option>
			 					<option>24</option>
			 				</select>
			 				мес.
			 				</div>
			 				<div class="privat_first_slider"></div>
			 				<div class="num_of_mon_flex">
			 					<div>1</div>
			 					<div style="margin-left:10px;">3</div>
			 					<div style="margin-left:27px">6</div>
			 					<div style="margin-left:27px">9</div>
			 					<div style="margin-left:22px">12</div>
			 					<div style="margin-left:25px">15</div>
			 					<div style="margin-left:25px">18</div>
			 					<div style="margin-left:25px">21</div>
			 					<div style="margin-left:25px">24</div>
			 				</div>
			 			</div>
 					</div>
 					<div class="privat_flex_inner">
 						<div class="privat_info_payment_field"><span>0.00</span> грн</div>
 						<div class="pfim">в месяц</div>
 					</div>
 				</div>
 				<div class="privat_info_comission">Ежемесячный платеж рассчитан с учетом комиссии банка - 2.9%</div>
				<div class="tel_mail_container">
					<div class="input_block">
						<div class="input_title">Введите Ваше Имя</div>
						<input type="text" class="form_input_mail" placeholder="Иванов Иван">
					</div>
					<div class="input_block">
						<div class="input_title">Введите Ваш телефон</div>
						<input type="tel" class="form_input_tel phone_mask" placeholder="Введите телефон">
					</div>
					<div class="input_block">
						<input type="submit" class="input_form_btn" value="Купить">
					</div>
				</div>
				<div class="privat_message_container">
					<div class="privat_message"><span>Внимание.</span> Максимальная сумма покупки расчитывается индивидуально для каждого клиента. Чтобы узнать<br>максимально доступную Вам сумму, отправьте SMS на номер <span>10060</span> с кодом <span>chast</span>.</div>
				</div>
		</div>
	</div>

<div class="delivery_popup" id="dp">
		<div class="delivery_close_icon">
			×
		</div>
		<div class="delivery_popup_container">
			<div class="delivery_popup_inner">
				<h4>Самовывоз из нашего магазина в Киеве<br>(ул. Маршала Гречко 13)</h4>
				<p>С понедельника по пятницу с 10:00 до 19:00. Cуббота Воскресенье - выходной. </br>Самовывоз осуществляется после согласования.</p>
	
				
				
	
				<h4>Доставка в отделения Новой Почты</h4>
				<p>С помощью доставки Новой Почтой, Вы можете получить товар даже в самых отдаленных уголках Украины</p><p>
	В среднем, доставка занимает 1-2 дня, во время заказа наши менеджеры согласуют с Вами дату доставки перед отправкой товара.</p><p>
	Доставка Новой Почтой - БЕСПЛАТНО.</p>
				<h4>Доставка курьером по Киеву с подключением и проверкой - БЕСПЛАТНО.</h4>
			</div>
		</div>
	</div>

	<div class="delivery_popup" id="smvp" style="height:230px;">
		<div class="delivery_close_icon">
			×
		</div>
		<div class="delivery_popup_container">
			<div class="delivery_popup_inner">
				<h4>Самовывоз из нашего магазина в Киеве<br>(ул. Маршала Гречко 13)</h4>
				<p>С понедельника по пятницу с 10:00 до 19:00. Cуббота Воскресенье - выходной. </br>Самовывоз осуществляется после согласования.</p>
	
				
				
	
			</div>
		</div>
	</div>

	<div class="delivery_popup" id="payp" style="height:530px;">
		<div class="delivery_close_icon">
			×
		</div>
		<div class="delivery_popup_container">
			<div class="delivery_popup_inner">
				<h4>Наличная</h4>
				<p>Оплата наличными производится исключительно в национальной валюте.</p>
				<p>Компьютеры до 15 000 грн. отправляется без предоплаты, свыше 15 000 грн. - предоплата 5%</p>
				<h4>Безналичными</h4>
				<p>Мы являемся плательщиками НДС. Мы являемся ФОП на 2 и 3 группе единого налога. Счет может быть отправлен по электронной почте.</p>
				<h4>Мновенная рассрочка от ПриватБанка</h4>
				<p>Оформление рассрочки до 24 месяцев. Оплата равными частями. Переплата 2,9% от стоимости товара ежемесячно. Заказ может быть доставлен по Украине Новой Почтой!</p>
				<h4>Оплата частями от ПриватБанка</h4>
				<p>Оплата равными частями без переплат до 6 месяцев. Заказ может быть доставлен по Украине Новой Почтой!</p>
			</div>
		</div>
	</div>

	<div class="delivery_popup" id="garp">
		<div class="delivery_close_icon">
			×
		</div>
		<div class="delivery_popup_container">
			<div class="delivery_popup_inner">
				<p>Вместе с компьютером вы получите официальную гарантию от РЕГАРД. Гарантия распростроняется на каждое комплектующее отдельно, сроком от 1-го до 3-х лет. Срок гарантии указан в гарантийном талоне на каждое комплектующее отдельно. Компьютер не пломбируется, возможен самостоятельный апгрейд</p>
			</div>
		</div>
	</div>
	<div class="delivery_popup" id="backp">
		<div class="delivery_close_icon">
			×
		</div>
		<div class="delivery_popup_container">
			<div class="delivery_popup_inner">
				<h4>Обмен и возврат товара в течение первых 14 дней после покупки.</h4>
				<p>В соответствии с «Законом о защите прав потребителя» покупатели нашего магазина имеют право обменять или вернуть купленный у нас товар в течение первых 14 дней после покупки.
				Пожалуйста, обратите внимание — обмену или возврату подлежит только новый товар, который не был в употреблении и не имеет следов использования: царапин, сколов, потёртостей, программное обеспечение не подвергалось изменениям и т.п.
				<br>А так же должно быть сохранено:</p>
				<ul>
					<li>полный комплект товара;</li>
					<li>целостность и все компоненты упаковки;</li>
					<li>ярлыки;</li>
					<li>заводская маркировка.</li>
				</ul>
				<p>Если товар не работает обмен или возврат товара производится только при наличии заключения авторизованного производителем сервисного центра о том, что условия эксплуатации не нарушены.
				<br>Обмен или возврат товара производится в нашем офисе по адресу:<span style="font-weight:500;"> Киев, ул. Маршала Гречко, 13.</span> С понедельника по пятницу с 10-00 до 18-00. Также, обмен или возврат товара может быть произведен через Новую Почту. Доставку оплачивает потребитель. 
				Для возврата денег потребитель должен иметь при себе паспорт. Возврат денег возможен в день возврата товара или, в случае отсутствия денег в кассе, на протяжении максимум 7 дней.</p>
			</div>
		</div>
	</div>

	<div class="delivery_popup" id="winp" style="height:340px;">
		<div class="delivery_close_icon">
			×
		</div>
		<div class="delivery_popup_container">
			<div class="delivery_popup_inner">
				<h4>В стоимость уставновки Windows входит:</h4>
				<ul>
					<li>Обновление BIOS материнской платы</li>
					<li>Установка операционной системы</li>
					<li>Установка и настройка всех необходимых драйверов</li>
					<li>Трех часовое тестирование в программах AIDA64, FurMark и LinX</li>
				</ul>
				<p>После прохождения всех тестов, вы сможете быть уверены, что компьютер полностью настроен и готов к работе.</p>
			</div>
		</div>
	</div>

	<div class="delivery_popup" id="pchk">
		<div class="delivery_close_icon">
			×
		</div>
		<div class="delivery_popup_container">
			<div class="delivery_popup_inner">
				<h4>Введите свой адрес эл.почты и мы вас оповестим, когда товар станет<br>дешевле</h4>
				<p style="margin-bottom:5px;">Эл. Почта</p>
				<div class="pchk_input_block">
					<form>
						<input type="email" class="pchk_input">
						<input type="submit" class="pchk_submit" value="Cохранить">
					</form>
				</div>
			</div>
		</div>
	</div>

	<div class="bottom_price_nav">
		<div class="product_wrapper clearfix">
			<div class="bottom_buy_btn" onClick="ga('send', 'pageview', '/virtual/kupit');">
				<div class="pulse"></div>
				<img src="img/newbottomcart.png">
				купить
			</div>
			<div class="bottom_credit_btn">В рассрочку</div>
			<div class="bottom_price_grn">грн</div>
			<div class="bottom_price"><? echo $base->computers->comp[0]->price; ?></div>
			<div class="bottom_computer_title">Intel X299</div>
		</div>
		<div class="to_top_btn">
			<div class="to_top_btn_text">вверх</div>
			<img src="img/top-icon.png">
		</div>
	</div>
	<div class="header header_product clearfix">
		<div class="product_wrapper">
			<div class="product_header_flex_container clearfix">
				<a href="index.php">
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
					<a href="index.php" class="header_product_nav_menu_item">Главная</a>
					<a href="chast-privatbank.html" class="header_product_nav_menu_item">Купить в рассрочку</a>
					<a href="delivery.html" class="header_product_nav_menu_item">Доставка и оплата</a>
					<a href="contacts.html" class="header_product_nav_menu_item">Контакты</a>
					<a href="konkurs.html" class="header_product_nav_menu_item">Акция<img src="img/new_nav.png"></a>
				</span>
				<div class="header_phones">
					<div class="header_phones_title">Бесплатно со всех номеров Украины</div>
					<div class="header_phones_nubmer">0 800 753 853</div>
					<div class="header_phones_inner">
						<div class="header_info_inner_block">
							ПН - ПТ с 10:00 до 19:00
						</div>
						<div class="header_info_inner_block">
							СБ с 10:00 до 15:00
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
				<a href="https://instagram.com/digitalfury_pro?igshid=493oqbjmx8ur" target="_blank" class="instagram_social">
					<div class="vk_consult_image">
						<div class="vk_pulse_wrapper">
							<div class="pulse"></div>
						</div>
						<img src="img/insta.png">
					</div>
				</a>
			</div>
		</div>
		<div class="mobile_menu_block">
			<a href="index.php" class="nav_bar_item_mobile nav_bar_item">Главная</a>
			<a href="chast-privatbank.html" class="nav_bar_item_mobile nav_bar_item">Купить в рассрочку</a>
			<a href="delivery.html" class="nav_bar_item_mobile nav_bar_item">Доставка и оплата</a>
			<a href="contacts.html" class="nav_bar_item_mobile nav_bar_item">Контакты</a>
			<a href="konkurs.html" class="nav_bar_item_mobile nav_bar_item">Акция<img src="img/new_nav.png"></a>
			<a href="https://vk.com/im?sel=-101179801" target="_blank" class="nav_bar_item nav_bar_item_mobile"><span style="border-bottom:1px dotted #333333;">Консультант ВК</span></a>
			<a href="tel:0800753853" class="nav_bar_item nav_bar_item_mobile"><span style="border-bottom:1px dotted #333333;">0 800 753 853</span></a>
		</div>
	</div>
	<div class="sitemap">
		<div class="product_wrapper">
			<a href="index.html">Главная</a> › игровой компьютер <span class="product_page_name">Intel X299 Core i7 Конфигуратор</span>
		</div>
	</div>
	<div class="product_page_main_block">
		<div class="product_wrapper">
			<div class="product_page_flex_container clearfix">
				<h1 class="product_page_title_mobile">Intel X299 Core i7 Конфигуратор</h1>
				<div class="product_page_flex_photo_block">
					<div class="new_photo_block">
						<div class="side_photo_container_outer">
							<div class="side_photo_container">
								<div class="side_photo_container_inner">
									<div class="side_mini_photo active">
										<img src="http://xn--80afeb8cd.com/cases/1/AEROCOOL-P7/azza-photios-dimensions-1200.jpg">
									</div>
									<div class="side_mini_photo">
										<img src="http://xn--80afeb8cd.com/cases/1/AEROCOOL-P7/photios250-comp-1200.jpg">
									</div>
									<div class="side_mini_photo">
										<img src="http://xn--80afeb8cd.com/cases/1/AEROCOOL-P7/photios250-backthreecomp-1200.jpg">
									</div>
									<div class="side_mini_photo">
										<img src="http://xn--80afeb8cd.com/cases/1/AEROCOOL-P7/photios250-front-1200.jpg">
									</div>
									<div class="side_mini_photo">
										<img src="http://xn--80afeb8cd.com/cases/1/AEROCOOL-P7/Azza-photios-top-1200.jpg">
									</div>
									<div class="side_mini_photo">
										<img src="http://xn--80afeb8cd.com/cases/1/AEROCOOL-P7/photios250-backthree-noncomp-1200.jpg">
									</div>
																		
									<div class="side_mini_video" data-video="video01">
										<img src="img/video-preview.png">
									</div>
									<div class="side_mini_video" data-video="video02">
										<img src="img/video-preview.png">
									</div>
									<div class="side_mini_video" data-video="video03">
										<img src="img/video-preview.png">
									</div>
									
								</div>
							</div>
							<div class="side_arrowtop">
								<img src="img/blackarrowtopsmall.png">
							</div>
							<div class="side_arrowbottom">
								<img src="img/blackarrowsmall.png">
							</div>
						</div>
						<div class="main_photo_container">
							<img id="zoomImage" src="http://xn--80afeb8cd.com/cases/1/AEROCOOL-P7/azza-photios-dimensions-1200.jpg" class="main_photo_image">
							<div class="main_video_container">
								
								<div class="video_innner" id="video02">
									<iframe width="100%" height="100%" src="https://www.youtube.com/embed/ewG98Gw4Res?rel=0" frameborder="0" allowfullscreen></iframe>
								</div>
								<div class="video_innner" id="video01">
									<iframe width="100%" height="100%" src="https://www.youtube.com/embed/E2Z0zaVOick?rel=0" frameborder="0" allowfullscreen></iframe>
								</div>
								<div class="video_innner" id="video03">
									<iframe width="100%" height="100%" src="https://www.youtube.com/embed/gltupxf5jK4?rel=0" frameborder="0" allowfullscreen></iframe>
								</div>
							</div>
						</div>
					</div>
					<div class="main_photo_container_subtitle">Нажмите для полного просмотра</div>
				</div>
				<div class="product_page_price_flex_info_block">
					<h1 class="product_page_title">Intel X299 Core i7 Конфигуратор</h1>
					<div class="product_page_flex_info_block_inner clearfix">
						<div class="product_page_flex_price">
							<div class="product_page_price_block_outer clearfix">
								<div class="super_price_title">Лучшее ценовое предложение!</div>
								<div class="product_page_price_block clearfix">
									<div class="old_price"><? echo $base->computers->comp[0]->oldprice; ?> <span>грн</span>
										<div class="old_price_inner"></div>
									</div>
									<div class="new_price"><? echo $base->computers->comp[0]->price; ?> <span>грн</span></div>
									<div class="freeshipping">+ бесплатная доставка</div>
									<div class="add_features">
										<div class="feature_block clearfix">
											<div class="checkbox_block">
												<input type="checkbox" id="c1" data-price="<? echo $base->dops->dop[0]->price; ?>" class="add_f">
												<label for="c1" class="checkbox_title"><span></span>Установить Windows 10</label>
												<div class="delivery_info_btn" id="winb"></div>
											</div>
											<div class="feature_price"><? echo $base->dops->dop[0]->price; ?> грн</div>
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
									<div class="buy_button buy_button_ololo" onClick="ga('send', 'pageview', '/virtual/kupit');"><img src="img/basket.png">Купить</div>
									<!-- <div class="privat_credit_btn">В рассрочку</div> -->
									<div class="new_credit_block">
										<div class="new_credit_button">Рассрочка</div>
										<div class="new_credit_info">25 x <span class="new_credit_sum"></span> грн/мес</div>
									</div>
								</div>
								<div class="price_block_side_buttons">
									<a href="konkurs.html" class="unpack_link">
										<div class="unpack_block">
											<img src="img/unpack.svg">
											<div class="unpack_text">300 грн за<br>распаковку</div>
										</div>
									</a>
									<div class="follow_price_block">
										<img src="img/followprice.jpg">
										<div class="follow_price_text">Следить</div>
										<div class="follow_price_text">за ценой</div>
									</div>
								</div>
							</div>
							<div class="stars_block clearfix">
								<img src="img/stars.png" class="stars_img">
								<a href="#tabsNavBar" class="comments_num scrolltoTop"><span href="http://www.xn--80afeb8cd.com/raven-x-treme.html" class="comments_num_container">20</span> отзывов</a>
								<ul class="share-buttons">
									<li><a href="https://www.facebook.com/sharer/sharer.php?u=&t=" title="Share on Facebook" target="_blank"><img alt="Share on Facebook" src="img/Facebook.png" /></a></li>
									<li><a href="https://twitter.com/intent/tweet?source=&text=:%20" target="_blank" title="Tweet"><img alt="Tweet" src="img/Twitter.png" /></a></li>
									<li><a href="https://plus.google.com/share?url=" target="_blank" title="Share on Google+"><img alt="Share on Google+" src="img/Google+.png" /></a></li>
									<li><a href="mailto:?subject=&body=:%20" target="_blank" title="Send email"><img alt="Send email" src="img/Email.png" /></a></li>
								</ul>
							</div>
							<div class="product_short_info">
								
							</div>
						</div>
						<div class="product_page_flex_delivery">
							<div class="product_page_delivery">
								<div class="main_title">Доставка<div class="delivery_info_btn" id="db"></div>
								<div class="main_title_city" id="db2">бесплатно</div>
							</div>
								<div class="product_delivery_inner_block">
									<div class="title green">Самовывоз<!-- <div class="delivery_info_btn" id="smvb"></div> --></div>
									<div class="text">− <span class="span_call_modal">из наших магазинов</span><div class="text_inner_free">бесплатно</div></div>
									<div class="text">− <span class="span_call_modal">из новой почты</span><div class="text_inner_free">бесплатно</div></div>
								</div>
								<div class="product_delivery_inner_block">
									<div class="title green">Курьер</div>
									<div class="text">Нашим курьером по Киеву<div class="text_inner_free">бесплатно
										<div class="text_inner_free_oldprice">35 грн
											<div class="text_inner_free_oldprice_inner"></div>
										</div>
									</div></div>
								</div>
								<div class="product_delivery_inner_block">
									<div class="title">Оплата<div class="delivery_info_btn" id="payb"></div></div>
									<div class="text">Наличными, Безналичными, Мгновенная рассрочка от Приват Банка</div>
								</div>
								<div class="product_delivery_inner_block">
									<div class="title">Гарантия<div class="delivery_info_btn" id="garb"></div></div>
									<div class="text">Официальная гарантия от магазина накаждое комплектующее отдельно, сроком от 1-го до 3-х лет.</div>
								</div>
								<div class="product_delivery_inner_block">
									<div class="title">Возврат без вопросов<div class="delivery_info_btn" id="backb"></div></div>
									<div class="text">Обмен/возврат товара в течении 14 дней</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tabs_block">
				<div class="tabs_navbar_fixed" id="tabsNavBar">
					<div id="tfc" data="tab_conf" class="tabs_fixed_btn active">Конфигурация
						<div class="tabs_fixed_triangle"></div>
						<div class="tabs_fixed_triangle_border"></div>
					</div>
					<div id="tfa" data="tab_accesories" class="tabs_fixed_btn">Аксессуары
						<div class="tabs_fixed_triangle"></div>
						<div class="tabs_fixed_triangle_border"></div>
					</div>
					<div id="tff" data="tab_fps" class="tabs_fixed_btn">FPS в играх
						<div class="tabs_fixed_triangle"></div>
						<div class="tabs_fixed_triangle_border"></div>
					</div>
					<div id="tfv" data="tab_video" class="tabs_fixed_btn">Видео
						<div class="tab_btn_inner">
							NEW
						</div>
						<div class="tabs_fixed_triangle"></div>
						<div class="tabs_fixed_triangle_border"></div>
					</div>
					<div id="tfo" data="tab_comments" class="tabs_fixed_btn">Отзывы <span class="ques_hid">и вопросы</span>
						<div class="tab_btn_inner">
							<span href="http://www.xn--80afeb8cd.com/raven-x-treme.html" class="comments_num_container">47</span>
						</div>
					</div>
				</div>
				<div class="tab_content_block">
					<div class="tab_content_inner" id="tab_conf_content">
						<div class="accordion product_accordion">
							<div class="accordion_block super_offer_block">
									<div class="accordion_btn_title super_offer_title">Ограниченное по времени предложение</div>
								<div class="accordion_btn super_offer_btn active">Не выбрано</div>
								<div class="accordion_content new_accordion_content clearfix">
									<div class="new_side_photo_container"></div>
									<div class="new_tab_labels_container super_offer_labels_container">
										<div class="super_offer_text">• Выберите пожалуйста  желаемые акционные предложения.  Срок действия предложения со сниженной ценой ограничен.  Успей купить!</div>
										<div class="super_offer_inner">
											
											<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->offers->offer[2]->price; ?>" id="super_offer_windows">
												<div class="tabs_checkbox">
													<div class="tabs_checkbox_inner"></div>
												</div>
												<div class="radio_img">
													<img src="http://xn--80afeb8cd.com/newimg/windows10new.png">
													<!-- <div class="zoom_in_hover accessoriesPopup" modal-id="0">
														<img src="img/zoom-in.svg">
														<span>zoom</span>
													</div> -->
												</div>
												<div class="radio_description">
													<div class="radio_description_flex_container">
														<div class="radio_description_title">Установить Microsoft Windows 10 HOME 64-bit Russian (лицензионный)</div>
													</div>
													<div class="radio_price">(+ <? echo $base->offers->offer[2]->price; ?> грн)</div>
												</div>
												
											</label>
											<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->offers->offer[1]->price; ?>" id="super_offer_office">
												<div class="tabs_checkbox">
													<div class="tabs_checkbox_inner"></div>
												</div>
												<div class="radio_img">
													<img src="http://xn--80afeb8cd.com/newimg/Office-Home-and-Business.png">
													<!-- <div class="zoom_in_hover accessoriesPopup" modal-id="0">
														<img src="img/zoom-in.svg">
														<span>zoom</span>
													</div> -->
												</div>
												<div class="radio_description">
													<div class="radio_description_flex_container">
														<div class="radio_description_title">Установить Microsoft Office Professional 365</div>
													</div>
													<div class="radio_price">(+ <? echo $base->offers->offer[1]->price; ?> грн)</div>
												</div>
												
											</label>
											<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->offers->offer[10]->price; ?>">
												<div class="tabs_checkbox">
													<div class="tabs_checkbox_inner"></div>
												</div>
												<div class="radio_img">
													<img src="http://xn--80afeb8cd.com/newimg/antivirus.png" style="width:175px;">
													<!-- <div class="zoom_in_hover accessoriesPopup" modal-id="0">
														<img src="img/zoom-in.svg">
														<span>zoom</span>
													</div> -->
												</div>
												<div class="radio_description">
													<div class="radio_description_flex_container">
														<div class="radio_description_title">Установить Антивирус Total Security 365 <br> Защити свои инвестиции!</div>
													</div>
													<div class="radio_price">(+ <? echo $base->offers->offer[10]->price; ?> грн)</div>
												</div>
												<div class="economy">экономия!</div>
											</label>
											<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->offers->offer[9]->price; ?>" id="super_offer_wifi">
												<div class="tabs_checkbox">
													<div class="tabs_checkbox_inner"></div>
												</div>
												<div class="radio_img">
													<img src="http://xn--80afeb8cd.com/img/cable4.png">
													<!-- <div class="zoom_in_hover accessoriesPopup" modal-id="0">
														<img src="img/zoom-in.svg">
														<span>zoom</span>
													</div> -->
												</div>
												<div class="radio_description">
													<div class="radio_description_flex_container">
														<div class="radio_description_title">Конвертер HDMI на VGA. Необходим для мониторов с VGA входом.</div>
													</div>
													<div class="radio_price">(+ <? echo $base->offers->offer[9]->price; ?> грн)</div>
												</div>
												<div class="economy">экономия!</div>
											</label>	
											
											<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->offers->offer[5]->price; ?>">
												<div class="tabs_checkbox">
													<div class="tabs_checkbox_inner"></div>
												</div>
												<div class="radio_img">
													<img src="http://xn--80afeb8cd.com/newimg/Windows-10-Pro-64-bit-USB.png">
													<!-- <div class="zoom_in_hover accessoriesPopup" modal-id="0">
														<img src="img/zoom-in.svg">
														<span>zoom</span>
													</div> -->
												</div>
												<div class="radio_description">
													<div class="radio_description_flex_container">
														<div class="radio_description_title">Флешка на 8ГБ Защищенная от вирусов</div>
													</div>
													<div class="radio_price">(+ <? echo $base->offers->offer[5]->price; ?> грн)</div>
												</div>
												<div class="economy">экономия!</div>
											</label>
											<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->offers->offer[3]->price; ?>" id="super_offer_wifi">
												<div class="tabs_checkbox">
													<div class="tabs_checkbox_inner"></div>
												</div>
												<div class="radio_img">
													<img src="http://xn--80afeb8cd.com/newimg/adapter.png">
													<!-- <div class="zoom_in_hover accessoriesPopup" modal-id="0">
														<img src="img/zoom-in.svg">
														<span>zoom</span>
													</div> -->
												</div>
												<div class="radio_description">
													<div class="radio_description_flex_container">
														<div class="radio_description_title">Установить мощный Wi-Fi адаптер 802.11AC Dual Wireless</div>
													</div>
													<div class="radio_price">(+ <? echo $base->offers->offer[3]->price; ?> грн)</div>
												</div>
												<div class="economy">экономия!</div>
											</label>
										</div>
									</div>	
								</div>
							</div>
							<div class="accordion_block" id="accordion_blocks">
								<div class="accordion_btn_title">Корпус</div>
								<div class="accordion_btn active comp_btn"></div>
								<div class="accordion_content new_accordion_content clearfix">
									<div class="new_side_photo_container">
										<img src="http://xn--80afeb8cd.com/cases/photios250-three-175.png">
									</div>
									<div class="new_tab_labels_container">
									
									<label class="radio_label comp_label new" data-price="<? echo $base->corpuses->corpus[11]->price; ?>"><input name="comp" type="radio">
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
												<img src="http://xn--80afeb8cd.com/cases/334.png">
											<div class="zoom_in_hover photoPopup" modal-id="6">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>	
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">Frontier Warrior</div>
											</div>
											<div class="radio_price"></div>
											<div class="new_block_label_recommend">рекомендуем</div>
											<div class="new_block_label_new">Новинка</div>
										</div>
									</label>
									
									<label class="radio_label comp_label" data-price="<? echo $base->corpuses->corpus[9]->price; ?>"><input name="comp" type="radio">
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
												<img src="http://xn--80afeb8cd.com/cases/345.png">
												<div class="zoom_in_hover photoPopup" modal-id="4">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">Frime FC-901B RED</div>
											<div class="radio_description_text">
												Размеры корпуса,мм:	480 х 200 х 485. Охлаждение: 2 красных LED вентилятора по 120 мм на передней панели. Разъемы: 2 порта USB 2.0 +1 порт USB 3.0, Card Reader, разъемы для наушников и микрофона. Особенности: прозрачная передняя и боковая стенка корпуса, светящиеся вентиляторы, съемные пылевые фильтры.
											</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
									
									<label class="radio_label comp_label" data-price="<? echo $base->corpuses->corpus[14]->price; ?>"><input name="comp" type="radio" checked>
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
												<img src="http://xn--80afeb8cd.com/cases/photios250-three-175.png">
											<div class="zoom_in_hover photoPopup" modal-id="92">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">AZZA Gaming X</div>
											<div class="radio_description_text">
												Aerocool Project 7 - сочетает в себе привлекательный дизайн и высокую функциональность. Корпус оснащен сложной системой подсветки, которая состоит из настраиваемой светодиодной вставки, дополняя ощущение, что это роскошный суперкар.
											</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
									
									<label class="radio_label comp_label" data-price="<? echo $base->corpuses->corpus[15]->price; ?>"><input name="comp" type="radio" >
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
												<img src="http://xn--80afeb8cd.com/cases/masterbox5.png">
											<div class="zoom_in_hover photoPopup" modal-id="93">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">Cooler Master MasterBox 5</div>
											<div class="radio_description_text">
												Aerocool Project 7 - сочетает в себе привлекательный дизайн и высокую функциональность. Корпус оснащен сложной системой подсветки, которая состоит из настраиваемой светодиодной вставки, дополняя ощущение, что это роскошный суперкар.
											</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
									
									<label class="radio_label comp_label" data-price="<? echo $base->corpuses->corpus[25]->price; ?>"><input name="comp" type="radio" >
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
												<img src="http://xn--80afeb8cd.com/cases/c22.png">
											<div class="zoom_in_hover photoPopup" modal-id="104">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">Thermaltake Versa C22 RGB</div>
											<div class="radio_description_text">
												Aerocool Project 7 - сочетает в себе привлекательный дизайн и высокую функциональность. Корпус оснащен сложной системой подсветки, которая состоит из настраиваемой светодиодной вставки, дополняя ощущение, что это роскошный суперкар.
											</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>

									<label class="radio_label comp_label" data-price="<? echo $base->corpuses->corpus[13]->price; ?>"><input name="comp" type="radio">
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
												<img src="http://xn--80afeb8cd.com/cases/354.png">
												<div class="zoom_in_hover photoPopup" modal-id="9">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">Zalman Z11 Plus Black (26 x 49,8 x 52,5 см)</div>
											<div class="radio_description_text">
												Zalman Z11 Plus - один из самых красивых и самых популярных корпусов на рынке. Спереди: 1 x 120 мм с синей подсветкой. Сзади: 1 x 120 мм вентилятор. Сбоку: 2 x 80 мм вентилятора. Сверху: 120 мм с синей подсветкой (возможность установки дополнительного 140/120 мм вентилятора)
											</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
									
									<label class="radio_label comp_label" data-price="<? echo $base->corpuses->corpus[6]->price; ?>"><input name="comp" type="radio" >
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
												<img src="http://xn--80afeb8cd.com/cases/175-P7.gif">
											<div class="zoom_in_hover photoPopup" modal-id="10">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">Aerocool Project 7 Black (24,4x55x44,6 см)</div>
											<div class="radio_description_text">
												Aerocool Project 7 - сочетает в себе привлекательный дизайн и высокую функциональность. Корпус оснащен сложной системой подсветки, которая состоит из настраиваемой светодиодной вставки, дополняя ощущение, что это роскошный суперкар.
											</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
									
									</div>
								</div>
							</div>
									
									
									
							<div class="accordion_block">
								<div class="accordion_block">
								<div class="accordion_btn_title">Вентиляторы</div>
								<div class="accordion_btn active fan_btn"></div>
								<div class="accordion_content new_accordion_content clearfix">
									<div class="new_side_photo_container">
										<img src="http://xn--80afeb8cd.com/newimg/None_Selected_175.png">
									</div>
									<div class="new_tab_labels_container">
										<label class="radio_label fan_label" data-price="<? echo $base->fans->fan[0]->price; ?>" data-short="<? echo $base->fans->fan[0]->short; ?>"><input name="fan" type="radio" checked>
											<div class="radio_circle">
												<div class="radio_circle_inner"></div>
											</div>
											<div class="radio_img">
												<img src="http://xn--80afeb8cd.com/newimg/None_Selected_175.png">
												<!-- <div class="zoom_in_hover accessoriesPopup" modal-id="0">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div> -->
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Не установлен вентилятор</div>
												</div>
												<div class="radio_price"></div>
												<div class="new_block_label_recommend">рекомендуем</div>
											<div class="new_block_label_new">Новинка</div>
											</div>
										</label>
										<label class="radio_label fan_label" data-price="<? echo $base->fans->fan[3]->price; ?>" data-short="<? echo $base->fans->fan[3]->short; ?>"><input name="fan" type="radio">
											<div class="radio_circle">
												<div class="radio_circle_inner"></div>
											</div>
											<div class="radio_img">
												<img src="http://xn--80afeb8cd.com/newimg/Cooling-Baby-blue.png">
												<!-- <div class="zoom_in_hover accessoriesPopup" modal-id="0">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div> -->
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Вентилятор Cooling Baby 12cm Blue</div>
												</div>
												<div class="radio_price"></div>
												<div class="new_block_label_recommend">рекомендуем</div>
											<div class="new_block_label_new">Новинка</div>
											</div>
										</label>
										<label class="radio_label fan_label" data-price="<? echo $base->fans->fan[4]->price; ?>" data-short="<? echo $base->fans->fan[4]->short; ?>"><input name="fan" type="radio">
											<div class="radio_circle">
												<div class="radio_circle_inner"></div>
											</div>
											<div class="radio_img">
												<img src="http://xn--80afeb8cd.com/newimg/Cooling-Baby-Red.png">
												<!-- <div class="zoom_in_hover accessoriesPopup" modal-id="0">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div> -->
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Вентилятор Cooling Baby 12cm Red</div>
												</div>
												<div class="radio_price"></div>
												<div class="new_block_label_recommend">рекомендуем</div>
											<div class="new_block_label_new">Новинка</div>
											</div>
										</label>
										<label class="radio_label fan_label" data-price="<? echo $base->fans->fan[9]->price; ?>" data-short="<? echo $base->fans->fan[9]->short; ?>"><input name="fan" type="radio">
											<div class="radio_circle">
												<div class="radio_circle_inner"></div>
											</div>
											<div class="radio_img">
												<img src="http://xn--80afeb8cd.com/newimg/lightningrainbow.png">
												<!-- <div class="zoom_in_hover accessoriesPopup" modal-id="0">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div> -->
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Вентилятор AZZA Inferno Rainbow LED</div>
												</div>
												<div class="radio_price"></div>
												<div class="new_block_label_recommend">рекомендуем</div>
											<div class="new_block_label_new">Новинка</div>
											</div>
										</label>
										<label class="radio_label fan_label" data-price="<? echo $base->fans->fan[1]->price; ?>" data-short="<? echo $base->fans->fan[1]->short; ?>"><input name="fan" type="radio">
											<div class="radio_circle">
												<div class="radio_circle_inner"></div>
											</div>
											<div class="radio_img">
												<img src="http://xn--80afeb8cd.com/newimg/thermaltake_riing_red_175.png">
												<!-- <div class="zoom_in_hover accessoriesPopup" modal-id="0">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div> -->
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Вентилятор Thermaltake Riing 12 Red LED</div>
												</div>
												<div class="radio_price"></div>
												<div class="new_block_label_recommend">рекомендуем</div>
											<div class="new_block_label_new">Новинка</div>
											</div>
										</label>

										<label class="radio_label fan_label" data-price="<? echo $base->fans->fan[2]->price; ?>" data-short="<? echo $base->fans->fan[2]->short; ?>"><input name="fan" type="radio">
											<div class="radio_circle">
												<div class="radio_circle_inner"></div>
											</div>
											<div class="radio_img">
												<img src="http://xn--80afeb8cd.com/newimg/thermaltake_riing_blue_175.png">
												<!-- <div class="zoom_in_hover accessoriesPopup" modal-id="0">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div> -->
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Вентилятор Thermaltake Riing 12 Blue LED</div>
												</div>
												<div class="radio_price"></div>
												<div class="new_block_label_recommend">рекомендуем</div>
											<div class="new_block_label_new">Новинка</div>
											</div>
										</label>
										
										<label class="radio_label fan_label" data-price="<? echo $base->fans->fan[6]->price; ?>" data-short="<? echo $base->fans->fan[6]->short; ?>"><input name="fan" type="radio">
											<div class="radio_circle">
												<div class="radio_circle_inner"></div>
											</div>
											<div class="radio_img">
												<img src="http://xn--80afeb8cd.com/newimg/lightningorhid.png">
												<!-- <div class="zoom_in_hover accessoriesPopup" modal-id="0">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div> -->
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">3x [White] AZZA Inferno White LED</div>
												</div>
												<div class="radio_price"></div>
												<div class="new_block_label_recommend">рекомендуем</div>
											<div class="new_block_label_new">Новинка</div>
											</div>
										</label>
										<label class="radio_label fan_label" data-price="<? echo $base->fans->fan[7]->price; ?>" data-short="<? echo $base->fans->fan[7]->short; ?>"><input name="fan" type="radio">
											<div class="radio_circle">
												<div class="radio_circle_inner"></div>
											</div>
											<div class="radio_img">
												<img src="http://xn--80afeb8cd.com/newimg/lightninglilac.png">
												<!-- <div class="zoom_in_hover accessoriesPopup" modal-id="0">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div> -->
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">3x [Blue] AZZA Inferno Blue LED</div>
												</div>
												<div class="radio_price"></div>
												<div class="new_block_label_recommend">рекомендуем</div>
											<div class="new_block_label_new">Новинка</div>
											</div>
										</label>
										<label class="radio_label fan_label" data-price="<? echo $base->fans->fan[8]->price; ?>" data-short="<? echo $base->fans->fan[8]->short; ?>"><input name="fan" type="radio">
											<div class="radio_circle">
												<div class="radio_circle_inner"></div>
											</div>
											<div class="radio_img">
												<img src="http://xn--80afeb8cd.com/newimg/lightningscarlet.png">
												<!-- <div class="zoom_in_hover accessoriesPopup" modal-id="0">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div> -->
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">3x [RED] AZZA Inferno RED LED</div>
												</div>
												<div class="radio_price"></div>
												<div class="new_block_label_recommend">рекомендуем</div>
											<div class="new_block_label_new">Новинка</div>
											</div>
										</label>
										
										<label class="radio_label fan_label" data-price="<? echo $base->fans->fan[10]->price; ?>" data-short="<? echo $base->fans->fan[10]->short; ?>"><input name="fan" type="radio">
											<div class="radio_circle">
												<div class="radio_circle_inner"></div>
											</div>
											<div class="radio_img">
												<img src="http://xn--80afeb8cd.com/newimg/lightningrainbow3.png">
												<!-- <div class="zoom_in_hover accessoriesPopup" modal-id="0">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div> -->
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">3x [Rainbow] AZZA Inferno Rainbow LED</div>
												</div>
												<div class="radio_price"></div>
												<div class="new_block_label_recommend">рекомендуем</div>
											<div class="new_block_label_new">Новинка</div>
											</div>
										</label>
                                         <label class="radio_label fan_label" data-price="<? echo $base->fans->fan[11]->price; ?>" data-short="<? echo $base->fans->fan[11]->short; ?>"><input name="fan" type="radio">
											<div class="radio_circle">
												<div class="radio_circle_inner"></div>
											</div>
											<div class="radio_img">
												<img src="http://xn--80afeb8cd.com/newimg/thermaltake_riing_blue_3.png">
												<!-- <div class="zoom_in_hover accessoriesPopup" modal-id="0">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div> -->
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">3x [Blue] Thermaltake Riing 12 120mm Вентилятор</div>
												</div>
												<div class="radio_price"></div>
												<div class="new_block_label_recommend">рекомендуем</div>
											<div class="new_block_label_new">Новинка</div>
											</div>
										</label>
										
										<label class="radio_label fan_label" data-price="<? echo $base->fans->fan[12]->price; ?>" data-short="<? echo $base->fans->fan[12]->short; ?>"><input name="fan" type="radio">
											<div class="radio_circle">
												<div class="radio_circle_inner"></div>
											</div>
											<div class="radio_img">
												<img src="http://xn--80afeb8cd.com/newimg/thermaltake_riing_red_3.png">
												<!-- <div class="zoom_in_hover accessoriesPopup" modal-id="0">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div> -->
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">3x [Red] Thermaltake Riing 12 120mm Вентилятор</div>
												</div>
												<div class="radio_price"></div>
												<div class="new_block_label_recommend">рекомендуем</div>
											<div class="new_block_label_new">Новинка</div>
											</div>
										</label>
									</div>
								</div>
							</div>
							</div>
							<div class="accordion_block clearfix" id="accordion_proc">
								<div class="accordion_btn_title">Процессор</div>
								<div class="accordion_btn active active proc_btn"></div>
								<div class="accordion_content clearfix" style="display:block">
									<div class="new_side_photo_container">
										<img src="http://xn--80afeb8cd.com/newimg/core-i7.png">
									</div>
								<div class="tab_labels_container">
									<label class="radio_label proc_label" data-price="<? echo $base->processors->cpu[43]->price; ?>" data-short="<? echo $base->processors->cpu[43]->short; ?>"><input name="proc" type="radio">
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
											<img src="http://xn--80afeb8cd.com/newimg/core-i7.png">
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">4-ядерный Intel Core i7-7740X 4.3 - 4.5GHz Turbo, LGA 2066, 112W TDP</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
									<label class="radio_label proc_label" data-price="<? echo $base->processors->cpu[44]->price; ?>" data-short="<? echo $base->processors->cpu[44]->short; ?>"><input name="proc" type="radio">
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
											<img src="http://xn--80afeb8cd.com/newimg/core-i7.png">
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">6-ядерный Intel Core i7-7800X 3.5 - 4.0GHz Turbo, LGA 2066, 140W TDP</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
									<label class="radio_label proc_label" data-price="<? echo $base->processors->cpu[45]->price; ?>" data-short="<? echo $base->processors->cpu[45]->short; ?>"><input name="proc" type="radio" checked>
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
											<img src="http://xn--80afeb8cd.com/newimg/core-i7.png">
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">8-ядерный Intel Core i7-7820X 3.6 - 4.3GHz Turbo, LGA 2066, 140W TDP</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
									<label class="radio_label proc_label" data-price="<? echo $base->processors->cpu[46]->price; ?>" data-short="<? echo $base->processors->cpu[46]->short; ?>"><input name="proc" type="radio" >
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
											<img src="http://xn--80afeb8cd.com/newimg/core-i9.png">
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">10-ядерный Intel Core i9-7900X 3.3 - 4.3GHz Turbo, LGA 2066, 140W TDP</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
									<label class="radio_label proc_label" data-price="<? echo $base->processors->cpu[47]->price; ?>" data-short="<? echo $base->processors->cpu[47]->short; ?>"><input name="proc" type="radio">
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
											<img src="http://xn--80afeb8cd.com/newimg/core-i9.png">
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">12-ядерный Intel Core i9-7920X 2.9 - 4.3GHz Turbo, LGA 2066, 140W TDP</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
									<label class="radio_label proc_label" data-price="<? echo $base->processors->cpu[48]->price; ?>" data-short="<? echo $base->processors->cpu[48]->short; ?>"><input name="proc" type="radio">
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
											<img src="http://xn--80afeb8cd.com/newimg/core-i9.png">
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">14-ядерный Intel Core i9-7940X 3.1 - 4.3GHz Turbo, LGA 2066, 165W TDP </div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
									<label class="radio_label proc_label" data-price="<? echo $base->processors->cpu[49]->price; ?>" data-short="<? echo $base->processors->cpu[49]->short; ?>"><input name="proc" type="radio">
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
											<img src="http://xn--80afeb8cd.com/newimg/core-i9.png">
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">16-ядерный Intel Core i9-7960X 2.8 - 4.2GHz Turbo, LGA 2066, 165W TDP</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
									</div>
								</div>
							</div>
							<div class="accordion_block" id="accordion_cooler">
								<div class="accordion_btn_title">Охлаждение</div>
								<div class="accordion_btn active cooler_btn"></div>
								<div class="accordion_content new_accordion_content clearfix">
									<div class="new_side_photo_container">
										<img src="http://xn--80afeb8cd.com/newimg/captain_120ex.png">
									</div>
									<div class="new_tab_labels_container">
									<label class="radio_label cooler_label" data-price="<? echo $base->coolers->cooler[12]->price; ?>" data-short="<? echo $base->coolers->cooler[12]->short; ?>"><input name="cooler" type="radio" checked="">
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
											<img src="http://xn--80afeb8cd.com/newimg/captain_120ex.png">
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">Водяное охлаждение DeepCool CAPTAIN 120EX (150W TDP)</div>
											<div class="radio_description_text">
												Замкнутая система водяного охлаждения, радиатор медь+алюминий, Максимальная рассеиваемая мощность 300Вт, Количество вентиляторов - 2, уровень шума: 25-32 дБ. Крутая LED подсветка вентиляторов системы охлаждения.
											</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
									<label class="radio_label cooler_label" data-price="<? echo $base->coolers->cooler[16]->price; ?>" data-short="<? echo $base->coolers->cooler[16]->short; ?>"><input name="cooler" type="radio">
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
											<img src="http://xn--80afeb8cd.com/newimg/GamerStormCaptain120EX_175.gif">
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">Водяное охлаждение DeepCool CAPTAIN 120EX RGB (150W TDP)</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
									<label class="radio_label cooler_label" data-price="<? echo $base->coolers->cooler[14]->price; ?>" data-short="<? echo $base->coolers->cooler[14]->short; ?>"><input name="cooler" type="radio">
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
											<img src="http://xn--80afeb8cd.com/newimg/captain_240.png">
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">Водяное охлаждение Deepcool CAPTAIN 240EX (220W TDP)</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
									<label class="radio_label cooler_label" data-price="<? echo $base->coolers->cooler[19]->price; ?>" data-short="<? echo $base->coolers->cooler[19]->short; ?>"><input name="cooler" type="radio">
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
											<img src="http://xn--80afeb8cd.com/newimg/kraken62.png">
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">Водяное охлаждение Kraken X62</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
								</div>	
								</div>
							</div>
							<div class="accordion_block" id="accordion_video">
								<div class="accordion_btn_title">Видеокарта</div>
								<div class="accordion_btn active videocard_btn"></div>
								<div class="accordion_content clearfix">
									<div class="new_side_photo_container">
										<img src="http://xn--80afeb8cd.com/newimg/gtx1070-single-400.png">
									</div>
									<div class="tab_labels_container">
									<label class="radio_label videocard_label video_label_outer" data-price="<? echo $base->videocards->videocard[11]->price; ?>" data-short="<? echo $base->videocards->videocard[11]->short; ?>" data-title="NVIDIA GeForce GTX 1060 - 6GB (VR-Ready)"><input name="videocard" type="radio">
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
											<img src="http://xn--80afeb8cd.com/newimg/NvidiaGTX1060_400.png">
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">NVIDIA GeForce GTX 1060 - 6GB (VR-Ready)</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
									
									<!-- Блок видеокарт -->

										<div class="label_dropdown_block_video">
											<div class="label_dropdown_btn_video">
												<div class="label_dropdown_btn_circle">
													<div class="label_dropdown_btn_circle_inner"></div>
												</div>
												<div class="label_dropdown_btn_title">NVIDIA GeForce GTX 1070 - 8GB (VR-Ready)</div>
												<div class="label_dropdown_btn_price_video"></div>
												<!-- <div class="new_label_info accessoriesPopup">
													<div class="new_label_info_inner">
														<img src="img/newlabelinfo.png">
													</div>
												</div> -->
											</div>
											<div class="label_dropdown_content_video">
												<label class="radio_label videocard_label video_double_label" data-price="<? echo $base->videocards->videocard[14]->price; ?>" data-short="<? echo $base->videocards->videocard[14]->short; ?>" data-title="NVIDIA GeForce GTX 1070 - 8GB (VR-Ready) x1"><input name="videocard" type="radio">
													<div class="radio_circle">
														<div class="radio_circle_inner"></div>
													</div>
													<div class="radio_img">
														<img src="http://xn--80afeb8cd.com/newimg/gtx1070-single-400.png">
													</div>
													<div class="radio_description">
														<div class="radio_description_flex_container">
														<div class="radio_description_title">Одна видеокарта</div>
														</div>
														<div class="radio_price"></div>
														<!-- <div class="new_label_info accessoriesPopup">
															<div class="new_label_info_inner">
																<img src="img/newlabelinfo.png">
															</div>
														</div> -->
													</div>
												</label>
												<label class="radio_label videocard_label video_double_label" data-price="<? echo $base->videocards->videocard[15]->price; ?>" data-short="<? echo $base->videocards->videocard[15]->short; ?>" data-title="NVIDIA GeForce GTX 1070 - 8GB (VR-Ready) SLI"><input name="videocard" type="radio">
													<div class="radio_circle">
														<div class="radio_circle_inner"></div>
													</div>
													<div class="radio_img">
														<img src="http://xn--80afeb8cd.com/newimg/gtx1070-2sli-400.png">
													</div>
													<div class="radio_description">
														<div class="radio_description_flex_container">
														<div class="radio_description_title">SLI Режим (Две видеокарты)</div>
														</div>
														<div class="radio_price"></div>
														<!-- <div class="new_label_info accessoriesPopup">
															<div class="new_label_info_inner">
																<img src="img/newlabelinfo.png">
															</div>
														</div> -->
													</div>
												</label>
											</div>
										</div>

										<!-- Конец блока видеокарт -->

										<!-- Блок видеокарт -->

										<div class="label_dropdown_block_video">
											<div class="label_dropdown_btn_video">
												<div class="label_dropdown_btn_circle">
													<div class="label_dropdown_btn_circle_inner"></div>
												</div>
												<div class="label_dropdown_btn_title">NVIDIA GeForce GTX 1070 - 8GB - GIGABYTE G1 Gaming (VR-Ready)</div>
												<div class="label_dropdown_btn_price_video"></div>
												<!-- <div class="new_label_info accessoriesPopup">
													<div class="new_label_info_inner">
														<img src="img/newlabelinfo.png">
													</div>
												</div> -->
											</div>
											<div class="label_dropdown_content_video ">
												<label class="radio_label videocard_label video_double_label " data-price="<? echo $base->videocards->videocard[16]->price; ?>" data-short="<? echo $base->videocards->videocard[16]->short; ?>" data-title="NVIDIA GeForce GTX 1070 - 8GB - GIGABYTE G1 Gaming (VR-Ready) x1"><input name="videocard" type="radio">
													<div class="radio_circle">
														<div class="radio_circle_inner"></div>
													</div>
													<div class="radio_img">
														<img src="http://xn--80afeb8cd.com/newimg/GIGABYTE-1070-G1-GAMING-400.png">
													</div>
													<div class="radio_description">
														<div class="radio_description_flex_container">
														<div class="radio_description_title">Одна видеокарта</div>
														</div>
														<div class="radio_price"></div>
														<!-- <div class="new_label_info accessoriesPopup">
															<div class="new_label_info_inner">
																<img src="img/newlabelinfo.png">
															</div>
														</div> -->
													</div>
												</label>
												<label class="radio_label videocard_label video_double_label " data-price="<? echo $base->videocards->videocard[17]->price; ?>" data-short="<? echo $base->videocards->videocard[17]->short; ?>" data-title="NVIDIA GeForce GTX 1070 - 8GB - GIGABYTE G1 Gaming (VR-Ready) SLI"><input name="videocard" type="radio">
													<div class="radio_circle">
														<div class="radio_circle_inner"></div>
													</div>
													<div class="radio_img">
														<img src="http://xn--80afeb8cd.com/newimg/GIGABYTE-1070-G1-GAMING-SLI-400.png">
													</div>
													<div class="radio_description">
														<div class="radio_description_flex_container">
														<div class="radio_description_title">SLI Режим (Две видеокарты)</div>
														</div>
														<div class="radio_price"></div>
														<!-- <div class="new_label_info accessoriesPopup">
															<div class="new_label_info_inner">
																<img src="img/newlabelinfo.png">
															</div>
														</div> -->
													</div>
												</label>
											</div>
										</div>

										<!-- Конец блока видеокарт -->

										<!-- Блок видеокарт -->

										<div class="label_dropdown_block_video">
											<div class="label_dropdown_btn_video active">
												<div class="label_dropdown_btn_circle">
													<div class="label_dropdown_btn_circle_inner"></div>
												</div>
												<div class="label_dropdown_btn_title">NVIDIA GeForce GTX 1080 - 8GB (GDDR5X) (VR-Ready)</div>
												<div class="label_dropdown_btn_price_video"></div>
												<!-- <div class="new_label_info accessoriesPopup">
													<div class="new_label_info_inner">
														<img src="img/newlabelinfo.png">
													</div>
												</div> -->
											</div>
											<div class="label_dropdown_content_video active" style="display:block">
												<label class="radio_label videocard_label video_double_label subactive_video" data-price="<? echo $base->videocards->videocard[18]->price; ?>" data-short="<? echo $base->videocards->videocard[18]->short; ?>" data-title="NVIDIA GeForce GTX 1080 - 8GB (GDDR5X) (VR-Ready) x1"><input name="videocard" type="radio" checked>
													<div class="radio_circle">
														<div class="radio_circle_inner"></div>
													</div>
													<div class="radio_img">
														<img src="http://xn--80afeb8cd.com/newimg/NvidiaGTX1080_400.png">
													</div>
													<div class="radio_description">
														<div class="radio_description_flex_container">
														<div class="radio_description_title">Одна видеокарта</div>
														</div>
														<div class="radio_price"></div>
														<!-- <div class="new_label_info accessoriesPopup">
															<div class="new_label_info_inner">
																<img src="img/newlabelinfo.png">
															</div>
														</div> -->
													</div>
												</label>
												<label class="radio_label videocard_label video_double_label subactive_video" data-price="<? echo $base->videocards->videocard[19]->price; ?>" data-short="<? echo $base->videocards->videocard[19]->short; ?>" data-title="NVIDIA GeForce GTX 1080 - 8GB (GDDR5X) (VR-Ready) SLI"><input name="videocard" type="radio">
													<div class="radio_circle">
														<div class="radio_circle_inner"></div>
													</div>
													<div class="radio_img">
														<img src="http://xn--80afeb8cd.com/newimg/NvidiaGTX1080_Dual_400.png">
													</div>
													<div class="radio_description">
														<div class="radio_description_flex_container">
														<div class="radio_description_title">SLI Режим (Две видеокарты)</div>
														</div>
														<div class="radio_price"></div>
														<!-- <div class="new_label_info accessoriesPopup">
															<div class="new_label_info_inner">
																<img src="img/newlabelinfo.png">
															</div>
														</div> -->
													</div>
												</label>
											</div>
										</div>

										<!-- Конец блока видеокарт -->

										<!-- Блок видеокарт -->

										<div class="label_dropdown_block_video">
											<div class="label_dropdown_btn_video">
												<div class="label_dropdown_btn_circle">
													<div class="label_dropdown_btn_circle_inner"></div>
												</div>
												<div class="label_dropdown_btn_title">NVIDIA GeForce GTX 1080 - 8GB - ASUS STRIX RGB (VR-Ready)</div>
												<div class="label_dropdown_btn_price_video"></div>
												<!-- <div class="new_label_info accessoriesPopup">
													<div class="new_label_info_inner">
														<img src="img/newlabelinfo.png">
													</div>
												</div> -->
											</div>
											<div class="label_dropdown_content_video ">
												<label class="radio_label videocard_label video_double_label " data-price="<? echo $base->videocards->videocard[22]->price; ?>" data-short="<? echo $base->videocards->videocard[22]->short; ?>" data-title="NVIDIA GeForce GTX 1080 - 8GB - ASUS STRIX RGB (VR-Ready) x1"><input name="videocard" type="radio">
													<div class="radio_circle">
														<div class="radio_circle_inner"></div>
													</div>
													<div class="radio_img">
														<img src="http://xn--80afeb8cd.com/newimg/NVIDIA-GTX-1080-ASUS-STRIX-RGB-400.png">
													</div>
													<div class="radio_description">
														<div class="radio_description_flex_container">
														<div class="radio_description_title">Одна видеокарта</div>
														</div>
														<div class="radio_price"></div>
														<!-- <div class="new_label_info accessoriesPopup">
															<div class="new_label_info_inner">
																<img src="img/newlabelinfo.png">
															</div>
														</div> -->
													</div>
												</label>
												<label class="radio_label videocard_label video_double_label " data-price="<? echo $base->videocards->videocard[23]->price; ?>" data-short="<? echo $base->videocards->videocard[23]->short; ?>" data-title="NVIDIA GeForce GTX 1080 - 8GB - ASUS STRIX RGB (VR-Ready) SLI"><input name="videocard" type="radio">
													<div class="radio_circle">
														<div class="radio_circle_inner"></div>
													</div>
													<div class="radio_img">
														<img src="http://xn--80afeb8cd.com/newimg/NVIDIA-GTX-1080-ASUS-STRIX-RGB-SLI-400new.png">
													</div>
													<div class="radio_description">
														<div class="radio_description_flex_container">
														<div class="radio_description_title">SLI Режим (Две видеокарты)</div>
														</div>
														<div class="radio_price"></div>
														<!-- <div class="new_label_info accessoriesPopup">
															<div class="new_label_info_inner">
																<img src="img/newlabelinfo.png">
															</div>
														</div> -->
													</div>
												</label>
											</div>
										</div>

										<!-- Конец блока видеокарт -->

										<!-- Блок видеокарт -->

										<div class="label_dropdown_block_video">
											<div class="label_dropdown_btn_video">
												<div class="label_dropdown_btn_circle">
													<div class="label_dropdown_btn_circle_inner"></div>
												</div>
												<div class="label_dropdown_btn_title">
													<div class="new">NEW!</div>
													NVIDIA GeForce GTX 1080 Ti - 11GB (VR Ready)</div>
												<div class="label_dropdown_btn_price_video"></div>
												<!-- <div class="new_label_info accessoriesPopup">
													<div class="new_label_info_inner">
														<img src="img/newlabelinfo.png">
													</div>
												</div> -->
											</div>
											<div class="label_dropdown_content_video ">
												<label class="radio_label videocard_label video_double_label " data-price="<? echo $base->videocards->videocard[24]->price; ?>" data-short="<? echo $base->videocards->videocard[24]->short; ?>" data-title="NVIDIA GeForce GTX 1080 Ti - 11GB (VR Ready) x1"><input name="videocard" type="radio">
													<div class="radio_circle">
														<div class="radio_circle_inner"></div>
													</div>
													<div class="radio_img">
														<img src="http://xn--80afeb8cd.com/newimg/GTX-1080-Ti.png">
													</div>
													<div class="radio_description">
														<div class="radio_description_flex_container">
														<div class="radio_description_title">Одна видеокарта</div>
														</div>
														<div class="radio_price"></div>
														<!-- <div class="new_label_info accessoriesPopup">
															<div class="new_label_info_inner">
																<img src="img/newlabelinfo.png">
															</div>
														</div> -->
													</div>
												</label>
												<label class="radio_label videocard_label video_double_label " data-price="<? echo $base->videocards->videocard[25]->price; ?>" data-short="<? echo $base->videocards->videocard[25]->short; ?>" data-title="NVIDIA GeForce GTX 1080 Ti - 11GB (VR Ready) SLI"><input name="videocard" type="radio">
													<div class="radio_circle">
														<div class="radio_circle_inner"></div>
													</div>
													<div class="radio_img">
														<img src="http://xn--80afeb8cd.com/newimg/GTX-1080-Ti-2X-B.png">
													</div>
													<div class="radio_description">
														<div class="radio_description_flex_container">
														<div class="radio_description_title">SLI Режим (Две видеокарты)</div>
														</div>
														<div class="radio_price"></div>
														<!-- <div class="new_label_info accessoriesPopup">
															<div class="new_label_info_inner">
																<img src="img/newlabelinfo.png">
															</div>
														</div> -->
													</div>
												</label>
											</div>
										</div>

										<!-- Конец блока видеокарт -->

										
									</div>
								</div>
							</div>
							<div class="accordion_block" id="accordion_memory">
								<div class="accordion_btn_title">Оперативная память</div>
								<div class="accordion_btn active ddr_btn"></div>
								<div class="accordion_content clearfix">
									<div class="new_side_photo_container">
										<img src="http://xn--80afeb8cd.com/newimg/fux2.png">
									</div>
									<div class="tab_labels_container">
										<div class="label_dropdown_block">
											<div class="label_dropdown_btn active">
												<div class="label_dropdown_btn_circle">
													<div class="label_dropdown_btn_circle_inner"></div>
												</div>
												<div class="label_dropdown_btn_title">16 GB [8 GB x2] DDR4-2666 Kingston HyperX Fury</div>
												<div class="label_dropdown_btn_price"></div>
												<!-- <div class="new_label_info accessoriesPopup">
													<div class="new_label_info_inner">
														<img src="img/newlabelinfo.png">
													</div>
												</div> -->
											</div>
											<div class="label_dropdown_content active" style="display:block">
												<label class="radio_label ddr_label one_line_label subactive" data-price="<? echo $base->rams->ram[29]->price; ?>" data-short="<? echo $base->rams->ram[29]->short; ?>" data-title="16 GB [8 GB x2] DDR4-2100 сертифицированная"><input name="ddr" type="radio" checked>
													<div class="radio_circle">
														<div class="radio_circle_inner"></div>
													</div>
													<div class="radio_img">
														<img src="http://xn--80afeb8cd.com/newimg/fux2.png">
													</div>
													<div class="radio_description">
														<div class="radio_description_flex_container">
														<div class="radio_description_title">16 GB [8 GB x2] DDR4-2666 Kingston HyperX Fury</div>
														</div>
														<div class="radio_price"></div>
														<!-- <div class="new_label_info accessoriesPopup">
															<div class="new_label_info_inner">
																<img src="img/newlabelinfo.png">
															</div>
														</div> -->
													</div>
												</label>
												<label class="radio_label ddr_label one_line_label subactive" data-price="<? echo $base->rams->ram[30]->price; ?>" data-short="<? echo $base->rams->ram[30]->short; ?>" data-title="16 GB [8 GB x2] DDR4-2400 G.Skill Trident Z RGB"><input name="ddr" type="radio">
													<div class="radio_circle">
														<div class="radio_circle_inner"></div>
													</div>
													<div class="radio_img">
														<img src="http://xn--80afeb8cd.com/newimg/xptr2.png">
													</div>
													<div class="radio_description">
														<div class="radio_description_flex_container">
														<div class="radio_description_title">16 GB [8 GB x2] DDR4-3000 Kingston HyperX Predator</div>
														</div>
														<div class="radio_price"></div>
														<!-- <div class="new_label_info accessoriesPopup">
															<div class="new_label_info_inner">
																<img src="img/newlabelinfo.png">
															</div>
														</div> -->
													</div>
												</label>
												<label class="radio_label ddr_label one_line_label subactive" data-price="<? echo $base->rams->ram[31]->price; ?>" data-short="<? echo $base->rams->ram[31]->short; ?>" data-title="16 GB [8 GB x2] DDR4-2400 Kingston HyperX Fury"><input name="ddr" type="radio">
													<div class="radio_circle">
														<div class="radio_circle_inner"></div>
													</div>
													<div class="radio_img">
														<img src="http://xn--80afeb8cd.com/newimg/frost-white.png">
													</div>
													<div class="radio_description">
														<div class="radio_description_flex_container">
														<div class="radio_description_title">16 GB [8 GB x2] DDR4-3000 Geil Super Luce Frost White LED</div>
														</div>
														<div class="radio_price"></div>
														<!-- <div class="new_label_info accessoriesPopup">
															<div class="new_label_info_inner">
																<img src="img/newlabelinfo.png">
															</div>
														</div> -->
													</div>
												</label>
												<label class="radio_label ddr_label one_line_label subactive" data-price="<? echo $base->rams->ram[32]->price; ?>" data-short="<? echo $base->rams->ram[32]->short; ?>" data-title="16 GB [8 GB x2] DDR4-2400 Team T-Force Delta RGB White"><input name="ddr" type="radio">
													<div class="radio_circle">
														<div class="radio_circle_inner"></div>
													</div>
													<div class="radio_img">
														<img src="http://xn--80afeb8cd.com/newimg/gskillzx2.png">
													</div>
													<div class="radio_description">
														<div class="radio_description_flex_container">
														<div class="radio_description_title">16 GB [8 GB x2] DDR4-3000 G.Skill Trident Z RGB</div>
														</div>
														<div class="radio_price"></div>
														<!-- <div class="new_label_info accessoriesPopup">
															<div class="new_label_info_inner">
																<img src="img/newlabelinfo.png">
															</div>
														</div> -->
													</div>
												</label>
											</div>
										</div>

										<!-- Конец блока оперативной памяти -->

										<!-- Блок оперативной памяти -->

										<div class="label_dropdown_block">
											<div class="label_dropdown_btn">
												<div class="label_dropdown_btn_circle">
													<div class="label_dropdown_btn_circle_inner"></div>
												</div>
												<div class="label_dropdown_btn_title">32 GB [8 GB x4] DDR4-2666 Kingston HyperX Fury</div>
												<div class="label_dropdown_btn_price"></div>
												<!-- <div class="new_label_info accessoriesPopup">
													<div class="new_label_info_inner">
														<img src="img/newlabelinfo.png">
													</div>
												</div> -->
											</div>
											<div class="label_dropdown_content">
												<label class="radio_label ddr_label one_line_label" data-price="<? echo $base->rams->ram[33]->price; ?>" data-short="<? echo $base->rams->ram[33]->short; ?>" data-title="32 GB [8 GB x4] DDR4-2400 сертифицированная"><input name="ddr" type="radio">
													<div class="radio_circle">
														<div class="radio_circle_inner"></div>
													</div>
													<div class="radio_img">
														<img src="http://xn--80afeb8cd.com/newimg/fux4.png">
													</div>
													<div class="radio_description">
														<div class="radio_description_flex_container">
														<div class="radio_description_title">32 GB [8 GB x4] DDR4-2666 Kingston HyperX Fury</div>
														</div>
														<div class="radio_price"></div>
														<!-- <div class="new_label_info accessoriesPopup">
															<div class="new_label_info_inner">
																<img src="img/newlabelinfo.png">
															</div>
														</div> -->
													</div>
												</label>
												<label class="radio_label ddr_label one_line_label" data-price="<? echo $base->rams->ram[34]->price; ?>" data-short="<? echo $base->rams->ram[34]->short; ?>" data-title="32 GB [8 GB x4] DDR4-2400 G.Skill Trident Z RGB"><input name="ddr" type="radio">
													<div class="radio_circle">
														<div class="radio_circle_inner"></div>
													</div>
													<div class="radio_img">
														<img src="http://xn--80afeb8cd.com/newimg/xptr4.png">
													</div>
													<div class="radio_description">
														<div class="radio_description_flex_container">
														<div class="radio_description_title">32 GB [8 GB x4] DDR4-3000 Kingston HyperX Predator</div>
														</div>
														<div class="radio_price"></div>
														<!-- <div class="new_label_info accessoriesPopup">
															<div class="new_label_info_inner">
																<img src="img/newlabelinfo.png">
															</div>
														</div> -->
													</div>
												</label>
												<label class="radio_label ddr_label one_line_label" data-price="<? echo $base->rams->ram[35]->price; ?>" data-short="<? echo $base->rams->ram[35]->short; ?>" data-title="32 GB [8 GB x4] DDR4-2400 Kingston HyperX Fury"><input name="ddr" type="radio">
													<div class="radio_circle">
														<div class="radio_circle_inner"></div>
													</div>
													<div class="radio_img">
														<img src="http://xn--80afeb8cd.com/newimg/frost-whie-4.png">
													</div>
													<div class="radio_description">
														<div class="radio_description_flex_container">
														<div class="radio_description_title">32 GB [8 GB x4] DDR4-3000 Geil Super Luce Frost White LED</div>
														</div>
														<div class="radio_price"></div>
														<!-- <div class="new_label_info accessoriesPopup">
															<div class="new_label_info_inner">
																<img src="img/newlabelinfo.png">
															</div>
														</div> -->
													</div>
												</label>
												<label class="radio_label ddr_label one_line_label" data-price="<? echo $base->rams->ram[36]->price; ?>" data-short="<? echo $base->rams->ram[36]->short; ?>" data-title="32 GB [8 GB x4] DDR4-2400 Team T-Force Delta RGB White"><input name="ddr" type="radio">
													<div class="radio_circle">
														<div class="radio_circle_inner"></div>
													</div>
													<div class="radio_img">
														<img src="http://xn--80afeb8cd.com/newimg/gskillzx4.png">
													</div>
													<div class="radio_description">
														<div class="radio_description_flex_container">
														<div class="radio_description_title">32 GB [8 GB x4] DDR4-3000 G.Skill Trident Z RGB</div>
														</div>
														<div class="radio_price"></div>
														<!-- <div class="new_label_info accessoriesPopup">
															<div class="new_label_info_inner">
																<img src="img/newlabelinfo.png">
															</div>
														</div> -->
													</div>
												</label>
											</div>
										</div>
										<div class="label_dropdown_block">
											<div class="label_dropdown_btn">
												<div class="label_dropdown_btn_circle">
													<div class="label_dropdown_btn_circle_inner"></div>
												</div>
												<div class="label_dropdown_btn_title">64 GB [16 GB x4] DDR4-2666 Kingston HyperX Fury</div>
												<div class="label_dropdown_btn_price"></div>
												<!-- <div class="new_label_info accessoriesPopup">
													<div class="new_label_info_inner">
														<img src="img/newlabelinfo.png">
													</div>
												</div> -->
											</div>
											<div class="label_dropdown_content">
												<label class="radio_label ddr_label one_line_label" data-price="<? echo $base->rams->ram[37]->price; ?>" data-short="<? echo $base->rams->ram[37]->short; ?>" data-title="64 GB [16 GB x4] DDR4-2400 сертифицированная"><input name="ddr" type="radio">
													<div class="radio_circle">
														<div class="radio_circle_inner"></div>
													</div>
													<div class="radio_img">
														<img src="http://xn--80afeb8cd.com/newimg/fux4.png">
													</div>
													<div class="radio_description">
														<div class="radio_description_flex_container">
														<div class="radio_description_title">64 GB [16 GB x4] DDR4-2666 Kingston HyperX Fury</div>
														</div>
														<div class="radio_price"></div>
														<!-- <div class="new_label_info accessoriesPopup">
															<div class="new_label_info_inner">
																<img src="img/newlabelinfo.png">
															</div>
														</div> -->
													</div>
												</label>
												<label class="radio_label ddr_label one_line_label" data-price="<? echo $base->rams->ram[38]->price; ?>" data-short="<? echo $base->rams->ram[38]->short; ?>" data-title="64 GB [16 GB x4] DDR4-2400 Kingston HyperX Fury"><input name="ddr" type="radio">
													<div class="radio_circle">
														<div class="radio_circle_inner"></div>
													</div>
													<div class="radio_img">
														<img src="http://xn--80afeb8cd.com/newimg/fux8.png">
													</div>
													<div class="radio_description">
														<div class="radio_description_flex_container">
														<div class="radio_description_title">64 GB [8 GB x8] DDR4-2666 Kingston HyperX Fury</div>
														</div>
														<div class="radio_price"></div>
														<!-- <div class="new_label_info accessoriesPopup">
															<div class="new_label_info_inner">
																<img src="img/newlabelinfo.png">
															</div>
														</div> -->
													</div>
												</label>
												
												<label class="radio_label ddr_label one_line_label" data-price="<? echo $base->rams->ram[40]->price; ?>" data-short="<? echo $base->rams->ram[40]->short; ?>" data-title="64 GB [16 GB x4] DDR4-2400 Kingston HyperX Fury"><input name="ddr" type="radio">
													<div class="radio_circle">
														<div class="radio_circle_inner"></div>
													</div>
													<div class="radio_img">
														<img src="http://xn--80afeb8cd.com/newimg/predator8.png">
													</div>
													<div class="radio_description">
														<div class="radio_description_flex_container">
														<div class="radio_description_title">64 GB [8 GB x8] DDR4-3000 Kingston HyperX Predator</div>
														</div>
														<div class="radio_price"></div>
														<!-- <div class="new_label_info accessoriesPopup">
															<div class="new_label_info_inner">
																<img src="img/newlabelinfo.png">
															</div>
														</div> -->
													</div>
												</label>
												
												
												<label class="radio_label ddr_label one_line_label" data-price="<? echo $base->rams->ram[43]->price; ?>" data-short="<? echo $base->rams->ram[43]->short; ?>" data-title="64 GB [16 GB x4] DDR4-2400 Kingston HyperX Fury"><input name="ddr" type="radio">
													<div class="radio_circle">
														<div class="radio_circle_inner"></div>
													</div>
													<div class="radio_img">
														<img src="http://xn--80afeb8cd.com/newimg/gskillzx8.png">
													</div>
													<div class="radio_description">
														<div class="radio_description_flex_container">
														<div class="radio_description_title">64 GB [8 GB x8] DDR4-3000 G.Skill Trident Z RGB</div>
														</div>
														<div class="radio_price"></div>
														<!-- <div class="new_label_info accessoriesPopup">
															<div class="new_label_info_inner">
																<img src="img/newlabelinfo.png">
															</div>
														</div> -->
													</div>
												</label>
											</div>
										</div>

										<!-- Конец блока оперативной памяти -->

										

									</div>
								</div>
							</div>
							<div class="accordion_block" id="accordion_storage">
								<div class="accordion_btn_title">Жесткий диск</div>
								<div class="accordion_btn active hdd_btn"></div>
								<div class="accordion_content clearfix">
									<div class="new_side_photo_container">
										<img src="http://xn--80afeb8cd.com/newimg/2TB-TOSHIBA.png">
									</div>
									<div class="tab_labels_container">
										<label class="radio_label hdd_label one_line_label" data-price="<? echo $base->hdds->hdd[0]->price; ?>" data-short="<? echo $base->hdds->hdd[0]->short; ?>"><input name="hdd" type="radio">
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
											<img src="http://xn--80afeb8cd.com/newimg/No-SATA-Hard-Drive.png">
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">Не устанавливать жесткий диск</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
								
									
									<label class="radio_label hdd_label" data-price="<? echo $base->hdds->hdd[3]->price; ?>" data-short="<? echo $base->hdds->hdd[3]->short; ?>"><input name="hdd" type="radio">
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
											<img src="http://xn--80afeb8cd.com/newimg/2TB-TOSHIBA.png">
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">1TB TOSHIBA  Hard Drive -- 64MB Cache, 7200RPM, 6.0Gb/s</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
									<label class="radio_label hdd_label" data-price="<? echo $base->hdds->hdd[7]->price; ?>" data-short="<? echo $base->hdds->hdd[7]->short; ?>"><input name="hdd" type="radio">
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
											<img src="http://xn--80afeb8cd.com/newimg/WD-1TB-BLue.png">
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">1 TB WD Blue Hard Drive -- 64MB Cache, 7200RPM, 6.0Gb/s</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
									<label class="radio_label hdd_label" data-price="<? echo $base->hdds->hdd[4]->price; ?>" data-short="<? echo $base->hdds->hdd[4]->short; ?>"><input name="hdd" type="radio" checked>
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
											<img src="http://xn--80afeb8cd.com/newimg/2TB-TOSHIBA.png">
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">2TB TOSHIBA Hard Drive -- 64MB Cache, 7200RPM, 6.0Gb/s</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
									<label class="radio_label hdd_label" data-price="<? echo $base->hdds->hdd[5]->price; ?>" data-short="<? echo $base->hdds->hdd[5]->short; ?>"><input name="hdd" type="radio">
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
											<img src="http://xn--80afeb8cd.com/newimg/3TB-TOSHIBA.png">
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">3TB TOSHIBA Hard Drive -- 64MB Cache, 7200RPM, 6.0Gb/s</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
									<label class="radio_label hdd_label" data-price="<? echo $base->hdds->hdd[6]->price; ?>" data-short="<? echo $base->hdds->hdd[6]->short; ?>"><input name="hdd" type="radio">
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
											<img src="http://xn--80afeb8cd.com/newimg/4TB.png">
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">4.0TB Toshiba Hard Drive -- 128B Cache, 7200RPM, 6.0Gb/s</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
									</div>
								</div>
							</div>
							<div class="accordion_block">
								<div class="accordion_btn_title">SSD накопитель</div>
								<div class="accordion_btn active ssd_btn"></div>
								<div class="accordion_content clearfix">
									<div class="new_side_photo_container">
										<img src="http://xn--80afeb8cd.com/newimg/KINGSTON-UV400.png">
									</div>
									<div class="tab_labels_container">
									<label class="radio_label ssd_label one_line_label" data-price="<? echo $base->ssds->ssd[0]->price; ?>" data-short="<? echo $base->ssds->ssd[0]->short; ?>"><input name="ssd" type="radio">
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
											<img src="http://xn--80afeb8cd.com/newimg/None_Selected_175.png">
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
									<label class="radio_label ssd_label big_line_label" data-price="<? echo $base->ssds->ssd[1]->price; ?>" data-short="<? echo $base->ssds->ssd[1]->short; ?>"><input name="ssd" type="radio">
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
											<img src="http://xn--80afeb8cd.com/newimg/kingston_120.png">
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">120 GB Kingston SSDNow UV400 SATA-3 SSD -- Чтение: 500MB/s; Запись: 350MB/s</div>
											<div class="radio_description_text">
												Отличный вариант высокопроизводительного накопителя. Мгновенный запуск системы и любимых игр! Превосходные показатели скорости: благодаря технологии TurboWrite и режиму RAPID скорость передачи данных возрастает до 530 МБ/с в режиме чтения и до 400 МБ/с в режиме записи.
											</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
									<label class="radio_label ssd_label big_line_label" data-price="<? echo $base->ssds->ssd[2]->price; ?>" data-short="<? echo $base->ssds->ssd[2]->short; ?>"><input name="ssd" type="radio">
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
											<img src="http://xn--80afeb8cd.com/newimg/120GB-HyperX-Fury.png">
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">120 GB Kingston HyperX FURY -- Чтение: 500MB/s; Запись: 500MB/s</div>
											<div class="radio_description_text">
												Твердотельный накопитель Team с интерфейсом SATA III позволяет ускорить запуск и, увеличить скорость загрузки приложений и игр в 10 раз, в сравнении с жестким диском. Накопитель имеет контроллер  Phison PS3110-S10, у которого нет деградации скорости. Производится из лучших компонентов своего класса. Скорость чтения 530 МБ/с, скорость записи 370 МБ/с
											</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
									<label class="radio_label ssd_label big_line_label" data-price="<? echo $base->ssds->ssd[3]->price; ?>" data-short="<? echo $base->ssds->ssd[3]->short; ?>"><input name="ssd" type="radio" checked>
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
											<img src="http://xn--80afeb8cd.com/newimg/KINGSTON-UV400.png">
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">240 GB Kingston SSDNow UV400 -- Чтение: 500MB/s; Запись: 500MB/s</div>
											<div class="radio_description_text">
												Твердотельный накопитель Team с интерфейсом SATA III позволяет ускорить запуск и, увеличить скорость загрузки приложений и игр в 10 раз, в сравнении с жестким диском. Накопитель имеет контроллер  Phison PS3110-S10, у которого нет деградации скорости. Производится из лучших компонентов своего класса. Скорость чтения 530 МБ/с, скорость записи 370 МБ/с
											</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
									<label class="radio_label ssd_label big_line_label" data-price="<? echo $base->ssds->ssd[5]->price; ?>" data-short="<? echo $base->ssds->ssd[5]->short; ?>"><input name="ssd" type="radio">
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
											<img src="http://xn--80afeb8cd.com/newimg/SAMSUNG-250GB-850-EVO.png">
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">250 GB Samsung 850 EVO SSD -- Чтение: 540MB/s, Запись: 520MB/s</div>
											<div class="radio_description_text">
												Твердотельный накопитель Team с интерфейсом SATA III позволяет ускорить запуск и, увеличить скорость загрузки приложений и игр в 10 раз, в сравнении с жестким диском. Накопитель имеет контроллер  Phison PS3110-S10, у которого нет деградации скорости. Производится из лучших компонентов своего класса. Скорость чтения 530 МБ/с, скорость записи 370 МБ/с
											</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
									<label class="radio_label ssd_label big_line_label" data-price="<? echo $base->ssds->ssd[4]->price; ?>" data-short="<? echo $base->ssds->ssd[4]->short; ?>"><input name="ssd" type="radio">
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
											<img src="http://xn--80afeb8cd.com/newimg/HyperX-Savage.png">
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">240 GB Kingston HyperX Savage -- Чтение: 560MB/s, Запись: 530MB/s</div>
											<div class="radio_description_text">
												Твердотельный накопитель Team с интерфейсом SATA III позволяет ускорить запуск и, увеличить скорость загрузки приложений и игр в 10 раз, в сравнении с жестким диском. Накопитель имеет контроллер  Phison PS3110-S10, у которого нет деградации скорости. Производится из лучших компонентов своего класса. Скорость чтения 530 МБ/с, скорость записи 370 МБ/с
											</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
									<label class="radio_label ssd_label big_line_label" data-price="<? echo $base->ssds->ssd[6]->price; ?>" data-short="<? echo $base->ssds->ssd[6]->short; ?>"><input name="ssd" type="radio">
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
											<img src="http://xn--80afeb8cd.com/newimg/SAMSUNG-250GB-850-EVO.png">
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">500 GB Samsung 850 EVO SSD -- Чтение: 540MB/s, Запись: 520MB/s</div>
											<div class="radio_description_text">
												Твердотельный накопитель Team с интерфейсом SATA III позволяет ускорить запуск и, увеличить скорость загрузки приложений и игр в 10 раз, в сравнении с жестким диском. Накопитель имеет контроллер  Phison PS3110-S10, у которого нет деградации скорости. Производится из лучших компонентов своего класса. Скорость чтения 530 МБ/с, скорость записи 370 МБ/с
											</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
									<label class="radio_label ssd_label big_line_label" data-price="<? echo $base->ssds->ssd[7]->price; ?>" data-short="<? echo $base->ssds->ssd[7]->short; ?>"><input name="ssd" type="radio">
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
											<img src="http://xn--80afeb8cd.com/newimg/SAMSUNG-250GB-850-EVO.png">
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">1TB Samsung 850 EVO 2.5" SATA III TLC V-NAND</div>
											<div class="radio_description_text">
												Твердотельный накопитель Team с интерфейсом SATA III позволяет ускорить запуск и, увеличить скорость загрузки приложений и игр в 10 раз, в сравнении с жестким диском. Накопитель имеет контроллер  Phison PS3110-S10, у которого нет деградации скорости. Производится из лучших компонентов своего класса. Скорость чтения 530 МБ/с, скорость записи 370 МБ/с
											</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
									</div>
								</div>
							</div>
							<div class="accordion_block" id="accordion_motherboard">
								<div class="accordion_btn_title">Материнка</div>
								<div class="accordion_btn active mat_btn"></div>
								<div class="accordion_content clearfix">
									<div class="new_side_photo_container">
										<img src="http://xn--80afeb8cd.com/newimg/299sli.png">
									</div>
									<div class="tab_labels_container">
									<label class="radio_label mat_label" data-price="<? echo $base->materinkas->materinka[18]->price; ?>" data-short="<? echo $base->materinkas->materinka[18]->short; ?>"><input name="mat" type="radio">
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
											<img src="http://xn--80afeb8cd.com/newimg/raider299.png">
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">MSI X299 RAIDER, Intel X299 Chipset, LGA 2066, ATX</div>
											<div class="radio_description_text">
												Универсальная, недорогая и надежная материнская плата. Создана на базе высококачественных компонентов. Предназначена для игровых компьютеров.
											</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
									<label class="radio_label mat_label" data-price="<? echo $base->materinkas->materinka[19]->price; ?>" data-short="<? echo $base->materinkas->materinka[19]->short; ?>"><input name="mat" type="radio" checked>
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
											<img src="http://xn--80afeb8cd.com/newimg/299sli.png">
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">MSI X299 SLI PLUS, Intel X299 Chipset, LGA 2066, ATX</div>
											<div class="radio_description_text">
												Универсальная, недорогая и надежная материнская плата. Создана на базе высококачественных компонентов. Предназначена для игровых компьютеров.
											</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
									<label class="radio_label mat_label" data-price="<? echo $base->materinkas->materinka[20]->price; ?>" data-short="<? echo $base->materinkas->materinka[20]->short; ?>"><input name="mat" type="radio">
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
											<img src="http://xn--80afeb8cd.com/newimg/299tuf.png">
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">ASUS TUF X299 MARK 2, Intel X299 Chipset, LGA 2066, ATX</div>
											<div class="radio_description_text">
												Универсальная, недорогая и надежная материнская плата. Создана на базе высококачественных компонентов. Предназначена для игровых компьютеров.
											</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
									
									<label class="radio_label mat_label big_line_label" data-price="<? echo $base->materinkas->materinka[21]->price; ?>" data-short="<? echo $base->materinkas->materinka[21]->short; ?>"><input name="mat" type="radio">
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
											<img src="http://xn--80afeb8cd.com/newimg/asus.prime.png">
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">ASUS PRIME X299-A, Intel X299 Chipset, LGA 2066, ATX</div>
											<div class="radio_description_text">
												Материнская плата с разъемом процессора socket 1151 и набором системной логики Intel Z270. Создана на базе высококачественных компонентов, обладает великолепными техническими характеристиками. Предназначена для мощных игровых систем.
											</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
									<label class="radio_label mat_label" data-price="<? echo $base->materinkas->materinka[22]->price; ?>" data-short="<? echo $base->materinkas->materinka[22]->short; ?>"><input name="mat" type="radio">
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
											<img src="http://xn--80afeb8cd.com/newimg/gyg299.png">
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">GIGABYTE X299 AORUS Gaming 3, Intel X299 Chipset, LGA 2066, ATX</div>
											<div class="radio_description_text">
												Универсальная, недорогая и надежная материнская плата. Создана на базе высококачественных компонентов. Предназначена для игровых компьютеров.
											</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
									</div>
								</div>
							</div>
							<div class="accordion_block">
								<div class="accordion_btn_title">Блок питания</div>
								<div class="accordion_btn active block_btn"></div>
								<div class="accordion_content clearfix">
									<div class="new_side_photo_container">
										<img src="http://xn--80afeb8cd.com/newimg/700W.png">
									</div>
									<div class="tab_labels_container">
										<label class="radio_label block_label one_line_label" data-price="<? echo $base->blocks->block[0]->price; ?>" data-short="<? echo $base->blocks->block[0]->short; ?>"><input name="block" type="radio">
											<div class="radio_circle">
												<div class="radio_circle_inner"></div>
											</div>
											<div class="radio_img">
												<img src="http://xn--80afeb8cd.com/newimg/500W.png">
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Deepcool 530W</div>
												</div>
												<div class="radio_price"></div>
											</div>
										</label>
										<label class="radio_label block_label" data-price="<? echo $base->blocks->block[2]->price; ?>" data-short="<? echo $base->blocks->block[2]->short; ?>"><input name="block" type="radio" checked>
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
											<img src="http://xn--80afeb8cd.com/newimg/700W.png">
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">Chieftec 700 W ATX 2.3 APFC 700W GPS-700A8</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
									<label class="radio_label block_label" data-price="<? echo $base->blocks->block[4]->price; ?>" data-short="<? echo $base->blocks->block[4]->short; ?>"><input name="block" type="radio">
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
											<img src="http://xn--80afeb8cd.com/newimg/850W.png">
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">Chieftec 850 W ATX 2.3 APFC</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
									<label class="radio_label block_label" data-price="<? echo $base->blocks->block[6]->price; ?>" data-short="<? echo $base->blocks->block[6]->short; ?>"><input name="block" type="radio">
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
											<img src="http://xn--80afeb8cd.com/newimg/1000W.png">
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">RAIDMAX 1000 W 80+ Gold</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
									<label class="radio_label block_label" data-price="<? echo $base->blocks->block[7]->price; ?>" data-short="<? echo $base->blocks->block[7]->short; ?>"><input name="block" type="radio">
										<div class="radio_circle">
											<div class="radio_circle_inner"></div>
										</div>
										<div class="radio_img">
											<img src="http://xn--80afeb8cd.com/newimg/1589329405.jpg">
										</div>
										<div class="radio_description">
											<div class="radio_description_flex_container">
											<div class="radio_description_title">Vinga VPS-1200Pl</div>
											</div>
											<div class="radio_price"></div>
										</div>
									</label>
									</div>
								</div>
							</div>
							<div class="accordion_block" id="accordion_optical">
								<div class="accordion_btn_title">Дисковод</div>
								<div class="accordion_btn active disk_btn"></div>
								<div class="accordion_content clearfix">
									<div class="new_side_photo_container">
										<img src="http://xn--80afeb8cd.com/newimg/No-Optical-Drive.png">
									</div>
									<div class="tab_labels_container">
										<label class="radio_label disk_label one_line_label" data-price="<? echo $base->disks->disk[0]->price; ?>" data-short="<? echo $base->disks->disk[0]->short; ?>"><input name="disk" type="radio" checked>
											<div class="radio_circle">
												<div class="radio_circle_inner"></div>
											</div>
											<div class="radio_img">
												<img src="http://xn--80afeb8cd.com/newimg/No-Optical-Drive.png">
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Не устанавливать дисковод</div>
												</div>
												<div class="radio_price"></div>
												<!-- <div class="new_label_info">
													<div class="new_label_info_inner">
														<img src="img/newlabelinfo.png">
													</div>
												</div> -->
											</div>
										</label>
										<label class="radio_label disk_label" data-price="<? echo $base->disks->disk[1]->price; ?>" data-short="<? echo $base->disks->disk[1]->short; ?>"><input name="disk" type="radio">
											<div class="radio_circle">
												<div class="radio_circle_inner"></div>
											</div>
											<div class="radio_img">
												<img src="http://xn--80afeb8cd.com/newimg/disk2.png">
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Оптический привод LG DVD±R/RW SATA Super Multi</div>
												</div>
												<div class="radio_price"></div>
												<!-- <div class="new_label_info">
													<div class="new_label_info_inner">
														<img src="img/newlabelinfo.png">
													</div>
												</div> -->
											</div>
										</label>
									</div>
								</div>
							</div>
						</div>
						<div class="tab_content_inner_bottom_buttons">
							<div data="tab_accesories" class="tcibb_next" id="toAccess">Далее ></div>
						</div>
					</div>
					<div class="tab_content_inner" id="tab_accesories_content">
						<div class="accordion product_accordion">
							<div class="accordion_block monitor_block">
									<div class="accordion_btn_title">Монитор</div>
								<div class="accordion_btn active" style="padding-left:160px;">Не выбрано</div>
								<div class="accordion_content new_accordion_content clearfix">
									<div class="new_side_photo_container"></div>
									<div class="new_tab_labels_container">

										<!-- разделительная линия -->

										<div class="accessories_separator_block">
											- HD 1366x768 Мониторы
										</div>

										<!--  конец разделительной линии -->

										<div class="screens_block">

											<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->monitors->monitor[9]->price; ?>">
												<div class="tabs_checkbox">
													<div class="tabs_checkbox_inner"></div>
												</div>
												<div class="radio_img">
													<img src="<? echo $base2->modal[11]->pics->pic[0]; ?>">
													<div class="zoom_in_hover accessoriesPopup" modal-id="11">
														<img src="img/zoom-in.svg">
														<span>zoom</span>
													</div>
												</div>
												<div class="radio_description">
													<div class="radio_description_flex_container">
													<div class="radio_description_title">Монитор 19" PHILIPS 193V5LSB2/10</div>
													</div>
													<div class="radio_price">(+ <? echo $base->monitors->monitor[9]->price; ?> грн)</div>
												</div>
											</label>
											<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->monitors->monitor[0]->price; ?>">
												<div class="tabs_checkbox">
													<div class="tabs_checkbox_inner"></div>
												</div>
												<div class="radio_img">
													<img src="<? echo $base2->modal[12]->pics->pic[0]; ?>">
													<div class="zoom_in_hover accessoriesPopup" modal-id="12">
														<img src="img/zoom-in.svg">
														<span>zoom</span>
													</div>
												</div>
												<div class="radio_description">
													<div class="radio_description_flex_container">
													<div class="radio_description_title">Монитор 19" LG 19M38A-B black 5ms</div>
													</div>
													<div class="radio_price">(+ <? echo $base->monitors->monitor[0]->price; ?> грн)</div>
												</div>
											</label>
											<!-- <label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->monitors->monitor[1]->price; ?>">
												<div class="tabs_checkbox">
													<div class="tabs_checkbox_inner"></div>
												</div>
												<div class="radio_img">
													<img src="<? echo $base2->modal[13]->pics->pic[0]; ?>">
													<div class="zoom_in_hover accessoriesPopup" modal-id="13">
														<img src="img/zoom-in.svg">
														<span>zoom</span>
													</div>
												</div>
												<div class="radio_description">
													<div class="radio_description_flex_container">
													<div class="radio_description_title">Монитор 19" SAMSUNG S19F350HNI</div>
													</div>
													<div class="radio_price">(+ <? echo $base->monitors->monitor[1]->price; ?> грн)</div>
												</div>
											</label> -->

										</div>

										<div class="accessories_separator_block">
											- HD 1600x900 Мониторы
										</div>

										<div class="screens_block">
											<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->monitors->monitor[2]->price; ?>">
												<div class="tabs_checkbox">
													<div class="tabs_checkbox_inner"></div>
												</div>
												<div class="radio_img">
													<img src="<? echo $base2->modal[14]->pics->pic[0]; ?>">
													<div class="zoom_in_hover accessoriesPopup" modal-id="14">
														<img src="img/zoom-in.svg">
														<span>zoom</span>
													</div>
												</div>
												<div class="radio_description">
													<div class="radio_description_flex_container">
													<div class="radio_description_title">Монитор 20" LG 20M38A-B</div>
													</div>
													<div class="radio_price">(+ <? echo $base->monitors->monitor[2]->price; ?> грн)</div>
												</div>
											</label>
											<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->monitors->monitor[4]->price; ?>">
												<div class="tabs_checkbox">
													<div class="tabs_checkbox_inner"></div>
												</div>
												<div class="radio_img">
													<img src="<? echo $base2->modal[17]->pics->pic[0]; ?>">
													<div class="zoom_in_hover accessoriesPopup" modal-id="17">
														<img src="img/zoom-in.svg">
														<span>zoom</span>
													</div>
												</div>
												<div class="radio_description">
													<div class="radio_description_flex_container">
													<div class="radio_description_title">Монитор 22" SAMSUNG LS22F350F</div>
													</div>
													<div class="radio_price">(+ <? echo $base->monitors->monitor[4]->price; ?> грн)</div>
												</div>
											</label>
										</div>

										<div class="accessories_separator_block">
											- FullHD 1920x1080 Мониторы
										</div>									
										
										<!--  конец разделительной линии -->

										<div class="screens_block">
											<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->monitors->monitor[3]->price; ?>">
												<div class="tabs_checkbox">
													<div class="tabs_checkbox_inner"></div>
												</div>
												<div class="radio_img">
													<img src="<? echo $base2->modal[15]->pics->pic[0]; ?>">
													<div class="zoom_in_hover accessoriesPopup"  modal-id="15">
														<img src="img/zoom-in.svg">
														<span>zoom</span>
													</div>
												</div>
												<div class="radio_description">
													<div class="radio_description_flex_container">
													<div class="radio_description_title">Монитор 22" Philips 223V5LSB2/62 Black VGA</div>
													</div>
													<div class="radio_price">(+ <? echo $base->monitors->monitor[3]->price; ?> грн)</div>
												</div>
											</label>
											<!-- <label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->monitors->monitor[10]->price; ?>">
												<div class="tabs_checkbox">
													<div class="tabs_checkbox_inner"></div>
												</div>
												<div class="radio_img">
													<img src="<? echo $base2->modal[16]->pics->pic[0]; ?>">
													<div class="zoom_in_hover accessoriesPopup" modal-id="16">
														<img src="img/zoom-in.svg">
														<span>zoom</span>
													</div>
												</div>
												<div class="radio_description">
													<div class="radio_description_flex_container">
													<div class="radio_description_title">Монитор 22" SAMSUNG S22D300N</div>
													</div>
													<div class="radio_price">(+ <? echo $base->monitors->monitor[10]->price; ?> грн)</div>
												</div>
											</label> -->
											<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->monitors->monitor[8]->price; ?>">
												<div class="tabs_checkbox">
													<div class="tabs_checkbox_inner"></div>
												</div>
												<div class="radio_img">
													<img src="<? echo $base2->modal[18]->pics->pic[0]; ?>">
													<div class="zoom_in_hover accessoriesPopup" modal-id="18">
														<img src="img/zoom-in.svg">
														<span>zoom</span>
													</div>
												</div>
												<div class="radio_description">
													<div class="radio_description_flex_container">
													<div class="radio_description_title">Монитор 24" S24D300HSI</div>
													</div>
													<div class="radio_price">(+ <? echo $base->monitors->monitor[8]->price; ?> грн)</div>
												</div>
											</label>
											<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->monitors->monitor[5]->price; ?>">
												<div class="tabs_checkbox">
													<div class="tabs_checkbox_inner"></div>
												</div>
												<div class="radio_img">
													<img src="<? echo $base2->modal[19]->pics->pic[0]; ?>">
													<div class="zoom_in_hover accessoriesPopup" modal-id="19">
														<img src="img/zoom-in.svg">
														<span>zoom</span>
													</div>
												</div>
												<div class="radio_description">
													<div class="radio_description_flex_container">
													<div class="radio_description_title">Монитор 23" LG 23MP68VQ-P</div>
													</div>
													<div class="radio_price">(+ <? echo $base->monitors->monitor[5]->price; ?> грн)</div>
												</div>
											</label>
											<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->monitors->monitor[6]->price; ?>">
												<div class="tabs_checkbox">
													<div class="tabs_checkbox_inner"></div>
												</div>
												<div class="radio_img">
													<img src="<? echo $base2->modal[20]->pics->pic[0]; ?>">
													<div class="zoom_in_hover accessoriesPopup" modal-id="20">
														<img src="img/zoom-in.svg">
														<span>zoom</span>
													</div>
												</div>
												<div class="radio_description">
													<div class="radio_description_flex_container">
													<div class="radio_description_title">Монитор 24" Dell UltraSharp U2414H Black</div>
													</div>
													<div class="radio_price">(+ <? echo $base->monitors->monitor[6]->price; ?> грн)</div>
												</div>
											</label>
											<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->monitors->monitor[11]->price; ?>">
												<div class="tabs_checkbox">
													<div class="tabs_checkbox_inner"></div>
												</div>
												<div class="radio_img">
													<img src="<? echo $base2->modal[56]->pics->pic[0]; ?>">
													<div class="zoom_in_hover accessoriesPopup" modal-id="56">
														<img src="img/zoom-in.svg">
														<span>zoom</span>
													</div>
												</div>
												<div class="radio_description">
													<div class="radio_description_flex_container">
													<div class="radio_description_title">Монитор 22" Acer SA220Qbid</div>
													</div>
													<div class="radio_price">(+ <? echo $base->monitors->monitor[11]->price; ?> грн)</div>
												</div>
											</label>
											<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->monitors->monitor[12]->price; ?>">
												<div class="tabs_checkbox">
													<div class="tabs_checkbox_inner"></div>
												</div>
												<div class="radio_img">
													<img src="<? echo $base2->modal[57]->pics->pic[0]; ?>">
													<div class="zoom_in_hover accessoriesPopup" modal-id="57">
														<img src="img/zoom-in.svg">
														<span>zoom</span>
													</div>
												</div>
												<div class="radio_description">
													<div class="radio_description_flex_container">
													<div class="radio_description_title">Монитор 24" LG 24MP48HQ-P</div>
													</div>
													<div class="radio_price">(+ <? echo $base->monitors->monitor[12]->price; ?> грн)</div>
												</div>
											</label>
											<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->monitors->monitor[13]->price; ?>">
												<div class="tabs_checkbox">
													<div class="tabs_checkbox_inner"></div>
												</div>
												<div class="radio_img">
													<img src="<? echo $base2->modal[58]->pics->pic[0]; ?>">
													<div class="zoom_in_hover accessoriesPopup" modal-id="58">
														<img src="img/zoom-in.svg">
														<span>zoom</span>
													</div>
												</div>
												<div class="radio_description">
													<div class="radio_description_flex_container">
													<div class="radio_description_title">Монитор 24" LG 24MP59G-P</div>
													</div>
													<div class="radio_price">(+ <? echo $base->monitors->monitor[13]->price; ?> грн)</div>
												</div>
											</label>


											<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->monitors->monitor[14]->price; ?>">
												<div class="tabs_checkbox">
													<div class="tabs_checkbox_inner"></div>
												</div>
												<div class="radio_img">
													<img src="<? echo $base2->modal[59]->pics->pic[0]; ?>">
													<div class="zoom_in_hover accessoriesPopup" modal-id="59">
														<img src="img/zoom-in.svg">
														<span>zoom</span>
													</div>
												</div>
												<div class="radio_description">
													<div class="radio_description_flex_container">
													<div class="radio_description_title">Монитор 24" AOC I2481FXH</div>
													</div>
													<div class="radio_price">(+ <? echo $base->monitors->monitor[14]->price; ?> грн)</div>
												</div>
											</label>
											<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->monitors->monitor[16]->price; ?>">
												<div class="tabs_checkbox">
													<div class="tabs_checkbox_inner"></div>
												</div>
												<div class="radio_img">
													<img src="<? echo $base2->modal[61]->pics->pic[0]; ?>">
													<div class="zoom_in_hover accessoriesPopup" modal-id="61">
														<img src="img/zoom-in.svg">
														<span>zoom</span>
													</div>
												</div>
												<div class="radio_description">
													<div class="radio_description_flex_container">
													<div class="radio_description_title">Монитор 27" Dell SE2717H</div>
													</div>
													<div class="radio_price">(+ <? echo $base->monitors->monitor[16]->price; ?> грн)</div>
												</div>
											</label>
											<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->monitors->monitor[17]->price; ?>">
												<div class="tabs_checkbox">
													<div class="tabs_checkbox_inner"></div>
												</div>
												<div class="radio_img">
													<img src="<? echo $base2->modal[62]->pics->pic[0]; ?>">
													<div class="zoom_in_hover accessoriesPopup" modal-id="62">
														<img src="img/zoom-in.svg">
														<span>zoom</span>
													</div>
												</div>
												<div class="radio_description">
													<div class="radio_description_flex_container">
													<div class="radio_description_title">Монитор 24" LG 24MP88HV-S</div>
													</div>
													<div class="radio_price">(+ <? echo $base->monitors->monitor[17]->price; ?> грн)</div>
												</div>
											</label>
											<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->monitors->monitor[18]->price; ?>">
												<div class="tabs_checkbox">
													<div class="tabs_checkbox_inner"></div>
												</div>
												<div class="radio_img">
													<img src="<? echo $base2->modal[63]->pics->pic[0]; ?>">
													<div class="zoom_in_hover accessoriesPopup" modal-id="63">
														<img src="img/zoom-in.svg">
														<span>zoom</span>
													</div>
												</div>
												<div class="radio_description">
													<div class="radio_description_flex_container">
													<div class="radio_description_title">Монитор 27" Dell P2717H</div>
													</div>
													<div class="radio_price">(+ <? echo $base->monitors->monitor[18]->price; ?> грн)</div>
												</div>
											</label>
										</div>

										<div class="accessories_separator_block">
											- 2K 2560х1440 Мониторы
										</div>

										<!--  конец разделительной линии -->

										<div class="screens_block">
											<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->monitors->monitor[7]->price; ?>">
												<div class="tabs_checkbox">
													<div class="tabs_checkbox_inner"></div>
												</div>
												<div class="radio_img">
													<img src="<? echo $base2->modal[21]->pics->pic[0]; ?>">
													<div class="zoom_in_hover accessoriesPopup"  modal-id="21">
														<img src="img/zoom-in.svg">
														<span>zoom</span>
													</div>
												</div>
												<div class="radio_description">
													<div class="radio_description_flex_container">
													<div class="radio_description_title">Монитор 25" Dell UltraSharp U2515H</div>
													</div>
													<div class="radio_price">(+ <? echo $base->monitors->monitor[7]->price; ?> грн)</div>
												</div>
											</label>
											<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->monitors->monitor[15]->price; ?>">
												<div class="tabs_checkbox">
													<div class="tabs_checkbox_inner"></div>
												</div>
												<div class="radio_img">
													<img src="<? echo $base2->modal[60]->pics->pic[0]; ?>">
													<div class="zoom_in_hover accessoriesPopup" modal-id="60">
														<img src="img/zoom-in.svg">
														<span>zoom</span>
													</div>
												</div>
												<div class="radio_description">
													<div class="radio_description_flex_container">
													<div class="radio_description_title">Монитор 25" LG 25UM58-P</div>
													</div>
													<div class="radio_price">(+ <? echo $base->monitors->monitor[15]->price; ?> грн)</div>
												</div>
											</label>
											<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->monitors->monitor[19]->price; ?>">
												<div class="tabs_checkbox">
													<div class="tabs_checkbox_inner"></div>
												</div>
												<div class="radio_img">
													<img src="<? echo $base2->modal[64]->pics->pic[0]; ?>">
													<div class="zoom_in_hover accessoriesPopup" modal-id="64">
														<img src="img/zoom-in.svg">
														<span>zoom</span>
													</div>
												</div>
												<div class="radio_description">
													<div class="radio_description_flex_container">
													<div class="radio_description_title">Монитор 29" LG 29UM59-P</div>
													</div>
													<div class="radio_price">(+ <? echo $base->monitors->monitor[19]->price; ?> грн)</div>
												</div>
											</label>
											<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->monitors->monitor[20]->price; ?>">
												<div class="tabs_checkbox">
													<div class="tabs_checkbox_inner"></div>
												</div>
												<div class="radio_img">
													<img src="<? echo $base2->modal[65]->pics->pic[0]; ?>">
													<div class="zoom_in_hover accessoriesPopup" modal-id="65">
														<img src="img/zoom-in.svg">
														<span>zoom</span>
													</div>
												</div>
												<div class="radio_description">
													<div class="radio_description_flex_container">
													<div class="radio_description_title">Монитор 25" AOC Q2577PWQ</div>
													</div>
													<div class="radio_price">(+ <? echo $base->monitors->monitor[20]->price; ?> грн)</div>
												</div>
											</label>
										</div>

										<div class="accessories_separator_block">
											- 4K 3840x2160 Мониторы
										</div>

										<!--  конец разделительной линии -->

										<div class="screens_block">
											<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->monitors->monitor[21]->price; ?>">
												<div class="tabs_checkbox">
													<div class="tabs_checkbox_inner"></div>
												</div>
												<div class="radio_img">
													<img src="<? echo $base2->modal[91]->pics->pic[0]; ?>">
													<div class="zoom_in_hover accessoriesPopup"  modal-id="91">
														<img src="img/zoom-in.svg">
														<span>zoom</span>
													</div>
												</div>
												<div class="radio_description">
													<div class="radio_description_flex_container">
													<div class="radio_description_title">Монитор 29" LG 29UM59-P</div>
													</div>
													<div class="radio_price">(+ <? echo $base->monitors->monitor[21]->price; ?> грн)</div>
												</div>
											</label>
										</div>

									</div>	
								</div>
							</div>
							<div class="accordion_block cooler_access_block">
								<div class="accordion_btn_title">Вентиляторы</div>
								<div class="accordion_btn active" style="padding-left:195px;">Не выбрано</div>
								<div class="accordion_content new_accordion_content clearfix">
									<div class="new_side_photo_container"></div>
									<div class="new_tab_labels_container">
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->dopvents->dopvent[2]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="http://xn--80afeb8cd.com/newimg/Cooling-Baby-blue.png">
												<!-- <div class="zoom_in_hover accessoriesPopup" modal-id="0">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div> -->
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Вентилятор Cooling Baby 12cm Blue</div>
												</div>
												<div class="radio_price">(+ <? echo $base->dopvents->dopvent[2]->price; ?> грн)</div>
											</div>
										</label>
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->dopvents->dopvent[3]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="http://xn--80afeb8cd.com/newimg/Cooling-Baby-Red.png">
												<!-- <div class="zoom_in_hover accessoriesPopup" modal-id="0">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div> -->
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Вентилятор Cooling Baby 12cm Red</div>
												</div>
												<div class="radio_price">(+ <? echo $base->dopvents->dopvent[3]->price; ?> грн)</div>
											</div>
										</label>
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->dopvents->dopvent[0]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="http://xn--80afeb8cd.com/newimg/thermaltake_riing_red_175.png">
												<!-- <div class="zoom_in_hover accessoriesPopup" modal-id="0">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div> -->
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Вентилятор Thermaltake Riing 12 Red LED</div>
												</div>
												<div class="radio_price">(+ <? echo $base->dopvents->dopvent[0]->price; ?> грн)</div>
											</div>
										</label>
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->dopvents->dopvent[1]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="http://xn--80afeb8cd.com/newimg/thermaltake_riing_blue_175.png">
												<!-- <div class="zoom_in_hover accessoriesPopup" modal-id="0">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div> -->
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Вентилятор Thermaltake Riing 12 Blue LED</div>
												</div>
												<div class="radio_price">(+ <? echo $base->dopvents->dopvent[1]->price; ?> грн)</div>
											</div>
										</label>
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->dopvents->dopvent[4]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="http://xn--80afeb8cd.com/newimg/thermaltake_riing_blue_3.png">
												<!-- <div class="zoom_in_hover accessoriesPopup" modal-id="0">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div> -->
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">3x [Blue] Thermaltake Riing 12 120mm Вентилятор</div>
												</div>
												<div class="radio_price">(+ <? echo $base->dopvents->dopvent[4]->price; ?> грн)</div>
											</div>
										</label>
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->dopvents->dopvent[5]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="http://xn--80afeb8cd.com/newimg/thermaltake_riing_red_3.png">
												<!-- <div class="zoom_in_hover accessoriesPopup" modal-id="0">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div> -->
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">3x [Red] Thermaltake Riing 12 120mm Вентилятор</div>
												</div>
												<div class="radio_price">(+ <? echo $base->dopvents->dopvent[5]->price; ?> грн)</div>
											</div>
										</label>
									</div>	
								</div>
							</div>
							<div class="accordion_block keyboard_block">
								<div class="accordion_btn_title">Клавиатура</div>
								<div class="accordion_btn active" style="padding-left:185px;">Не выбрано</div>
								<div class="accordion_content new_accordion_content clearfix">
									<div class="new_side_photo_container"></div>
									<div class="new_tab_labels_container">
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->offers->offer[0]->price; ?>">
												<div class="tabs_checkbox">
													<div class="tabs_checkbox_inner"></div>
												</div>
												<div class="radio_img">
													<img src="http://xn--80afeb8cd.com/newimg/free-keybord.png" style="width:175px;">
													<!-- <div class="zoom_in_hover accessoriesPopup" modal-id="0">
														<img src="img/zoom-in.svg">
														<span>zoom</span>
													</div> -->
												</div>
												<div class="radio_description">
													<div class="radio_description_flex_container">
														<div class="radio_description_title">Игровая клавиатура с LED подсветкой (была 550 грн)</div>
													</div>
													<div class="radio_price">(+ <? echo $base->offers->offer[0]->price; ?> грн)</div>
												</div>
												<div class="economy">экономия!</div>
										</label>
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->keyboards->keyboard[0]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="<? echo $base2->modal[22]->pics->pic[0]; ?>">
												<div class="zoom_in_hover accessoriesPopup" modal-id="22">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Клавиатура LogicPower LP-KB 000</div>
												</div>
												<div class="radio_price">(+ <? echo $base->keyboards->keyboard[0]->price; ?> грн)</div>
											</div>
										</label>
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->keyboards->keyboard[1]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="<? echo $base2->modal[23]->pics->pic[0]; ?>">
												<div class="zoom_in_hover accessoriesPopup" modal-id="23">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Клавиатура Genius KB110 Black</div>
												</div>
												<div class="radio_price">(+ <? echo $base->keyboards->keyboard[1]->price; ?> грн)</div>
											</div>
										</label>
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->keyboards->keyboard[2]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="<? echo $base2->modal[24]->pics->pic[0]; ?>">
												<div class="zoom_in_hover accessoriesPopup" modal-id="24">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Клавиатура K120 Logitech USB (920-002522)</div>
												</div>
												<div class="radio_price">(+ <? echo $base->keyboards->keyboard[2]->price; ?> грн)</div>
											</div>
										</label>
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->keyboards->keyboard[3]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="<? echo $base2->modal[25]->pics->pic[0]; ?>">
												<div class="zoom_in_hover accessoriesPopup" modal-id="25">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Клавиатура Genius Scorpion K215 Black</div>
												</div>
												<div class="radio_price">(+ <? echo $base->keyboards->keyboard[3]->price; ?> грн)</div>
											</div>
										</label>
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->keyboards->keyboard[6]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="<? echo $base2->modal[26]->pics->pic[0]; ?>">
												<div class="zoom_in_hover accessoriesPopup" modal-id="26">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Клавиатура Gembird KB-6250LU</div>
												</div>
												<div class="radio_price">(+ <? echo $base->keyboards->keyboard[6]->price; ?> грн)</div>
											</div>
										</label>
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->keyboards->keyboard[12]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="<? echo $base2->modal[27]->pics->pic[0]; ?>">
												<div class="zoom_in_hover accessoriesPopup" modal-id="27">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Клавиатура NATEC GENESIS RX39</div>
												</div>
												<div class="radio_price">(+ <? echo $base->keyboards->keyboard[12]->price; ?> грн)</div>
											</div>
										</label>
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->keyboards->keyboard[4]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="<? echo $base2->modal[28]->pics->pic[0]; ?>">
												<div class="zoom_in_hover accessoriesPopup" modal-id="28">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Клавиатура Aula Expert Gaming Keyboard Be Fire</div>
												</div>
												<div class="radio_price">(+ <? echo $base->keyboards->keyboard[4]->price; ?> грн)</div>
											</div>
										</label>
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->keyboards->keyboard[7]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="<? echo $base2->modal[29]->pics->pic[0]; ?>">
												<div class="zoom_in_hover accessoriesPopup" modal-id="29">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Клавиатура NATEC GENESIS RX22 BACKLIGHT</div>
												</div>
												<div class="radio_price">(+ <? echo $base->keyboards->keyboard[7]->price; ?> грн)</div>
											</div>
										</label>
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->keyboards->keyboard[8]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="<? echo $base2->modal[30]->pics->pic[0]; ?>">
												<div class="zoom_in_hover accessoriesPopup" modal-id="30">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Клавиатура A4Tech Bloody B120</div>
												</div>
												<div class="radio_price">(+ <? echo $base->keyboards->keyboard[8]->price; ?> грн)</div>
											</div>
										</label>
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->keyboards->keyboard[9]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="<? echo $base2->modal[31]->pics->pic[0]; ?>">
												<div class="zoom_in_hover accessoriesPopup" modal-id="31">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Клавиатура Tesoro Durandal G1N Blue Switch</div>
												</div>
												<div class="radio_price">(+ <? echo $base->keyboards->keyboard[9]->price; ?> грн)</div>
											</div>
										</label>
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->keyboards->keyboard[10]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="<? echo $base2->modal[32]->pics->pic[0]; ?>">
												<div class="zoom_in_hover accessoriesPopup" modal-id="32">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Клавиатура ASUS Cerberus MKII Gaming</div>
												</div>
												<div class="radio_price">(+ <? echo $base->keyboards->keyboard[10]->price; ?> грн)</div>
											</div>
										</label>
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->keyboards->keyboard[5]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="<? echo $base2->modal[33]->pics->pic[0]; ?>">
												<div class="zoom_in_hover accessoriesPopup" modal-id="33">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Клавиатура SteelSeries Apex Raw</div>
												</div>
												<div class="radio_price">(+ <? echo $base->keyboards->keyboard[5]->price; ?> грн)</div>
											</div>
										</label>
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->keyboards->keyboard[11]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="<? echo $base2->modal[34]->pics->pic[0]; ?>">
												<div class="zoom_in_hover accessoriesPopup" modal-id="34">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Клавиатура Kingston HyperX Alloy FPS MX blue switch</div>
												</div>
												<div class="radio_price">(+ <? echo $base->keyboards->keyboard[11]->price; ?> грн)</div>
											</div>
										</label>
									</div>	
								</div>
							</div>
							<div class="accordion_block mouse_block">
								<div class="accordion_btn_title">Мышь</div>
								<div class="accordion_btn active" style="padding-left:135px;">Не выбрано</div>
								<div class="accordion_content new_accordion_content clearfix">
									<div class="new_side_photo_container"></div>
									<div class="new_tab_labels_container">
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->mouses->mouse[0]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="<? echo $base2->modal[35]->pics->pic[0]; ?>">
												<div class="zoom_in_hover accessoriesPopup" modal-id="35">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>	
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Мышь LogicFox LF-MS 111 USB</div>
												</div>
												<div class="radio_price">(+ <? echo $base->mouses->mouse[0]->price; ?> грн)</div>
											</div>
										</label>
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->mouses->mouse[5]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="<? echo $base2->modal[36]->pics->pic[0]; ?>">
												<div class="zoom_in_hover accessoriesPopup" modal-id="36">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>	
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Мышка Vinga MS-637 black</div>
												</div>
												<div class="radio_price">(+ <? echo $base->mouses->mouse[5]->price; ?> грн)</div>
											</div>
										</label>
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->mouses->mouse[1]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="<? echo $base2->modal[37]->pics->pic[0]; ?>">
												<div class="zoom_in_hover accessoriesPopup" modal-id="37">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>	
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Мышь Logitech B100</div>
												</div>
												<div class="radio_price">(+ <? echo $base->mouses->mouse[1]->price; ?> грн)</div>
											</div>
										</label>
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->mouses->mouse[6]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="<? echo $base2->modal[38]->pics->pic[0]; ?>">
												<div class="zoom_in_hover accessoriesPopup" modal-id="38">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>	
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Мышь Trust Ziva Gaming</div>
												</div>
												<div class="radio_price">(+ <? echo $base->mouses->mouse[6]->price; ?> грн)</div>
											</div>
										</label>
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->mouses->mouse[2]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="<? echo $base2->modal[39]->pics->pic[0]; ?>">
												<div class="zoom_in_hover accessoriesPopup" modal-id="39">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>	
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Мышь LogicFox Gaming Series LF-GM 046</div>
												</div>
												<div class="radio_price">(+ <? echo $base->mouses->mouse[2]->price; ?> грн)</div>
											</div>
										</label>
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->mouses->mouse[7]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="<? echo $base2->modal[40]->pics->pic[0]; ?>">
												<div class="zoom_in_hover accessoriesPopup" modal-id="40">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>	
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Мышь NATEC GENESIS XENON 200 OPTICAL</div>
												</div>
												<div class="radio_price">(+ <? echo $base->mouses->mouse[7]->price; ?> грн)</div>
											</div>
										</label>
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->mouses->mouse[8]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="<? echo $base2->modal[41]->pics->pic[0]; ?>">
												<div class="zoom_in_hover accessoriesPopup" modal-id="41">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>	
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Мышь A4Tech X-710BK</div>
												</div>
												<div class="radio_price">(+ <? echo $base->mouses->mouse[8]->price; ?> грн)</div>
											</div>
										</label>
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->mouses->mouse[9]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="<? echo $base2->modal[42]->pics->pic[0]; ?>">
												<div class="zoom_in_hover accessoriesPopup" modal-id="42">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>	
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Мышь Tesoro Sharur</div>
												</div>
												<div class="radio_price">(+ <? echo $base->mouses->mouse[9]->price; ?> грн)</div>
											</div>
										</label>
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->mouses->mouse[10]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="<? echo $base2->modal[43]->pics->pic[0]; ?>">
												<div class="zoom_in_hover accessoriesPopup" modal-id="43">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>	
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Мышь A4Tech Bloody V8M</div>
												</div>
												<div class="radio_price">(+ <? echo $base->mouses->mouse[10]->price; ?> грн)</div>
											</div>
										</label>
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->mouses->mouse[11]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="<? echo $base2->modal[44]->pics->pic[0]; ?>">
												<div class="zoom_in_hover accessoriesPopup" modal-id="44">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>	
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Мышь A4Tech Bloody R8</div>
												</div>
												<div class="radio_price">(+ <? echo $base->mouses->mouse[11]->price; ?> грн)</div>
											</div>
										</label>
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->mouses->mouse[12]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="<? echo $base2->modal[45]->pics->pic[0]; ?>">
												<div class="zoom_in_hover accessoriesPopup" modal-id="45">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>	
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Мышь NATEC GENESIS GX85 LASER</div>
												</div>
												<div class="radio_price">(+ <? echo $base->mouses->mouse[12]->price; ?> грн)</div>
											</div>
										</label>
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->mouses->mouse[3]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="<? echo $base2->modal[46]->pics->pic[0]; ?>">
												<div class="zoom_in_hover accessoriesPopup" modal-id="46">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>	
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Мышь SteelSeries Rival 100 Black</div>
												</div>
												<div class="radio_price">(+ <? echo $base->mouses->mouse[3]->price; ?> грн)</div>
											</div>
										</label>
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->mouses->mouse[13]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="<? echo $base2->modal[47]->pics->pic[0]; ?>">
												<div class="zoom_in_hover accessoriesPopup" modal-id="47">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>	
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Мышь Razer Death Adder Elite</div>
												</div>
												<div class="radio_price">(+ <? echo $base->mouses->mouse[13]->price; ?> грн)</div>
											</div>
										</label>
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->mouses->mouse[4]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="<? echo $base2->modal[48]->pics->pic[0]; ?>">
												<div class="zoom_in_hover accessoriesPopup" modal-id="48">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>	
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Мышь Razer Mamba Tournament Edition</div>
												</div>
												<div class="radio_price">(+ <? echo $base->mouses->mouse[4]->price; ?> грн)</div>
											</div>
										</label>
									</div>	
								</div>
							</div>
							<div class="accordion_block complect_block">
								<div class="accordion_btn_title">Комплекты</div>
								<div class="accordion_btn active" style="padding-left:180px;">Не выбрано</div>
								<div class="accordion_content new_accordion_content clearfix">
									<div class="new_side_photo_container"></div>
									<div class="new_tab_labels_container">
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->complects->complect[0]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="<? echo $base2->modal[49]->pics->pic[0]; ?>">	
												<div class="zoom_in_hover accessoriesPopup" modal-id="49">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Комплект LogicFox Combo black</div>
												</div>
												<div class="radio_price">(+ <? echo $base->complects->complect[0]->price; ?> грн)</div>
											</div>
										</label>
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->complects->complect[1]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="<? echo $base2->modal[50]->pics->pic[0]; ?>">	
												<div class="zoom_in_hover accessoriesPopup" modal-id="50">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Комплект Genius SlimStar 2.4G Black</div>
												</div>
												<div class="radio_price">(+ <? echo $base->complects->complect[1]->price; ?> грн)</div>
											</div>
										</label>
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->complects->complect[2]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="<? echo $base2->modal[51]->pics->pic[0]; ?>">	
												<div class="zoom_in_hover accessoriesPopup" modal-id="51">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Комплект Logitech Wireless Combo MK220</div>
												</div>
												<div class="radio_price">(+ <? echo $base->complects->complect[2]->price; ?> грн)</div>
											</div>
										</label>
									</div>	
								</div>
							</div>
							<div class="accordion_block carpet_block">
								<div class="accordion_btn_title">Коврики</div>
								<div class="accordion_btn active" style="padding-left:155px;">Не выбрано</div>
								<div class="accordion_content new_accordion_content clearfix">
									<div class="new_side_photo_container"></div>
									<div class="new_tab_labels_container">
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->carpets->carpet[0]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="<? echo $base2->modal[86]->pics->pic[0]; ?>">
												<div class="zoom_in_hover accessoriesPopup" modal-id="86">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>	
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">A4Tech X7-300MP</div>
												</div>
												<div class="radio_price">(+ <? echo $base->carpets->carpet[0]->price; ?> грн)</div>
											</div>
										</label>
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->carpets->carpet[1]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="<? echo $base2->modal[87]->pics->pic[0]; ?>">
												<div class="zoom_in_hover accessoriesPopup" modal-id="87">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>	
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">SteelSeries QcK+ (63003)</div>
												</div>
												<div class="radio_price">(+ <? echo $base->carpets->carpet[1]->price; ?> грн)</div>
											</div>
										</label>
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->carpets->carpet[2]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="<? echo $base2->modal[88]->pics->pic[0]; ?>">
												<div class="zoom_in_hover accessoriesPopup" modal-id="88">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>	
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Razer Gigantus Elite L Gaming Black/Green (RZ02-01830200-R3M1)</div>
												</div>
												<div class="radio_price">(+ <? echo $base->carpets->carpet[2]->price; ?> грн)</div>
											</div>
										</label>
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->carpets->carpet[3]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="<? echo $base2->modal[89]->pics->pic[0]; ?>">
												<div class="zoom_in_hover accessoriesPopup" modal-id="89">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>	
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">NATEC Genesis M12 Maxi Gaming Mousepad (NPG-0660)</div>
												</div>
												<div class="radio_price">(+ <? echo $base->carpets->carpet[3]->price; ?> грн)</div>
											</div>
										</label>
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->carpets->carpet[4]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="<? echo $base2->modal[90]->pics->pic[0]; ?>">
												<div class="zoom_in_hover accessoriesPopup" modal-id="90">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>	
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Kingston HyperX Fury L Black (HX-MPFS-L)</div>
												</div>
												<div class="radio_price">(+ <? echo $base->carpets->carpet[4]->price; ?> грн)</div>
											</div>
										</label>
									</div>	
								</div>
							</div>
							<div class="accordion_block cable_block">
								<div class="accordion_btn_title">Кабели</div>
								<div class="accordion_btn active" style="padding-left:145px;">Не выбрано</div>
								<div class="accordion_content new_accordion_content clearfix">
									<div class="new_side_photo_container"></div>
									<div class="new_tab_labels_container">
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->cabels->cabel[0]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="img/cable1.png">
												<!-- <div class="zoom_in_hover accessoriesPopup" modal-id="0">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>	 -->
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Кабель HDMI на HDMI 1.5 м</div>
												</div>
												<div class="radio_price">(+ <? echo $base->cabels->cabel[0]->price; ?> грн)</div>
											</div>
										</label>
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->cabels->cabel[1]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="img/cable2.png">
												<!-- <div class="zoom_in_hover accessoriesPopup" modal-id="0">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>	 -->
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Кабель HDMI на HDMI 3 м</div>
												</div>
												<div class="radio_price">(+ <? echo $base->cabels->cabel[1]->price; ?> грн)</div>
											</div>
										</label>
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->cabels->cabel[2]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="img/cable3.png">
												<!-- <div class="zoom_in_hover accessoriesPopup" modal-id="0">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>	 -->
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Кабель DVI-D на DVI-D 1.8 м</div>
												</div>
												<div class="radio_price">(+ <? echo $base->cabels->cabel[2]->price; ?> грн)</div>
											</div>
										</label>
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->cabels->cabel[3]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="img/cable4.png">
												<!-- <div class="zoom_in_hover accessoriesPopup" modal-id="0">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>	 -->
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Конвертер HDMI на VGA</div>
												</div>
												<div class="radio_price">(+ <? echo $base->cabels->cabel[3]->price; ?> грн)</div>
											</div>
										</label>
									</div>	
								</div>
							</div>
							<div class="accordion_block garniture_block">
								<div class="accordion_btn_title">Гарнитуры</div>
								<div class="accordion_btn active" style="padding-left:175px;">Не выбрано</div>
								<div class="accordion_content new_accordion_content clearfix">
									<div class="new_side_photo_container"></div>
									<div class="new_tab_labels_container">
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->garns->garn[0]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="<? echo $base2->modal[74]->pics->pic[0]; ?>">
												<div class="zoom_in_hover accessoriesPopup" modal-id="74">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>	
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Sennheiser PC 3 CHAT</div>
												</div>
												<div class="radio_price">(+ <? echo $base->garns->garn[0]->price; ?> грн)</div>
											</div>
										</label>
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->garns->garn[1]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="<? echo $base2->modal[75]->pics->pic[0]; ?>">
												<div class="zoom_in_hover accessoriesPopup" modal-id="75">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>	
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Gemix W-360 Black-Blue</div>
												</div>
												<div class="radio_price">(+ <? echo $base->garns->garn[1]->price; ?> грн)</div>
											</div>
										</label>
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->garns->garn[2]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="<? echo $base2->modal[76]->pics->pic[0]; ?>">
												<div class="zoom_in_hover accessoriesPopup" modal-id="76">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>	
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">SteelSeries Siberia RAW Prism (61410)</div>
												</div>
												<div class="radio_price">(+ <? echo $base->garns->garn[2]->price; ?> грн)</div>
											</div>
										</label>
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->garns->garn[3]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="<? echo $base2->modal[77]->pics->pic[0]; ?>">
												<div class="zoom_in_hover accessoriesPopup" modal-id="77">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>	
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Sven AP-U988MV Black-Red</div>
												</div>
												<div class="radio_price">(+ <? echo $base->garns->garn[3]->price; ?> грн)</div>
											</div>
										</label>
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->garns->garn[4]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="<? echo $base2->modal[78]->pics->pic[0]; ?>">
												<div class="zoom_in_hover accessoriesPopup" modal-id="78">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>	
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Kingston HyperX Cloud Stinger</div>
												</div>
												<div class="radio_price">(+ <? echo $base->garns->garn[4]->price; ?> грн)</div>
											</div>
										</label>
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->garns->garn[5]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="<? echo $base2->modal[79]->pics->pic[0]; ?>">
												<div class="zoom_in_hover accessoriesPopup" modal-id="79">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>	
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">A4Tech Bloody G501 Black/Red</div>
												</div>
												<div class="radio_price">(+ <? echo $base->garns->garn[5]->price; ?> грн)</div>
											</div>
										</label>
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->garns->garn[6]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="<? echo $base2->modal[80]->pics->pic[0]; ?>">
												<div class="zoom_in_hover accessoriesPopup" modal-id="80">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>	
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">ASUS Strix 2.0 Black</div>
												</div>
												<div class="radio_price">(+ <? echo $base->garns->garn[6]->price; ?> грн)</div>
											</div>
										</label>
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->garns->garn[7]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="<? echo $base2->modal[81]->pics->pic[0]; ?>">
												<div class="zoom_in_hover accessoriesPopup" modal-id="81">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>	
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Kingston HyperX Cloud II</div>
												</div>
												<div class="radio_price">(+ <? echo $base->garns->garn[7]->price; ?> грн)</div>
											</div>
										</label>
									</div>	
								</div>
							</div>
							<div class="accordion_block webcams_block">
								<div class="accordion_btn_title">Веб-камеры</div>
								<div class="accordion_btn active" style="padding-left:205px;">Не выбрано</div>
								<div class="accordion_content new_accordion_content clearfix">
									<div class="new_side_photo_container"></div>
									<div class="new_tab_labels_container">
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->webcams->webcam[0]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="<? echo $base2->modal[66]->pics->pic[0]; ?>">
												<div class="zoom_in_hover accessoriesPopup" modal-id="66">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>	
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Logitech HD Webcam C270</div>
												</div>
												<div class="radio_price">(+ <? echo $base->webcams->webcam[0]->price; ?> грн)</div>
											</div>
										</label>
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->webcams->webcam[1]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="<? echo $base2->modal[67]->pics->pic[0]; ?>">
												<div class="zoom_in_hover accessoriesPopup" modal-id="67">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>	
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Logitech C170</div>
												</div>
												<div class="radio_price">(+ <? echo $base->webcams->webcam[1]->price; ?> грн)</div>
											</div>
										</label>
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->webcams->webcam[2]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="<? echo $base2->modal[68]->pics->pic[0]; ?>">
												<div class="zoom_in_hover accessoriesPopup" modal-id="68">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>	
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Acme CA04 (4770070872420)</div>
												</div>
												<div class="radio_price">(+ <? echo $base->webcams->webcam[2]->price; ?> грн)</div>
											</div>
										</label>
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->webcams->webcam[3]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="<? echo $base2->modal[69]->pics->pic[0]; ?>">
												<div class="zoom_in_hover accessoriesPopup" modal-id="69">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>	
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Defender C-110</div>
												</div>
												<div class="radio_price">(+ <? echo $base->webcams->webcam[3]->price; ?> грн)</div>
											</div>
										</label>
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->webcams->webcam[4]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="<? echo $base2->modal[70]->pics->pic[0]; ?>">
												<div class="zoom_in_hover accessoriesPopup" modal-id="70">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>	
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">REAL-EL FC-250</div>
												</div>
												<div class="radio_price">(+ <? echo $base->webcams->webcam[4]->price; ?> грн)</div>
											</div>
										</label>
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->webcams->webcam[5]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="<? echo $base2->modal[71]->pics->pic[0]; ?>">
												<div class="zoom_in_hover accessoriesPopup" modal-id="71">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>	
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Genius FaceCam 2020</div>
												</div>
												<div class="radio_price">(+ <? echo $base->webcams->webcam[5]->price; ?> грн)</div>
											</div>
										</label>
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->webcams->webcam[6]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="<? echo $base2->modal[72]->pics->pic[0]; ?>">
												<div class="zoom_in_hover accessoriesPopup" modal-id="72">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>	
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Trust SpotLight Webcam Pro</div>
												</div>
												<div class="radio_price">(+ <? echo $base->webcams->webcam[6]->price; ?> грн)</div>
											</div>
										</label>
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->webcams->webcam[7]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="<? echo $base2->modal[73]->pics->pic[0]; ?>">
												<div class="zoom_in_hover accessoriesPopup" modal-id="73">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>	
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Genius FaceCam 1000</div>
												</div>
												<div class="radio_price">(+ <? echo $base->webcams->webcam[7]->price; ?> грн)</div>
											</div>
										</label>
									</div>	
								</div>
							</div>
							<div class="accordion_block speakers_block">
								<div class="accordion_btn_title">Колонки</div>
								<div class="accordion_btn active" style="padding-left:205px;">Не выбрано</div>
								<div class="accordion_content new_accordion_content clearfix">
									<div class="new_side_photo_container"></div>
									<div class="new_tab_labels_container">
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->speakers->speaker[0]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="<? echo $base2->modal[82]->pics->pic[0]; ?>">
												<div class="zoom_in_hover accessoriesPopup" modal-id="82">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>	
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">SVEN MS-302 Black</div>
												</div>
												<div class="radio_price">(+ <? echo $base->speakers->speaker[0]->price; ?> грн)</div>
											</div>
										</label>
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->speakers->speaker[1]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="<? echo $base2->modal[83]->pics->pic[0]; ?>">
												<div class="zoom_in_hover accessoriesPopup" modal-id="83">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>	
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Logitech S120</div>
												</div>
												<div class="radio_price">(+ <? echo $base->speakers->speaker[1]->price; ?> грн)</div>
											</div>
										</label>
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->speakers->speaker[2]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="<? echo $base2->modal[84]->pics->pic[0]; ?>">
												<div class="zoom_in_hover accessoriesPopup" modal-id="84">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>	
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Logitech Z213</div>
												</div>
												<div class="radio_price">(+ <? echo $base->speakers->speaker[2]->price; ?> грн)</div>
											</div>
										</label>
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->speakers->speaker[3]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="<? echo $base2->modal[85]->pics->pic[0]; ?>">
												<div class="zoom_in_hover accessoriesPopup" modal-id="85">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>	
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Genius SP-HF160 Black</div>
												</div>
												<div class="radio_price">(+ <? echo $base->speakers->speaker[3]->price; ?> грн)</div>
											</div>
										</label>
									</div>	
								</div>
							</div>
							<div class="accordion_block wifi_block">
								<div class="accordion_btn_title">Wi-fi адаптеры</div>
								<div class="accordion_btn active" style="padding-left:205px;">Не выбрано</div>
								<div class="accordion_content new_accordion_content clearfix">
									<div class="new_side_photo_container"></div>
									<div class="new_tab_labels_container">
										<label class="radio_label new_access_label noCheck"><input type="checkbox" data-price="<? echo $base->wifis->wifi[0]->price; ?>" id="wifiBottom">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="<? echo $base2->modal[52]->pics->pic[0]; ?>">
												<div class="zoom_in_hover accessoriesPopup" modal-id="52">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>	
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Установить мощный Wi-Fi адаптер 802.11AC Dual Wireless (был 450 грн)</div>
												</div>
												<div class="radio_price">(+ <? echo $base->wifis->wifi[0]->price; ?> грн)</div>
											</div>
										</label>
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->wifis->wifi[1]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="<? echo $base2->modal[53]->pics->pic[0]; ?>">
												<div class="zoom_in_hover accessoriesPopup" modal-id="53">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>	
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">PCI плата WI-FI с одной антеной</div>
												</div>
												<div class="radio_price">(+ <? echo $base->wifis->wifi[1]->price; ?> грн)</div>
											</div>
										</label>
										<label class="radio_label new_access_label"><input type="checkbox" data-price="<? echo $base->wifis->wifi[3]->price; ?>">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="<? echo $base2->modal[55]->pics->pic[0]; ?>">
												<div class="zoom_in_hover accessoriesPopup" modal-id="55">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>	
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">PCI плата WI-FI с двумя антенами</div>
												</div>
												<div class="radio_price">(+ <? echo $base->wifis->wifi[3]->price; ?> грн)</div>
											</div>
										</label>
									</div>	
								</div>
							</div>
							<div class="accordion_block software_block">
								<div class="accordion_btn_title">ПО</div>
								<div class="accordion_btn active" style="padding-left:110px;">Не выбрано</div>
								<div class="accordion_content new_accordion_content clearfix">
									<div class="new_side_photo_container"></div>
									<div class="new_tab_labels_container">
										<label class="radio_label new_access_label noCheck"><input type="checkbox" data-price="<? echo $base->dops->dop[0]->price; ?>" id="w10bottom">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="http://xn--80afeb8cd.com/newimg/windows10new.png">
												<!-- <div class="zoom_in_hover accessoriesPopup" modal-id="0">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div>	 -->
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Установить Microsoft Windows 10 Pro (64-bit) (была 600 грн)</div>
												</div>
												<div class="radio_price">(+ <? echo $base->dops->dop[0]->price; ?> грн)</div>
											</div>
										</label>
										<label class="radio_label new_access_label noCheck"><input type="checkbox" data-price="<? echo $base->dops->dop[2]->price; ?>" id="micOffBottom">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="http://xn--80afeb8cd.com/newimg/Office-Home-and-Business.png">
												<!-- <div class="zoom_in_hover accessoriesPopup" modal-id="0">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div> -->	
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Установить Microsoft Office Professional Plus (была 420 грн)</div>
												</div>
												<div class="radio_price">(+ <? echo $base->dops->dop[2]->price; ?> грн)</div>
											</div>
										</label>
										<label class="radio_label new_access_label noCheck"><input type="checkbox" data-price="<? echo $base->dops->dop[4]->price; ?>" id="micOffBottom">
											<div class="tabs_checkbox">
												<div class="tabs_checkbox_inner"></div>
											</div>
											<div class="radio_img">
												<img src="http://xn--80afeb8cd.com/newimg/antivirus.png">
												<!-- <div class="zoom_in_hover accessoriesPopup" modal-id="0">
													<img src="img/zoom-in.svg">
													<span>zoom</span>
												</div> -->	
											</div>
											<div class="radio_description">
												<div class="radio_description_flex_container">
												<div class="radio_description_title">Установить Антивирус Total Security 360 <br> Защити свои инвестиции!</div>
												</div>
												<div class="radio_price">(+ <? echo $base->dops->dop[4]->price; ?> грн)</div>
											</div>
										</label>
									</div>	
								</div>
							</div>
						</div>
						<div class="tab_content_inner_bottom_buttons">
							<div data="tab_conf" class="tcibb_prev" id="backToConf">< Назад</div>
							<div data="tab_fps" class="tcibb_next" id="toFps">Далее ></div>
						</div>
					</div>
					<div class="tab_content_inner" id="tab_fps_content">
						<div class="tab_content_description">
							Мы отслеживаем новые выпуски самых интересных игр и тестируем FPS
наших компьютеров на различных настройках качества
в различных разрешениях экрана
						</div>
						<div class="tabs_fps_container">
							<div class="tabs_fps_inner_block clearfix">
								<div class="tabs_fps_image">
									<img src="img/asscreed.jpg">
								</div>
								<div class="tabs_fps_info">
									<div class="tabs_fps_game">Assassin’s Creed Origins</div>
									<div class="tabs_fps_settings">Full HD 1920x1080</div>
									<div class="tabs_fps_scale_block">
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_title">Ультра</div>
											<div class="fps_scale">
												<div class="fps_scale_filler filler_green" style="background-color:<? echo $base->computers->comp[2]->games->game[18]->color[0]; ?>; width:<? echo $base->computers->comp[2]->games->game[18]->percent[0]; ?>%;"></div>
											</div>
										</div>
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_number fps_number_green"><? echo $base->computers->comp[2]->games->game[18]->fps[0]; ?></div>
											<div class="fps_fps">FPS</div>
										</div>
									</div>
									<div class="tabs_fps_scale_block">
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_title">4K 3840X2160</div>
											<div class="fps_scale">
												<div class="fps_scale_filler" style="background-color:<? echo $base->computers->comp[2]->games->game[18]->color[1]; ?>; width:<? echo $base->computers->comp[2]->games->game[18]->percent[1]; ?>%;"></div>
											</div>
										</div>
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_number"><? echo $base->computers->comp[2]->games->game[18]->fps[1]; ?></div>
											<div class="fps_fps">FPS</div>
										</div>
									</div>
								</div>
							</div>
							<div class="tabs_fps_inner_block clearfix">
								<div class="tabs_fps_image">
									<img src="img/callofduty.jpg">
								</div>
								<div class="tabs_fps_info">
									<div class="tabs_fps_game">Call of Duty: WWII</div>
									<div class="tabs_fps_settings">Full HD 1920x1080</div>
									<div class="tabs_fps_scale_block">
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_title">Ультра</div>
											<div class="fps_scale">
												<div class="fps_scale_filler filler_green" style="background-color:<? echo $base->computers->comp[2]->games->game[19]->color[0]; ?>; width:<? echo $base->computers->comp[2]->games->game[19]->percent[0]; ?>%;"></div>
											</div>
										</div>
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_number fps_number_green"><? echo $base->computers->comp[2]->games->game[19]->fps[0]; ?></div>
											<div class="fps_fps">FPS</div>
										</div>
									</div>
									<div class="tabs_fps_scale_block">
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_title">4K 3840X2160</div>
											<div class="fps_scale">
												<div class="fps_scale_filler" style="background-color:<? echo $base->computers->comp[2]->games->game[19]->color[1]; ?>; width:<? echo $base->computers->comp[2]->games->game[19]->percent[1]; ?>%;"></div>
											</div>
										</div>
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_number"><? echo $base->computers->comp[2]->games->game[19]->fps[1]; ?></div>
											<div class="fps_fps">FPS</div>
										</div>
									</div>
								</div>
							</div>
							<div class="tabs_fps_inner_block clearfix">
								<div class="tabs_fps_image">
									<img src="img/ark.jpg">
								</div>
								<div class="tabs_fps_info">
									<div class="tabs_fps_game">ARK: Survival Evolved</div>
									<div class="tabs_fps_settings">Эпические</div>
									<div class="tabs_fps_scale_block">
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_title">Full HD 1920x1080</div>
											<div class="fps_scale">
												<div class="fps_scale_filler filler_green" style="background-color:<? echo $base->computers->comp[2]->games->game[6]->color[0]; ?>; width:<? echo $base->computers->comp[2]->games->game[6]->percent[0]; ?>%;"></div>
											</div>
										</div>
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_number fps_number_green"><? echo $base->computers->comp[2]->games->game[6]->fps[0]; ?></div>
											<div class="fps_fps">FPS</div>
										</div>
									</div>
									<div class="tabs_fps_scale_block">
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_title">4K 3840X2160</div>
											<div class="fps_scale">
												<div class="fps_scale_filler" style="background-color:<? echo $base->computers->comp[2]->games->game[6]->color[1]; ?>; width:<? echo $base->computers->comp[2]->games->game[6]->percent[1]; ?>%;"></div>
											</div>
										</div>
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_number"><? echo $base->computers->comp[2]->games->game[6]->fps[1]; ?></div>
											<div class="fps_fps">FPS</div>
										</div>
									</div>
								</div>
							</div>
							<div class="tabs_fps_inner_block clearfix">
								<div class="tabs_fps_image">
									<img src="img/pubg.jpg">
								</div>
								<div class="tabs_fps_info">
									<div class="tabs_fps_game">PlayerUnknown's Battlegrounds</div>
									<div class="tabs_fps_settings">Ультра настройки</div>
									<div class="tabs_fps_scale_block">
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_title">Full HD 1920x1080</div>
											<div class="fps_scale">
												<div class="fps_scale_filler filler_green" style="background-color:<? echo $base->computers->comp[2]->games->game[7]->color[0]; ?>; width:<? echo $base->computers->comp[2]->games->game[7]->percent[0]; ?>%;"></div>
											</div>
										</div>
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_number fps_number_green"><? echo $base->computers->comp[2]->games->game[7]->fps[0]; ?></div>
											<div class="fps_fps">FPS</div>
										</div>
									</div>
									<div class="tabs_fps_scale_block">
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_title">4K 3840X2160</div>
											<div class="fps_scale">
												<div class="fps_scale_filler" style="background-color:<? echo $base->computers->comp[2]->games->game[7]->color[1]; ?>; width:<? echo $base->computers->comp[2]->games->game[7]->percent[1]; ?>%;"></div>
											</div>
										</div>
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_number"><? echo $base->computers->comp[2]->games->game[7]->fps[1]; ?></div>
											<div class="fps_fps">FPS</div>
										</div>
									</div>
								</div>
							</div>
							<div class="tabs_fps_inner_block clearfix">
								<div class="tabs_fps_image">
									<img src="img/wolfenstein.jpg">
								</div>
								<div class="tabs_fps_info">
									<div class="tabs_fps_game">Wolfenstein II: The New Colossus</div>
									<div class="tabs_fps_settings">Ультра настройки</div>
									<div class="tabs_fps_scale_block">
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_title">Full HD 1920x1080</div>
											<div class="fps_scale">
												<div class="fps_scale_filler filler_green" style="background-color:<? echo $base->computers->comp[2]->games->game[11]->color[0]; ?>; width:<? echo $base->computers->comp[2]->games->game[11]->percent[0]; ?>%;"></div>
											</div>
										</div>
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_number fps_number_green"><? echo $base->computers->comp[2]->games->game[11]->fps[0]; ?></div>
											<div class="fps_fps">FPS</div>
										</div>
									</div>
									<div class="tabs_fps_scale_block">
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_title">4K 3840X2160</div>
											<div class="fps_scale">
												<div class="fps_scale_filler" style="background-color:<? echo $base->computers->comp[2]->games->game[11]->color[1]; ?>; width:<? echo $base->computers->comp[2]->games->game[11]->percent[1]; ?>%;"></div>
											</div>
										</div>
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_number"><? echo $base->computers->comp[2]->games->game[11]->fps[1]; ?></div>
											<div class="fps_fps">FPS</div>
										</div>
									</div>
								</div>
							</div>
							<div class="tabs_fps_inner_block clearfix">
								<div class="tabs_fps_image">
									<img src="img/minecraft.jpg">
								</div>
								<div class="tabs_fps_info">
									<div class="tabs_fps_game">Minecraft</div>
									<div class="tabs_fps_settings">Ультра настройки</div>
									<div class="tabs_fps_scale_block">
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_title">Full HD 1920x1080</div>
											<div class="fps_scale">
												<div class="fps_scale_filler filler_green" style="background-color:<? echo $base->computers->comp[2]->games->game[8]->color[0]; ?>; width:<? echo $base->computers->comp[2]->games->game[8]->percent[0]; ?>%;"></div>
											</div>
										</div>
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_number fps_number_green"><? echo $base->computers->comp[2]->games->game[8]->fps[0]; ?></div>
											<div class="fps_fps">FPS</div>
										</div>
									</div>
									<div class="tabs_fps_scale_block">
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_title">4K 3840X2160</div>
											<div class="fps_scale">
												<div class="fps_scale_filler" style="background-color:<? echo $base->computers->comp[2]->games->game[8]->color[1]; ?>; width:<? echo $base->computers->comp[2]->games->game[8]->percent[1]; ?>%;"></div>
											</div>
										</div>
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_number"><? echo $base->computers->comp[2]->games->game[8]->fps[1]; ?></div>
											<div class="fps_fps">FPS</div>
										</div>
									</div>
								</div>
							</div>
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
												<div class="fps_scale_filler filler_green" style="background-color:<? echo $base->computers->comp[2]->games->game[0]->color[0]; ?>; width:<? echo $base->computers->comp[2]->games->game[0]->percent[0]; ?>%;"></div>
											</div>
										</div>
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_number fps_number_green"><? echo $base->computers->comp[2]->games->game[0]->fps[0]; ?></div>
											<div class="fps_fps">FPS</div>
										</div>
									</div>
									<div class="tabs_fps_scale_block">
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_title">2K 2560X1440</div>
											<div class="fps_scale">
												<div class="fps_scale_filler" style="background-color:<? echo $base->computers->comp[2]->games->game[0]->color[1]; ?>; width:<? echo $base->computers->comp[2]->games->game[0]->percent[1]; ?>%;"></div>
											</div>
										</div>
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_number"><? echo $base->computers->comp[2]->games->game[0]->fps[1]; ?></div>
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
												<div class="fps_scale_filler filler_green" style="background-color:<? echo $base->computers->comp[2]->games->game[1]->color[0]; ?>; width:<? echo $base->computers->comp[2]->games->game[1]->percent[0]; ?>%;"></div>
											</div>
										</div>
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_number fps_number_green"><? echo $base->computers->comp[2]->games->game[1]->fps[0]; ?></div>
											<div class="fps_fps">FPS</div>
										</div>
									</div>
									<div class="tabs_fps_scale_block">
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_title">2K 2560X1440</div>
											<div class="fps_scale">
												<div class="fps_scale_filler" style="background-color:<? echo $base->computers->comp[2]->games->game[1]->color[1]; ?>; width:<? echo $base->computers->comp[2]->games->game[1]->percent[1]; ?>%;"></div>
											</div>
										</div>
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_number"><? echo $base->computers->comp[2]->games->game[1]->fps[1]; ?></div>
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
												<div class="fps_scale_filler filler_green" style="background-color:<? echo $base->computers->comp[2]->games->game[2]->color[0]; ?>; width:<? echo $base->computers->comp[2]->games->game[2]->percent[0]; ?>%;"></div>
											</div>
										</div>
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_number fps_number_green"><? echo $base->computers->comp[2]->games->game[2]->fps[0]; ?></div>
											<div class="fps_fps">FPS</div>
										</div>
									</div>
									<div class="tabs_fps_scale_block">
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_title">2K 2560X1440</div>
											<div class="fps_scale">
												<div class="fps_scale_filler" style="background-color:<? echo $base->computers->comp[2]->games->game[2]->color[1]; ?>; width:<? echo $base->computers->comp[2]->games->game[2]->percent[1]; ?>%;"></div>
											</div>
										</div>
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_number"><? echo $base->computers->comp[2]->games->game[2]->fps[1]; ?></div>
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
												<div class="fps_scale_filler filler_green" style="background-color:<? echo $base->computers->comp[2]->games->game[3]->color[0]; ?>; width:<? echo $base->computers->comp[2]->games->game[3]->percent[0]; ?>%;"></div>
											</div>
										</div>
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_number fps_number_green"><? echo $base->computers->comp[2]->games->game[3]->fps[0]; ?></div>
											<div class="fps_fps">FPS</div>
										</div>
									</div>
									<div class="tabs_fps_scale_block">
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_title">2K 2560X1440</div>
											<div class="fps_scale">
												<div class="fps_scale_filler" style="background-color:<? echo $base->computers->comp[2]->games->game[3]->color[1]; ?>; width:<? echo $base->computers->comp[2]->games->game[3]->percent[1]; ?>%;"></div>
											</div>
										</div>
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_number"><? echo $base->computers->comp[2]->games->game[3]->fps[1]; ?></div>
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
												<div class="fps_scale_filler filler_green" style="background-color:<? echo $base->computers->comp[2]->games->game[4]->color[0]; ?>; width:<? echo $base->computers->comp[2]->games->game[4]->percent[0]; ?>%;"></div>
											</div>
										</div>
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_number fps_number_green"><? echo $base->computers->comp[2]->games->game[4]->fps[0]; ?></div>
											<div class="fps_fps">FPS</div>
										</div>
									</div>
									<div class="tabs_fps_scale_block">
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_title">2K 2560X1440</div>
											<div class="fps_scale">
												<div class="fps_scale_filler" style="background-color:<? echo $base->computers->comp[2]->games->game[4]->color[1]; ?>; width:<? echo $base->computers->comp[2]->games->game[4]->percent[1]; ?>%;"></div>
											</div>
										</div>
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_number"><? echo $base->computers->comp[2]->games->game[4]->fps[1]; ?></div>
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
												<div class="fps_scale_filler filler_green" style="background-color:<? echo $base->computers->comp[2]->games->game[5]->color[0]; ?>; width:<? echo $base->computers->comp[2]->games->game[5]->percent[0]; ?>%;"></div>
											</div>
										</div>
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_number fps_number_green"><? echo $base->computers->comp[2]->games->game[5]->fps[0]; ?></div>
											<div class="fps_fps">FPS</div>
										</div>
									</div>
									<div class="tabs_fps_scale_block">
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_title">2K 2560X1440</div>
											<div class="fps_scale">
												<div class="fps_scale_filler" style="background-color:<? echo $base->computers->comp[2]->games->game[5]->color[1]; ?>; width:<? echo $base->computers->comp[2]->games->game[5]->percent[1]; ?>%;"></div>
											</div>
										</div>
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_number"><? echo $base->computers->comp[2]->games->game[5]->fps[1]; ?></div>
											<div class="fps_fps">FPS</div>
										</div>
									</div>
								</div>
							</div>
							<div class="tabs_fps_inner_block clearfix">
								<div class="tabs_fps_image">
									<img src="img/lol.jpg">
								</div>
								<div class="tabs_fps_info">
									<div class="tabs_fps_game">League of Legends</div>
									<div class="tabs_fps_settings">Ультра настройки</div>
									<div class="tabs_fps_scale_block">
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_title">Full HD 1920x1080</div>
											<div class="fps_scale">
												<div class="fps_scale_filler filler_green" style="background-color:<? echo $base->computers->comp[2]->games->game[9]->color[0]; ?>; width:<? echo $base->computers->comp[2]->games->game[9]->percent[0]; ?>%;"></div>
											</div>
										</div>
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_number fps_number_green"><? echo $base->computers->comp[2]->games->game[9]->fps[0]; ?></div>
											<div class="fps_fps">FPS</div>
										</div>
									</div>
									<div class="tabs_fps_scale_block">
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_title">4K 3840X2160</div>
											<div class="fps_scale">
												<div class="fps_scale_filler" style="background-color:<? echo $base->computers->comp[2]->games->game[9]->color[1]; ?>; width:<? echo $base->computers->comp[2]->games->game[9]->percent[1]; ?>%;"></div>
											</div>
										</div>
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_number"><? echo $base->computers->comp[2]->games->game[9]->fps[1]; ?></div>
											<div class="fps_fps">FPS</div>
										</div>
									</div>
								</div>
							</div>
							<div class="tabs_fps_inner_block clearfix">
								<div class="tabs_fps_image">
									<img src="img/fifa.jpg">
								</div>
								<div class="tabs_fps_info">
									<div class="tabs_fps_game">FIFA 18</div>
									<div class="tabs_fps_settings">Ультра настройки</div>
									<div class="tabs_fps_scale_block">
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_title">Full HD 1920x1080</div>
											<div class="fps_scale">
												<div class="fps_scale_filler filler_green" style="background-color:<? echo $base->computers->comp[2]->games->game[10]->color[0]; ?>; width:<? echo $base->computers->comp[2]->games->game[10]->percent[0]; ?>%;"></div>
											</div>
										</div>
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_number fps_number_green"><? echo $base->computers->comp[2]->games->game[10]->fps[0]; ?></div>
											<div class="fps_fps">FPS</div>
										</div>
									</div>
									<div class="tabs_fps_scale_block">
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_title">4K 3840X2160</div>
											<div class="fps_scale">
												<div class="fps_scale_filler" style="background-color:<? echo $base->computers->comp[2]->games->game[10]->color[1]; ?>; width:<? echo $base->computers->comp[2]->games->game[10]->percent[1]; ?>%;"></div>
											</div>
										</div>
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_number"><? echo $base->computers->comp[2]->games->game[10]->fps[1]; ?></div>
											<div class="fps_fps">FPS</div>
										</div>
									</div>
								</div>
							</div>
							<div class="tabs_fps_inner_block clearfix">
								<div class="tabs_fps_image">
									<img src="img/warface.jpg">
								</div>
								<div class="tabs_fps_info">
									<div class="tabs_fps_game">Warface</div>
									<div class="tabs_fps_settings">Ультра настройки</div>
									<div class="tabs_fps_scale_block">
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_title">Full HD 1920x1080</div>
											<div class="fps_scale">
												<div class="fps_scale_filler filler_green" style="background-color:<? echo $base->computers->comp[2]->games->game[12]->color[0]; ?>; width:<? echo $base->computers->comp[2]->games->game[12]->percent[0]; ?>%;"></div>
											</div>
										</div>
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_number fps_number_green"><? echo $base->computers->comp[2]->games->game[12]->fps[0]; ?></div>
											<div class="fps_fps">FPS</div>
										</div>
									</div>
									<div class="tabs_fps_scale_block">
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_title">4K 3840X2160</div>
											<div class="fps_scale">
												<div class="fps_scale_filler" style="background-color:<? echo $base->computers->comp[2]->games->game[12]->color[1]; ?>; width:<? echo $base->computers->comp[2]->games->game[12]->percent[1]; ?>%;"></div>
											</div>
										</div>
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_number"><? echo $base->computers->comp[2]->games->game[12]->fps[1]; ?></div>
											<div class="fps_fps">FPS</div>
										</div>
									</div>
								</div>
							</div>
							<div class="tabs_fps_inner_block clearfix">
								<div class="tabs_fps_image">
									<img src="img/armwarfare.jpg">
								</div>
								<div class="tabs_fps_info">
									<div class="tabs_fps_game">Armored Warfare</div>
									<div class="tabs_fps_settings">Ультра настройки</div>
									<div class="tabs_fps_scale_block">
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_title">Full HD 1920x1080</div>
											<div class="fps_scale">
												<div class="fps_scale_filler filler_green" style="background-color:<? echo $base->computers->comp[2]->games->game[13]->color[0]; ?>; width:<? echo $base->computers->comp[2]->games->game[13]->percent[0]; ?>%;"></div>
											</div>
										</div>
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_number fps_number_green"><? echo $base->computers->comp[2]->games->game[13]->fps[0]; ?></div>
											<div class="fps_fps">FPS</div>
										</div>
									</div>
									<div class="tabs_fps_scale_block">
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_title">4K 3840X2160</div>
											<div class="fps_scale">
												<div class="fps_scale_filler" style="background-color:<? echo $base->computers->comp[2]->games->game[13]->color[1]; ?>; width:<? echo $base->computers->comp[2]->games->game[13]->percent[1]; ?>%;"></div>
											</div>
										</div>
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_number"><? echo $base->computers->comp[2]->games->game[13]->fps[1]; ?></div>
											<div class="fps_fps">FPS</div>
										</div>
									</div>
								</div>
							</div>
							<div class="tabs_fps_inner_block clearfix">
								<div class="tabs_fps_image">
									<img src="img/rust.jpg">
								</div>
								<div class="tabs_fps_info">
									<div class="tabs_fps_game">Rust</div>
									<div class="tabs_fps_settings">Ультра настройки</div>
									<div class="tabs_fps_scale_block">
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_title">Full HD 1920x1080</div>
											<div class="fps_scale">
												<div class="fps_scale_filler filler_green" style="background-color:<? echo $base->computers->comp[2]->games->game[14]->color[0]; ?>; width:<? echo $base->computers->comp[2]->games->game[14]->percent[0]; ?>%;"></div>
											</div>
										</div>
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_number fps_number_green"><? echo $base->computers->comp[2]->games->game[14]->fps[0]; ?></div>
											<div class="fps_fps">FPS</div>
										</div>
									</div>
									<div class="tabs_fps_scale_block">
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_title">4K 3840X2160</div>
											<div class="fps_scale">
												<div class="fps_scale_filler" style="background-color:<? echo $base->computers->comp[2]->games->game[14]->color[1]; ?>; width:<? echo $base->computers->comp[2]->games->game[14]->percent[1]; ?>%;"></div>
											</div>
										</div>
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_number"><? echo $base->computers->comp[2]->games->game[14]->fps[1]; ?></div>
											<div class="fps_fps">FPS</div>
										</div>
									</div>
								</div>
							</div>
							<div class="tabs_fps_inner_block clearfix">
								<div class="tabs_fps_image">
									<img src="img/dota2.jpg">
								</div>
								<div class="tabs_fps_info">
									<div class="tabs_fps_game">Dota 2</div>
									<div class="tabs_fps_settings">Ультра настройки</div>
									<div class="tabs_fps_scale_block">
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_title">Full HD 1920x1080</div>
											<div class="fps_scale">
												<div class="fps_scale_filler filler_green" style="background-color:<? echo $base->computers->comp[2]->games->game[15]->color[0]; ?>; width:<? echo $base->computers->comp[2]->games->game[15]->percent[0]; ?>%;"></div>
											</div>
										</div>
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_number fps_number_green"><? echo $base->computers->comp[2]->games->game[15]->fps[0]; ?></div>
											<div class="fps_fps">FPS</div>
										</div>
									</div>
									<div class="tabs_fps_scale_block">
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_title">4K 3840X2160</div>
											<div class="fps_scale">
												<div class="fps_scale_filler" style="background-color:<? echo $base->computers->comp[2]->games->game[15]->color[1]; ?>; width:<? echo $base->computers->comp[2]->games->game[15]->percent[1]; ?>%;"></div>
											</div>
										</div>
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_number"><? echo $base->computers->comp[2]->games->game[15]->fps[1]; ?></div>
											<div class="fps_fps">FPS</div>
										</div>
									</div>
								</div>
							</div>
							<div class="tabs_fps_inner_block clearfix">
								<div class="tabs_fps_image">
									<img src="img/CS.GO.jpg">
								</div>
								<div class="tabs_fps_info">
									<div class="tabs_fps_game">Counter-Strike: Global Offensive</div>
									<div class="tabs_fps_settings">Ультра настройки</div>
									<div class="tabs_fps_scale_block">
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_title">Full HD 1920x1080</div>
											<div class="fps_scale">
												<div class="fps_scale_filler filler_green" style="background-color:<? echo $base->computers->comp[2]->games->game[16]->color[0]; ?>; width:<? echo $base->computers->comp[2]->games->game[16]->percent[0]; ?>%;"></div>
											</div>
										</div>
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_number fps_number_green"><? echo $base->computers->comp[2]->games->game[16]->fps[0]; ?></div>
											<div class="fps_fps">FPS</div>
										</div>
									</div>
									<div class="tabs_fps_scale_block">
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_title">4K 3840X2160</div>
											<div class="fps_scale">
												<div class="fps_scale_filler" style="background-color:<? echo $base->computers->comp[2]->games->game[16]->color[1]; ?>; width:<? echo $base->computers->comp[2]->games->game[16]->percent[1]; ?>%;"></div>
											</div>
										</div>
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_number"><? echo $base->computers->comp[2]->games->game[16]->fps[1]; ?></div>
											<div class="fps_fps">FPS</div>
										</div>
									</div>
								</div>
							</div>
							<div class="tabs_fps_inner_block clearfix">
								<div class="tabs_fps_image">
									<img src="img/wot.jpg">
								</div>
								<div class="tabs_fps_info">
									<div class="tabs_fps_game">World of Tanks</div>
									<div class="tabs_fps_settings">Ультра настройки</div>
									<div class="tabs_fps_scale_block">
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_title">Full HD 1920x1080</div>
											<div class="fps_scale">
												<div class="fps_scale_filler filler_green" style="background-color:<? echo $base->computers->comp[2]->games->game[17]->color[0]; ?>; width:<? echo $base->computers->comp[2]->games->game[17]->percent[0]; ?>%;"></div>
											</div>
										</div>
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_number fps_number_green"><? echo $base->computers->comp[2]->games->game[17]->fps[0]; ?></div>
											<div class="fps_fps">FPS</div>
										</div>
									</div>
									<div class="tabs_fps_scale_block">
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_title">4K 3840X2160</div>
											<div class="fps_scale">
												<div class="fps_scale_filler" style="background-color:<? echo $base->computers->comp[2]->games->game[17]->color[1]; ?>; width:<? echo $base->computers->comp[2]->games->game[17]->percent[1]; ?>%;"></div>
											</div>
										</div>
										<div class="tabs_fps_scale_block_inner">
											<div class="fps_number"><? echo $base->computers->comp[2]->games->game[17]->fps[1]; ?></div>
											<div class="fps_fps">FPS</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab_content_inner_bottom_buttons">
							<div data="tab_accesories" class="tcibb_prev" id="backToAccess">< Назад</div>
							<div data="tab_video" class="tcibb_next" id="toVideo">Далее ></div>
						</div>
					</div>
					<div class="tab_content_inner" id="tab_video_content">
						<div class="tab_content_description">
							Видео распаковки компьютеров от покупателей
						</div>
						<div class="tabs_video_container">
							<div class="tab_video">
								<iframe width="100%" height="100%" src="https://www.youtube.com/embed/E2Z0zaVOick" frameborder="0" allowfullscreen></iframe>
							</div>
							<div class="tab_video">
								<iframe width="100%" height="100%" src="https://www.youtube.com/embed/ewG98Gw4Res" frameborder="0" allowfullscreen></iframe>
							</div>
							<div class="tab_video">
								<iframe width="100%" height="100%" src="https://www.youtube.com/embed/gltupxf5jK4?rel=0" frameborder="0" allowfullscreen></iframe>
							</div>
						</div>
						<div class="tab_content_inner_bottom_buttons">
							<div data="tab_fps" class="tcibb_prev" id="backToFps">< Назад</div>
							<div data="tab_comments" class="tcibb_next" id="toComments">Далее ></div>
						</div>
					</div>
					<div class="tab_content_inner" id="tab_comments_content">
						<div class="tab_comments_header">ЗАДАЙТЕ СВОЙ ВОПРОС<br>ИЛИ ОСТАВЬТЕ ОТЗЫВ</div>
						<div id="hypercomments_widget"></div>
<script type="text/javascript">
_hcwp = window._hcwp || [];
_hcwp.push({widget:"Stream", widget_id: 81051});
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
<script type="text/javascript">
_hcwp = window._hcwp || [];
_hcwp.push({widget:"Bloggerstream", widget_id: 81051, selector: '.comments_num_container', label: '{%COUNT%}' });
(function() {
if("HC_LOAD_INIT" in window)return;
HC_LOAD_INIT = true;
var lang = (navigator.language || navigator.systemLanguage || navigator.userLanguage ||  "en").substr(0, 2).toLowerCase();
var hcc = document.createElement("script"); hcc.type = "text/javascript"; hcc.async = true;
hcc.src = ("https:" == document.location.protocol ? "https" : "http")+"://w.hypercomments.com/widget/hc/WIDGET_ID/"+lang+"/widget.js";
var s = document.getElementsByTagName("script")[0];
s.parentNode.insertBefore(hcc, s.nextSibling);
})();
</script>
						<div class="tab_content_inner_bottom_buttons">
							<div data="tab_video" class="tcibb_prev" id="backToVideo">< Назад</div>
							<div class="tcibb_buy" id="toBuy">Купить</div>
						</div>
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
<script type="text/javascript">
  (function(d, w, s) {
	var widgetHash = 'c7vkii6kdlnu6heoekb8', ctw = d.createElement(s); ctw.type = 'text/javascript'; ctw.async = true;
	ctw.src = '//widgets.binotel.com/calltracking/widgets/'+ widgetHash +'.js';
	var sn = d.getElementsByTagName(s)[0]; sn.parentNode.insertBefore(ctw, sn);
  })(document, window, 'script');
</script>
</body>
</html>























