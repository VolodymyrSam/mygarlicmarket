<?php
// Файлы phpmailer
require ‘class.phpmailer.php’;
require ‘class.smtp.php’;
// Переменные
$name = $_POST[‘ManName’];
$number = $_POST[‘ManNumber’];
$Company = $_POST[‘ManCompany’];
$Recall = $_POST[‘ManRecall’];
$message = $_POST[‘ManMessage’];
// Настройки
$mail = new PHPMailer;
$mail->isSMTP(); 
$mail->Host = ‘smtp.yandex.ru’; 
$mail->SMTPAuth = true; 
$mail->Username = ‘yourlogin’; // Ваш логин в Яндексе. Именно логин, без @yandex.ru
$mail->Password = ‘yourpass’; // Ваш пароль
$mail->SMTPSecure = ‘ssl’; 
$mail->Port = 465;
$mail->setFrom(‘example@yandex.ru’); // Ваш Email
$mail->addAddress(‘vova290594@gmail.com’); // Email получателя
$mail->addAddress(‘example@gmail.com’); // Еще один email, если нужно.
// Прикрепление файлов
 for ($ct = 0; $ct < count($_FILES[‘userfile’][‘tmp_name’]); $ct++) {
 $uploadfile = tempnam(sys_get_temp_dir(), sha1($_FILES[‘userfile’][‘name’][$ct]));
 $filename = $_FILES[‘userfile’][‘name’][$ct];
 if (move_uploaded_file($_FILES[‘userfile’][‘tmp_name’][$ct], $uploadfile)) {
 $mail->addAttachment($uploadfile, $filename);
 } else {
 $msg .= ‘Failed to move file to ‘ . $uploadfile;
 }
 } 
 
// Письмо
$mail->isHTML(true); 
$mail->Subject = “Заявка с сайта”; // Заголовок письма
$mail->Body = “Имя $name . Контактные данные $number . Компания или адрес $Company . Желательно связаться: $Recall” . <br>Письмо от клиента: $Message”; // Текст письма
// Результат
if(!$mail->send()) {
 echo ‘Message could not be sent.’;
 echo ‘Mailer Error: ‘ . $mail->ErrorInfo;
} else {
 echo ‘ok’;
}
?>
