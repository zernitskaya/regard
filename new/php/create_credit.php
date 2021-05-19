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

Идентификатор магазина (store_id): B9A50BF122B1479D94CD 
идентификатор получателя (recepientId): F2A244256C574132949B 
пароль магазина: 7de1a1918cf04b8985752f2d8efdda79


*/


//берем все, что прислали
  $comp_name = strtolower($_POST['comp_name']);
  $cpu = $_POST['cpu'];
  // $cpu = 'test';
  $hdd = strtolower($_POST['hdd']);
  $ram = $_POST['ram'];
  $video = $_POST['video'];
  $budget = $_POST['budget'];
  $ssd = $_POST['ssd'];
  $monitor = str_replace('"', '', $_POST['monitor']);
  $keyboard = $_POST['keyboard'];
  $mouse = $_POST['mouse'];
  $complect = $_POST['complect'];
  $windows = $_POST['windows'];
  $msoffice = $_POST['msoffice'];
  $wifi = $_POST['wifi'];
  $comment = '';
  $email = $_POST['email'];
  $tel = $_POST['tel'];
  $name = $_POST['name'];
  $block_pit = $_POST['block_pit'];
  $disk = $_POST['disk'];
  $corpus = $_POST['corpus'];
  $cooler = $_POST['cooler'];
  $materinka = $_POST['materinka'];
  $utm_term = $_POST['utm_term'];
  $utm_medium = $_POST['utm_medium'];
  $utm_content = $_POST['utm_content'];
  $utm_source = $_POST['utm_source'];
  $utm_compaign = $_POST['utm_compaign'];
  $summa = $_POST['price'];
  $city = $_POST['city'];
  $carpet = urlencode($_POST['carpet']);
  $cabel = urlencode($_POST['cabel']);
  $garn = urlencode($_POST['garn']);
  $wifiadapt = urlencode($_POST['wifiadapt']);
  $fan = urlencode($_POST['fan']);
  $soft = urlencode($_POST['soft']);

  $merchant_type = $_POST['merch_type'];

require 'mail/PHPMailerAutoload.php';
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


// if ($state == 'SUCCESS') {
  // $own_signature = base64_encode( sha1( $password.$state.$store_id.$order_id.$token.$password) );

  // if ($signature == $own_signature) {
    // include 'order.php';
    $mail->addAddress('regard.ukraine@gmail.com');

    if ($merchant_type == 'II') {
      $mail->Subject = '[Лид с рассрочкой]';
    } else {
      $mail->Subject = '[Лид с оплатой частями]';
    }

    $mail->Body    = 'Зайдите в битрикс, чтобы посмотреть подробности.';
    $mail->send();

    $data = file_get_contents('https://regard24.bitrix24.ua/crm/configs/import/lead.php?LOGIN=Vangeliev007@gmail.com&PASSWORD=Zxc123456789&TITLE=Лид с рассрочкой&EMAIL_HOME='.urlencode($email).'&PHONE_MOBILE='.urlencode($tel).'&NAME='.urlencode($name).'&UF_CRM_1488792155='.urlencode($cpu).'&UF_CRM_1488793674='.urlencode($hdd).'&UF_CRM_1488792255='.urlencode($video).'&UF_CRM_1488793630='.urlencode($ram).'&UF_CRM_1488792417='.urlencode($ssd).'&UF_CRM_1488792912='.urlencode($summa).'&UF_CRM_1488794659='.urlencode($utm_term).'&UF_CRM_1488794635='.urlencode($utm_content).'&UF_CRM_1488794619='.urlencode($utm_compaign).'&UF_CRM_1488794478='.urlencode($utm_medium).'&UF_CRM_1488794462='.urlencode($utm_source).'&UF_CRM_1488793971='.urlencode($wifi).'&UF_CRM_1488793833='.urlencode($keyboard).'&UF_CRM_1488793697='.urlencode($block_pit).'&UF_CRM_1488792628='.urlencode($complect).'&UF_CRM_1488792731='.urlencode($msoffice).'&UF_CRM_1488792600='.urlencode($windows).'&UF_CRM_1488792563='.urlencode($mouse).'&UF_CRM_1488792546='.urlencode($monitor).'&UF_CRM_1488792535='.urlencode($corpus).'&UF_CRM_1488792480='.urlencode($disk).'&UF_CRM_1488792467='.urlencode($materinka).'&UF_CRM_1488792328='.urlencode($cooler).'&UF_CRM_1488792129='.urlencode($comp_name).'&UF_CRM_1488792107='.urlencode($city).$carpet.'&UF_CRM_1505727943='.$cabel.'&UF_CRM_1505727951='.$garn.'&UF_CRM_1505727973='.$wifiadapt.'&UF_CRM_1505820544='.$fan.'&UF_CRM_1505820555='.$soft );
  // }
