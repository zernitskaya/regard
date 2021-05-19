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
	<title>Помощь и Вопросы</title>
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
	<script type="text/javascript">
		$(document).ready(function(){
			$('.accordion_btn').on('click', function(){
				$(this).next().slideToggle();
				$(this).toggleClass('active');
			})
		})
	</script>
</head>
<body class="faq_body">
	<? include '../php/header.php'; ?>
	<div class="questions">
		<div class="wrapper">
			<h2>Часто задаваемые вопросы</h2>
			<div class="accordion">
				<div class="accordion_block">
					<div class="accordion_btn"><span>Как происходит оплата и доставка компьютера?</span></div>
					<div class="accordion_content">
						<p>
						Компания "Регард" осуществляет доставку выбранного Вами компьютера в Киев, Харьков, Одессу, Днепропетровск, Запорожье, Львов, Кривой рог и в любую другую точку Украины!
						</p>
 						<p>
						Доставка компьютера службой "Новая Почта" по всей Украине:
						- Сборка и отправка компьютера в день оплаты.
						- Сроки доставки 1-2 дня.
						 </p>
 						<p>
						Оплата
						1. Наложенный платеж (оплата при получении)
						- Пересылку денег оплачивает клиент:
						25 грн. + 2% от суммы товара.
						 </p>
 						<p>
						2. Оплата заказа на карту ПриватБанка (100% предоплата)
						- При внесении 100% предоплаты вы экономите, так как не платите (25 грн. + 2.5%) за пересылку денег "Новой Почте".
						 </p>
 						<p>
						Транспортная компания обеспечит своевременную доставку компьютера, а мы позаботимся о качестве и надежности упаковки.
						 </p>
 						<p>
						Самовывоз осуществляется по предварительной договоренности о времени, по адресу:
						г. Харьков, ул. Полтавский Шлях 9
						г. Киев, Авиаконструктора Антонова 43,
						 </p>
 						<p>
						*Оплата производится исключительно в гривнах
						</p>
					</div>
				</div>
				<div class="accordion_block">
					<div class="accordion_btn"><span>Какая гарантия дается на купленный компьютер?</span></div>
					<div class="accordion_content">
					<p>
					Купив компьютер в интернет-магазине "Регард" вы получаете гарантийный талон.
					</p>
 					<p>
					Гарантийное обслуживание распространяется на каждое комплектующее отдельно,
					сроком от 12 до 36 месяцев.
					</p>
 					<p>
					Гарантийный талон необходимо сохранить на протяжении всего срока эксплуатации компьютера.
					</p>
 					<p> 
					Консультацию по вопросам гарантийного обслуживания Вы можете получить по телефону указанному в гарантии, либо по электронной почте service@регард.com
					</p>
					</div>
				</div>
				<div class="accordion_block">
					<div class="accordion_btn"><span>Я могу обменять или вернуть товар?</span></div>
					<div class="accordion_content">
						<p>
						Да, вы можете обменять или вернуть компьютер в течение 14 дней после покупки. Гарантирует вам это право «Закон о защите прав потребителя».
 						</p>
 					<p>
						Клиент теряет право на бесплатное гарантийное обслуживание компьютера в следующих случаях:
						</p>
 					<p> 
						- Нарушение пломб, стикеров, наклеек, обнаружение следов их переклеивание или ремаркирование, потертостей на системном блоке приведших к невозможности прочитать серийный номер, марку тип и т. п.
						- системный блок не полностью укомплектован или нарушена целостность упаковки
						- не сохранены все ярлыки и заводская маркировка
						- отсутствие на гарантийном талоне фирменной печати или подписи и фамилии менеджера.
						</p>
					</div>
				</div>
				<div class="accordion_block">
					<div class="accordion_btn"><span>Куда обращаться при возникновении проблем с ПК?</span></div>
					<div class="accordion_content">
						<p>
						Для владельцев компьютеров  работает телефонная "горячая линия"
 						</p>
 					<p> 
						(063)-606-53-06, (067)-464-41-50, (050)-324-60-25.
						</p>
 					<p>  
						"Горячая линия" Регард доступна с 10:00 до 19:00. Позвонив по указанным телефонам, вы сможете бесплатно получить оперативную консультацию специалистов компании по любым вопросам, связанным с компьютерами Регард.
						</p>
 					<p>  
						Также для устранения неполадок вы можете приехать в наш магазин, где будет сделана диагностика и ремонт компьютера.
						</p>
					</div>
				</div>
				<div class="accordion_block">
					<div class="accordion_btn"><span>Системный блок будет опечатан пломбами?</span></div>
					<div class="accordion_content">
						<p>
						Ни один системный блок не опечатывается заводскими пломбами.
						Это необходимо для того, чтобы Вы имели полный доступ к внутренностям системного блока.
						При этом сохраняется гарантия на все комплектующие.
						Также вы получите возможность самостоятельно модернизировать и обслуживать данный компьютер.
						</p>
					</div>
				</div>
				<div class="accordion_block">
					<div class="accordion_btn"><span>Какие сроки сборки компьютера на заказ?</span></div>
					<div class="accordion_content">
						<p>
						Специалисты интернет-магазина компьютеров "Регард" соберут любую сборку компьютера по Вашим требованиям в течении 1 дня.
						Проводим обязательный 3-х часовой нагрузочный стресс-тест всех комплектующих для выявления неполадок данного компьютера.
						</p>
					</div>
				</div>
				<div class="accordion_block">
					<div class="accordion_btn"><span>Возможно ли изменить конфигурацию компьютера?</span></div>
					<div class="accordion_content">
						<p>		
						Благодаря большому опыту наших специалистов мы подобрали максимально сбалансированные варианты компьютеров. Каждый из этих вариантов компьютеров Вы можете изменить на свое усмотрение.
 						</p>
 						<p>
						Обратитесь за бесплатной консультацией по сборке компьютера к специалистам компании Регард:<br>
						(063)-606-53-06, (067)-464-41-50, (050)-324-60-25
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="hypercomments" id="comments">
		<div class="wrapper">
			<h2>Задайте свой вопрос<br>или оставьте отзыв</h2>
			<div id="hypercomments_widget"></div>
			<script type="text/javascript">
			_hcwp = window._hcwp || [];
			_hcwp.push({widget:"Stream", widget_id: 81051, href:"http://xn--80afeb8cd.com/"});
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
		</div>
	</div>
	<? include '../php/footer.php'; ?>
</body>
</html>












