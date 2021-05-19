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
Акционные предложения - UF_CRM_1507560289
Дополнительные вентиляторы - UF_CRM_1507560305
Веб-камеры - UF_CRM_1508450456
Колонки - UF_CRM_1508450484
Browser Device - UF_CRM_1508913517

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

	$data = file_get_contents('https://regard24.bitrix24.ua/crm/configs/import/lead.php?LOGIN=regard.ukraine3@gmail.com&PASSWORD=asdfghjkl123698745fhfhfhfhfhg159357&TITLE=Лид с Easy Builder&EMAIL_HOME='.$email.'&PHONE_MOBILE='.$tel.'&NAME='.$name.'&COMMENTS='.$tasks.' / '.$comment.'&UF_CRM_1488792912='.$summa.'&UF_CRM_1488794659='.$utm_term.'&UF_CRM_1488794635='.$utm_content.'&UF_CRM_1488794619='.$utm_compaign.'&UF_CRM_1488794478='.$utm_medium.'&UF_CRM_1488794462='.$utm_source.'&UF_CRM_1488792107='.$city);
}

// Если запрос с Подборки аксессуаров
if ($type == 'acsessor') {
	$name = $_POST['name'];
	$tel = $_POST['tel'];
	$comment = urlencode($_POST['comment']);

	$mail->addAddress('regard.ukraine@gmail.com');
	$mail->Subject = '[Лид с Подборки аксессуаров]';
	$mail->Body    = "Зайдите в битрикс, чтобы посмотреть подробности";

	$data = file_get_contents('https://regard24.bitrix24.ua/crm/configs/import/lead.php?LOGIN=regard.ukraine3@gmail.com&PASSWORD=asdfghjkl123698745fhfhfhfhfhg159357&TITLE=Лид с Подборки аксессуаров&PHONE_MOBILE='.$tel.'&NAME='.$name.'&COMMENTS='.$comment.'&UF_CRM_1488794659='.$utm_term.'&UF_CRM_1488794635='.$utm_content.'&UF_CRM_1488794619='.$utm_compaign.'&UF_CRM_1488794478='.$utm_medium.'&UF_CRM_1488794462='.$utm_source.'&UF_CRM_1488792107='.$city);
}

// Если запрос с формы рассрочки
if ($type == 'rassrochka') {
	$name = $_POST['name'];
	$tel = $_POST['tel'];

	$mail->addAddress('regard.ukraine@gmail.com');
	$mail->Subject = '[Лид с формы рассрочки]';
	$mail->Body    = "Зайдите в битрикс, чтобы посмотреть подробности";

	$data = file_get_contents('https://regard24.bitrix24.ua/crm/configs/import/lead.php?LOGIN=regard.ukraine3@gmail.com&PASSWORD=asdfghjkl123698745fhfhfhfhfhg159357&TITLE=Лид с формы рассрочки&PHONE_MOBILE='.$tel.'&NAME='.$name.'&UF_CRM_1488794659='.$utm_term.'&UF_CRM_1488794635='.$utm_content.'&UF_CRM_1488794619='.$utm_compaign.'&UF_CRM_1488794478='.$utm_medium.'&UF_CRM_1488794462='.$utm_source.'&UF_CRM_1488792107='.$city);
}

