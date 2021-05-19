<?
session_start();

if ( !isset($_SESSION['city_name']) ) {
	include("../php/SxGeo.php");

	$ip = $_SERVER['REMOTE_ADDR'];

	$SxGeo = new SxGeo('../php/SxGeoCity.dat', SXGEO_FILE);

	$city = $SxGeo->getCity($ip);

	$_SESSION['city_name'] = $city['city']['name_ru'];
}

$city_name = $_SESSION['city_name'];

if ( !isset($_SESSION['utm_source']) ) {

	if ( isset($_GET['utm_source']) ) {
		$_SESSION['utm_source'] = $_GET['utm_source'];
	} else{
		$_SESSION['utm_source'] = '';
	}

} else {
	
	if ($_SESSION['utm_source'] == '') {
		if ( isset($_GET['utm_source']) ) {
			$_SESSION['utm_source'] = $_GET['utm_source'];
		} else{
			$_SESSION['utm_source'] = '';
		}
	}

}

if ( !isset($_SESSION['utm_content']) ) {

	if ( isset($_GET['utm_content']) ) {
		$_SESSION['utm_content'] = $_GET['utm_content'];
	} else{
		$_SESSION['utm_content'] = '';
	}

} else {
	
	if ($_SESSION['utm_content'] == '') {
		if ( isset($_GET['utm_content']) ) {
			$_SESSION['utm_content'] = $_GET['utm_content'];
		} else{
			$_SESSION['utm_content'] = '';
		}
	}

}

if ( !isset($_SESSION['utm_compaign']) ) {

	if ( isset($_GET['utm_compaign']) ) {
		$_SESSION['utm_compaign'] = $_GET['utm_compaign'];
	} else{
		$_SESSION['utm_compaign'] = '';
	}

} else {
	
	if ($_SESSION['utm_compaign'] == '') {
		if ( isset($_GET['utm_compaign']) ) {
			$_SESSION['utm_compaign'] = $_GET['utm_compaign'];
		} else{
			$_SESSION['utm_compaign'] = '';
		}
	}

}

if ( !isset($_SESSION['utm_medium']) ) {

	if ( isset($_GET['utm_medium']) ) {
		$_SESSION['utm_medium'] = $_GET['utm_medium'];
	} else{
		$_SESSION['utm_medium'] = '';
	}

} else {
	
	if ($_SESSION['utm_medium'] == '') {
		if ( isset($_GET['utm_medium']) ) {
			$_SESSION['utm_medium'] = $_GET['utm_medium'];
		} else{
			$_SESSION['utm_medium'] = '';
		}
	}

}

if ( !isset($_SESSION['utm_term']) ) {

	if ( isset($_GET['utm_term']) ) {
		$_SESSION['utm_term'] = $_GET['utm_term'];
	} else{
		$_SESSION['utm_term'] = '';
	}

} else {
	
	if ($_SESSION['utm_term'] == '') {
		if ( isset($_GET['utm_term']) ) {
			$_SESSION['utm_term'] = $_GET['utm_term'];
		} else{
			$_SESSION['utm_term'] = '';
		}
	}

}

include '../cms/php/db.php';
// $modal = my_query($db, "SELECT * FROM modal ORDER BY id DESC LIMIT 1", "select");
// $video = my_query($db, "SELECT * FROM unpack_video ORDER BY id DESC LIMIT 1", "select");
// $sliders = my_query($db, "SELECT * FROM slider WHERE pause!=1 ORDER BY sort");
// $blocks = my_query($db, "SELECT * FROM blocks", "select");
$comp_classes = my_query($db, "SELECT * FROM comp_class");
// $filters = my_query($db, "SELECT *, cc.id as cid, f.id as fid, cc.name as cat_name, f.name as f_name FROM components_cat as cc LEFT JOIN filters as f ON(cc.id=f.components_cat_id) ORDER BY cc.filter_sort, cc.sort, f.sort");
$filters = my_query($db, "SELECT *, cc.id as cid, f.id as fid, cc.name as cat_name, f.name as f_name FROM filters as f LEFT JOIN components_cat as cc ON(cc.id=f.components_cat_id) ORDER BY cc.filter_sort, cc.sort, f.sort");

$filter_cats = [];
while ($cat = $filters->fetch_assoc()) {
	$filter_cats[$cat['cid']][$cat['fid']] = $cat;
	$filter_cats[$cat['cid']][0] = $cat;
}

