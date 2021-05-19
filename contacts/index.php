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
	<title>Контакты</title>
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
	<script src="../js/jquery.inputmask.bundle.js"></script>
	<script type="text/javascript" src="../js/script.js"></script>
	<script type="text/javascript" src="../js/filters.js"></script>
	<script type="text/javascript">
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
</head>
<body>
	<? include '../php/header.php'; ?>
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
						Пн-Пт с 9:30 до 21:00<br>
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
						с 8:00 до 21:00 (без выходных)
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
							<img src="../../../../../img/vk.png">
						</a>
						<a href="" class="social_block" target="_blank">
							<img src="../../../../../img/youtube.png">
						</a>
						<a href="https://instagram.com/_u/regard_pc?r=sun1" class="social_block" target="_blank">
							<img src="../../../../../img/instagram.png">
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="map" id="map"></div>
	</div>
	<? include '../php/footer.php'; ?>
	<script src="//assets.pcrl.co/js/jstracker.min.js"></script>
</body>
</html>












