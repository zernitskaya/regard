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
	<title>Доставка и Оплата</title>
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
</head>
<body>
	<? include '../php/header.php'; ?>
	<div class="chast_qa">
    	<div class="wrapper">
    		<div class="chast_sep_title">Доставка</div>
			<div class="chast_sep"></div>
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
				<div class="chast_sep_title" style="margin-top:50px;">Оплата</div>
			<div class="chast_sep"></div>
			<h4>Наличная</h4>
				<p>Оплата наличными производится исключительно в национальной валюте.</p>
				<p>Компьютеры до 15 000 грн. отправляется без предоплаты, свыше 15 000 грн. - предоплата 5%</p>
				<h4>Безналичными</h4>
				<p>Мы не являемся плательщиками НДС. Мы являемся ФОП на 2 и 3 группе единого налога. Счет может быть отправлен по электронной почте.</p>
				<h4>Мновенная рассрочка от ПриватБанка</h4>
				<p>Оформление рассрочки до 24 месяцев. Оплата равными частями. Переплата 2,9% от стоимости товара ежемесячно. Заказ может быть доставлен по Украине Новой Почтой!</p>
				<h4>Оплата частями от ПриватБанка</h4>
				<p>Оплата равными частями без переплат до 6 месяцев. Заказ может быть доставлен по Украине Новой Почтой!</p>
				<div class="chast_sep_title" style="margin-top:50px;">Обмен и возврат</div>
			<div class="chast_sep"></div>
			<h4>Обмен и возврат товара в течение первых 14 дней после покупки.</h4>
				<p>В соответствии с «Законом о защите прав потребителя» покупатели нашего магазина имеют право обменять или вернуть купленный у нас товар в течение первых 14 дней после покупки.
				Пожалуйста, обратите внимание — обмену или возврату подлежит только новый товар, который не был в употреблении и не имеет следов использования: царапин, сколов, потёртостей, программное обеспечение не подвергалось изменениям и т.п.</p>
				<br>
				<h4>А так же должно быть сохранено:</h4>
				
					<p>- полный комплект товара;<br>
					- целостность и все компоненты упаковки;<br>
					- ярлыки;<br>
					- заводская маркировка.</p>

				<p>Если товар не работает, обмен или возврат товара производится только при наличии заключения авторизованного производителем сервисного центра о том, что условия эксплуатации не нарушены.<br>
				<br>Обмен или возврат товара производится в нашем офисе по адресу:<span style="font-weight:500;"> Киев, ул. Авиаконструктора Антонова, 43.</span> С понедельника по пятницу с 10-00 до 18-00. Также, обмен или возврат товара может быть произведен через Новую Почту. Доставку оплачивает потребитель. 
				Для возврата денег потребитель должен иметь при себе паспорт. Возврат денег возможен в день возврата товара или, в случае отсутствия денег в кассе, на протяжении максимум 7 дней.</p>
    	</div>
    </div>
	<? include '../php/footer.php'; ?>
</body>
</html>












