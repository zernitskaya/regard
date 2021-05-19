<?
require 'PHPMailerAutoload.php';

if (isset($_POST['name'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$text = $_POST['text'];

	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->CharSet = 'UTF-8';

	$mail->Host       = "mail.kreslo-meshok.org"; // SMTP server example
	$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
	$mail->SMTPAuth   = true;                  // enable SMTP authentication
	$mail->Port       = 25;                    // set the SMTP port for the GMAIL server
	$mail->Username   = "admin@kreslo-meshok.org"; // SMTP account username example
	$mail->Password   = "Samanta134";        // SMTP account password example

	$mail->setFrom('admin@kreslo-meshok.org', 'SanchoBAG');
	$mail->isHTML(true);        

	$mail->addAddress('twist4@ukr.net');
	$mail->Subject = '[Обратная связь]';
	$mail->Body    = "Имя Фамилия: ".$name." 
	<br>Почта: ".$email."
	<br>Текст: ".$text;

	$f = 'log.txt';
	$f2 = 'logs.txt';

	$str = "Имя Фамилия: ".$name." 
	Почта: ".$email."

	";

	file_put_contents($f, $str, FILE_APPEND | LOCK_EX);
	file_put_contents($f2, $email."\n", FILE_APPEND | LOCK_EX);

	$mail->send();
	header('Location: http://sanchobag.com.ua/');
}
?>