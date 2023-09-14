<?php
if (isset($_POST['name'])) {$name = $_POST['name'];}
if (isset($_POST['tel'])) {$tel = $_POST['tel'];}
if (isset($_POST['mail'])) {$mail = $_POST['mail'];}
$myaddres  = "inbox@alcoros.com";
$mes = "Тема: Заказ обратной связи!\nИмя: $name\nТелефон: $tel\nEmail: $mail";
$sub="Заказ";
$email='Заказ обратного звонка'; 
$send = mail($myaddres,$sub,$mes,"Content-type:text/plain; charset = utf-8\r\nFrom:$email");

ini_set('short_open_tag', 'On');
?>


<?php
// Файлы phpmailer
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

// Переменные, которые отправляет пользователь
$name = $_POST['name'];
$email = $_POST['mail'];
$tel = $_POST['tel'];

// Формирование самого письма
$title = "Заказ от $name";
$body = "
<h2>Заказ обратной связи:</h2>
<b>Имя:</b> $name<br>
<b>Почта:</b> $email<br><br>
<b>Телефон:</b><br>$tel
";

// Настройки PHPMailer
$mail = new PHPMailer\PHPMailer\PHPMailer();
try {
    $mail->isSMTP();   
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth   = true;
    //$mail->SMTPDebug = 2;
    $mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};

    // Настройки вашей почты
    $mail->Host = 'smtp.gmail.com'; // SMTP сервера вашей почты
    $mail->Username = 'sasha.porsin7'; // Логин на почте
    $mail->Password = 'dbdmybzdbcsmpuxs'; // Пароль на почтеbipbecbfmigughyv
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('sasha.porsin7@gmail.com', 'Alexandra Larina'); // Адрес самой почты и имя отправителя

    // Получатель письма
    $mail->addAddress('inbox@alcoros.com');  

    // Прикрипление файлов к письму

// Отправка сообщения
$mail->isHTML(true);
$mail->Subject = $title;
$mail->Body = $body;    

// Проверяем отравленность сообщения
if ($mail->send()) {$result = "success";} 
else {$result = "error";}

} catch (Exception $e) {
    $result = "error";
    $status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
}

// Отображение результата
echo json_encode(["result" => $result, "resultfile" => $rfile, "status" => $status]);

?>



