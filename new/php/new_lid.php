<?


/* 
Поля для лида

Город - UF_CRM_1488792107
Название комп - UF_CRM_1488792129
Процессор - UF_CRM_1488792155
Видеокарта - UF_CRM_1488792255
Кулер - UF_CRM_1488792328
SSD - UF_CRM_1488792417
Материнка - UF_CRM_1488792467
Дисковод - UF_CRM_1488792480
Корпус - UF_CRM_1488792535
Монитор - UF_CRM_1488792546
Мышь - UF_CRM_1488792563
Windows - UF_CRM_1488792600
Комплект - UF_CRM_1488792628
Microsoft Office - UF_CRM_1488792731
Предполагаемый бюджет - UF_CRM_1488792912
Общая стоимость - UF_CRM_1488793024
Отделение Новой Почты - UF_CRM_1488793284
Номер ТТН - UF_CRM_1488793309
Оперативка - UF_CRM_1488793630
Жесткий диск - UF_CRM_1488793674
Блок питания - UF_CRM_1488793697
Клавиатура - UF_CRM_1488793833
Wi-fi - UF_CRM_1488793971
utm_source - UF_CRM_1488794462
utm_medium - UF_CRM_1488794478
utm_compaign - UF_CRM_1488794619
utm_content - UF_CRM_1488794635
utm_term - UF_CRM_1488794659
Коврик - UF_CRM_1505727926
Кабель - UF_CRM_1505727943
Гарнитура - UF_CRM_1505727951
wifi-адаптер - UF_CRM_1505727973
ПО - UF_CRM_1505820555
Вентилятор - UF_CRM_1505820544

*/

require 'mail/PHPMailerAutoload.php';
$type = $_POST['type'];
$utm_term = $_POST['utm_term'];
$utm_source = $_POST['utm_source'];
$utm_medium = $_POST['utm_medium'];
$utm_compaign = $_POST['utm_compaign'];
$utm_content = $_POST['utm_content'];
$city = $_POST['city'];

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->CharSet = 'UTF-8';

$mail->Host       = "mail.ukraine.com.ua"; // SMTP server example
$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->Port       = 25;                    // set the SMTP port for the GMAIL server
$mail->Username   = "robot@xn--80afeb8cd.com"; // SMTP account username example
$mail->Password   = "r0BoT@iskand3r";        // SMTP account password example

$mail->setFrom('robot@регард.com', 'Регард.com');
$mail->isHTML(true);        


// Если запрос с Easy-builder
if ($type == 'easybuilder') {
	$name = $_POST['name'];
	$tel = $_POST['tel'];
	$email = $_POST['email'];
	$summa = $_POST['summa'];
	$tasks = $_POST['tasks'];
	$comment = urlencode($_POST['comment']);

	$mail->addAddress('regard.ukraine@gmail.com');
	$mail->Subject = '[Лид с Easy Builder]';
	$mail->Body    = "Зайдите в битрикс, чтобы посмотреть подробности";

	$data = file_get_contents('https://regard24.bitrix24.ua/crm/configs/import/lead.php?LOGIN=Vangeliev007@gmail.com&PASSWORD=Zxc123456789&TITLE=Лид с Easy Builder&EMAIL_HOME='.$email.'&PHONE_MOBILE='.$tel.'&NAME='.$name.'&COMMENTS='.$tasks.' / '.$comment.'&UF_CRM_1488792912='.$summa.'&UF_CRM_1488794659='.$utm_term.'&UF_CRM_1488794635='.$utm_content.'&UF_CRM_1488794619='.$utm_compaign.'&UF_CRM_1488794478='.$utm_medium.'&UF_CRM_1488794462='.$utm_source.'&UF_CRM_1488792107='.$city);
}

