<?php
if (isset($_POST['name'])) {$name = $_POST['name'];}
if (isset($_POST['tel'])) {$tel = $_POST['tel'];}
if (isset($_POST['mail'])) {$mail = $_POST['mail'];}
$myaddres  = "inbox@alcoros.com";
$mes = "Тема: Заказ обратной связи!\nИмя: $name\nТелефон: $tel\nEmail: $mail";
$sub='Заказ';
$email='Заказ обратного звонка'; 
$send = mail ($myaddres,$sub,$mes,"Content-type:text/plain; charset = utf-8\r\nFrom:$email");
?>
