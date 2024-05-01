<?php
session_start();
require_once("db_connect.php");

$count_field = $_POST["count_field"];
$date = date('Y-m-d H:i:s');

$sql = "INSERT INTO `fond` (`summa`, `date`)
        VALUES 
        ('$count_field', '$date')
";
// if ($mysqli->query($sql) === TRUE) {
//     echo "Данные успешно сохранены в базе данных";
// } else {
//     echo "Ошибка при сохранении данных: " . $mysqli->error;
// }
mysqli_query($mysqli, $sql);
// $_SESSION['message'] = 'Registration was successful!';
header('Location: ../fond.php');