// Если запрос с Подборки аксессуаров
if ($type == 'acsessor') {
	$name = $_POST['name'];
	$tel = $_POST['tel'];
	$comment = urlencode($_POST['comment']);

	$mail->addAddress('regard.ukraine@gmail.com');
	$mail->Subject = '[Лид с Подборки аксессуаров]';
	$mail->Body    = "Зайдите в битрикс, чтобы посмотреть подробности";

	$data = file_get_contents('https://regard24.bitrix24.ua/crm/configs/import/lead.php?LOGIN=Vangeliev007@gmail.com&PASSWORD=Zxc123456789&TITLE=Лид с Подборки аксессуаров&PHONE_MOBILE='.$tel.'&NAME='.$name.'&COMMENTS='.$comment.'&UF_CRM_1488794659='.$utm_term.'&UF_CRM_1488794635='.$utm_content.'&UF_CRM_1488794619='.$utm_compaign.'&UF_CRM_1488794478='.$utm_medium.'&UF_CRM_1488794462='.$utm_source.'&UF_CRM_1488792107='.$city);
}

// Если запрос с формы рассрочки
if ($type == 'rassrochka') {
	$name = $_POST['name'];
	$tel = $_POST['tel'];

	$mail->addAddress('regard.ukraine@gmail.com');
	$mail->Subject = '[Лид с формы рассрочки]';
	$mail->Body    = "Зайдите в битрикс, чтобы посмотреть подробности";

	$data = file_get_contents('https://regard24.bitrix24.ua/crm/configs/import/lead.php?LOGIN=Vangeliev007@gmail.com&PASSWORD=Zxc123456789&TITLE=Лид с формы рассрочки&PHONE_MOBILE='.$tel.'&NAME='.$name.'&UF_CRM_1488794659='.$utm_term.'&UF_CRM_1488794635='.$utm_content.'&UF_CRM_1488794619='.$utm_compaign.'&UF_CRM_1488794478='.$utm_medium.'&UF_CRM_1488794462='.$utm_source.'&UF_CRM_1488792107='.$city);
}

// Если запрос с формы Получить консультацию
if ($type == 'consult') {
	$name = $_POST['name'];
	$tel = $_POST['tel'];

	$mail->addAddress('regard.ukraine@gmail.com');
	$mail->Subject = '[Лид с формы консультации]';
	$mail->Body    = "Зайдите в битрикс, чтобы посмотреть подробности";

	$data = file_get_contents('https://regard24.bitrix24.ua/crm/configs/import/lead.php?LOGIN=Vangeliev007@gmail.com&PASSWORD=Zxc123456789&TITLE=Лид с формы консультации&PHONE_MOBILE='.$tel.'&COMMENTS='.$name.'&UF_CRM_1488794659='.$utm_term.'&UF_CRM_1488794635='.$utm_content.'&UF_CRM_1488794619='.$utm_compaign.'&UF_CRM_1488794478='.$utm_medium.'&UF_CRM_1488794462='.$utm_source.'&UF_CRM_1488792107='.$city);
}

// Если запрос с Подборки Компа (Собери свой уникальный)
if ($type == 'makecomp') {
	$name = $_POST['name'];
	$tel = $_POST['tel'];
	$comment = $_POST['comment'];
	$comp = urlencode($_POST['comp']);
	$comment = $comp.' / '.$comment;

	$mail->addAddress('regard.ukraine@gmail.com');
	$mail->Subject = '[Лид с подборки компьютера]';
	$mail->Body    = "Зайдите в битрикс, чтобы посмотреть подробности";

	$data = file_get_contents('https://regard24.bitrix24.ua/crm/configs/import/lead.php?LOGIN=Vangeliev007@gmail.com&PASSWORD=Zxc123456789&TITLE=Лид с подборки компьютера&PHONE_MOBILE='.$tel.'&NAME='.$name.'&COMMENTS='.$comment.'&UF_CRM_1488794659='.$utm_term.'&UF_CRM_1488794635='.$utm_content.'&UF_CRM_1488794619='.$utm_compaign.'&UF_CRM_1488794478='.$utm_medium.'&UF_CRM_1488794462='.$utm_source.'&UF_CRM_1488792107='.$city);
}

