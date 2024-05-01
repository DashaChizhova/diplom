<?php
// ini_set('SMTP', "server.com");
// ini_set('smtp_port', "25");
// ini_set('sendmail_from', "kusqya@gmail.com");

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "kusqya@gmail.com";
    $subject = "Новое сообщение с формы";
    $message = "Имя: " . $_POST['name'] . "\n";
    $message .= "Email: " . $_POST['email'] . "\n";
    $message .= "Сообщение: " . $_POST['message'];

    $headers = "From: kusqya@gmail.com\r\n";

    if(mail($to, $subject, $message, $headers)) {
        echo "Сообщение успешно отправлено.";
    } else {
        echo "Ошибка при отправке сообщения.";
    }
}
?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    Имя: <input type="text" name="name"><br>
    Email: <input type="text" name="email"><br>
    Сообщение: <textarea name="message"></textarea><br>
    <input type="submit" value="Отправить">
</form>