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

  $browser = $_POST['device'];
  if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$browser)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($browser,0,4))){
    $browser = 'Мобильный';
  } else {
    $browser = 'Десктоп';
  }

  $comp_name = strtolower($_POST['comp_name']);
  $cpu = $_POST['cpu'];
  // $cpu = 'test';
  $hdd = urlencode($_POST['hdd']);
  $ram = $_POST['ram'];
  $video = $_POST['video'];
  $budget = $_POST['budget'];
  $ssd = $_POST['ssd'];
  $monitor = str_replace('"', '', $_POST['monitor']);
  $keyboard = $_POST['keyboard'];
  $mouse = $_POST['mouse'];
  $complect = $_POST['complect'];
  // $windows = urlencode($_POST['windows']);
  $windows = '';
  // $msoffice = urlencode($_POST['msoffice']);
  $msoffice = '';
  // $wifi = urlencode($_POST['wifi']);
  $wifi = '';
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
  $offer = urlencode($_POST['offer']);
  $dop_vents = urlencode($_POST['dop_vents']);
  $webcams = urlencode($_POST['webcams']);
  $speakers = urlencode($_POST['speakers']);

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

    $mail->Body    = 'Зайдите в битрикс, чтобы посмотреть подробности <br>Телефон клиента: '.$_POST['tel'];
    $mail->send();

    $data = file_get_contents('https://regard24.bitrix24.ua/crm/configs/import/lead.php?LOGIN=regard.ukraine3@gmail.com&PASSWORD=asdfghjkl123698745fhfhfhfhfhg159357&TITLE=Лид с рассрочкой&EMAIL_HOME='.urlencode($email).'&PHONE_MOBILE='.urlencode($tel).'&NAME='.urlencode($name).'&UF_CRM_1488792155='.urlencode($cpu).'&UF_CRM_1488793674='.urlencode($hdd).'&UF_CRM_1488792255='.urlencode($video).'&UF_CRM_1488793630='.urlencode($ram).'&UF_CRM_1488792417='.urlencode($ssd).'&UF_CRM_1488792912='.urlencode($summa).'&UF_CRM_1488794659='.urlencode($utm_term).'&UF_CRM_1488794635='.urlencode($utm_content).'&UF_CRM_1488794619='.urlencode($utm_compaign).'&UF_CRM_1488794478='.urlencode($utm_medium).'&UF_CRM_1488794462='.urlencode($utm_source).'&UF_CRM_1488793971='.urlencode($wifi).'&UF_CRM_1488793833='.urlencode($keyboard).'&UF_CRM_1488793697='.urlencode($block_pit).'&UF_CRM_1488792628='.urlencode($complect).'&UF_CRM_1488792731='.urlencode($msoffice).'&UF_CRM_1488792600='.urlencode($windows).'&UF_CRM_1488792563='.urlencode($mouse).'&UF_CRM_1488792546='.urlencode($monitor).'&UF_CRM_1488792535='.urlencode($corpus).'&UF_CRM_1488792480='.urlencode($disk).'&UF_CRM_1488792467='.urlencode($materinka).'&UF_CRM_1488792328='.urlencode($cooler).'&UF_CRM_1488792129='.urlencode($comp_name).'&UF_CRM_1488792107='.urlencode($city).$carpet.'&UF_CRM_1505727943='.$cabel.'&UF_CRM_1505727951='.$garn.'&UF_CRM_1505727973='.$wifiadapt.'&UF_CRM_1505820544='.$fan.'&UF_CRM_1505820555='.$soft.'&UF_CRM_1507560289='.$offer.'&UF_CRM_1507560305='.$dop_vents.'&UF_CRM_1508450456='.$webcams.'&UF_CRM_1508450484='.$speakers.'&UF_CRM_1508913517='.$browser);
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