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
	<title>Условия Пользования</title>
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
    		<div class="chast_sep_title">Условия использования сайта</div>
			<div class="chast_sep"></div>
			<h4>Внимание! Перед просмотром этого сайта внимательно прочитайте данные условия. Если вы не согласны с этими условиями, не используйте этот сайт.</h4>

			<h4>Использование сайта</h4>
			<p>Сайт DigitalFuty.pro (далее «Digitalfury») разрешает вам просматривать и загружать материалы этого сайта (далее «Сайт») только для личного некоммерческого использования, при условии сохранения вами всей информации об авторском праве и других сведений о праве собственности, содержащихся в исходных материалах и любых их копиях. Запрещается изменять материалы этого Сайта, а также распространять или демонстрировать их в любом виде или использовать их любым другим образом для общественных или коммерческих целей. Любое использование этих материалов на других сайтах или в компьютерных сетях запрещается.</p>

			<h4>Oтказ от ответственности</h4>
			<p>Digitalfury в любое время без уведомления может вносить изменения в материалы и услуги, предоставляемые на этом Сайте, а также в упомянутые в них продукты и цены.</p>

			<h4>Обратная связь и комментарии</h4>
			<p>Обращаясь к нам или оставляя комментарии на сайте, вы несете ответственность, что данное сообщение не является незаконным, вредоносным, угрожающим, клеветническим, оскорбляет нравственность, нарушает авторские права, пропагандирует ненависть и/или дискриминацию людей по расовому, этническому, половому, религиозному, социальному признакам, содержит оскорбления в адрес конкретных лиц или организаций, а также каким либо иным образом нарушает действующее законодательство Украины. Вы соглашаетесь, что любое ваше сообщение Digitalfury может удалять без вашего на то согласия, а также безвозмездно использовать по своему усмотрению. Digitalfury не несет ответственности за любую информацию размещенную пользователями Сайта.</p>

			<h4>Использование персональных данных</h4>
			<p>Мы используем различные технологии для сбора и хранения информации, когда вы посещаете сайт Digitalfury. Это может включать в себя запись одного или нескольких куки или анонимных идентификаторов. Мы также используем куки и анонимные идентификаторы, когда вы взаимодействуете с услугами, предложенными нашими партнерами, такими как рекламные услуги, например, которые могут появиться на других сайтах.</p>
    	</div>
    </div>
	<? include '../php/footer.php'; ?>
</body>
</html>












