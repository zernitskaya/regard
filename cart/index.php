<? 
session_start();
include '../cms/php/db.php';

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

if (isset($_GET['paynum'])) {
	$_SESSION['paynum'] = $_GET['paynum'];
} elseif (!isset($_GET['paynum']) && !isset($_SESSION['paynum'])) {
	$_SESSION['paynum'] = 2;
}

if (isset($_GET['bank'])) {
	$_SESSION['bank'] = $_GET['bank'];
} elseif (!isset($_GET['bank']) && !isset($_SESSION['bank'])) {
	$_SESSION['bank'] = 'later';
}



?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>DigitalFury.pro — Авторизованный пользователь | Оформление заказа</title>
	<meta name="description" content="Новый покупатель. Интернет-магазин игровых компьютеров"> 
	<meta property="og:image" content="../../../og-alt.jpg" />
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Oswald:500&amp;subset=cyrillic" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="../css/slick.css">
	<script type="text/javascript">
		payNumIs = <?=$_SESSION['paynum'];?>;
	</script>
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery-ui.js"></script>
	<script src="../js/jquery.inputmask.bundle.js"></script>
	<script src="../js/slick.js"></script>
	<script type="text/javascript" src="../js/script.js"></script>
	<script type="text/javascript" src="../js/cart.js"></script>
	<script type="text/JavaScript" src="https://paylate.com.ua/js/jquery.js"></script>
	<script type="text/JavaScript" src="https://paylate.com.ua/js/jquery.maskedinput-1.2.2.js"></script>  <script type="text/JavaScript" src=" https://paylate.com.ua/js/start.js"></script> 
	<link rel="stylesheet" href=" https://paylate.com.ua/js/credit.css">
	<script>
	    var pl_options = {
	        pl_type: 2,
	        pl_n1: "Три платежа",
	        pl_n2: "Шесть платежей",
	        pl_n3: "Десять платежей",
	        pl_bc: "#4e6bb2",
	    };
	</script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('.cart_additional_products_slider_wrapper').slick({
				slidesToShow: 4,
				slidesToScroll: 1,
				nextArrow: $('.cart_additional_products_right'),
				prevArrow: $('.cart_additional_products_left')
			})
		})
	</script>
