<?php
session_start();
require_once("db_connect.php");


$name = $_POST["name"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$password = $_POST["password"];
$repeat_password = $_POST["repeat_password"];
$rights = $_POST["rights"];
$surname = $_POST["surname"]; 
$patronymic = $_POST["patronymic"];
$student_id = $_POST["student_id"];

if($password === $repeat_password) {
    $path = 'uploads_images/'.time().$_FILES['avatar']['name'];
    if(!move_uploaded_file($_FILES['avatar']['tmp_name'], '../'.$path)) {
        $_SESSION['message'] = 'Error loading the image';
        header("Location: {$_SERVER['HTTP_REFERER']}");
    }

    $password = $password;
    $sql = "INSERT INTO `user` (`id`, `pass`, `name`, `phone`, `email`,  `image`, `rights`, `surname`, `patronymic`, `student_id`)
            VALUES 
            (NULL, '$password','$name','$phone','$email','$path','$rights','$surname', '$patronymic', '$student_id')
    ";
    mysqli_query($mysqli, $sql);
    $_SESSION['message'] = 'Registration was successful!';
    header('Location: ../aut.php');

} else {
        $_SESSION['message'] = 'Passwords dont match!';
        header("Location: {$_SERVER['HTTP_REFERER']}");
}