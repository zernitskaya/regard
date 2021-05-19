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

$prod_count = my_query($db, "SELECT COUNT(*) as c FROM products", "select");
$prod_count = $prod_count['c'];

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

if (isset($_GET['search'])) {
	$s = $_GET['search'];
} else {
	$s = '';
}

$filter_comps = my_query($db, "SELECT *, p.id as pid, p.name as cname, p.pic as cpic FROM products as p LEFT JOIN complect as c ON(p.id=c.comp_id) LEFT JOIN components as com ON(c.com_id=com.id) WHERE p.name LIKE '%$s%' OR p.all_components LIKE '%$s%' ORDER BY popular DESC");

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
	<title>Компьютеры - DigitalFury.pro | Купить компьютер в Киеве: цена, отзывы, продажа</title>
	<meta name="description" content="Компьютеры в интернет-магазине ➦ DigitalFury.pro. ☎: (800) 753-853, (067) 464-41-50, (050) 324-60-25, (063) 606-53-06. $ лучшие цены, ✈ быстрая доставка, ☑ гарантия!">
	<meta property="og:image" content="../../../og-alt.jpg" />
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Oswald:500&amp;subset=cyrillic" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="../css/slick.css">
	<script type="text/javascript">
		var search = '<?=$s;?>';
	</script>
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery-ui.js"></script>
	<script src="../js/slick.js"></script>
	<script type="text/javascript" src="../js/script.js"></script>
	<script type="text/javascript" src="../js/filters.js"></script>