</head>
<body class="cart_page_body">

	<!-- модальное окно "детали" -->

	<div class="cart_modals_blackout"></div>

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

	<!-- модальные окна доп товаров -->

	<div class="add_items_blackout"></div>
	<div class="add_items_modal">
		<div class="add_items_close">×</div>
		<div class="add_items_modal_body">
			<h4>Самовывоз из нашего магазина в Киеве</h4>
			<p>С понедельника по пятницу с 10:00 до 19:00. Суббота, Воскресенье - выходной.
	Самовывоз осуществляется после согласования.</p>
			<p>С понедельника по пятницу с 10:00 до 19:00. Суббота, Воскресенье - выходной.
	Самовывоз осуществляется после согласования.</p>
			<p>С понедельника по пятницу с 10:00 до 19:00. Суббота, Воскресенье - выходной.
	Самовывоз осуществляется после согласования.</p>
			<p>С понедельника по пятницу с 10:00 до 19:00. Суббота, Воскресенье - выходной.
	Самовывоз осуществляется после согласования.</p>
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

	<!-- если такого купона нет -->

	<div class="coupon_error_blackout"></div>
	<div class="coupon_error_modal">
		<div class="error_modal_icon">!</div>
		<div class="error_modal_title">Внимание</div>
		<div class="error_modal_text">Такого промо-кода  не существует</div>
		<div class="error_modal_button">Ок</div>
	</div>

	<!--  -->

	<? include '../php/header.php'; ?>
	<div class="cart_body clearfix">
		<!-- если в корзине ничего нет -->

			<div class="emty_cart">
				<div class="emty_cart_text">Корзина пуста, вы не можете оформить заказ</div>
				<a href="../" class="emty_cart_button">Продолжить покупки</a>
			</div>

		<!--  -->
		<div class="cart_left_part">
			<div class="cart_items_container">
			<?

			foreach ($_SESSION['comps'] as $key => $val) {
				$comp_id = $val['comp_id'];
				$comp = my_query($db, "SELECT * FROM products WHERE id='$comp_id'", "select");
				$dops_arr = [];
				foreach ($val['dops'] as $comp_dop) {
					$dops_arr[] = $comp_dop['dop_id'];
				}

			?>
				<!-- единица товара -->

				<div class="cart_item clearfix">
					<div class="cart_item_photo">
						<img src="../../../media/<?=$val['corpus_pic'];?>" class="cart_item_photo_img">
					</div>
					<div class="cart_item_info">
						<div class="cart_item_info_title_block clearfix">
							<div class="cart_item_info_title">Игровой компьютер <?=$comp['name'];?></div>
							<!-- <div class="cart_item_info_quantity_block">
								<div class="quantity_select">
									<span class="quantity_select_num"><?=$val['count'];?></span>
									<span class="quantity_select_arrow"></span>
								</div>
								<div class="quantity_title">Количество</div>
								<div class="cart_item_info_quantity_block_dropdown" data-id="<?=$key;?>" data-type="comp">
									<div class="cart_item_info_quantity_block_dropdown_item">1</div>
									<div class="cart_item_info_quantity_block_dropdown_item">2</div>
									<div class="cart_item_info_quantity_block_dropdown_item">3</div>
									<div class="cart_item_info_quantity_block_dropdown_item">4</div>
								</div>
							</div> -->
							<div class="cart_item_info_title_block_sum">Сумма</div>
						</div>
						<div class="cart_item_info_details_and_price_block clearfix">
							<div class="cart_item_info_details_block clearfix">
								<div class="details_button" data-id="<?=$key;?>">Детали</div>
								<div class="cart_item_info_details_block_separator"></div>
								<a href="../../../../../computer/<?=$comp['url'];?>/<?=implode(',', $val['components']);?>/" class="edit_button">Редактировать</a>
								<div class="cart_item_info_details_block_separator"></div>
								<div class="remove_button" data-id="<?=$key;?>" data-type="comp">Удалить</div>
							</div>
							<div class="cart_item_info_details_and_price_block_separator"></div>
							<div class="additional_items_title">Дополнительные услуги к этому товару</div>
							<div class="additional_items_block">
							<? if($comp['garanty_price'] != 0){ 
								$garanty_price = $val['total_price']/100*$comp['garanty_price'];
							?>
								<div class="additional_items_block_item_label_outer clearfix">
									<label class="additional_items_block_item_label clearfix" data-comp="<?=$key;?>" data-dop-id="0" data-action="<? if(in_array(0, $dops_arr)) {echo "remove";}else{echo "add";} ?>">
										<input type="checkbox" <? if(in_array(0, $dops_arr)) {echo "checked";} ?>>
										<div class="additional_items_block_item_checkbox">
										</div>
										<div class="additional_items_block_item_title">Продлим гарантию на 2 года и защитим покупку от доп.рисков</div>
									</label>
									<img src="../img/cart-info.png" class="additional_items_block_item_info">
									<div class="additional_items_block_item_price"><?=number_format($garanty_price, 0, '', ' ');?> грн</div>
								</div>
							<? 	}
								$dops = my_query($db, "SELECT * FROM dops");
								while ($dop = $dops->fetch_assoc()) {
							?>
								<div class="additional_items_block_item_label_outer clearfix">
									<label class="additional_items_block_item_label clearfix" data-comp="<?=$key;?>" data-dop-id="<?=$dop['id'];?>" data-action="<? if(in_array($dop['id'], $dops_arr)) {echo "remove";}else{echo "add";} ?>">
										<input type="checkbox" <? if(in_array($dop['id'], $dops_arr)) {echo "checked";} ?>>
										<div class="additional_items_block_item_checkbox"></div>
										<div class="additional_items_block_item_title"><?=$dop['name'];?></div>
									</label>
									<? if ($dop['modal_text'] != '') { ?>
									<img src="../img/cart-info.png" class="additional_items_block_item_info">
									<? } ?>
									<div class="additional_items_block_item_price"><?=number_format($dop['price'], 0, '', ' ');?> грн</div>
								</div>
							<?
								}
							?>
							</div>
						</div>
						<div class="cart_item_info_price_block"><span><price><?=number_format($val['total_price'], 0, '', ' ');?></price> грн</span>
						</div>
						<div class="cart_item_quantity_block" data-type="comp" data-id="c<?=$key;?>">
							<div class="cart_item_quantity_block_minus">−</div>
							<div class="cart_item_quantity_block_field"><?=$val['count'];?></div>
							<div class="cart_item_quantity_block_plus">+</div>
						</div>
					</div>
				</div>

				<!-- конец товара -->
			<? 

			}

			?>

			<?

			foreach ($_SESSION['ass'] as $key => $val) {
				$ass_id = $val['id'];
				$ass = my_query($db, "SELECT * FROM assessories WHERE id='$ass_id'", "select");

			?>
				<!-- единица товара -->

				<div class="cart_item clearfix">
					<div class="cart_item_photo">
						<img src="../../../media/<?=$ass['main_pic'];?>" class="cart_item_photo_img">
					</div>
					<div class="cart_item_info">
						<div class="cart_item_info_title_block clearfix">
							<div class="cart_item_info_title"><?=$ass['name'];?></div>
							<!-- <div class="cart_item_info_quantity_block">
								<div class="quantity_select">
									<span class="quantity_select_num"><?=$val['count'];?></span>
									<span class="quantity_select_arrow"></span>
								</div>
								<div class="quantity_title">Количество</div>
								<div class="cart_item_info_quantity_block_dropdown" data-id="<?=$key;?>" data-type="ass">
									<div class="cart_item_info_quantity_block_dropdown_item">1</div>
									<div class="cart_item_info_quantity_block_dropdown_item">2</div>
									<div class="cart_item_info_quantity_block_dropdown_item">3</div>
									<div class="cart_item_info_quantity_block_dropdown_item">4</div>
								</div>
							</div> -->
							<div class="cart_item_info_title_block_sum">Сумма</div>
						</div>
						<div class="cart_item_info_details_and_price_block clearfix">
							<div class="cart_item_info_details_block access">
								<!-- <div class="details_button">Детали</div>
								<div class="cart_item_info_details_block_separator"></div>
								<a href="" class="edit_button">Редактировать</a>
								<div class="cart_item_info_details_block_separator"></div> -->
								<div class="remove_button" data-id="<?=$key;?>" data-type="ass">Удалить</div>
							</div>
						</div>
						<div class="cart_item_info_price_block"><span><price><?=number_format($val['total_price'], 0, '', ' ');?></price> грн</span>
						</div>
						<div class="cart_item_quantity_block" data-type="ass" data-id="a<?=$key;?>">
							<div class="cart_item_quantity_block_minus">−</div>
							<div class="cart_item_quantity_block_field"><?=$val['count'];?></div>
							<div class="cart_item_quantity_block_plus">+</div>
						</div>
					</div>
				</div>

				<!-- конец товара -->
			<? 

			}

			?>

				<!-- допродажи -->

				<div class="cart_additional_products">
					<div class="cart_additional_products_title">Рекомендуем</div>
					<img src="../img/cart-left-arrow.png" class="cart_additional_products_left">
					<img src="../img/cart-right-arrow.png" class="cart_additional_products_right">
					<div class="cart_additional_products_slider_wrapper">

					<?
					$ass_ids = []; // массив с id уже купленных аксесуаров
					foreach ($_SESSION['ass'] as $k => $val) {
						$ass_ids[] = $val['id']; 
					}
					$sale_ass = my_query($db, "SELECT * FROM assessories WHERE sale=1");
					while ($ass = $sale_ass->fetch_assoc()) {
						if (!in_array($ass['id'], $ass_ids)) {
					?>
						<div class="cart_additional_products_slide">
							<div class="cart_additional_products_slide_photo">
								<img src="../../../media/<?=$ass['main_pic'];?>">
							</div>
							<div class="cart_additional_products_slide_title">
								<?=$ass['name'];?>
							</div>
							<div class="cart_additional_products_slide_button_container clearfix">
								<div class="cart_additional_products_slide_button" data-id="<?=$ass['id'];?>">В корзину</div>
								<div class="cart_additional_products_slide_price"><?=number_format($ass['sale_price'], 0, '', ' ');?> грн</div>
							</div>
						</div>
					<?
						}
					}
					?>
					</div>
				</div>
			</div>


			<!-- оформление заказа -->

			<div class="checkout_block">
				<div class="checkout_block_title">Оформление заказа</div>

				<!-- шаг 1 -->

				<div class="checkout_step_one">
					<div class="checkout_block_subtitle clearfix">
						<div class="checkout_block_subtitle_num">1</div>
						<div class="checkout_block_subtitle_text">Контактные данные</div>
					</div>
					<div class="checkout_block_subtitle checkout_block_subtitle_absolute  clearfix">
						<div class="checkout_block_subtitle_num">2</div>
						<div class="checkout_block_subtitle_text">Выбор способа оплаты и доставки</div>
					</div>
					<div class="checkout_block_info_block clearfix">
						<div class="checkout_block_info_block_title">Имя и фамилия</div>
						<input type="text" name="name" class="checkout_block_info_block_input userName">
					</div>
					<div class="checkout_block_info_block clearfix">
						<div class="checkout_block_info_block_title">Город</div>
						<input type="text" name="city" class="checkout_block_info_block_input userCity">
					</div>
					<div class="checkout_block_info_block clearfix">
						<div class="checkout_block_info_block_title">Телефон</div>
						<input type="text" name="tel" class="checkout_block_info_block_input userPhone">
					</div>
					<div class="checkout_block_info_block clearfix">
						<div class="checkout_block_info_block_title">Эл. почта</div>
						<input type="email" name="email" class="checkout_block_info_block_input userMail">
						<div class="checkout_block_info_block_subitle">Если вы хотите получить заказ на почту</div>
					</div>
					<div class="checkout_to_step_two_button">Продолжить</div>	
				</div>

				<!-- шаг 2 -->

				<div class="checkout_step_two">
					<div class="checkout_block_subtitle clearfix">
						<div class="checkout_block_subtitle_num inactive">1</div>
						<div class="checkout_block_subtitle_text changed_name_and_tel">
							<span class="name_and_tel"></span>
							<span class="edit">Редактировать</span>
						</div>
					</div>
					<div class="checkout_block_subtitle clearfix">
						<div class="checkout_block_subtitle_num">2</div>
						<div class="checkout_block_subtitle_text">Выбор способа оплаты и доставки</div>
					</div>
					<div class="step_two_products_container">
					<?

					foreach ($_SESSION['comps'] as $key => $val) {
						$comp_id = $val['comp_id'];
						$comp = my_query($db, "SELECT * FROM products WHERE id='$comp_id'", "select");

					?>
						<!-- блок товара -->
						<div class="cart_step_two_product_block clearfix" data-id="c<?=$key;?>">
							<div class="cart_step_two_product_block_photo">
								<img src="../../../media/<?=$val['corpus_pic'];?>">
							</div>
							<div class="cart_step_two_product_block_info clearfix">
								<div class="cart_step_two_product_block_title"><?=$comp['name'];?></div>
								<div class="cart_step_two_product_block_price"><?=number_format($val['total_price'], 0, '', ' ');?> грн</div>
								<div class="cart_step_two_product_block_num"><span><?=$val['count'];?></span> шт</div>
							</div>
						</div>
						<!-- конец блока товара -->
					<?

					}

					?>

					<?

					foreach ($_SESSION['ass'] as $key => $val) {
						$comp_id = $val['id'];
						$comp = my_query($db, "SELECT * FROM assessories WHERE id='$comp_id'", "select");

					?>
						<!-- блок товара -->
						<div class="cart_step_two_product_block clearfix" data-id="a<?=$key;?>">
							<div class="cart_step_two_product_block_photo">
								<img src="../../../media/<?=$comp['main_pic'];?>">
							</div>
							<div class="cart_step_two_product_block_info clearfix">
								<div class="cart_step_two_product_block_title"><?=$comp['name'];?></div>
								<div class="cart_step_two_product_block_price"><?=number_format($val['total_price'], 0, '', ' ');?> грн</div>
								<div class="cart_step_two_product_block_num"><span><?=$val['count'];?></span> шт</div>
							</div>
						</div>
						<!-- конец блока товара -->
					<?

					}

					?>

					</div>
					<!-- блок доставки -->
					<div class="checkout_delivery_block clearfix">
						<div class="checkout_delivery_block_title">
							Доставка
							<div class="delivery_info_btn" id="db"></div>
						</div>
						<div class="checkout_delivery_block_body">
							<label class="checkout_delivery_label deliveryLabel">
								<input type="radio" name="delivery" value="Самовывоз из Новой Почты" checked>
								<div class="checkout_delivery_checkmark">
									<div class="checkout_delivery_checkmark_inner"></div>
								</div>
								<div class="checkout_delivery_label_title">Самовывоз из Новой Почты</div>
							</label>
							<!-- новая почта самовывоз -->
							<div class="nova_poshta_delivery_additional np_post">
								<!-- <div class="nova_poshta_delivery_additional_title">Город</div>
								<input type="text" name="" class="nova_poshta_delivery_additional_input nova_poshta_city"> -->
								<div class="nova_poshta_delivery_additional_title">Отделение Новой Почты</div>
								<input type="text" name="filial" class="nova_poshta_delivery_additional_input nova_poshta_department">
							</div>
							<!-- конец нп самовывоз -->
							<label class="checkout_delivery_label deliveryLabel">
								<input type="radio" name="delivery" value="Новая Почта курьером">
								<div class="checkout_delivery_checkmark">
									<div class="checkout_delivery_checkmark_inner"></div>
								</div>
								<div class="checkout_delivery_label_title">Новая Почта курьером</div>
							</label>
							<div class="nova_poshta_delivery_additional np_address">
								<div class="nova_poshta_delivery_additional_title">Введите Ваш адрес</div>
								<div class="nova_poshta_delivery_additional_address_inputs_block">
									<input type="text" name="street" class="nova_poshta_delivery_additional_address_input_street" placeholder="Улица">
									<input type="text" name="house" class="nova_poshta_delivery_additional_address_input_house" placeholder="Дом">
									<input type="text" name="flat" class="nova_poshta_delivery_additional_address_input_apart" placeholder="Квартира">
								</div>
							</div>
							<label class="checkout_delivery_label deliveryLabel">
								<input type="radio" name="delivery" value="Курьером по Киеву">
								<div class="checkout_delivery_checkmark">
									<div class="checkout_delivery_checkmark_inner"></div>
								</div>
								<div class="checkout_delivery_label_title">Курьером по Киеву</div>
							</label>
							<div class="nova_poshta_delivery_additional kiev_address">
								<div class="nova_poshta_delivery_additional_title">Введите Ваш адрес</div>
								<div class="nova_poshta_delivery_additional_address_inputs_block">
									<input type="text" name="street" class="nova_poshta_delivery_additional_address_input_street" placeholder="Улица">
									<input type="text" name="house" class="nova_poshta_delivery_additional_address_input_house" placeholder="Дом">
									<input type="text" name="flat" class="nova_poshta_delivery_additional_address_input_apart" placeholder="Квартира">
								</div>
							</div>
							<label class="checkout_delivery_label deliveryLabel">
								<input type="radio" name="delivery" value="Самовывоз из магазина">
								<div class="checkout_delivery_checkmark">
									<div class="checkout_delivery_checkmark_inner"></div>
								</div>
								<div class="checkout_delivery_label_title">Самовывоз из магазина</div>
							</label>
							<div class="shop_city_select_block">
								<div class="shop_city_select">
									<span class="selected_shop">Киев, ул. Авиаконструктора Антонова 43</span>
									<span class="shop_city_select_arrow"></span>
								</div>
								<div class="shop_city_select_dropdown">
									<div class="shop_city_select_dropdown_item" data-shop="Киев">Киев, ул. Авиаконструктора Антонова 43</div>
									<div class="shop_city_select_dropdown_item" data-shop="Харьков">Харьков, ул. Полтавский Шлях 9</div>
								</div>
							</div>
						</div>
					</div>
					<!-- конец блока доставки -->
					<div class="checkout_delivery_separator"></div>
					<!-- блок оплаты -->
					<div class="checkout_delivery_block clearfix">
						<div class="checkout_delivery_block_title">
						Оплата
						<div class="delivery_info_btn" id="payb"></div>
					</div>
						<div class="checkout_delivery_block_body">
							<label class="checkout_delivery_label payLabel">
								<input type="radio" name="paytype" value="Наличными" checked>
								<div class="checkout_delivery_checkmark">
									<div class="checkout_delivery_checkmark_inner"></div>
								</div>
								<div class="checkout_delivery_label_title">Наличными</div>
							</label>
							<label class="checkout_delivery_label payLabel">
								<input type="radio" name="paytype" value="Кредит">
								<div class="checkout_delivery_checkmark">
									<div class="checkout_delivery_checkmark_inner"></div>
								</div>
								<div class="checkout_delivery_label_title">Кредит</div>
							</label>
							<div class="privat_prod_inner privat_in_cart">
								<div class="privat_prod_flex_container">
			 					<div class="privat_flex_inner" style="text-align:left;">
			 						<label class="privat_radio_label" style="padding-left:0"><input type="radio" name="privat" class="privat_radio_input" value="privat" <? if($_SESSION['bank'] == 'privat') {echo "checked";} ?>>
			 							<div class="privat_radio">
			 								<div class="privat_radio_inner"></div>
			 							</div>
			 							<div class="privat_info_title">Мгновенная рассрочка</div>
			 							<img src="../../img/installments.png" class="pr_cr_img_1">
			 							<img src="../../img/privat_logo.png" class="pr_cr_img_2">
			 						</label>	
			 					</div>
			 					<div class="privat_flex_inner">
			 						<div class="privat_slider_wrapper">
			 							<div class="payment_number"><span><?=$_SESSION['paynum'];?></span> платежей на 
							 				<select class="privat_first_slider_select">
							 				<? for ($i=1; $i < 25; $i++) { 
							 					$mo = $_SESSION['paynum'] - 1;
							 					if ($mo == $i) {
							 						echo "<option selected>".$i."</option>";	
							 					} else {
							 						echo "<option>".$i."</option>";	
							 					}
							 				} ?>
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
				 				</div>
			 				</div>
			 				<div class="privat_prod_inner privat_in_cart">
								<div class="privat_prod_flex_container">
				 					<div class="privat_flex_inner" style="text-align:left;">
				 						<label class="privat_radio_label" style="padding-left:0"><input type="radio" name="privat" class="privat_radio_input" value="later" <? if($_SESSION['bank'] == 'later') {echo "checked";} ?>>
				 							<div class="privat_radio">
				 								<div class="privat_radio_inner"></div>
				 							</div>
				 							<div class="privat_info_title">Плати Позже</div>
				 							<img src="../../img/paylater.png" class="pr_cr_img_1" style="height: 50px;">
				 						</label>	
				 					</div>
				 				</div>
			 				</div>
			 				<div class="privat_prod_inner privat_in_cart">
								<div class="privat_prod_flex_container">
				 					<div class="privat_flex_inner" style="text-align:left;">
				 						<label class="privat_radio_label" style="padding-left:0"><input type="radio" name="privat" class="privat_radio_input" value="alfa_bank" <? if($_SESSION['bank'] == 'alfa') {echo "checked";} ?>>
				 							<div class="privat_radio">
				 								<div class="privat_radio_inner"></div>
				 							</div>
				 							<div class="privat_info_title">Альфа Банк</div>
				 							<img src="../../img/alfa-bank.png" class="pr_cr_img_1">
				 						</label>	
				 					</div>
				 				</div>
			 				</div>
							<label class="checkout_delivery_label payLabel">
								<input type="radio" name="paytype" value="Безналичный расчет">
								<div class="checkout_delivery_checkmark">
									<div class="checkout_delivery_checkmark_inner"></div>
								</div>
								<div class="checkout_delivery_label_title">Безналичный расчет</div>
							</label>
							<div class="paytype_beznal_additional_block">
								<div class="paytype_beznal_additional_block_title">На кого выставить счет</div>
								<input type="text" name="fop" class="paytype_beznal_additional_block_input">
							</div>
						</div>
					</div>
					<!-- конец блока оплаты -->
				</div>

			</div>

			<!-- конец блока оформления -->

		</div>
		<div class="cart_right_part">

			<!-- главный блок -->

			<div class="cart_main_info_block">
				<div class="cart_main_info_block_title">Cумма заказа</div>
				<div class="cart_main_info_block_info_block clearfix">
					<div class="cart_main_info_block_info_block_title">Итого к оплате:</div>
					<div class="cart_main_info_block_info_block_price promeshutok">12 000 грн</div>
				</div>
				<div class="cart_main_info_block_info_block clearfix">
					<div class="cart_main_info_block_info_block_title">Стоимость доставки:</div>
					<div class="cart_main_info_block_info_block_price">0 грн</div>
				</div>
				<div class="cart_main_info_block_info_block clearfix">
					<div class="cart_main_info_block_info_block_title coupon">Скидка по промокоду:</div>
					<div class="cart_main_info_block_info_block_price coupon">0 грн</div>
				</div>
				<div class="cart_main_info_block_separator"></div>
				<div class="cart_main_info_block_info_block clearfix">
					<div class="cart_main_info_block_info_block_title">К оплате:</div>
					<div class="cart_main_info_block_info_block_price main_price">12 000 грн</div>
				</div>
			</div>

			<!-- сблок с купоном -->

			<div class="cart_coupon_block">
				<div class="cart_coupon_block_title">Промо-код (необязательно):</div>
				<div class="cart_coupon_block_input_block clearfix">
					<form action="">
						<input type="text" class="cart_coupon_block_input">
						<input type="submit" value="Применить" class="cart_coupon_block_submit">
					</form>
				</div>
				<div class="cart_coupon_block_buy_btn">Оформить заказ</div>
				<div class="cart_coupon_block_checkout_buy_btn">Подтвердить заказ</div>
				<a href="" class="cart_coupon_block_return_btn">Продолжить покупки</a>
			</div>

			<!-- блок с товарами шаг 1 -->

			<div class="cart_products_side_container">
			
			<?

			foreach ($_SESSION['comps'] as $key => $val) {
				$comp_id = $val['comp_id'];
				$comp = my_query($db, "SELECT * FROM products WHERE id='$comp_id'", "select");

			?>
				<!-- блок товара -->
				<div class="cart_products_side_container_block clearfix" data-id="c<?=$key;?>">
					<div class="cart_products_side_container_block_photo">
						<img src="../../../media/<?=$val['corpus_pic'];?>">
					</div>
					<div class="cart_products_side_container_block_info">
						<div class="cart_products_side_container_block_title"><?=$comp['name'];?></div>
						<div class="cart_products_side_container_block_num_and_price clearfix">
							<div class="cart_products_side_container_block_num_and_price_num"><span><?=$val['count'];?></span> шт</div>
							<div class="cart_products_side_container_block_num_and_price_price"><span><?=number_format($val['total_price'], 0, '', ' ');?></span> грн</div>
						</div>
					</div>
				</div>
				<!-- конец блока товара -->
			<?

			}

			?>


			<?

			foreach ($_SESSION['ass'] as $key => $val) {
				$comp_id = $val['id'];
				$comp = my_query($db, "SELECT * FROM assessories WHERE id='$comp_id'", "select");

			?>
				<!-- блок товара -->
				<div class="cart_products_side_container_block clearfix" data-id="a<?=$key;?>">
					<div class="cart_products_side_container_block_photo">
						<img src="../../../media/<?=$comp['main_pic'];?>">
					</div>
					<div class="cart_products_side_container_block_info">
						<div class="cart_products_side_container_block_title"><?=$comp['name'];?></div>
						<div class="cart_products_side_container_block_num_and_price clearfix">
							<div class="cart_products_side_container_block_num_and_price_num"><span><?=$val['count'];?></span> шт</div>
							<div class="cart_products_side_container_block_num_and_price_price"><span><?=number_format($val['total_price'], 0, '', ' ');?></span> грн</div>
						</div>
					</div>
				</div>
				<!-- конец блока товара -->
			<?

			}

			?>
				<div class="cart_main_info_block_separator"></div>
				<div class="cart_main_info_block_info_block clearfix">
					<div class="cart_main_info_block_info_block_title">К оплате:</div>
					<div class="cart_main_info_block_info_block_price main_price">12 000 грн</div>
				</div>
				<a href="../" class="cart_coupon_block_return_btn">Продолжить покупки</a>
			</div>

		</div>
	</div>
</body>
</html>












