<?
require 'mail/PHPMailerAutoload.php';

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->CharSet = 'UTF-8';

$mail->Host       = "mail.ukraine.com.ua"; // SMTP server example
$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->Port       = 2525;                    // set the SMTP port for the GMAIL server
$mail->Username   = "robot@xn--80afeb8cd.com"; // SMTP account username example
$mail->Password   = "r0BoT@iskand3r";        // SMTP account password example

$mail->setFrom('robot@регард.com', 'Регард.com');
$mail->isHTML(true);     

$mail->addAddress('twist4@ukr.net');
$mail->Subject = '[Лид с Easy Builder]';
$mail->Body    = "Зайдите в битрикс, чтобы посмотреть подробности";

$mail->send();   

?>