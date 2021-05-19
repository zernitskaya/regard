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
$sale_img = my_query($db, "SELECT * FROM sale_img ORDER BY id DESC LIMIT 1", "select");
$modal = my_query($db, "SELECT * FROM modal ORDER BY id DESC LIMIT 1", "select");
$blocks = my_query($db, "SELECT * FROM blocks ORDER BY id DESC LIMIT 1", "select");
$info_blocks = my_query($db, "SELECT * FROM sale_info_blocks");

$info_arr = [];
while ($block = $info_blocks->fetch_assoc()) {
	$info_arr[] = $block;
}

if ($blocks['timer'] == '') {
	$timer = date('Y/m/d');
} else {
	$t = strtotime($blocks['timer']);
	$timer = date('Y/m/d', $t);
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Digital.Fury — Новости, статьи и обзоры / Акции интернет-магазина — DigitalFury | Акция! Купи компьютер и получи игровую клавиатуру с LED-подсветкой в подарок!</title>
	<meta name="description" content="Акция! Получи в подарок игровую клавиатуру с LED-подсветкой!. Интернет-магазин персональных компьютеров DigitalFury.pro"> 
	<meta property="og:image" content="../../../og-alt.jpg" />
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Oswald:500&amp;subset=cyrillic" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="../css/slick.css">
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery.inputmask.bundle.js"></script>
	<script src="../js/slick.js"></script>
	<script src="../js/countdown.js"></script>
	<script type="text/javascript" src="../js/script.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#js-countDown').yuukCountDown({
				endtime: '<?=$timer;?> 10:00:00',
			});
		})

	</script>		
</head>
<body class="filters_body">
	<? include '../php/header.php'; ?>

	<!-- main screen -->

	<div class="sale_main_screen">
		<div class="fixed_video">
			<video muted autoplay loop>
				<!-- <source src="../video-bg.mp4"> -->
			</video>
		</div>
		<div class="video_block">
			<img src="../../../media/<?=$sale_img['pic'];?>" class="sale_img">
			<div class="countdown">
  				<div class="countdown-time">
    				<ul class="clearfix" id="js-countDown">
				    </ul>
				 </div>
			</div>
		</div>
	</div>
	<div class="sale_body">

		<!-- top block -->

		<div class="sale_body_top_container">
			<div class="sale_body_top_block clearfix">
				<div class="sale_top_block_photo">
					<img src="../../../media/<?=$info_arr[0]['pic'];?>">
				</div>
				<div class="sale_top_block_info">
					<div class="sale_top_block_title"><?=$info_arr[0]['header'];?></div>
					<div class="sale_top_block_text"><?=$info_arr[0]['text'];?></div>
				</div>
			</div>
			<div class="sale_body_top_block clearfix">
				<div class="sale_top_block_photo">
					<img src="../../../media/<?=$info_arr[1]['pic'];?>">
				</div>
				<div class="sale_top_block_info">
					<div class="sale_top_block_title"><?=$info_arr[1]['header'];?></div>
					<div class="sale_top_block_text"><?=$info_arr[1]['text'];?></div>
				</div>
			</div>
			<div class="sale_body_top_block clearfix">
				<div class="sale_top_block_photo">
					<img src="../../../media/<?=$info_arr[2]['pic'];?>">
				</div>
				<div class="sale_top_block_info">
					<div class="sale_top_block_title"><?=$info_arr[2]['header'];?></div>
					<div class="sale_top_block_text"><?=$info_arr[2]['text'];?></div>
				</div>
			</div>
		</div>

		<!-- middle block -->
<?

$comps_2 = my_query($db, "SELECT * FROM products WHERE sale_2=1 ORDER BY total_price LIMIT 2");

?>
		<div class="sale_body_middle_container">
		<? 
		$i = 1;
		while ($comp = $comps_2->fetch_assoc()) { ?>
			<a href="../../../computer/<?=$comp['url'];?>" class="sale_wide_product_block clearfix">
				<div class="sale_wide_product_photo">
					<img src="../../../media/<?=$comp['pic'];?>" class="sale_wide_product_img" alt="<?=$comp['alt'];?>">
					<img src="../img/free-shipping.png" class="sale_wide_product_delivery">
				</div>
				<div class="sale_wide_product_info">
					<div class="sale_wide_product_title"><?=$comp['name'];?></div>
					<div class="sale_wide_product_characterictic"><?=$comp['short_cpu'];?></div>
					<div class="sale_wide_product_characterictic"><?=$comp['short_gpu'];?></div>
					<div class="sale_wide_product_characterictic"><?=$comp['short_ram'];?></div>
					<div class="sale_wide_product_characterictic"><?=$comp['short_mother'];?></div>
					<div class="sale_wide_product_characterictic"><?=$comp['short_hdd'];?></div>
					<div class="sale_wide_product_characterictic"><?=$comp['short_corpus'];?></div>
					<div class="sale_wide_product_characterictic"><?=$comp['short_power'];?></div>
					<div class="sale_wide_product_button_block clearfix">
						<div class="sale_wide_product_price_block">
							<div class="sale_wide_product_old_price"><?=number_format($comp['old_nacenka'], 0, '', ' ');?> грн</div>
							<div class="sale_wide_product_new_price"><?=number_format($comp['total_price'], 0, '', ' ');?> грн</div>
						</div>
						<div class="sale_wide_product_button">Изменить</div>
					</div>
				</div>
			</a>
			<? if ($i = 1) { ?>
				<div class="sale_body_middle_container_separator"></div>
			<? $i++;
			}
		} ?>
		</div>

		<!-- bottom block -->
<?

$comps_5 = my_query($db, "SELECT * FROM products WHERE sale_5=1 ORDER BY total_price LIMIT 5");

?>

		<div class="sale_body_bottom_container">
			<!-- product block -->
		<? 
		$i = 1;
		while ($comp = $comps_5->fetch_assoc()) { ?>
			<a href="../../../computer/<?=$comp['url'];?>" class="sale_product_block">
				<div class="sale_product_block_photo">
					<img src="../../../media/<?=$comp['pic'];?>" class="sale_product_block_img" alt="<?=$comp['alt'];?>">
					<img src="../img/free-shipping.png" class="sale_product_block_delivery">
				</div>
				<div class="sale_product_block_info">
					<div class="sale_product_block_title"><?=$comp['name'];?></div>
					<div class="sale_product_block_characteristic"><?=$comp['short_cpu'];?></div>
					<div class="sale_product_block_characteristic"><?=$comp['short_gpu'];?></div>
					<div class="sale_product_block_characteristic"><?=$comp['short_ram'];?></div>
					<div class="sale_product_block_characteristic"><?=$comp['short_mother'];?></div>
					<div class="sale_product_block_characteristic"><?=$comp['short_hdd'];?></div>
					<div class="sale_product_block_characteristic"><?=$comp['short_corpus'];?></div>
					<div class="sale_product_block_characteristic"><?=$comp['short_power'];?></div>
					<div class="sale_product_block_old_price"><?=number_format($comp['old_nacenka'], 0, '', ' ');?> грн</div>
					<div class="sale_product_block_new_price"><?=number_format($comp['total_price'], 0, '', ' ');?> грн</div>
					<div class="sale_product_block_button">Изменить</div>
				</div>
			</a>
			<? if ($i <= 4) { ?>
			<div class="sale_body_bottom_container_separator"></div>
			<? $i++;
			}
		} ?>
		</div>

	</div>
	<? include '../php/footer.php'; ?>
</body>
</html>












