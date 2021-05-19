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
$prod_url = $_GET['url'];
$modal = my_query($db, "SELECT * FROM modal ORDER BY id DESC LIMIT 1", "select");
$prod = my_query($db, "SELECT * FROM products WHERE url='$prod_url'", "select");
$comp_id = $prod['id'];
$comp_type = $prod['type'];

if (isset($_GET['complect'])) {
	$save_coms_arr = explode(',', $_GET['complect']);
	$save_ass_arr = explode(',', $_GET['as']);
} else {
	$save_coms_arr = [];
	$save_ass_arr = [];
}

// var_dump($save_ass_arr);
// Категории комплектующих
$cats = my_query($db, "SELECT *, c.id as cid, com.id as comid, c.name as catname FROM cat_to_comp as cc LEFT JOIN components_cat as c ON(cc.cat_id=c.id) LEFT JOIN components as com ON(c.id=com.category_id) WHERE cc.comp_id='$comp_id' ORDER BY c.sort, com.price");
$complects = my_query($db, "SELECT * FROM complect LEFT JOIN components ON(complect.com_id=components.id) WHERE complect.comp_id='$comp_id'");
$complect_arr = [];

$corpus_photos_str = '';

$cats_arr = [];
while ($cat =  $cats->fetch_assoc()) {
	$cats_arr[$cat['cid']][$cat['comid']] = $cat;
	$cats_arr[$cat['cid']][0] = $cat;
}

// Комплектация товара
while ($compl = $complects->fetch_assoc()) {
	$complect_arr[] = $compl['com_id'];
	if ($compl['cat_id'] == 1) {
		$corpus_photos_str = $compl['pics_id'];
	}
}

// Компоненты для выбора на данном товаре
$com_arr = [];
$com_prod = my_query($db, "SELECT * FROM com_to_comp WHERE comp_id='$comp_id'");
foreach ($com_prod as $com) {
	$com_arr[] = $com['com_id'];
}

// Фото корпуса
if ($comp_type == 'comp') {
	$corpus_photos = my_query($db, "SELECT * FROM pics WHERE id IN($corpus_photos_str) ORDER BY sort");
	$corpus_photos_arr = [];
	while ($pic = $corpus_photos->fetch_assoc()) {
		$corpus_photos_arr[] = $pic;
	}
}

// Видео компа
$videos_arr = [];
if ($prod['video']) {
	$videos_arr = explode(',', $prod['video']);
}

$oldNacenka = $prod['old_nacenka'] - $prod['coms_price'];
// Делаем популярнее
my_query($db, "UPDATE products SET visits=visits+1 WHERE id='$comp_id'");

$diskrom_first = ''; // Переменная хранит какой дисковод сейчас

$cpu_arr = []; // Массив для хранения инфы для модального окна процессоров

// Акссесуар комплектующих






// $sliders = my_query($db, "SELECT * FROM slider WHERE pause!=1 ORDER BY sort");
// $blocks = my_query($db, "SELECT * FROM blocks", "select");
// $filters = my_query($db, "SELECT *, cc.id as cid, f.id as fid, cc.name as cat_name, f.name as f_name FROM components_cat as cc LEFT JOIN filters as f ON(cc.id=f.components_cat_id) ORDER BY cc.filter_sort, cc.sort, f.sort");
// $filters = my_query($db, "SELECT *, cc.id as cid, f.id as fid, cc.name as cat_name, f.name as f_name FROM filters as f LEFT JOIN components_cat as cc ON(cc.id=f.components_cat_id) ORDER BY cc.filter_sort, cc.sort, f.sort");

// $filter_cats = [];
// while ($cat = $filters->fetch_assoc()) {
// 	$filter_cats[$cat['cid']][$cat['fid']] = $cat;
// 	$filter_cats[$cat['cid']][0] = $cat;
// }

// $r = "SELECT *, p.id as pid, COUNT(*) AS c, p.configurator_name as cname, p.pic as cpic FROM products as p LEFT JOIN complect as co ON(p.id=co.comp_id) LEFT JOIN components as com ON(co.com_id=com.id) WHERE (com.filter_brand='1' AND com.filter_level='1' AND com.category_id='7') OR (com.filter_level='1' AND com.category_id='11') OR (com.filter_level='1' AND com.category_id='10') GROUP BY pid HAVING c = 3";

// $sr_prods = my_query($db, $r);
// $srch_comps = [];
// while ($comp = $sr_prods->fetch_assoc()) {
// 	$srch_comps[] = $comp['pid'];
// }

// $srch_str = implode(',', $srch_comps);

// $filter_comps = my_query($db, "SELECT *, p.id as pid, p.name as cname, p.pic as cpic FROM products as p LEFT JOIN complect as c ON(p.id=c.comp_id) LEFT JOIN components as com ON(c.com_id=com.id) ORDER BY total_price DESC");

// $filter_comps_arr = [];
// while ($comp = $filter_comps->fetch_assoc()) {
// 	$filter_comps_arr[$comp['pid']][$comp['category_id']] = $comp;
// 	$filter_comps_arr[$comp['pid']][0] = $comp;
// }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title><?=$prod['seo_title'];?></title>
	<meta name="description" content="<?=$prod['seo_description'];?>">
	<meta property="og:image" content="../../../../../../../../media/<?=$prod['og_image'];?>" />
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Oswald:500&amp;subset=cyrillic" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../../../../../../css/style.css">
	<link rel="stylesheet" type="text/css" href="../../../../../../css/product-mobile.css">
	<link rel="stylesheet" type="text/css" href="../../../../../../css/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="../../../../../../css/slick.css">
	<script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=5a7d927d08e4bc00136bbd4d&product=inline-share-buttons"></script>
	<script src="../../../../../../js/jquery.js"></script>
	<script src="../../../../../../js/number.js"></script>
	<script src="../../../../../../js/jquery-ui.js"></script>
	<script src="../../../../../../js/slick.js"></script>
	<script src="../../../../../../js/zoomsl.min.js"></script>
	<script src="../../../../../../js/zoom.min.js"></script>
	<script type="text/javascript" src="../../../../../../js/script.js"></script>
	<script type="text/javascript" src="../../../../../../js/product.js"></script>
	<script type="text/javascript">
		var compNacenkaIs = <?=ceil($prod['nacenka']);?>;
		var compNacenkaOldIs = <?=ceil($oldNacenka);?>;
		var compIdIs = <?=$comp_id;?>;
		var url = '<?=$prod_url;?>';
	</script>