</head>
<body class="filters_body">
	<? include '../php/header.php'; ?>
	<div class="filters_fps_block clearfix">
		<div class="filters_fps_block_info">
			<div class="filters_fps_block_info_title">Показать FPS в играх</div>
			<div class="filters_fps_block_info_inputs_block clearfix">
				<div class="select_block">
					<div class="select game_select">Dota 2</div>
					<div class="game_select_dropdown">
						<div class="game_select_dropdown_item change_fps_show" data-game="12">Dota 2</div>
						<div class="game_select_dropdown_item change_fps_show" data-game="17">GTA 5</div>
						<div class="game_select_dropdown_item change_fps_show" data-game="24">World of Tanks</div>
						<div class="game_select_dropdown_item change_fps_show" data-game="14">PUBG</div>
						<div class="game_select_dropdown_item change_fps_show" data-game="16">Battlefield 1</div>
						<div class="game_select_dropdown_item change_fps_show" data-game="23">Call of Duty: WWII</div>
					</div>
				</div>
				<div class="select_block">
					<div class="select resolution_select">Full HD</div>
					<div class="resolution_select_dropdown">
						<div class="resolution_select_dropdown_item change_fps_show" data-resolution="hd">HD</div>
						<div class="resolution_select_dropdown_item change_fps_show" data-resolution="2k">Full HD</div>
						<div class="resolution_select_dropdown_item change_fps_show" data-resolution="4k">4K</div>
					</div>
				</div>
				<div class="select_block">
					<div class="select quality_select">Средние</div>
					<div class="quality_select_dropdown">
						<div class="quality_select_dropdown_item change_fps_show" data-settings="min">Средние</div>
						<div class="quality_select_dropdown_item change_fps_show" data-settings="mid">Высокие</div>
						<div class="quality_select_dropdown_item change_fps_show" data-settings="max">Ультра</div>
					</div>
				</div>
				<!-- <select class="game_select" name="game">
					<option value="12" selected>Dota 2</option>
					<option value="17">GTA 5</option>
					<option value="24">World of Tanks</option>
					<option value="14">PUBG</option>
					<option value="16">Battlefield 1</option>
					<option value="23">Call of Duty: WWII</option>
				</select>
				<select class="resolution_select" name="resolution">
					<option value="hd">HD</option>
					<option value="2k" selected>FullHD</option>
					<option value="4k">4K</option>
				</select>
				<select class="quality_select" name="settings">
					<option value="min" selected>Средние</option>
					<option value="mid">Высокие</option>
					<option value="max">Ультра</option>
				</select> -->
			</div>
			<div class="filters_fps_block_info_subtitle">* Полученные показатели FPS являются усредненными и служат для демонстрации относительной производительности систем.</div>
		</div>
		<img src="../img/games/dota.png" class="filters_fps_block_image" id="dota">
		<img src="../img/games/gta.png" class="filters_fps_block_image" id="gta">
		<img src="../img/games/woft.png" class="filters_fps_block_image" id="wot">
		<img src="../img/games/pubg.png" class="filters_fps_block_image" id="pubg">
		<img src="../img/games/battlefield1.png" class="filters_fps_block_image" id="battlefield">
		<img src="../img/games/ww2.png" class="filters_fps_block_image" id="cod">
	</div>
	<div class="filters_container clearfix">
		<div class="filters_sidebar_block">
			<div class="filters_sidebar_title">Игровые ПК</div>
			<div class="filters_sidebar">
				<div class="filters_reset_block clearfix">
					<div class="filters_reset_block_title">Фильтры</div>
					<!-- reset button -->
					<div class="filters_reset_button change_filter">Сбросить</div>
					<!-- end of reset button -->
				</div>
				<div class="filters_slider_block clearfix">
					<div class="filters_slider_block_title">Цена</div>
					<div class="filters_slider_block_inputs clearfix">
						<input type="text" class="filters_slider_input_from">
						<div class="filters_slider_block_separator"></div>
						<input type="text" class="filters_slider_input_to">
					</div>
					<div class="filters_slider_block_slider"></div>
					<!-- apply price button -->
					<div class="filters_slider_block_apply_button change_filter price_change">Применить</div>
					<!-- end of apply price button -->
				</div>
				<div class="filters_perfomance_block">
					<div class="filters_perfomance_block_title">Производительность</div>
					<!-- CPU -->
					<div class="filters_perfomance_block_inner clearfix">
						<div class="filters_perfomance_block_inner_title">CPU</div>
						<div class="filters_perfomance_block_inner_buttons">
							<div class="filters_perfomance_button cpu change_filter left" data-value="1">Хорошо</div>
							<div class="filters_perfomance_button cpu change_filter central" data-value="2">Лучше</div>
							<div class="filters_perfomance_button cpu change_filter right" data-value="3">Супер</div>
						</div>
					</div>
					<!-- GPU -->
					<div class="filters_perfomance_block_inner clearfix">
						<div class="filters_perfomance_block_inner_title">GPU</div>
						<div class="filters_perfomance_block_inner_buttons">
							<div class="filters_perfomance_button gpu change_filter left" data-value="1">Хорошо</div>
							<div class="filters_perfomance_button gpu change_filter central" data-value="2">Лучше</div>
							<div class="filters_perfomance_button gpu change_filter right" data-value="3">Супер</div>
						</div>
					</div>
					<!-- end of GPU -->
				</div>
				<div class="custom_filters">

				<!-- custom filters block -->
				<?  

				foreach ($filter_cats as $key => $val) { ?>
					<div class="filters_block">
						<div class="filters_block_title"><?=$val[0]['cat_name'];?></div>
						<div class="filters_block_checkboxes">
							<!-- <label class="filters_block_filter_label">
								<input type="checkbox" class="change_filter" name="<?=$key;?>" value="" checked>
								<div class="filters_block_checkbox"></div>
								Все
							</label> -->
						<? foreach ($val as $f_key => $filter) { 
							if ($f_key != 0) { ?>
							<label class="filters_block_filter_label">
								<input type="checkbox" class="change_filter <? if($filter['f_name'] == 'Все'){echo "firstL";}?>" name="<?=$key;?>" value="<?=$f_key;?>" <? if($filter['f_name'] == 'Все'){echo "checked";}?>>
								<div class="filters_block_checkbox"></div>
								<?=$filter['f_name'];?>
							</label>
							<? }
						} ?>
						</div>
					</div>
				<!-- end of custom filters block -->
				<? } ?>
				
					<div class="filters_block">
						<div class="filters_block_title clearfix closed">Класс компьютера <img src="../img/arrowdown.svg" class="filters_block_arrow"></div>
						<div class="filters_block_checkboxes">
							<label class="filters_block_filter_label">
								<input type="checkbox" class="change_filter firstL" name="comp_class" value="0" checked>
								<div class="filters_block_checkbox"></div>
								Все
							</label>
						<? while ($class = $comp_classes->fetch_assoc()) { ?>
							<label class="filters_block_filter_label">
								<input type="checkbox" class="change_filter" name="comp_class" value="<?=$class['id'];?>">
								<div class="filters_block_checkbox"></div>
								<?=$class['class_name'];?>
							</label>
						<? } ?>
						</div>
					</div>

					<div class="filters_block">
						<div class="filters_block_title clearfix closed">VR ready <img src="../img/arrowdown.svg" class="filters_block_arrow"></div>
						<div class="filters_block_checkboxes">
							<label class="filters_block_filter_label">
								<input type="checkbox" class="change_filter firstL" name="vr" value="0" checked>
								<div class="filters_block_checkbox"></div>
								Все
							</label>
							<label class="filters_block_filter_label">
								<input type="checkbox" class="change_filter" name="vr" value="Нет">
								<div class="filters_block_checkbox"></div>
								Нет
							</label>
							<label class="filters_block_filter_label">
								<input type="checkbox" class="change_filter" name="vr" value="Да">
								<div class="filters_block_checkbox"></div>
								Да
							</label>
						</div>
					</div>



				</div>
			</div>	
		</div>
		<div class="filters_products_block">
			<div class="paginator_block clearfix">
				<div class="results_num">Подобрано <span class="filter_comp_count"><?=count($filter_comps_arr);?></span> товаров из <?=$prod_count;?></div>
				<div class="mobile_title_filters">Игровые ПК</div>
				<div class="paginator clearfix">
					<div class="paginator_left_arrow">
						<img src="../img/paginator-left.png">
					</div>
					<div class="paginator_page_block active">1</div>
					<div class="paginator_page_block">2</div>
					<div class="paginator_page_block">3</div>
					<div class="paginator_right_arrow">
						<img src="../img/paginator-right.png">
					</div>
				</div>
				<div class="sort_results clearfix">
					<div class="sort_title">Сортировать по</div>
					<div class="sort_select">Популярности</div>
					<div class="sort_dropdown">
						<div class="sort_dropdown_item change_filter" data-sort="priceup">Цене (от дешевых)</div>
						<div class="sort_dropdown_item change_filter" data-sort="pricedown">Цене (от дорогих)</div>
						<div class="sort_dropdown_item change_filter" data-sort="popular">Популярности</div>
					</div>
				</div>
			</div>
			<div class="filters_product_blocks_container">

				<!-- product block -->
			<? 
			if (count($filter_comps_arr) == 0) { ?>
				<isn style="color: #fff;font-size: 18px;font-weight: 400;margin-left: 20px;">По вашему запросу ничего не найдено...<isn></isn></isn>
			<? }

			$ii = 1;
			foreach ($filter_comps_arr as $key => $val) { 
				if ($ii <= 100) { 
					$ii++;?>
				<a href="../../computer/<?=$val[0]['url'];?>" target="_blank" class="product_block" data-prod="<?=$key;?>">
					<img src="../../img/new-badge.png" class="new_badge" <? if($val[0]['new'] == 1){echo "style='display:block;'";} ?>>
					<img src="../../img/hot-badge.png" class="hot_badge" <? if($val[0]['new'] == 1){echo "style='display:block;'";} ?>>
					<img src="../../img/sale-badge.png" class="sale_badge" <? if($val[0]['recomend'] == 1){echo "style='display:block;'";} ?>>
					<img src="../../img/top-badge.png" class="top_badge" <? if($val[0]['top'] == 1){echo "style='display:block;'";} ?>>
					<img src="../../../img/free-shipping.png" class="product_block_shipping">
					<div class="product_block_photo back_light">
						<img src="../../media/<?=$val[0]['cpic'];?>" alt="<?=$val[0]['alt'];?>">
					</div>
					<div class="product_block_title"><?=$val[0]['cname'];?></div>
					<div class="product_block_reviews_container clearfix">
						<div class="product_block_stars_and_reviews crr-cnt <? if($val[11]['vr_ready'] != 'Да') { echo 'no-vr'; } ?>" data-crr-url="http://digitalfury.pro/computer/<?=$val[0]['url'];?>/">
						</div>
						<? if($val[11]['vr_ready'] == 'Да') { ?>
						<div class="product_block_vr_ready_container">
							<img src="../img/vr-ready.png">
						</div>
						<? } ?>
					</div>

					<!-- fps line -->
					<?
						$fps = my_query($db, "SELECT * FROM game_to_comp WHERE game_id=12 AND comp_id='$key'", "select");
						$cur_fps = $fps['2k_min'];
						if ($cur_fps < 140) {
							$res_fps = 45 + $cur_fps;
						} elseif ($cur_fps >= 140 ) {
							$cur_fps = 140;
							$res_fps = 60 + $cur_fps;
						}

					?>
					<div class="fliters_fps_line_block clearfix">
						<div class="fliters_fps_line_block_title">FPS:
							<span class="fliters_fps_line_block_title_num"><?=$cur_fps;?></span>
						</div>
						<div class="fliters_fps_line_block_line">
							<div class="fliters_fps_line_block_line_inner <? if($res_fps < 100){echo "short";} ?>" style="width: <?=$res_fps;?>px"></div>
						</div>
					</div>

					<!-- end of fps line -->

					<div class="product_block_characteristics">
						<ul>
							<li><?=$val[0]['short_cpu'];?></li>
							<li><?=$val[0]['short_gpu'];?></li>
							<li><?=$val[0]['short_ram'];?></li>
							<li><?=$val[0]['short_mother'];?></li>
							<li><?=$val[0]['short_hdd'];?></li>
							<li><?=$val[0]['short_corpus'];?></li>
							<li><?=$val[0]['short_power'];?></li>
						</ul>
					</div>
					<div class="product_block_button_block clearfix">
						<div class="product_block_prices">
							<div class="product_block_prices_new"><?=number_format($val[0]['total_price'], 0, '', ' ');?></div>
							<div class="product_block_prices_old"><?=number_format($val[0]['old_nacenka'], 0, '', ' ');?></div>
						</div>
						<div class="product_block_button">
							<div class="product_block_button_title">Изменить</div>
							<div class="product_block_button_bg"></div>
						</div>
					</div>
				</a>
				<? }
			} ?>

				<!-- end of product block -->

			</div>
		</div>
	</div>
	<? include '../php/footer.php'; ?>
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












