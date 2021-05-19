// <?

// require 'mail/PHPMailerAutoload.php';
// $mail = new PHPMailer();
// $mail->IsSMTP();
// $mail->CharSet = 'UTF-8';

// $mail->Host       = "mail.ukraine.com.ua"; // SMTP server example
// $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
// $mail->SMTPAuth   = true;                  // enable SMTP authentication
// $mail->Port       = 25;                    // set the SMTP port for the GMAIL server
// $mail->Username   = "robot@xn--80afeb8cd.com"; // SMTP account username example
// $mail->Password   = "r0BoT@iskand3r";        // SMTP account password example

// $mail->setFrom('robot@регард.com', 'Регард.com');
// $mail->isHTML(true);       

// $data = json_decode($_POST['data']);
// // $status = $data->{'status'};
// $password = '75bef16bfdce4d0e9c0ad5a19b9940df';
// $store_id = $data->storeId;
// $order_id = $data->orderId;
// $signature = $data->signature;
// $state = $data->paymentState;
// $token = $data->token;

// // if ($state == 'SUCCESS') {
// 	// $own_signature = base64_encode( sha1( $password.$state.$store_id.$order_id.$token.$password) );

// 	// if ($signature == $own_signature) {
// 		include 'order.php';
// 		$mail->addAddress('twist4@ukr.net');
// 		$mail->Subject = '[Лид с рассрочкой]';
// 		$mail->Body    = 'Зайдите в битрикс, чтобы посмотреть подробности.';
// 		$mail->send();

// 		$data = file_get_contents('https://regard24.bitrix24.ua/crm/configs/import/lead.php?LOGIN=Vangeliev007@gmail.com&PASSWORD=Zxc123456789&TITLE=Лид с рассрочкой&EMAIL_HOME='.urlencode($email).'&PHONE_MOBILE='.urlencode($tel).'&NAME='.urlencode($name).'&UF_CRM_1488792155='.urlencode($cpu).'&UF_CRM_1488793674='.urlencode($hdd).'&UF_CRM_1488792255='.urlencode($video).'&UF_CRM_1488793630='.urlencode($ram).'&UF_CRM_1488792417='.urlencode($ssd).'&UF_CRM_1488792912='.urlencode($summa).'&UF_CRM_1488794659='.urlencode($utm_term).'&UF_CRM_1488794635='.urlencode($utm_content).'&UF_CRM_1488794619='.urlencode($utm_compaign).'&UF_CRM_1488794478='.urlencode($utm_medium).'&UF_CRM_1488794462='.urlencode($utm_source).'&UF_CRM_1488793971='.urlencode($wifi).'&UF_CRM_1488793833='.urlencode($keyboard).'&UF_CRM_1488793697='.urlencode($block_pit).'&UF_CRM_1488792628='.urlencode($complect).'&UF_CRM_1488792731='.urlencode($msoffice).'&UF_CRM_1488792600='.urlencode($windows).'&UF_CRM_1488792563='.urlencode($mouse).'&UF_CRM_1488792546='.urlencode($monitor).'&UF_CRM_1488792535='.urlencode($corpus).'&UF_CRM_1488792480='.urlencode($disk).'&UF_CRM_1488792467='.urlencode($materinka).'&UF_CRM_1488792328='.urlencode($cooler).'&UF_CRM_1488792129='.urlencode($comp_name).'&UF_CRM_1488792107='.urlencode($city) );
// 	// }
// // }


// ?>