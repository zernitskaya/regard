<?
include '../parts/db.php';
require 'PHPMailerAutoload.php';

if (isset($_POST['order'])) {
	$ordermail = $_POST['order'];
	$order = $db->real_escape_string($_POST['order']);
	$name = $_POST['name'];
	$tel = $_POST['tel'];
	$address = $_POST['address'];
	$date = date("Y-m-d");
	$status = "Новый";
	$sum = $_POST['sum'];

	$update_post = my_query($db, "INSERT INTO orders (name, tel, ordertext, address, date, status, sum) VALUES ('$name', '$tel', '$order', '$address', '$date', '$status', '$sum')", "insertid");
	$order_id = $update_post->insert_id;

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

	$mail->addAddress('sanchobag@ukr.net');
	$mail->Subject = '[Заказ]';
	$mail->Body    = 'Имя: '.$name.'
	Тел: '.$tel.'
	'.$ordermail;

	$mail->send();

	$dbsms = new mysqli("94.249.146.189", "sanchobag_log", "Samanta134679", "users");
	$dbsms->set_charset("utf8");

	my_query($db, "SET NAMES 'utf8'");

	$update_sms = my_query($dbsms, "INSERT INTO sanchobag_log (number, sign, message) VALUES ('$tel', 'Sanchobag', '$name, Спасибо за покупку! Наш менеджер скоро с вами свяжется. Ваш заказ № $order_id')", "insertid");


	header('Location: http://sanchobag.com.ua/cart?q=success');
}
?>