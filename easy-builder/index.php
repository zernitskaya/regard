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
	<title>Easy Builder</title>
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
		$(document).ready(function(){
			$('.phone_mask').inputmask('+38(099)-999-99-99')

			// builder

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
		})
	</script>
</head>
<body>
	<? include '../php/header.php'; ?>
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
	<? include '../php/footer.php'; ?>
</body>
</html>












