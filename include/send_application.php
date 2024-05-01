

<?php


if($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "kusqya@gmail.com";
    $subject = "Новое сообщение с формы";
    $message = "Имя: " . $_POST['name'] . "\n";
    // $message .= "Email: " . $_POST['email'] . "\n";
    // $message .= "Сообщение: " . $_POST['message'];

    $headers =  "Reply-To: " . $_POST['email'] . "\r\n";

    if(mail($to, $subject, $message, $headers)) {
        echo "Сообщение успешно отправлено.";
    } else {
        echo "Ошибка при отправке сообщения.";
    }
}
?>

