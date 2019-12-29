<?php

/* https://api.telegram.org/botXXXXXXXXXXXXXXXXXXXXXXX/getUpdates,
где, XXXXXXXXXXXXXXXXXXXXXXX - токен вашего бота, полученный ранее */

//Переменная $name,$phone, $mail получает данные при помощи метода POST из формы
$name = $_POST[‘ManName’];
$number = $_POST[‘ManNumber’];
$Company = $_POST[‘ManCompany’];
$Recall1 = $_POST[‘ManRecall1’];
$Recall2 = $_POST[‘ManRecall2’];
$message = $_POST[‘ManMessage’];
//в переменную $token нужно вставить токен, который нам прислал @botFather
$token = "540741194:AAEaaI2C3JEOmDILzIc_zrNSVXT2iS6guZM";

//нужна вставить chat_id (Как получить chad id, читайте ниже)
$chat_id = "-356195299";

//Далее создаем переменную, в которую помещаем PHP массив
$arr = array(
  'ФИО заказчика: ' => $name,
  'Контакты заказчика: ' => $number,
  'Компания/адрес: ' => $Company,
  'Время перезвона с: ' => $Recall1,
  'Время перезвона до: ' => $Recall2,
  'Сообщение от заказчика: ' => $message,
);

//При помощи цикла перебираем массив и помещаем переменную $txt текст из массива $arr
foreach($arr as $key => $value) {
  $txt .= "<b>".$key."</b> ".$value."%0A";
};

//Осуществляется отправка данных в переменной $sendToTelegram
$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

//Если сообщение отправлено, напишет "Thank you", если нет - "Error"
if ($sendToTelegram) {
  echo "Thank you";
} else {
  echo "Error";
}
?>