// Если запрос с Top10
if ($type == 'top10') {
	$name = $_POST['name'];
	$tel = $_POST['tel'];
	$email = $_POST['email'];

	$mail->addAddress('regard.ukraine@gmail.com');
	$mail->Subject = '[Лид с Top10]';
	$mail->Body    = "Зайдите в битрикс, чтобы посмотреть подробности";

	$usermail = new PHPMailer();
	$usermail->IsSMTP();
	$usermail->CharSet = 'UTF-8';

	$usermail->Host       = "mail.ukraine.com.ua"; // SMTP server example
	$usermail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
	$usermail->SMTPAuth   = true;                  // enable SMTP authentication
	$usermail->Port       = 25;                    // set the SMTP port for the GMAIL server
	$usermail->Username   = "robot@xn--80afeb8cd.com"; // SMTP account username example
	$usermail->Password   = "r0BoT@iskand3r";        // SMTP account password example

	$usermail->setFrom('robot@регард.com', 'Регард.com');
	$usermail->isHTML(true);

	$usermail->addAddress($email);
	$usermail->Subject = 'Топ 10 заблуждений о компьютерах и комплектующих';
	$usermail->Body    = "Спасибо за проявленный интерес. PDF в приклепленном файле";
	$usermail->addAttachment('../pdf/top10.pdf');

	$downloads = file_get_contents('top10.txt');
	$downloads++;
	file_put_contents('top10.txt', $downloads);

	$usermail->send();


	$data = file_get_contents('https://regard24.bitrix24.ua/crm/configs/import/lead.php?LOGIN=Vangeliev007@gmail.com&PASSWORD=Zxc123456789&TITLE=Лид с Top10&EMAIL_HOME='.$email.'&PHONE_MOBILE='.$tel.'&NAME='.$name.'&UF_CRM_1488794659='.$utm_term.'&UF_CRM_1488794635='.$utm_content.'&UF_CRM_1488794619='.$utm_compaign.'&UF_CRM_1488794478='.$utm_medium.'&UF_CRM_1488794462='.$utm_source.'&UF_CRM_1488792107='.$city);
}

// Если запрос с Мы перезвоним
if ($type == 'recall') {

	$tel = $_POST['tel'];

	$mail->addAddress('regard.ukraine@gmail.com');
	$mail->Subject = '[Лид с Мы Перезвоним]';
	$mail->Body    = "Зайдите в битрикс, чтобы посмотреть подробности";

	$data = file_get_contents('https://regard24.bitrix24.ua/crm/configs/import/lead.php?LOGIN=Vangeliev007@gmail.com&PASSWORD=Zxc123456789&TITLE=Лид с Мы перезвоним&PHONE_MOBILE='.$tel.'&UF_CRM_1488794659='.$utm_term.'&UF_CRM_1488794635='.$utm_content.'&UF_CRM_1488794619='.$utm_compaign.'&UF_CRM_1488794478='.$utm_medium.'&UF_CRM_1488794462='.$utm_source.'&UF_CRM_1488792107='.$city);
}

// Если запрос с прайса
if ($type == 'pricelist') {
	$tel = $_POST['tel'];
	$email = $_POST['email'];

	$mail->addAddress('regard.ukraine@gmail.com');
	$mail->Subject = '[Лид с прайса]';
	$mail->Body    = "Зайдите в битрикс, чтобы посмотреть подробности";

	$usermail = new PHPMailer();
	$usermail->IsSMTP();
	$usermail->CharSet = 'UTF-8';

	$usermail->Host       = "mail.ukraine.com.ua"; // SMTP server example
	$usermail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
	$usermail->SMTPAuth   = true;                  // enable SMTP authentication
	$usermail->Port       = 25;                    // set the SMTP port for the GMAIL server
	$usermail->Username   = "robot@xn--80afeb8cd.com"; // SMTP account username example
	$usermail->Password   = "r0BoT@iskand3r";        // SMTP account password example

	$usermail->setFrom('robot@регард.com', 'Регард.com');
	$usermail->isHTML(true);

	$usermail->addAddress($email);
	$usermail->Subject = 'Прайс компьютеров Регард';
	$usermail->Body    = "Спасибо за проявленный интерес. PDF в приклепленном файле";
	$usermail->addAttachment('../pdf/price.pdf');

	$usermail->send();

	$data = file_get_contents('https://regard24.bitrix24.ua/crm/configs/import/lead.php?LOGIN=Vangeliev007@gmail.com&PASSWORD=Zxc123456789&TITLE=Лид с прайса&EMAIL_HOME='.$email.'&PHONE_MOBILE='.$tel.'&UF_CRM_1488794659='.$utm_term.'&UF_CRM_1488794635='.$utm_content.'&UF_CRM_1488794619='.$utm_compaign.'&UF_CRM_1488794478='.$utm_medium.'&UF_CRM_1488794462='.$utm_source.'&UF_CRM_1488792107='.$city);
}