// Если запрос с формы Получить консультацию
if ($type == 'consult') {
	$name = $_POST['name'];
	$tel = $_POST['tel'];

	$mail->addAddress('regard.ukraine@gmail.com');
	$mail->Subject = '[Лид с формы консультации]';
	$mail->Body    = "Зайдите в битрикс, чтобы посмотреть подробности";

	$data = file_get_contents('https://regard24.bitrix24.ua/crm/configs/import/lead.php?LOGIN=regard.ukraine3@gmail.com&PASSWORD=asdfghjkl123698745fhfhfhfhfhg159357&TITLE=Лид с формы консультации&PHONE_MOBILE='.$tel.'&COMMENTS='.$name.'&UF_CRM_1488794659='.$utm_term.'&UF_CRM_1488794635='.$utm_content.'&UF_CRM_1488794619='.$utm_compaign.'&UF_CRM_1488794478='.$utm_medium.'&UF_CRM_1488794462='.$utm_source.'&UF_CRM_1488792107='.$city);
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

	$data = file_get_contents('https://regard24.bitrix24.ua/crm/configs/import/lead.php?LOGIN=regard.ukraine3@gmail.com&PASSWORD=asdfghjkl123698745fhfhfhfhfhg159357&TITLE=Лид с подборки компьютера&PHONE_MOBILE='.$tel.'&NAME='.$name.'&COMMENTS='.$comment.'&UF_CRM_1488794659='.$utm_term.'&UF_CRM_1488794635='.$utm_content.'&UF_CRM_1488794619='.$utm_compaign.'&UF_CRM_1488794478='.$utm_medium.'&UF_CRM_1488794462='.$utm_source.'&UF_CRM_1488792107='.$city);
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


	$data = file_get_contents('https://regard24.bitrix24.ua/crm/configs/import/lead.php?LOGIN=regard.ukraine3@gmail.com&PASSWORD=asdfghjkl123698745fhfhfhfhfhg159357&TITLE=Лид с Top10&EMAIL_HOME='.$email.'&PHONE_MOBILE='.$tel.'&NAME='.$name.'&UF_CRM_1488794659='.$utm_term.'&UF_CRM_1488794635='.$utm_content.'&UF_CRM_1488794619='.$utm_compaign.'&UF_CRM_1488794478='.$utm_medium.'&UF_CRM_1488794462='.$utm_source.'&UF_CRM_1488792107='.$city);
}

// Если запрос с Мы перезвоним
if ($type == 'recall') {

	$tel = $_POST['tel'];

	$mail->addAddress('regard.ukraine@gmail.com');
	$mail->Subject = '[Лид с Мы Перезвоним]';
	$mail->Body    = "Зайдите в битрикс, чтобы посмотреть подробности";

	$data = file_get_contents('https://regard24.bitrix24.ua/crm/configs/import/lead.php?LOGIN=regard.ukraine3@gmail.com&PASSWORD=asdfghjkl123698745fhfhfhfhfhg159357&TITLE=Лид с Мы перезвоним&PHONE_MOBILE='.$tel.'&UF_CRM_1488794659='.$utm_term.'&UF_CRM_1488794635='.$utm_content.'&UF_CRM_1488794619='.$utm_compaign.'&UF_CRM_1488794478='.$utm_medium.'&UF_CRM_1488794462='.$utm_source.'&UF_CRM_1488792107='.$city);
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

	$data = file_get_contents('https://regard24.bitrix24.ua/crm/configs/import/lead.php?LOGIN=regard.ukraine3@gmail.com&PASSWORD=asdfghjkl123698745fhfhfhfhfhg159357&TITLE=Лид с прайса&EMAIL_HOME='.$email.'&PHONE_MOBILE='.$tel.'&UF_CRM_1488794659='.$utm_term.'&UF_CRM_1488794635='.$utm_content.'&UF_CRM_1488794619='.$utm_compaign.'&UF_CRM_1488794478='.$utm_medium.'&UF_CRM_1488794462='.$utm_source.'&UF_CRM_1488792107='.$city);
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

	$data = file_get_contents('https://regard24.bitrix24.ua/crm/configs/import/lead.php?LOGIN=regard.ukraine3@gmail.com&PASSWORD=asdfghjkl123698745fhfhfhfhfhg159357&TITLE=Лид с Builder.html&EMAIL_HOME='.$email.'&PHONE_MOBILE='.$tel.'&COMMENTS='.$comment.'&UF_CRM_1488792155='.$cpu.'&UF_CRM_1488793674='.$hdd.'&UF_CRM_1488792255='.$video.'&UF_CRM_1488793630='.$ram.'&UF_CRM_1488792417='.$ssd.'&UF_CRM_1488792912='.$summa.'&UF_CRM_1488794659='.$utm_term.'&UF_CRM_1488794635='.$utm_content.'&UF_CRM_1488794619='.$utm_compaign.'&UF_CRM_1488794478='.$utm_medium.'&UF_CRM_1488794462='.$utm_source.'&UF_CRM_1488792107='.$city);

}

