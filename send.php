<?php
$token = "5833407669:AAEalRZr3qjSSdzWJGGs-9JMzTTDQZl43fU";
$chat_id = "-1001159112111";
if ($_POST['act'] == 'order') { 
    $name = ($_POST['name']);
    $email = ($_POST['email']);
	$message = ($_POST['message']); 
    $arr = array(
        'Имя:' => $name,
        'Email:' => $email,
		'Сообщение:' => $message
    );
    foreach($arr as $key => $value) {
        $txt .= "<b>".$key."</b> ".$value."%0A";
    };
    $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");
    if ($sendToTelegram) {
		 header("Location: /?send_message=ok");
        alert('Спасибо! Ваша заявка принята. Мы свяжемся с вами в ближайшее время.');
    }
    else {
        alert('Что-то пошло не так. Попробуйте отправить форму ещё раз.'); 
    }
?>