// СТАРЫЙ Если запрос с калькулятора (builder.html)
if ($type == 'builder') {
	$cpu = urlencode($_POST['cpu']);
	$hdd = urlencode($_POST['hdd']);
	$ram = urlencode($_POST['ram']);
	$video = urlencode($_POST['video']);
	$summa = urlencode($_POST['budget']);
	$ssd = urlencode($_POST['ssd']);
	$comment = urlencode($_POST['comment']);
	$email = urlencode($_POST['email']);
	$tel = urlencode($_POST['tel']);

	$mail->addAddress('regard.ukraine@gmail.com');
	$mail->Subject = '[Лид с Builder.html]';
	$mail->Body    = "Зайдите в битрикс, чтобы посмотреть подробности";

	$data = file_get_contents('https://regard24.bitrix24.ua/crm/configs/import/lead.php?LOGIN=Vangeliev007@gmail.com&PASSWORD=Zxc123456789&TITLE=Лид с Builder.html&EMAIL_HOME='.$email.'&PHONE_MOBILE='.$tel.'&COMMENTS='.$comment.'&UF_CRM_1488792155='.$cpu.'&UF_CRM_1488793674='.$hdd.'&UF_CRM_1488792255='.$video.'&UF_CRM_1488793630='.$ram.'&UF_CRM_1488792417='.$ssd.'&UF_CRM_1488792912='.$summa.'&UF_CRM_1488794659='.$utm_term.'&UF_CRM_1488794635='.$utm_content.'&UF_CRM_1488794619='.$utm_compaign.'&UF_CRM_1488794478='.$utm_medium.'&UF_CRM_1488794462='.$utm_source.'&UF_CRM_1488792107='.$city);

}