// Если запрос с "Следить за ценой"
if ($type == 'follow') {
	$email = urlencode($_POST['email']);
	$comp_name = strtolower($_POST['comp_name']);

	$mail->addAddress('regard.ukraine@gmail.com');
	$mail->Subject = '[Следить за ценой]';
	$mail->Body    = "Зайдите в битрикс, чтобы посмотреть подробности";

	$data = file_get_contents('https://regard24.bitrix24.ua/crm/configs/import/lead.php?LOGIN=regard.ukraine3@gmail.com&PASSWORD=asdfghjkl123698745fhfhfhfhfhg159357&TITLE=Следить за ценой&EMAIL_HOME='.$email.'&UF_CRM_1488794659='.$utm_term.'&UF_CRM_1488794635='.$utm_content.'&UF_CRM_1488794619='.$utm_compaign.'&UF_CRM_1488794478='.$utm_medium.'&UF_CRM_1488794462='.$utm_source.'&UF_CRM_1488792107='.$city.'&UF_CRM_1488792129='.$comp_name);

}

// Если запрос со страницы товара
if ($type == 'product') {
	
	$browser = $_POST['device'];
	if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$browser)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($browser,0,4))){
		$browser = 'Мобильный';
	} else {
		$browser = 'Десктоп';
	}

	$comp_name = strtolower($_POST['comp_name']);
	$cpu = urlencode($_POST['cpu']);
	// $cpu = 'test';
	$hdd = urlencode($_POST['hdd']);
	// file_put_contents('test.txt', $hdd);
	$ram = urlencode($_POST['ram']);
	$video = urlencode($_POST['video']);
	$budget = urlencode($_POST['budget']);
	$ssd = urlencode($_POST['ssd']);
	$monitor = urlencode($_POST['monitor']);
	$keyboard = urlencode($_POST['keyboard']);
	$mouse = urlencode($_POST['mouse']);
	$complect = urlencode($_POST['complect']);
	// $windows = urlencode($_POST['windows']);
	$windows = '';
	// $msoffice = urlencode($_POST['msoffice']);
	$msoffice = '';
	// $wifi = urlencode($_POST['wifi']);
	$wifi = '';
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
	$offer = urlencode($_POST['offer']);
	$dop_vents = urlencode($_POST['dop_vents']);
	$webcams = urlencode($_POST['webcams']);
	$speakers = urlencode($_POST['speakers']);

	$mail->addAddress('regard.ukraine@gmail.com');
	$mail->Subject = '[Лид с '.$comp_name.']';
	$mail->Body    = 'Зайдите в битрикс, чтобы посмотреть подробности <br>Телефон клиента: '.$_POST['tel'];

	$data = file_get_contents('https://regard24.bitrix24.ua/crm/configs/import/lead.php?LOGIN=regard.ukraine3@gmail.com&PASSWORD=asdfghjkl123698745fhfhfhfhfhg159357&TITLE=Лид с '.$comp_name.'&EMAIL_HOME='.$email.'&PHONE_MOBILE='.$tel.'&NAME='.$name.'&UF_CRM_1488792155='.$cpu.'&UF_CRM_1488793674='.$hdd.'&UF_CRM_1488792255='.$video.'&UF_CRM_1488793630='.$ram.'&UF_CRM_1488792417='.$ssd.'&UF_CRM_1488792912='.$summa.'&UF_CRM_1488794659='.$utm_term.'&UF_CRM_1488794635='.$utm_content.'&UF_CRM_1488794619='.$utm_compaign.'&UF_CRM_1488794478='.$utm_medium.'&UF_CRM_1488794462='.$utm_source.'&UF_CRM_1488793971='.$wifi.'&UF_CRM_1488793833='.$keyboard.'&UF_CRM_1488793697='.$block_pit.'&UF_CRM_1488792628='.$complect.'&UF_CRM_1488792731='.$msoffice.'&UF_CRM_1488792600='.$windows.'&UF_CRM_1488792563='.$mouse.'&UF_CRM_1488792546='.$monitor.'&UF_CRM_1488792535='.$corpus.'&UF_CRM_1488792480='.$disk.'&UF_CRM_1488792467='.urlencode($materinka).'&UF_CRM_1488792328='.$cooler.'&UF_CRM_1488792129='.$comp_name.'&UF_CRM_1488792107='.$city.'&UF_CRM_1505727926='.$carpet.'&UF_CRM_1505727943='.$cabel.'&UF_CRM_1505727951='.$garn.'&UF_CRM_1505727973='.$wifiadapt.'&UF_CRM_1505820544='.$fan.'&UF_CRM_1505820555='.$soft.'&UF_CRM_1507560289='.$offer.'&UF_CRM_1507560305='.$dop_vents.'&UF_CRM_1508450456='.$webcams.'&UF_CRM_1508450484='.$speakers.'&UF_CRM_1508913517='.$browser);
	// echo 'https://regard24.bitrix24.ua/crm/configs/import/lead.php?LOGIN=regard.ukraine3@gmail.com&PASSWORD=asdfghjkl123698745fhfhfhfhfhg159357&TITLE=Лид со страницы товара&EMAIL_HOME='.$email.'&PHONE_MOBILE='.$tel.'&NAME='.$name.'&UF_CRM_1488792155='.$cpu.'&UF_CRM_1488793674='.$hdd.'&UF_CRM_1488792255='.$video.'&UF_CRM_1488793630='.$ram.'&UF_CRM_1488792417='.$ssd.'&UF_CRM_1488792912='.$summa.'&UF_CRM_1488794659='.$utm_term.'&UF_CRM_1488794635='.$utm_content.'&UF_CRM_1488794619='.$utm_compaign.'&UF_CRM_1488794478='.$utm_medium.'&UF_CRM_1488794462='.$utm_source.'&UF_CRM_1488793971='.$wifi.'&UF_CRM_1488793833='.$keyboard.'&UF_CRM_1488793697='.$block_pit.'&UF_CRM_1488792628='.$complect.'&UF_CRM_1488792731='.$msoffice.'&UF_CRM_1488792600='.$windows.'&UF_CRM_1488792563='.$mouse.'&UF_CRM_1488792546='.$monitor.'&UF_CRM_1488792535='.$corpus.'&UF_CRM_1488792480='.$disk.'&UF_CRM_1488792467='.$materinka.'&UF_CRM_1488792328='.$cooler.'&UF_CRM_1488792129='.$comp_name.'&UF_CRM_1488792107='.$city;
	// echo $data;
}

// СТАРЫЙ Если запрос со "Скачать прайс"
if ($type == 'olololo') {
	$email = $_POST['email'];
	$tel = $_POST['tel'];

	$mail->addAddress('regard.ukraine@gmail.com');
	$mail->Subject = '[Лид с Калькулятора]';
	$mail->Body    = "Телефон: ".$tel." 
		<br>Почта: ".$email;

	$data = file_get_contents('https://regard24.bitrix24.ua/crm/configs/import/lead.php?LOGIN=regard.ukraine3@gmail.com&PASSWORD=asdfghjkl123698745fhfhfhfhfhg159357&TITLE=Лид - Скачать прайс&EMAIL_HOME='.$email.'&PHONE_MOBILE='.$tel);

}

$mail->send();

?>