// $r = "SELECT *, p.id as pid, COUNT(*) AS c, p.configurator_name as cname, p.pic as cpic FROM products as p LEFT JOIN complect as co ON(p.id=co.comp_id) LEFT JOIN components as com ON(co.com_id=com.id) WHERE (com.filter_brand='1' AND com.filter_level='1' AND com.category_id='7') OR (com.filter_level='1' AND com.category_id='11') OR (com.filter_level='1' AND com.category_id='10') GROUP BY pid HAVING c = 3";

// $sr_prods = my_query($db, $r);
// $srch_comps = [];
// while ($comp = $sr_prods->fetch_assoc()) {
// 	$srch_comps[] = $comp['pid'];
// }

// $srch_str = implode(',', $srch_comps);

$filter_comps = my_query($db, "SELECT *, p.id as pid, p.name as cname, p.pic as cpic FROM products as p LEFT JOIN complect as c ON(p.id=c.comp_id) LEFT JOIN components as com ON(c.com_id=com.id) ORDER BY popular DESC");

$filter_comps_arr = [];
while ($comp = $filter_comps->fetch_assoc()) {
	$filter_comps_arr[$comp['pid']][$comp['category_id']] = $comp;
	$filter_comps_arr[$comp['pid']][0] = $comp;
}


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Рассрочка за 30 секунд</title>
	<meta name="description" content="Интернет-магазин DigitalFury.pro. Персональные компьютеры, игровые компьютеры, компьютерные аксессуары. Большой выбор. Официальная гарантия. Доставка по всей Украине">
	<meta property="og:image" content="img/og.jpg" />
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Oswald:500&amp;subset=cyrillic" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="../css/slick.css">
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery-ui.js"></script>
	<script src="../js/slick.js"></script>
	<script type="text/javascript" src="../js/script.js"></script>
	<script type="text/javascript" src="../js/filters.js"></script>
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
	<script type="text/javascript">
	var ppPercentPrice = 0;
		$(document).ready(function(){

			var payInMonth = 0;
	   		var payNum = 10;
	   		var currentValue = 10000;

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
			

		})
	</script>

</head>
<body>
	<? include '../php/header.php'; ?>
	<div class="chast_privat_top_block clearfix">
		<div class="wrapper clearfix">
			<div class="chast_top_left">
				<div class="chast_top_left_title">Рассрочка<br>за 30 секунд</div>
				<div class="chast_top_left_subtitle">Всё, что Вам нужно для покупки в рассрочку на Регарде –<br>карта ПриватБанка</div>
			</div>
			<div class="chast_top_right">
				<img src="../../../../../img/500hrn.jpg">
			</div>
		</div>
	</div>
	<div class="chast_privat_top_block clearfix">
		<div class="wrapper clearfix">
			<div class="chast_privat_mini_block">
				<div class="chast_pmb_photo">
					<img src="../../../../../img/like.jpg">
				</div>
				<div class="chast_pmb_title">Выгодные условия</div>
				<div class="chast_pmb_text">Полное отсутствие или минимальная комиссия 	по рассрочке</div>
			</div>
			<div class="chast_privat_mini_block">
				<div class="chast_pmb_photo">
					<img src="../../../../../img/docs.jpg">
				</div>
				<div class="chast_pmb_title">Оформление без документов</div>
				<div class="chast_pmb_text">Не нужны паспорт, ИНН, справка о доходах</div>
			</div>
		</div>
	</div>
	<div class="chast_privat_top_block clearfix">
		<div class="wrapper clearfix">
			<div class="chast_sep_title">Вам доступны два вида рассрочки</div>
			<div class="chast_sep"></div>
			<div class="chast_privat_mini_block">
				<div class="chast_pmb_photo">
					<img src="../../../../../img/parts-pay.jpg">
				</div>
				<div class="chast_pmb_title">«Оплата частями»</div>
				<div class="chast_pmb_text">Покупайте некоторые товары в рассрочку до 10 месяцев без комиссий и переплат.</div>
			</div>
			<div class="chast_privat_mini_block">
				<div class="chast_pmb_photo">
					<img src="../../../../../img/moment-credit.jpg">
				</div>
				<div class="chast_pmb_title">«Мгновенная рассрочка»</div>
				<div class="chast_pmb_text">Покупайте товары в рассрочку до 24 месяцев с небольшой ежемесячной
					комиссией — 2,9% от стоимости товара.</div>
			</div>
		</div>
	</div>
	<div class="chast_video_block">
		<div class="chast_video_inner">
			<iframe width="800" height="450" src="https://www.youtube.com/embed/PTHizaDbk0o" frameborder="0" allowfullscreen></iframe>
		</div>
	</div>
	<div class="chast_green">
		<div class="wrapper">
			<div class="chast_sep_title_white">Как воспользоваться</div>
			<div class="chast_sep_white"></div>
			<div class="chast_privat_mini_block">
				<div class="chast_pmb_photo">
					<img src="../../../../../img/how-to-credit-1.png">
				</div>
				<div class="chast_pmb_text_white">1. Выберите товар