</head>
<body class="product_body">

	<!-- следить за ценой -->

	<div class="newsletter_blackout"></div>
	<div class="newsletter_modal">
		<div class="newsletter_modal_icon">
			<img src="../../../img/newsletter-check.png">
		</div>
		<div class="newsletter_modal_title">Успешно</div>
		<div class="newsletter_modal_text">Спасибо за подписку</div>
		<div class="newsletter_modal_button">Ок</div>
	</div>

	<!-- концигурация на email -->

	<div class="mail_blackout"></div>
	<div class="mail_modal">
		<div class="mail_modal_icon">
			<img src="../../../img/newsletter-check.png">
		</div>
		<div class="mail_modal_title">Спасибо</div>
		<div class="mail_modal_text">Ваша конфигурация отправлена на e-mail</div>
		<div class="mail_modal_button">Ок</div>
	</div>

	<!--  -->

	<div class="modals_screen_fade"></div>

	<!-- модальное Email -->
	<div class="product_email_modal">
		<div class="product_email_modal_header">
			Отправить Вашу конфигурацию на Email
			<div class="product_email_modal_close">×</div>
		</div>
		<div class="product_email_modal_body">
			<div class="product_email_modal_body_text">Вы можете сохранить конфигурацию, чтобы не потерять информацию или вернуться к ней позже. Ссылка на конфигурацию придет к вам на e-mail.</div>
			<!-- <div class="product_email_modal_body_input_star">*</div> -->
			<input type="email" name="email" class="product_email_modal_body_input" placeholder="Введите ваш email">
			<textarea class="product_email_modal_body_textarea" placeholder="Здесь вы можете задать вопрос по данной концигурации, оставить номер телефона или комментарий"></textarea>	
			<!-- <div class="product_email_modal_body_footnote">* - поля отмеченные звездочкой обязательны для заполнения</div> -->
		</div>
		<div class="product_email_modal_footer clearfix">
			<div class="product_email_modal_footer_button" comp-id="<?=$comp_id;?>">Отправить на Email</div>
		</div>
	</div>
	<!-- модельаное SAVE -->

	<div class="product_save_modal">
		<div class="product_save_modal_header">
			Ссылка на конфигурацию
			<div class="product_save_modal_close">×</div>
		</div>
		<div class="product_save_modal_body">
			<div class="product_save_modal_link">http://digital.fury/computer/dominator-ultra/33,244,273,75,143,108,180,217,231,206,245,255/</div>
			<div class="product_save_modal_button">Копировать  ссылку</div>
		</div>
	</div>

	<!-- модально КОнфигурация -->

	<div class="cart_blackout">
		<div class="details_modal">
			<div class="details_modal_header">
				<div class="details_modal_header_title">AMD Ryzen super duper</div>
				<div class="details_modal_close">×</div>
			</div>
			<div class="details_modal_body">
				<div class="details_modal_line clearfix">
					<div class="details_modal_line_title">Case</div>
					<div class="details_modal_line_characteristic">1 x Greenvision X04</div>
				</div>
				<div class="details_modal_line clearfix">
					<div class="details_modal_line_title">Case</div>
					<div class="details_modal_line_characteristic">1 x Greenvision X04</div>
				</div>
				<div class="details_modal_line clearfix">
					<div class="details_modal_line_title">Case</div>
					<div class="details_modal_line_characteristic">1 x Greenvision X04</div>
				</div>
				<div class="details_modal_line clearfix">
					<div class="details_modal_line_title">Case</div>
					<div class="details_modal_line_characteristic">1 x Greenvision X04</div>
				</div>
			</div>
			<div class="details_modal_footer">
				<div class="details_modal_footer_total">
					Общая сумма: 17 566 грн
				</div>
			</div>
		</div>
	</div>

	<!-- конец модальных -->

	<div class="screen_fade"></div>

	<!-- модальное окно приват -->

	<div class="bg_modal privat_prod_modal">
		<div class="modal_inner privat_prod_inner">
			<div class="mod_close">×</div>
			<h2>Воспользуйтесь мгновенной рассрочкой от ПриватБанка</h2>
			<div class="privat_info_all_price_title">Рассрочка оформляется на безналичную стоимость товара - <div class="privat_info_all_price_field"><span>0.00</span> грн.</div> б/н.</div>
				<div class="privat_prod_flex_container">
					<div class="privat_flex_inner" style="text-align:left;">
 						<label class="privat_radio_label" style="padding-left:0"><!-- <input type="radio" name="privat" class="privat_radio_input" value="II" checked> -->
 							<!-- <div class="privat_radio" style="display:none"></div> -->
 							<div class="privat_info_title">Плати позже</div>
 							<img src="../../../../../../img/paylater.png" class="pr_cr_img_1" style="height:50px;">
 						</label>	
 					</div>
 					<div class="privat_flex_inner">
 						<a href="" class="privat_confirm_button pay_later">Купить</a>
 					</div>
				</div>
				<div class="privat_prod_flex_container">
					<div class="privat_flex_inner" style="text-align:left;">
 						<label class="privat_radio_label" style="padding-left:0"><!-- <input type="radio" name="privat" class="privat_radio_input" value="II" checked> -->
 							<!-- <div class="privat_radio" style="display:none"></div> -->
 							<div class="privat_info_title">Альфа-Банк</div>
 							<img src="../../../../../../img/alfa-bank.png" class="pr_cr_img_1">
 						</label>	
 					</div>
 					<div class="privat_flex_inner">
 						<a href="" class="privat_confirm_button alfa_bank">Купить</a>
 					</div>
				</div>
 				<div class="privat_prod_flex_container">
 					<div class="privat_flex_inner" style="text-align:left;">
 						<label class="privat_radio_label" style="padding-left:0"><!-- <input type="radio" name="privat" class="privat_radio_input" value="II" checked>
 							<div class="privat_radio" style="display:none"></div> -->
 							<div class="privat_info_title">Мгновенная рассрочка</div>
 							<img src="../../../../../../img/installments.png" class="pr_cr_img_1">
 							<img src="../../../../../../img/privat_logo.png" class="pr_cr_img_2">
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
			 					<div style="margin-left:24px">24</div>
			 				</div>
			 			</div>
 					</div>
 					<div class="privat_flex_inner">
 						<div class="privat_info_payment_field"><span>0.00</span> грн</div>
 						<div class="pfim">в месяц</div>
 					</div>
 					<div class="privat_flex_inner">
 						<a href="" class="privat_confirm_button privat_bank">Купить</a>
 					</div>
 				</div>
 				<div class="privat_info_comission">Ежемесячный платеж рассчитан с учетом комиссии банка - 2.9%</div>
				<div class="privat_message_container">
					<div class="privat_message"><span>Внимание.</span> Максимальная сумма покупки расчитывается индивидуально для каждого клиента. Чтобы узнать<br>максимально доступную Вам сумму, отправьте SMS на номер <span>10060</span> с кодом <span>chast</span>.</div>
				</div>
		</div>
	</div>

	<!-- delivery popups blackout -->

	<div class="delivery_popups_blackout"></div>

	<!-- модальное окно винда -->

	<div class="delivery_popup" id="winp" style="height:340px;">
		<div class="delivery_close_icon">
			×
		</div>
		<div class="delivery_popup_container">
			<div class="delivery_popup_inner">
				<h4>В стоимость уставновки Windows входит:</h4>
				<ul>
					<li>Обнавление BIOS материнской платы</li>
					<li>Установка операционной системы</li>
					<li>Установка и настройка всех необходимых драйверов</li>
					<li>Трех часовое тестирование в программах AIDA64, FurMark и LinX</li>
				</ul>
				<p>После прохождения всех тестов, вы сможете быть уверены, что компьютер полностью настроен и готов к работе.</p>
			</div>
		</div>
	</div>

	<!-- модальное окно доставка -->

	<div class="delivery_popup" id="dp">
		<div class="delivery_close_icon">
			×
		</div>
		<div class="delivery_popup_container">
			<div class="delivery_popup_inner">
				<h4>Самовывоз из нашего магазина в Киеве<br>(ул. Авиаконструктора Антонова 43)</h4>
				<p>С понедельника по пятницу с 10:00 до 19:00. Суббота, Воскресенье - выходной.
	Самовывоз осуществляется после согласования.</p>
				<h4>Самовывоз из нашего магазина в Харькове<br>(ул. Полтавский Шлях 9)</h4>
				<p>С понедельника по пятницу с 10:00 до 19:00. В субботу с 10:00 до 15:00, Воскресенье - выходной.
	Самовывоз осуществляется после согласования.</p>
				<h4>Доставка в отделения Новой Почты</h4>
				<p>С помощью доставки Новой Почтой, Вы можете получить товар даже в самых отдаленных уголках Украины</p><p>
	В среднем, доставка занимает 1-2 дня, во время заказа наши менеджеры согласуют с Вами дату доставки перед отправкой товара.</p><p>
	Доставка Новой Почтой - БЕСПЛАТНО.</p>
				<h4>Доставка курьером по Киеву с подключением и проверкой - БЕСПЛАТНО.</h4>
			</div>
		</div>
	</div>

	<!-- самовывоз -->

	<div class="delivery_popup" id="smvp" style="height:350px;">
		<div class="delivery_close_icon">
			×
		</div>
		<div class="delivery_popup_container">
			<div class="delivery_popup_inner">
				<h4>Самовывоз из нашего магазина в Киеве<br>(ул. Авиаконструктора Антонова 43)</h4>
				<p>С понедельника по пятницу с 10:00 до 19:00. Суббота, Воскресенье - выходной.
	Самовывоз осуществляется после согласования.</p>
				<h4>Самовывоз из нашего магазина в Харькове<br>(ул. Полтавский Шлях 9)</h4>
				<p>С понедельника по пятницу с 10:00 до 19:00. В субботу с 10:00 до 15:00, Воскресенье - выходной.
	Самовывоз осуществляется после согласования.</p>
			</div>
		</div>
	</div>

	<!-- модальное оплата -->

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
				<p>Мы не являемся плательщиками НДС. Мы являемся ФОП на 2 и 3 группе единого налога. Счет может быть отправлен по электронной почте.</p>
				<h4>Мновенная рассрочка от ПриватБанка</h4>
				<p>Оформление рассрочки до 24 месяцев. Оплата равными частями. Переплата 2,9% от стоимости товара ежемесячно. Заказ может быть доставлен по Украине Новой Почтой!</p>
				<h4>Оплата частями от ПриватБанка</h4>
				<p>Оплата равными частями без переплат до 3 платежей. Заказ может быть доставлен по Украине Новой Почтой!</p>
			</div>
		</div>
	</div>

	<!-- модальное гарантия -->

	<div class="delivery_popup" id="garp">
		<div class="delivery_close_icon">
			×
		</div>
		<div class="delivery_popup_container">
			<div class="delivery_popup_inner">
				<p>Вместе с компьютером вы получите официальную гарантию от DigitalFury. Гарантия распростроняется на каждое комплектующее отдельно, сроком от 1-го до 3-х лет. Срок гарантии указан в гарантийном талоне на каждое комплектующее отдельно. Компьютер не пломбируется, возможен самостоятельный апгрейд</p>
			</div>
		</div>
	</div>

	<!-- модальное возврат -->

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
				<br>Обмен или возврат товара производится в нашем офисе по адресу:<span style="font-weight:600;"> Киев, ул. Авиаконструктора Антонова, 43.</span> С понедельника по пятницу с 10-00 до 18-00. Также, обмен или возврат товара может быть произведен через Новую Почту. Доставку оплачивает потребитель. 
				Для возврата денег потребитель должен иметь при себе паспорт. Возврат денег возможен в день возврата товара или, в случае отсутствия денег в кассе, на протяжении максимум 7 дней.</p>
			</div>
		</div>
	</div>

	<!-- модальное следить за ценой -->

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

	<!-- модальное окно просмотр главных фото -->

	<div class="main_photo_preview_bg">
		<div class="main_photo_preview_modal clearfix">
			<div class="main_photo_preview_close_icon">
				×
			</div>
			<div class="main_photo_preview_main_photo_container">
				<div class="main_photo_preview_main_photo">
					<img src="../../../../../../img/roundphoto01.jpg">
				</div>
				<div class="main_photo_preview_video_container">
					<div class="photo_preview_video_inner">
						<iframe width="100%" height="100%" src="" frameborder="0" allowfullscreen></iframe>
					</div>
				</div>
			</div>
			<div class="main_photo_preview_side_menu"></div>
		</div>
	</div>

	<!-- конец модального окна -->
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
							<img src="../../../../../../img/arrowleftblack.png">
						</div>
						<div class="access_right_arrow">
							<img src="../../../../../../img/arrowrightblack.png">
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
					<div class="access_char_side_info">Цена, спецификация и условия могут быть изменены без предварительного уведомления. DigitalFury не несет ответственности за ошибки в описании, фотографиях или упущениях относительно цен или другой информации. Пожалуйста, смотрите подробные спецификации на сайте производителя.</div>
				</div>
			</div>
		</div>
	</div>

	<!-- модальное окно просмотра фото корпусов -->

	<div class="photo_preview_bg">
		<div class="photo_preview_modal clearfix">
			<div class="photo_preview_close_icon">
				×
			</div>
			<div class="photo_preview_main_photo_container">
				<div class="photo_preview_main_photo">
					<img src="../../../../../../../media/<?=$corpus_photos_arr[0]['url'];?>" alt="<?=$prod['alt'];?>">
				</div>
			</div>
			<div class="photo_preview_side_menu">
				<? foreach ($corpus_photos_arr as $key => $pic) { ?>
					<div class="photo_preview_mini_photo active">
						<img src="../../../../../../../media/<?=$pic['url'];?>" alt="<?=$prod['alt'];?>">
					</div>
				<? } ?>
			</div>
		</div>
	</div>

	<!-- конец просмотра корпусов -->

	<!-- нижняя плашка -->

	<div class="bottom_price_nav">
		<div class="product_wrapper clearfix">
			<div class="bottom_buy_btn">
				<img src="../../../../../../img/newbottomcart.png">
				Купить
			</div>
			<!-- <div class="bottom_credit_btn">В рассрочку</div> -->
			<div class="bottom_price_grn">грн</div>
			<div class="bottom_price"><?=$prod['total_price'];?></div>
			<div class="bottom_computer_title">Итого:</div>
			<div class="bottom_price_difference">Скидка: 5 000 грн</div>
			<div class="show_config" comp-id="<?=$comp_id;?>">Показать итоговую конфигурацию</div>
			<div class="print_block" comp-id="<?=$comp_id;?>">
				<img src="../../../../../../img/print-icon.png" class="print_icon">
				<div class="print_block_title" comp-id="<?=$comp_id;?>">Скачать PDF</div>
			</div>
			<div class="mail_block" comp-id="<?=$comp_id;?>">
				<img src="../../../../../../img/mail-icon.png" class="print_icon">
				<div class="print_block_title" comp-id="<?=$comp_id;?>">Email</div>
			</div>
			<div class="save_block">
				<img src="../../../../../../img/save-icon.png" class="print_icon">
				<div class="print_block_title">Сохранить</div>
			</div>
		</div>
		<div class="to_top_btn">
			<div class="to_top_btn_text">вверх</div>
			<img src="../../../../../../img/top-icon.png">
		</div>
	</div>

	<!-- конец плашки -->

	<!-- side circles -->

	<div class="side_nav_photos">
		<a href="#limited_offer" class="scrolltoBlock side_nav_link limited_offer">
			<div class="side_nav_photos_circle">
				<img src="../../../../../img/components-icons/stopwatch.svg">
			</div>
			<div class="side_nav_link_tooltip">Ограниченное по времени предложение</div>
		</a>
		<a href="#comto1" class="scrolltoBlock side_nav_link case">
			<div class="side_nav_photos_circle">
				<img src="../../../../../img/components-icons/case.svg">
			</div>
			<div class="side_nav_link_tooltip">Корпус</div>
		</a>
		<a href="#comto3" class="scrolltoBlock side_nav_link fans">
			<div class="side_nav_photos_circle">
				<img src="../../../../../img/components-icons/fan.svg">
			</div>
			<div class="side_nav_link_tooltip">Вентяляторы</div>
		</a>
		<a href="#comto7" class="scrolltoBlock side_nav_link proc">
			<div class="side_nav_photos_circle">
				<img src="../../../../../img/components-icons/cpu.svg">
			</div>
			<div class="side_nav_link_tooltip">Процессоры</div>
		</a>
		<a href="#comto9" class="scrolltoBlock side_nav_link cooler">
			<div class="side_nav_photos_circle">
				<img src="../../../../../img/components-icons/fan.svg">
			</div>
			<div class="side_nav_link_tooltip">Кулер</div>
		</a>
		<a href="#comto10" class="scrolltoBlock side_nav_link memory">
			<div class="side_nav_photos_circle">
				<img src="../../../../../img/components-icons/ram.svg">
			</div>
			<div class="side_nav_link_tooltip">Оперативка</div>
		</a>
		<a href="#comto11" class="scrolltoBlock side_nav_link video">
			<div class="side_nav_photos_circle">
				<img src="../../../../../img/components-icons/video-card.svg">
			</div>
			<div class="side_nav_link_tooltip">Видеокарты</div>
		</a>
		<a href="#comto14" class="scrolltoBlock side_nav_link motherboard">
			<div class="side_nav_photos_circle">
				<img src="../../../../../img/components-icons/motherboard.svg">
			</div>
			<div class="side_nav_link_tooltip">Материнки</div>
		</a>
		<a href="#comto15" class="scrolltoBlock side_nav_link power">
			<div class="side_nav_photos_circle">
				<img src="../../../../../img/components-icons/power.svg">
			</div>
			<div class="side_nav_link_tooltip">Блок питания</div>
		</a>
		<a href="#comto18" class="scrolltoBlock side_nav_link harddrive">
			<div class="side_nav_photos_circle">
				<img src="../../../../../img/components-icons/ssd.svg">
			</div>
			<div class="side_nav_link_tooltip">Накопитель</div>
		</a>
		<a href="#comto20" class="scrolltoBlock side_nav_link diskrom">
			<div class="side_nav_photos_circle">
				<img src="../../../../../img/components-icons/dvd.svg">
			</div>
			<div class="side_nav_link_tooltip">Дисковод</div>
		</a>
	</div>

	<!-- end of side circles -->

	<? include '../php/header.php'; ?>
	<div class="sitemap">
		<div class="product_wrapper clearfix">
			<a href="index.html">Главная</a> › Игровой компьютер <span class="product_page_name"><?=$prod['name'];?></span>
			<div class="product_code">Код товара: <? echo 17271+$comp_id;?></div>
		</div>
	</div>
	<div class="product_page_main_block">
		<div class="product_wrapper">
			<div class="product_page_flex_container clearfix">
				<h1 class="product_page_title_mobile"><?=$prod['name'];?></h1>
				<div class="product_page_flex_photo_block">
					<!-- десктоп фото блок -->
					<div class="new_photo_block">
						<div class="side_photo_container_outer">
							<div class="side_photo_container">
								<div class="side_photo_container_inner">

									<!-- миниатюры фоток -->
								<? foreach ($corpus_photos_arr as $key => $pic) { ?>
									<div class="side_mini_photo <? if($key == 0){ echo 'active';} ?>">
										<img src="../../../../../../../media/<?=$pic['url'];?>" alt="<?=$prod['alt'];?>">
									</div>
								<? } ?>

									<!-- миниатюра видео -->
								<? 
								if(!empty($videos_arr)){
									foreach ($videos_arr as $key => $video) { 
										$video_code = explode('watch?v=', $video); ?>	
									<div class="side_mini_video" data-video="https://www.youtube.com/embed/<?=$video_code[1];?>">
										<img src="../../../../../../img/play-icon.png" class="play_icon_prod">
										<img src="https://img.youtube.com/vi/<?=$video_code[1];?>/0.jpg">
									</div>
									<? }
								} ?>

									<!-- конец миниатюры видео -->

								</div>
							</div>
							<div class="side_arrowtop">
								<img src="../../../../../../img/blackarrowtopsmall.png">
							</div>
							<div class="side_arrowbottom">
								<img src="../../../../../../img/blackarrowsmall.png">
							</div>
						</div>
						<div class="main_photo_container">

							<!-- главное фото -->

							<img id="zoomImage" src="../../../../../../../media/<?=$corpus_photos_arr[0]['url'];?>" class="main_photo_image">

							<!-- видео блок -->

							<div class="main_video_container">
								<div class="video_inner">
									<iframe width="100%" height="100%" src="" frameborder="0" allowfullscreen></iframe>
								</div>
							</div>

							<!-- конец видео блока -->

						</div>
					</div>
					<!-- конец фото блока десктоп -->
					<div class="main_photo_container_subtitle">Нажмите для полного просмотра</div>
					<!-- mobile photo block -->

					<div class="photo_block_mobile">
					<? foreach ($corpus_photos_arr as $key => $pic) { ?>
						<div class="photo_block_mobile_photo">
							<img src="../../../../../../../media/<?=$pic['url'];?>" alt="<?=$prod['alt'];?>">
						</div>
					<? } ?>
					</div>
					<div class="nav_for_photo_block_mobile">
						<img src="../../../../../../../img/mobile-nav-left.png" class="nav_for_photo_block_mobile_left">
						<div class="nav_mobile_photos_container">
						<? foreach ($corpus_photos_arr as $key => $pic) { ?>
							<div class="nav_mobile_photo">
								<img src="../../../../../../../media/<?=$pic['url'];?>" alt="<?=$prod['alt'];?>">
							</div>
						<? } ?>
						</div>
						<img src="../../../../../../../img/mobile-nav-right.png" class="nav_for_photo_block_mobile_right">
					</div>

					<!-- end of mobile photo block -->
				</div>
				<div class="product_page_price_flex_info_block">
					<h1 class="product_page_title"><?=$prod['name'];?></h1>
					<div class="product_page_flex_info_block_inner clearfix">
						<div class="product_page_flex_price">
							<div class="product_page_price_block_outer clearfix">
								<div class="product_page_price_block_outer_text">Лучшее ценовое предложение</div>
								<div class="product_page_price_block clearfix">
									<div class="old_price"><span class="oldContainer"><?=$prod['old_nacenka'];?></span><span> грн</span>
										<div class="old_price_inner"></div>
									</div>
									<div class="new_price"><?=$prod['total_price'];?><span>грн</span></div>
									<div class="freeshipping">+ бесплатная доставка</div>
									<div class="add_features">
									<?

									$s_i = 0;
									$sales_top = my_query($db, "SELECT * FROM assessories WHERE sale_top_name!=''");
									while ($sale_top = $sales_top->fetch_assoc()) { 
										$s_i++;
										?>
										<div class="feature_block clearfix">
											<div class="checkbox_block">
												<input type="checkbox" id="c<?=$s_i;?>" class="add_f" value="<?=$sale_top['id'];?>" <? if(in_array($sale_top['id'], $save_ass_arr)){ echo "checked";} ?>>
												<label for="c<?=$s_i;?>" class="checkbox_title"><span></span><?=$sale_top['sale_top_name'];?></label>
												<!-- <div class="delivery_info_btn" id="winb"></div> -->
											</div>
											<div class="feature_price"><?=number_format($sale_top['sale_price'], 0, '', ' ');?> грн</div>
										</div>

									<? } ?>		
									</div>
									<div class="buy_button"><img src="../../../../../../img/basket.png">Купить</div>
									<div class="new_credit_block">
										<div class="new_credit_button">Рассрочка</div>
										<div class="new_credit_info">25 x <span class="new_credit_sum"></span> грн/мес</div>
									</div>
								</div>
								<div class="price_block_side_buttons">
									<a href="../../../../../konkurs" class="unpack_link">
										<div class="unpack_block">
											<img src="../../../../../../img/unpack.svg">
											<div class="unpack_text">300 грн за<br>распаковку</div>
										</div>
									</a>
									<div class="follow_price_block">
										<img src="../../../../../../img/followprice.jpg">
										<div class="follow_price_text">Следить<br>за ценой</div>
										<!-- <div class="follow_price_text">за ценой</div> -->
									</div>
								</div>
							</div>

							<!-- контейнер отзывов -->

							<div class="reviews_block clearfix">
								<div class="reviews_block_stars crr-cnt" data-crr-url="https://digitalfury.pro/computer/<?=$prod_url;?>/"></div>
								<div class="sharethis-inline-share-buttons"></div>
							</div>

							<!-- сокращенная информация о комплектующих -->

							<div class="product_short_info">
								
							</div>
						</div>
						<div class="product_page_flex_delivery">
							<div class="product_page_delivery">
								<div class="main_title">Доставка<div class="delivery_info_btn" id="db"></div>
									<div class="main_title_city" id="db2">бесплатно</div>
								</div>
								<div class="product_delivery_inner_block">
									<div class="title green">Самовывоз</div>
									<div class="text">− <span class="span_call_modal">из наших магазинов</span><div class="text_inner_free">бесплатно</div>
									</div>
									<div class="text">− <span class="span_call_modal">из новой почты</span><div class="text_inner_free">бесплатно</div>
									</div>
								</div>
								<div class="product_delivery_inner_block">
									<div class="title green">Курьер</div>
									<div class="text">Нашим курьером по Киеву
										<div class="text_inner_free">бесплатно
											<div class="text_inner_free_oldprice">70 грн
												<div class="text_inner_free_oldprice_inner"></div>
											</div>
										</div>
									</div>
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
					<div id="tfc" data="tab_configuration" class="tabs_fixed_btn active">Конфигурация
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
					<div id="tfo" data="tab_comments" class="tabs_fixed_btn">Отзывы
						<div class="tab_btn_inner">
							<span class="comments_num_container" id="comments_num"></span>
						</div>
					</div>
				</div>

				<!-- Конфигуратор -->

				<div class="tab_content_block">
					<div class="tab_content_inner" id="tab_configuration_content">
						<div class="components_accordion">

							<!-- Блок комплектующего -->
							<!-- Ограниченные предложения -->

							<div class="components_accordion_block super_offers" id="limited_offer">
								<div class="components_accordion_header clearfix">
									<img src="../../../../../../img/blackarrowsmall.png" class="components_accordion_header_arrow">
									<div class="components_accordion_header_title">Ограниченное по времени предложение</div>
									<div class="components_accordion_header_component_name" style="display: none">Не выбрано</div>
								</div>
								<div class="components_accordion_body">

									<!-- если это ограниченное по времени предложение -->

									<div class="super_offer_text">• Выберите пожалуйста  желаемые акционные предложения.  Срок действия предложения со сниженной ценой ограничен.  Успей купить!</div>

									<!-- конец ограниченного предложения -->

									<!-- контейнер плиткой -->

									<div class="components_container sale_ass">

										<!-- компонент плиткой -->
										<? 
										$asses = my_query($db, "SELECT * FROM ass_to_comp as ac LEFT JOIN assessories as a ON(ac.ass_id=a.id) WHERE ac.prod_id='$comp_id' AND a.sale='1' ORDER BY sale_price");
										while ($ass = $asses->fetch_assoc()) { 
											?>
											<label class="compotent_square_block" data-price="<?=$ass['sale_price'];?>">
												<div class="economy_badge">экономия!</div>
												<div class="component_zoom_icon"></div>
												<div class="component_square_block_photo">
													<img src="../../../../../../../media/<?=$ass['main_pic'];?>">
												</div>
												<div class="component_square_block_title"><?=$ass['name'];?></div>
												<div class="component_square_block_price">(+ <?=$ass['sale_price'];?> грн)</div>
												<div class="component_square_block_checkmark"></div>
												<input class="compInput" type="checkbox" name="sales" value="<?=$ass['ass_id'];?>" <? if(in_array($ass['ass_id'], $save_ass_arr)){ echo "checked";} ?>>
												<div class="block_badge_new">Новинка</div>
												<div class="block_badge_recommend">Рекомендуем</div>
											</label>
										<? } ?>

										<!-- конец компонента плиткой -->
									
									</div>

									<!-- конец контейнера плиткой -->

								</div>
							</div>

							<!-- конец блока комплектующей -->

						
					<? foreach ($cats_arr as $cat_id => $coms) { 
						if ($coms[0]['view'] == 'plitka') { ?>
							<!-- Блок комплектующего плиткой-->

							<div class="components_accordion_block <? if ($comp_type == 'laptop') {echo 'laptop';} ?>" id="comto<?=$coms[0]['cid'];?>">
								<div class="components_accordion_header clearfix">
									<img src="../../../../../../img/blackarrowsmall.png" class="components_accordion_header_arrow">
									<div class="components_accordion_header_title"><?=$coms[0]['catname'];?></div>
									<div class="components_accordion_header_component_name">Не выбрано</div>
								</div>
								<div class="components_accordion_body">

									<!-- контейнер плиткой -->

									<div class="components_container">

										<!-- компонент плиткой -->
										<? 

										foreach ($coms as $com_id => $com) {
										 	if (in_array($com_id, $com_arr) && $com['price'] != 1) { ?>
											
												<label class="compotent_square_block mainComponent <? if ($com['new'] == '1') {echo 'new';} if ($com['recommend'] == '1') {echo 'recommend';} if ($com['economy'] == '1') {echo 'economy';} ?>" data-price="<?=ceil($com['price']+$com['nacenka_price']);?>"  data-short="<?=$com['short_name'];?>">
													<div class="economy_badge">экономия!</div>
													<div class="component_zoom_icon <? if ($cat_id == 1){echo 'zoom_modal_show'; } else { echo 'accessoriesPopup';} ?>" modal-id="<?=$com_id;?>" data-type="com"></div>
													<div class="component_square_block_photo">
														<img src="../../../../../../../media/<?=$com['main_pic'];?>">
													</div>
													<div class="component_square_block_title"><?=$com['name'];?></div>
													<div class="component_square_block_price compPrice">(+ <?=ceil($com['price']+$com['nacenka_price']);?> грн)</div>
													<div class="component_square_block_checkmark"></div>
													<input class="compInput<? if ($cat_id == 1){echo ' corpus_input"'; } ?>" type="radio" name="<?=$coms[0]['amo_code'];?>" value="<?=$com_id;?>" <? if ($cat_id == 1){echo 'data-diskovod="'.$com['diskrom'].'"'; } ?> <? if(isset($_GET['complect'])){ if(in_array($com_id, $save_coms_arr)){ echo "checked"; } } else { if(in_array($com_id, $complect_arr)) {echo "checked"; } } ?>>
													<div class="block_badge_new">Новинка</div>
													<div class="block_badge_recommend">Рекомендуем</div>
												</label>
										 	
										 	<? } //endif in_array
										 } //end of foreach $coms?>
									</div>
									<!-- конец контейнера плиткой -->

								</div>
							</div>

							<!-- конец блока комплектующих плиткой-->
						<? } else { //Если Списком, а не плиткой 
							$inputs = my_query($db, "SELECT *, i.name as iname, c.name as cname, c.id as comid FROM inputs as i LEFT JOIN com_to_inputs as ci ON(i.id=ci.inputs_id) LEFT JOIN components as c ON(ci.com_id=c.id) WHERE i.comp_id='$comp_id' AND i.cat_id='$cat_id' ORDER BY c.price");
							


							$inputs_arr = [];
							$coms_noinputs = []; // id сомпонентов, которые вне вложенностей
							while ($input = $inputs->fetch_assoc()) {
								$inputs_arr[$input['inputs_id']][] = $input;
							} ?>

							<!-- Блок комплектующего -->

							<div class="components_accordion_block <? if ($comp_type == 'laptop') {echo 'laptop';} ?>" id="comto<?=$coms[0]['cid'];?>">
								<div class="components_accordion_header clearfix">
									<img src="../../../../../../img/blackarrowsmall.png" class="components_accordion_header_arrow">
									<div class="components_accordion_header_title"><?=$coms[0]['catname'];?></div>
									<div class="components_accordion_header_component_name">Не выбрано</div>
								</div>
								<div class="components_accordion_body">

									<!-- контейнер списком -->

									<div class="components_container_list clearfix">
										<div class="components_container_list_side_photo">
											<img src="" class="components_container_list_side_photo_img">
										</div>
										<div class="components_container_list_components">

									<? 
										// Проходимся по вложенностям, чтобы собрать массив с инпутами ВНЕ вложенностей
										foreach ($inputs_arr as $inputs_id => $input) { 
											foreach ($input as $com_id => $com) { 
												$coms_noinputs[] = $com['comid']; 
											}
										}

										foreach ($coms as $com_id => $com) { 
											if (in_array($com_id, $com_arr) && !in_array($com_id, $coms_noinputs) && $com['price'] != 1) { 
												if ($coms[0]['code_name'] == 'cpu') {
													$cpu_arr[] = $com_id;
												} ?>
											
												<label class="component_list_block mainComponent clearfix <? if ($com['new'] == '1') {echo 'new';} if ($com['recommend'] == '1') {echo 'recommend';} if ($com['economy'] == '1') {echo 'economy';} ?>" data-img="../../../../../../../media/<?=$com['main_pic'];?>" data-price="<?=ceil($com['price']+$com['nacenka_price']);?>" data-short="<?=$com['short_name'];?>">
													<div class="component_list_block_checkmark">
														<div class="component_list_block_checkmark_inner"></div>
													</div>
													<div class="component_list_block_title">
														<div class="list_recommend_bage">Рекомендуем</div>
														<div class="list_new_bage">New!</div>
														<span><?=$com['name'];?></span>
														</div>
													<div class="component_list_block_price compPrice">(+ <?=ceil($com['price']+$com['nacenka_price']);?> грн)</div>
													<div class="component_list_block_info <? if ($coms[0]['code_name'] == 'cpu') {echo 'cpuPopup accessoriesPopup';}else{ echo 'accessoriesPopup';}?>" modal-id="<?=$com_id;?>" data-type="com"></div>
													<input class="compInput" type="radio" name="<?=$coms[0]['amo_code'];?>" value="<?=$com_id;?>" <? if(isset($_GET['complect'])){ if(in_array($com_id, $save_coms_arr)){ echo "checked"; } } else { if(in_array($com_id, $complect_arr)) {echo "checked"; } } ?>>
												</label>

											<? } 
										}?>
										
									<? 
									foreach ($inputs_arr as $inputs_id => $input) { ?>
										<!-- компонент со вложенностью -->

											<div class="component_with_nesting_block">

												<!-- кнопка компонента со вложенностью -->

												<div class="component_with_nesting_block_button">
													<div class="component_with_nesting_block_button_checkmark">
														<div class="component_with_nesting_block_button_checkmark_inner"></div>
													</div>
													<div class="component_with_nesting_block_button_title"><?=$input[0]['iname'];?></div>
													<div class="component_with_nesting_block_button_price">(+ 567 грн)</div>
												</div>

												<!-- конец кнопки -->

												<!-- выпадающий список со вложенностью -->
												<div class="component_with_nesting_block_dropdown">
												<? foreach ($input as $com_id => $com) { 
													$coms_noinputs[] = $com['comid']; 
													if ($com['price'] != 1) { ?>


														<label class="component_list_block list_block_w_nesting mainComponent <? if ($com['new'] == '1') {echo 'new';} if ($com['recommend'] == '1') {echo 'recommend';} if ($com['economy'] == '1') {echo 'economy';} ?>" data-img="../../../../../../media/<?=$com['main_pic'];?>" data-price="<?=ceil($com['price']+$com['nacenka_price']);?>" data-short="<?=$com['short_name'];?>">
															<div class="component_list_block_checkmark">
																<div class="component_list_block_checkmark_inner"></div>
															</div>
															<div class="component_list_block_title">
																<div class="list_recommend_bage">Рекомендуем</div>
																<div class="list_new_bage">New!</div>
																<span><?=$com['cname'];?></span>
															</div>
															<div class="component_list_block_price compPrice">(+ <?=number_format(ceil($com['price']+$com['nacenka_price']), 0, '', ' ');?> грн)</div>
															<div class="component_list_block_info accessoriesPopup" modal-id="<?=$com['comid'];?>" data-type="com"></div>
															<input class="compInput" type="radio" name="<?=$coms[0]['amo_code'];?>" value="<?=$com['comid'];?>" <? if(isset($_GET['complect'])){ if(in_array($com['comid'], $save_coms_arr)){ echo "checked"; } } else { if(in_array($com['comid'], $complect_arr)) {echo "checked"; } } ?>>
														</label>
														
												<? }
												} ?>
												</div>
											</div>
											
									<? }//Конец foreach $inputs ?>

										</div>
									</div>

									<!-- конец контейнера списком -->

								</div>
							</div>

							<!-- конец блока комплектующей -->
							

						<? }
					}?>
						</div>
						<div class="tab_content_inner_bottom_buttons">
							<div data="tab_accesories" class="tcibb_next" id="toAccess">Далее ></div>
						</div>
					</div>

					<!-- конец конфигуратора -->

					<!-- Аксессуары -->

					<div class="tab_content_inner" id="tab_accesories_content">
						
							<div class="components_accordion">
							<? 
							$asses = my_query($db, "SELECT *, c.id as cid, ass.id as assid, c.name as catname, ass.name as assname FROM assessories as ass LEFT JOIN components_cat as c ON(c.id=ass.category_id) WHERE c.type='as' ORDER BY c.sort, ass.price");
							$asses_arr = [];
							while ($ass = $asses->fetch_assoc()) {
								if ($ass['cid'] == 37) { // если монитор
									$assid = $ass['assid'];
									$resolution = my_query($db, "SELECT * FROM param_vals WHERE component_id='$assid' AND param_id='32'", "select");
									$asses_arr[$ass['cid']][$resolution['value']][$ass['assid']] = $ass;
									$asses_arr[$ass['cid']][0] = $ass;
								} else {
									$asses_arr[$ass['cid']][$ass['assid']] = $ass;
									$asses_arr[$ass['cid']][0] = $ass;
								}
							}

							foreach ($asses_arr as $cat_id => $asses) { ?>
									<!-- Блок комплектующего плиткой-->

									<div class="components_accordion_block">
										<div class="components_accordion_header clearfix">
											<img src="../../../../../../img/blackarrowsmall.png" class="components_accordion_header_arrow">
											<div class="components_accordion_header_title"><?=$asses[0]['catname'];?></div>
											<div class="components_accordion_header_component_name">Не выбрано</div>
										</div>
										<div class="components_accordion_body">

											<!-- контейнер плиткой -->

											<div class="components_container">

												<!-- компонент плиткой -->
												<? 
												if ($cat_id == 37) { // если мониторы
													ksort($asses);
													foreach ($asses as $resol => $asses_x) { 
														if ($resol != 0) { ?>
														<div class="accessories_separator_block"><?=$resol;?></div>
														<? } ?>
															<?
															foreach ($asses_x as $ass_id => $ass) { 
																if ($ass_id != 0 && $ass['price'] != 1) { ?>
																	<label class="compotent_square_block" data-price="<? if($ass['sale'] == 1) { echo $ass['sale_price'];} else { echo $ass['price']+$ass['nacenka_price']; }?>">
																		<div class="component_zoom_icon accessoriesPopup" modal-id="<?=$ass_id;?>" data-type="ass"></div>
																		<div class="component_square_block_photo">
																			<img src="../../../../../../../media/<?=$ass['main_pic'];?>">
																		</div>
																		<div class="component_square_block_title"><?=$ass['assname'];?></div>
																		<div class="component_square_block_price">(+ <? if($ass['sale'] == 1) { echo $ass['sale_price'];} else { echo $ass['price']+$ass['nacenka_price']; }?> грн)</div>
																		<div class="component_square_block_checkmark"></div>
																		<input class="compInput" type="checkbox" name="ass" value="<?=$ass_id;?>" <? if(in_array($ass_id, $save_ass_arr)){ echo "checked"; } ?>>
																	</label>
																<? }
															} ?>
													<? }
												} else { // если НЕ мониторы
													foreach ($asses as $ass_id => $ass) { 
														if ($ass_id != 0 && $ass['price'] != 1) {?>
														
															<label class="compotent_square_block" data-price="<? if($ass['sale'] == 1) { echo $ass['sale_price'];} else { echo $ass['price']+$ass['nacenka_price']; }?>">
																<div class="component_zoom_icon accessoriesPopup" modal-id="<?=$ass_id;?>" data-type="ass"></div>
																<div class="component_square_block_photo">
																	<img src="../../../../../../../media/<?=$ass['main_pic'];?>">
																</div>
																<div class="component_square_block_title"><?=$ass['assname'];?></div>
																<div class="component_square_block_price">(+ <? if($ass['sale'] == 1) { echo $ass['sale_price'];} else { echo $ass['price']+$ass['nacenka_price']; }?> грн)</div>
																<div class="component_square_block_checkmark"></div>
																<input class="compInput" type="checkbox" name="ass" value="<?=$ass_id;?>" <? if(in_array($ass_id, $save_ass_arr)){ echo "checked"; } ?>>
															</label>
													 	
														<? }
													} //end of foreach $coms 
												} ?>
											</div>
											<!-- конец контейнера плиткой -->

										</div>
									</div>
								<? } ?>
							</div>
						<!-- </div> -->
						<div class="tab_content_inner_bottom_buttons">
							<div data="tab_configuration" class="tcibb_prev" id="backToConf">< Назад</div>
							<div data="tab_fps" class="tcibb_next" id="toFps">Далее ></div>
						</div>
					</div>

					<!-- конец аксессуаров -->


					<!-- ФПС -->

					<div class="tab_content_inner" id="tab_fps_content">
						<div class="tab_content_description">
							Мы отслеживаем новые выпуски самых интересных игр и тестируем FPS
