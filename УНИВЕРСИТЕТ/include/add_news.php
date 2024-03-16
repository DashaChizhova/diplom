<?php
session_start();
require_once("db_connect.php");

$title = $_POST["title"];
$text	 = $_POST["text"];

$path = 'uploads_images/'.time().$_FILES['avatar']['name'];
if(!move_uploaded_file($_FILES['avatar']['tmp_name'], '../'.$path)) {
    $_SESSION['message'] = 'Error loading the image';
    header("Location: {$_SERVER['HTTP_REFERER']}");
}
$sql = "INSERT INTO `project` (`id`, `title`, `text`, `image`)
        VALUES 
        (NULL,'$title','$text','$path')
";
mysqli_query($mysqli, $sql);
$_SESSION['message'] = 'Registration was successful!';
header('Location: ../add_news.php');