на регард.com и нажмите на кнопку "В рассрочку"</div>
			</div>
			<div class="chast_privat_mini_block">
				<div class="chast_pmb_photo">
					<img src="../../../../../img/how-to-credit-2.png">
				</div>
				<div class="chast_pmb_text_white mid_w_t">2. Выберите способ оплаты – «Мгновенная рассрочка» или «Оплата Частями»</div>
			</div>
			<div class="chast_privat_mini_block">
				<div class="chast_pmb_photo">
					<img src="../../../../../img/how-to-credit-3.png">
				</div>
				<div class="chast_pmb_text_white mid_w_t">3. Укажите количество
платежей и совершите
покупку. С Вашей карты
спишется первый платеж</div>
			</div>
			<div class="chast_privat_mini_block">
				<div class="chast_pmb_photo">
					<img src="../../../../../img/how-to-credit-4.png">
				</div>
				<div class="chast_pmb_text_white last_w_t">4. Каждые 30 дней с момента покупки
с Вашей карты будет списываться сумма
ежемесячного платежа. Если на карте нет
необходимой суммы, оплата будет
происходить в счет кредитных средств
с комиссией 4%</div>
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
 					<img src="../../../../../img/installments.png">
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
    	</div>
    </div>
    <div class="chast_qa">
    	<div class="wrapper">
    		<div class="chast_sep_title">Частые вопросы</div>
			<div class="chast_sep"></div>
			<h4>Какими картами можно оплатить покупку по сервисам «Оплата частями» и «Мгновенная рассрочка»?</h4>

			<p>Сервисы доступны владельцам карты «Универсальная», карты «Универсальная Gold», элитных карт для VIP-клиентов (Platinum, Infinite, World Signia/Elite).</p>


			<h4>Где посмотреть подробную информацию по своему договору «Оплаты частями» или «Мгновенной рассрочки»?</h4>

			<p>Посмотреть график платежей по сервису и оставшуюся сумму к погашению, а также досрочно погасить кредит можно в Приват24, меню «Мои счета» - «Оплата частями»</p>


			<h4>Есть ли дополнительные комиссии, страховки и т. д.?</h4>

			<p>Если ежемесячный платеж по сервису списывается в счет кредитных средств, взимается комиссия 4% от суммы платежа за использование кредитного лимита. Никаких других комиссий и страховок по сервису нет.</p>


			<h4>Можно ли досрочно погасить задолженность по «Оплате частями»?</h4>

			<p>Да, погасить кредит досрочно можно в Приват24 или отправив SMS-команду на номер 10060 c текстом CHASTOFF+XXXXXX, где XXXXXX – последние 6 цифры номера договора.</p>


			<h4>Как рассчитывается комиссия по «Мгновенной рассрочке» в случае досрочного погашения?</h4>

			<p>В случае досрочного погашения взимается 2,9% от общей суммы договора.</p>


			<h4>Например:</h4>

			<p>Договор по «Мгновенной рассрочке» оформлен на 10 платежей на сумму 10 000 грн. По списанию третьего платежа подается заявка на досрочное погашение. При этом сумма платежа составит: остаток задолженности (10 000 грн - 3 * 1 000 грн) + комиссия 2,9 % (10 000 грн * 2,9 %) = 7 290 грн.</p>
    	</div>
    </div>
	<? include '../php/footer.php'; ?>
	<script src="//assets.pcrl.co/js/jstracker.min.js"></script>
</body>
</html>