// Если запрос со страницы товара
if ($type == 'product') {
	$comp_name = strtolower($_POST['comp_name']);
	$cpu = urlencode($_POST['cpu']);
	// $cpu = 'test';
	$hdd = urlencode(strtolower($_POST['hdd']));
	$ram = urlencode($_POST['ram']);
	$video = urlencode($_POST['video']);
	$budget = urlencode($_POST['budget']);
	$ssd = urlencode($_POST['ssd']);
	$monitor = urlencode($_POST['monitor']);
	$keyboard = urlencode($_POST['keyboard']);
	$mouse = urlencode($_POST['mouse']);
	$complect = urlencode($_POST['complect']);
	$windows = urlencode($_POST['windows']);
	$msoffice = urlencode($_POST['msoffice']);
	$wifi = urlencode($_POST['wifi']);
	$comment = urlencode($_POST['comment']);
	$email = urlencode($_POST['email']);
	$tel = urlencode($_POST['tel']);
	$name = urlencode($_POST['name']);
	$block_pit = urlencode($_POST['block_pit']);
	$disk = urlencode($_POST['disk']);
	$corpus = urlencode($_POST['corpus']);
	$block_pit = urlencode($_POST['block_pit']);
	$cooler = urlencode($_POST['cooler']);
	$materinka = $_POST['materinka'];
	$utm_term = urlencode($_POST['utm_term']);
 	$utm_medium = urlencode($_POST['utm_medium']);
  	$utm_content = urlencode($_POST['utm_content']);
  	$utm_source = urlencode($_POST['utm_source']);
  	$utm_compaign = urlencode($_POST['utm_compaign']);
	$summa = urlencode($_POST['budget']);
	$carpet = urlencode($_POST['carpet']);
	$cabel = urlencode($_POST['cabel']);
	$garn = urlencode($_POST['garn']);
	$wifiadapt = urlencode($_POST['wifiadapt']);
	$fan = urlencode($_POST['fan']);
	$soft = urlencode($_POST['soft']);

	$mail->addAddress('regard.ukraine@gmail.com');
	$mail->Subject = '[Лид с '.$comp_name.']';
	$mail->Body    = 'Зайдите в битрикс, чтобы посмотреть подробности';

	$data = file_get_contents('https://regard24.bitrix24.ua/crm/configs/import/lead.php?LOGIN=Vangeliev007@gmail.com&PASSWORD=Zxc123456789&TITLE=Лид с '.$comp_name.'&EMAIL_HOME='.$email.'&PHONE_MOBILE='.$tel.'&NAME='.$name.'&UF_CRM_1488792155='.$cpu.'&UF_CRM_1488793674='.$hdd.'&UF_CRM_1488792255='.$video.'&UF_CRM_1488793630='.$ram.'&UF_CRM_1488792417='.$ssd.'&UF_CRM_1488792912='.$summa.'&UF_CRM_1488794659='.$utm_term.'&UF_CRM_1488794635='.$utm_content.'&UF_CRM_1488794619='.$utm_compaign.'&UF_CRM_1488794478='.$utm_medium.'&UF_CRM_1488794462='.$utm_source.'&UF_CRM_1488793971='.$wifi.'&UF_CRM_1488793833='.$keyboard.'&UF_CRM_1488793697='.$block_pit.'&UF_CRM_1488792628='.$complect.'&UF_CRM_1488792731='.$msoffice.'&UF_CRM_1488792600='.$windows.'&UF_CRM_1488792563='.$mouse.'&UF_CRM_1488792546='.$monitor.'&UF_CRM_1488792535='.$corpus.'&UF_CRM_1488792480='.$disk.'&UF_CRM_1488792467='.urlencode($materinka).'&UF_CRM_1488792328='.$cooler.'&UF_CRM_1488792129='.$comp_name.'&UF_CRM_1488792107='.$city.'&UF_CRM_1505727926='.$carpet.'&UF_CRM_1505727943='.$cabel.'&UF_CRM_1505727951='.$garn.'&UF_CRM_1505727973='.$wifiadapt.'&UF_CRM_1505820544='.$fan.'&UF_CRM_1505820555='.$soft);
	// echo 'https://regard24.bitrix24.ua/crm/configs/import/lead.php?LOGIN=Vangeliev007@gmail.com&PASSWORD=Zxc123456789&TITLE=Лид со страницы товара&EMAIL_HOME='.$email.'&PHONE_MOBILE='.$tel.'&NAME='.$name.'&UF_CRM_1488792155='.$cpu.'&UF_CRM_1488793674='.$hdd.'&UF_CRM_1488792255='.$video.'&UF_CRM_1488793630='.$ram.'&UF_CRM_1488792417='.$ssd.'&UF_CRM_1488792912='.$summa.'&UF_CRM_1488794659='.$utm_term.'&UF_CRM_1488794635='.$utm_content.'&UF_CRM_1488794619='.$utm_compaign.'&UF_CRM_1488794478='.$utm_medium.'&UF_CRM_1488794462='.$utm_source.'&UF_CRM_1488793971='.$wifi.'&UF_CRM_1488793833='.$keyboard.'&UF_CRM_1488793697='.$block_pit.'&UF_CRM_1488792628='.$complect.'&UF_CRM_1488792731='.$msoffice.'&UF_CRM_1488792600='.$windows.'&UF_CRM_1488792563='.$mouse.'&UF_CRM_1488792546='.$monitor.'&UF_CRM_1488792535='.$corpus.'&UF_CRM_1488792480='.$disk.'&UF_CRM_1488792467='.$materinka.'&UF_CRM_1488792328='.$cooler.'&UF_CRM_1488792129='.$comp_name.'&UF_CRM_1488792107='.$city;
}

// СТАРЫЙ Если запрос со "Скачать прайс"
if ($type == 'olololo') {
	$email = $_POST['email'];
	$tel = $_POST['tel'];

	$mail->addAddress('regard.ukraine@gmail.com');
	$mail->Subject = '[Лид с Калькулятора]';
	$mail->Body    = "Телефон: ".$tel." 
		<br>Почта: ".$email;

	$data = file_get_contents('https://regard24.bitrix24.ua/crm/configs/import/lead.php?LOGIN=Vangeliev007@gmail.com&PASSWORD=Zxc123456789&TITLE=Лид - Скачать прайс&EMAIL_HOME='.$email.'&PHONE_MOBILE='.$tel);

}

$mail->send();

?>