наших компьютеров на различных настройках качества
в различных разрешениях экрана
						</div>
						<div class="tabs_fps_container">

							<!-- блок фпс -->
							<? 
							$fps_show = $prod['fps'];
							$min = strpos($fps_show, 'min');
							$mid = strpos($fps_show, 'mid');
							$max = strpos($fps_show, 'max');

							$set = '';
							if ($min == true) {
								$set = 'Средние';
							}

							if ($mid == true) {
								$set = 'Высокие';
							}

							if ($max == true) {
								$set = 'Ультра';
							}

							$fps_arr = explode(',', $fps_show);
							$games = my_query($db, "SELECT * FROM game_to_comp as gc LEFT JOIN games as g ON(gc.game_id=g.id) WHERE gc.comp_id='$comp_id'");
							$cur_game_arr = [];
							$g_cof = 0;
							$g_resolution = 0;
							$g_num = 0;

							/*
							
							HD
							$cur_game_arr['hd']
							$cur_game_arr['hd']['num']
							$cur_game_arr['hd']['percent']
							$cur_game_arr['hd']['color']
							
							Full HD
							$cur_game_arr['2k']

							4K
							$cur_game_arr['4k']


							*/

							while ($game = $games->fetch_assoc()) { 

								$cur_game_arr = [];

								foreach ($game as $key => $val) {
									// echo $val.' - ';
									// Смотрим есть ли среди названия стобика них слово color
									$col_pos = strpos($key, 'color');
									if ($col_pos !== false && $val != '') {
										
										// Делим ключ, чтобы выяснить что это
										$tmp_key_arr = explode('_', $key);

										$cur_game_arr[$tmp_key_arr[0]][$tmp_key_arr[1]] = $val;


										// Проверяем 
										// $hd = strpos($key, 'hd');
										// $fullhd = strpos($key, '2k');
										// $full4k = strpos($key, '4k');

									}

								}

								$resolution_count = count($cur_game_arr);

		if ($resolution_count != 0) { // Если в игре ничего нет

								// echo $resolution_count;
								// Если только 1 разрешение
								if ($resolution_count == 1) { 
									$k = key($cur_game_arr);

									$resolution = '';
									if ($k == 'hd') {
										$resolution = 'HD';
									}

									if ($k == '2k') {
										$resolution = 'Full HD';
									}

									if ($k == '4k') {
										$resolution = '4K';
									}
										


									?>
									
								<div class="tabs_fps_inner_block clearfix">
									<div class="tabs_fps_image">
										<img src="../../../../../../../media/<?=$game['pic'];?>">
									</div>
									<div class="tabs_fps_info">
										<div class="tabs_fps_game"><?=$game['name'];?></div>
										<div class="tabs_fps_settings"><?=$resolution;?></div>
										<? foreach ($cur_game_arr[$k] as $key_key => $val_val) { 
											
											$set = '';
											if ($key_key == 'min') {
												$set = 'Средние';
											}

											if ($key_key == 'mid') {
												$set = 'Высокие';
											}

											if ($key_key == 'max') {
												$set = 'Ультра';
											}

											?>
											<div class="tabs_fps_scale_block">
												<div class="tabs_fps_scale_block_inner">
													<div class="fps_title"><?=$set;?></div>
													<div class="fps_scale">
														<div class="fps_scale_filler filler_green" style="background-color: <?=$game[$k.'_'.$key_key.'_color'];?>; width: <?=$game[$k.'_'.$key_key.'_percent'];?>%"></div>
													</div>
												</div>
												<div class="tabs_fps_scale_block_inner">
													<div class="fps_number"><?=$game[$k.'_'.$key_key];?></div>
													<div class="fps_fps">FPS</div>
												</div>
											</div>
										<? } ?>
									</div>
								</div>
								<? } elseif ($resolution_count > 1) { // Если несколько разрешений, но 1 настройки

									// Массив, чтобы перенастроить его под несколько разрешений
									$tmp_game_arr = [];


									// $arr['2k']['max']
									// $arr['4k']['max']

									foreach ($cur_game_arr as $resol => $value) {
										$k = key($value);
										// $k = $cur_game_arr[$k]; // Здесь Настройка (min, max..)

										if ($k == 'min') {
											$set = 'Средние';
										}

										if ($k == 'mid') {
											$set = 'Высокие';
										}

										if ($k == 'max') {
											$set = 'Ультра';
										}
										// $set_k = key($value);

										$resolution = '';
										if ($resol == 'hd') {
											$resolution = 'HD';
										}

										if ($resol == '2k') {
											$resolution = 'Full HD';
										}

										if ($resol == '4k') {
											$resolution = '4K';
										}

										$tmp_game_arr[$resol] = $resolution;

									} ?>

								<div class="tabs_fps_inner_block clearfix">
									<div class="tabs_fps_image">
										<img src="../../../../../../../media/<?=$game['pic'];?>">
									</div>
									<div class="tabs_fps_info">
										<div class="tabs_fps_game"><?=$game['name'];?></div>
										<div class="tabs_fps_settings"><?=$set;?> Настройки</div>
										<? foreach ($tmp_game_arr as $resol_key => $resol_val) { ?>
											<div class="tabs_fps_scale_block">
												<div class="tabs_fps_scale_block_inner">
													<div class="fps_title"><?=$resol_val;?></div>
													<div class="fps_scale">
														<div class="fps_scale_filler filler_green" style="background-color: <?=$game[$resol_key.'_'.$k.'_color'];?>; width: <?=$game[$resol_key.'_'.$k.'_percent'];?>%"></div>
													</div>
												</div>
												<div class="tabs_fps_scale_block_inner">
													<div class="fps_number"><?=$game[$resol_key.'_'.$k];?></div>
													<div class="fps_fps">FPS</div>
												</div>
											</div>
										<? } ?>
									</div>
								</div>	
								<? }

		} // if count != 0
							} 
							// конец while games
								?>

							<!-- конец блока фпс -->
							
						</div>
						<div class="tab_content_inner_bottom_buttons">
							<div data="tab_accesories" class="tcibb_prev" id="backToAccess">< Назад</div>
							<div data="tab_video" class="tcibb_next" id="toVideo">Далее ></div>
						</div>
					</div>

					<!-- конец ФПС -->

					<!-- видео блок -->

					<div class="tab_content_inner" id="tab_video_content">
						<div class="tabs_video_container">
						<? if(!empty($videos_arr)){
							foreach ($videos_arr as $key => $video) { 
								$video_code = explode('watch?v=', $video); ?>	
								<div class="tab_content_description">
									Видео распаковки компьютеров от покупателей
								</div>
								<div class="tab_video">
									<iframe width="100%" height="100%" src="https://www.youtube.com/embed/<?=$video_code[1];?>" frameborder="0" allowfullscreen></iframe>
								</div>
							<? }
						} else { echo "<div class='tab_content_description'>Пока еще нет ни одного видео распаковки этого компьютера. Будь первым и пришли его нам.</div>"; } ?>
						</div>
						<div class="tab_content_inner_bottom_buttons">
							<div data="tab_fps" class="tcibb_prev" id="backToFps">< Назад</div>
							<div data="tab_comments" class="tcibb_next" id="toComments">Далее ></div>
						</div>
					</div>

					<!-- конец видео -->

					<!-- комменты -->

					<div class="tab_content_inner" id="tab_comments_content">
						<div class="tab_comments_header">ЗАДАЙТЕ СВОЙ ВОПРОС<br>ИЛИ ОСТАВЬТЕ ОТЗЫВ</div>
						<div id="mc-review"></div>
							<script type="text/javascript">
							cackle_widget = window.cackle_widget || [];
							cackle_widget.push({widget: 'Review', id: 56827, countContainer: 'comments_num'});
							(function() {
							    var mc = document.createElement('script');
							    mc.type = 'text/javascript';
							    mc.async = true;
							    mc.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://cackle.me/widget.js';
							    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(mc, s.nextSibling);
							})();
							</script>
							<a id="mc-link" href="http://cackle.me">Отзывы для сайта <b style="color:#4FA3DA">Cackl</b><b style="color:#F65077">e</b></a>
						
						<div class="tab_content_inner_bottom_buttons">
							<div data="tab_video" class="tcibb_prev" id="backToVideo">< Назад</div>
							<div class="tcibb_buy" id="toBuy">Купить</div>
						</div>
					</div>

					<!-- конец комментов -->

					<!-- модальная Процессоров -->

						<div class="cpu_modals" style="display:none;">
								<table>
									<tr>
							<? 
							$params = my_query($db, "SELECT * FROM param WHERE components_cat_id=7");
							while ($param = $params->fetch_assoc()) { ?>
										<td><?=$param['name'];?></td>
							<? } ?>
									</tr>

							<?
							$tmp_str = implode(',', $cpu_arr);
							$cpus = my_query($db, "SELECT *, p.id as pid, pv.component_id as pvcomid FROM param as p LEFT JOIN param_vals as pv ON(pv.param_id=p.id AND pv.component_id IN($tmp_str) ) WHERE p.components_cat_id='7'");
							$cpu_rows = [];
							
							foreach ($cpus as $cpu) {
								$cpu_rows[$cpu['pvcomid']][] = $cpu['value'];
							}

							foreach ($cpu_rows as $com_id => $val) {
								$proc = my_query($db, "SELECT * FROM components WHERE id='$com_id'", "select"); ?>
								<tr>
							<? 	foreach ($val as $param_val) { ?>
								<td><?=$param_val;?></td>
							<? 	} ?>
								</tr>
							<? } ?>
							</table>
						</div>

				</div>
			</div>
		</div>	
	</div>
	<script type="text/javascript">
	cackle_widget = window.cackle_widget || [];
	cackle_widget.push({widget: 'ReviewRating', id: 56827, def: '{{=it.stars}}{{=it.numr}} {{=it.reviews}}'});
	(function() {
	    var mc = document.createElement('script');
	    mc.type = 'text/javascript';
	    mc.async = true;
	    mc.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://cackle.me/widget.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(mc, s.nextSibling);
	})();
	</script>
</body>
</html>












