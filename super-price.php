<?
$xml_base = 'xml/main.xml';
$base = simplexml_load_file($xml_base);

?>
<html>
<head>
	<meta charset="utf-8">
	<title>Регард</title>
	<meta name="description" content="Регард.com - магазин №1 игровых компьютеров в Украине. Оплата частями и мгновенная рассрочка от ПриватБанка. Официальная гарантия ☑ Бесплатная доставка по всей Украине ✈">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/product-mobile.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<? 
	$ie8 = strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE');
	$ie11 = strpos($_SERVER['HTTP_USER_AGENT'], 'Trident');
	$ieedge = strpos($_SERVER['HTTP_USER_AGENT'], 'Edge');
	$ief = strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox');
	if ($ie8 === true || $ie11 == true || $ieedge == true || $ief == true) { ?>
	<link rel="stylesheet" type="text/css" href="css/ie.css">
	<? } ?>
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<script src="js/jquery.js"></script>
	<script type="text/javascript">
		var ppPercentPrice = 0;
		$(document).ready(function(){
			addToNewPrice = 0;
			addToOldPrice = 0;
		})
	</script>
	<script src="js/script.js"></script>
	<script src="js/number.js"></script>
	<style type="text/css">
	.spib_timer>div{
		text-align: left !important;
	}
	</style>
</head>
<body>
	<div class="header header_gray clearfix">
		<div class="wrapper">
			<a href="index.html">
				<div class="logo">
					<img src="img/logo.svg">
					<h3>Компьютеры по цене комплектующих</h3>
				</div>
			</a>
			<!-- <div class="callback_btn">Заказать звонок</div> -->
			<div class="header_phones">
				<div class="header_phones_title">Бесплатно со всех номеров Украины</div>
				<div class="header_phones_nubmer">0 800 753 853</div>
				<div class="header_phones_inner">
					<div class="header_info_inner_block">
						ПН - ПТ с 09:00 до 21:00
					</div>
					<div class="header_info_inner_block">
						СБ - ВС с 09:00 до 20:00
					</div>
					<div class="header_info_inner_block">
						<img src="img/kievstar.png" style="margin-right: 3px;">
						(067) 464-41-50
					</div>
					<div class="header_info_inner_block">
						<img src="img/mts.jpg">
						(050) 324-60-25
					</div>
					<div class="header_info_inner_block">
						<img src="img/lifecell.png">
						(063) 606-53-06
					</div>
				</div>
			</div>
			<a href="https://vk.com/im?sel=-101179801" target="_blank" class="vk_consult vk_consult_main_page">
					<div class="vk_consult_image">
						<div class="vk_pulse_wrapper">
							<div class="pulse"></div>
						</div>
						<img src="img/vk_btn.png">
					</div>
					<div class="vk_consult_info">
						<div class="vk_consult_title">Консультант<br>Вконтакте</div>
						<div class="vk_consult_online">online</div>
					</div>
				</a>
		</div>
	</div>
	<div class="super_price_page_block">
		<img src="img/end2.png">
		<div class="super_price_info_block">
			<div class="spib_title">
				Супер цена!<br>
				Новогодние скидки.
				Успей купить!
			</div>
			<div class="spib_subtitle">До конца акции осталось:</div>
			<div class="spib_timer"><script src="<? echo $base->promo->code; ?>"></script></div>
			<div class="spib_do">Акция действует до <? echo $base->promo->word; ?>. Успей купить!</div>
			<a href="index.html" class="spib_btn">Вернуться на главную</a>
		</div>
	</div>
		<!-- BEGIN JIVOSITE CODE {literal} -->
<script type='text/javascript'>
(function(){ var widget_id = 'AXWIoi04ap';var d=document;var w=window;function l(){
var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();</script>
<!-- {/literal} END JIVOSITE CODE -->
<!— Yandex.Metrika counter —>
<script type="text/javascript">
(function (d, w, c) {
(w[c] = w[c] || []).push(function() {
try {
w.yaCounter39573860 = new Ya.Metrika({
id:39573860,
clickmap:true,
trackLinks:true,
accurateTrackBounce:true,
webvisor:true,
trackHash:true
});
} catch(e) { }
});

var n = d.getElementsByTagName("script")[0],
s = d.createElement("script"),
f = function () { n.parentNode.insertBefore(s, n); };
s.type = "text/javascript";
s.async = true;
s.src = "https://mc.yandex.ru/metrika/watch.js";

if (w.opera == "[object Opera]") {
d.addEventListener("DOMContentLoaded", f, false);
} else { f(); }
})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/39573860" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!— /Yandex.Metrika counter —>
<script type="text/javascript">(window.Image ? (new Image()) : document.createElement('img')).src = location.protocol + '//vk.com/rtrg?r=ZVAYFxvg/jkiju3YBH6sWFdRItFtZh75tsHv6Qka7Q*IGob4QogkLZWM*T6lyCI0wOXQ4n3OPwvvXB7Dmh8XbRq3zpxw4enADadJ8P8xFZMiQthkln9bxaGns8JXiX9ucoVuvbflmQCzlrC2ZppaTWuG/26NhIVx1QaG5/Zok/U-&pixel_id=1000034299';</script>
</body>	
</html>