// }



$count = intval(file_get_contents('order.txt'));
$count++;
file_put_contents('order.txt', $count);

$password = '7de1a1918cf04b8985752f2d8efdda79';
$store_id = 'B9A50BF122B1479D94CD';
// $order_id = 'hsjh8492mgi1vnvnssd';
$order_id = $count;

// $order_text = '<? $comp_name = "'.$comp_name.'";'."\n".' $hdd = "'.$hdd.'";'."\n".' $ram = "'.$ram.'";'."\n".' $video = "'.$video.'";'."\n".' $summa = "'.$summa.'";'."\n".' $ssd = "'.$ssd.'";'."\n".' $monitor = "'.$monitor.'";'."\n".' $keyboard = "'.$keyboard.'";'."\n".' $mouse = "'.$mouse.'";'."\n".' $complect = "'.$complect.'";'."\n".' $windows = "'.$windows.'"; $msoffice = "'.$msoffice.'"; $wifi = "'.$wifi.'"; $tel = "'.$tel.'"; $comment = "'.$comment.'"; $email = "'.$email.'"; $name = "'.$name.'"; $block_pit = "'.$block_pit.'"; $disk = "'.$disk.'"; $corpus = "'.$corpus.'"; $cooler = "'.$cooler.'"; $materinka = "'.$materinka.'"; $utm_term = "'.$utm_term.'"; $utm_compaign = "'.$utm_compaign.'"; $utm_content = "'.$utm_content.'"; $utm_source = "'.$utm_source.'"; $utm_medium = "'.$utm_medium.'"; $cpu = "'.$cpu.'"; $city = "'.$city.'"; ';

// file_put_contents('order.php', $order_text);


// $summa = str_replace(' ', '', $_POST['budget']);
$summa = $_POST['price'];
$comp_name = $_POST['comp_name'];
$amount = str_replace('.', '', $summa);
// $amount = (double)$amount;

$parts = $_POST['parts'];
// $parts = 6;
$products = $comp_name.'1'.$amount;
$response_url = 'http://xn--80afeb8cd.com/php/success_credit.php';
$redirect_url = 'http://xn--80afeb8cd.com/thanks.html';


$signature = sha1($password.$store_id.$order_id.$amount.$parts.$merchant_type.$response_url.$redirect_url.$products.$password, 1);
$signature = base64_encode($signature);
// $signature = base64_encode(sha1('75bef16bfdce4d0e9c0ad5a19b9940df'.'4AAD1369CF734B64B70F'.'qdkcoekmek13'.'3000000'.'6'.'PP'.'http://wolf.com/'.'http://wolf.com/ololo/'.'ololo13000000'.'75bef16bfdce4d0e9c0ad5a19b9940df'));

$postfields  = json_encode(array(
           'storeId'  => $store_id,
           'orderId' => $order_id,
           'amount' => $summa,
           'partsCount' => $parts,
           'merchantType' => $merchant_type,
           'products' => array(array('name' => $comp_name, 'count' => 1, 'price' => $summa)),
           'responseUrl' => $response_url,
           'redirectUrl' => $redirect_url,
           'signature' => $signature
        ));



// echo $postfields;

    $url = 'https://payparts2.privatbank.ua/ipp/v2/payment/create';
    $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
          'Accept: application/json;',
          'Accept-Encoding: UTF-8;',
          'Content-Type: application/json; charset=UTF-8;',
         ));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS,$postfields);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        $server_output = curl_exec($ch);
        curl_close($ch);
        $obj = json_decode($server_output);
        // header('Location: https://payparts2.privatbank.ua/ipp/v2/payment?token='.$obj->token);
        echo $obj->token;



















?>