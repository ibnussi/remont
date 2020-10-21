<?php 

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

$name = $_POST['name'];
$ploshad = $_POST['ploshad'];
$class = $_POST['class'];
$summa = $_POST['summa'];
$year = $_POST['year'];
$udobno = $_POST['udobno'];
$phone = $_POST['phone'];

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mail.ru';  																							// Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'jalol.urinov@mail.ru'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = 'abdurahmon212069?'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom('jalol.urinov@mail.ru'); // от кого будет уходить письмо?
$mail->addAddress('selivanov-aleks@mail.ru');     // Кому будет уходить письмо 
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Заявка сайта по ремонту!';
$mail->Body    = 'Тип Вашей квартиры (помещения):' .$name . '<br><br>Площадь Вашей квартиры (помещения):' .$ploshad. '<br><br>Какой класс ремонта: ' .$class. '<br>На какую сумму: ' .$summa. '<br>Когда Вы планируете начать ремонт: ' .$year. '<br>Где Вам удобнее получить предварительную стоимость ремонта: ' .$udobno. '<br><br>Номер телефона: ' .$phone;
$mail->AltBody = '';

if(!$mail->send()) {
    echo 'Error';
} else {
    header('location: https://webasia.ru/');
}
?>