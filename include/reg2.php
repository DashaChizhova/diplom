<?php
session_start();
require_once("db_connect.php");


$student_id = $_POST["student_id"];
$course_number = $_POST["course_number"];
$education_degree	 = $_POST["education_degree"];
$academ = $_POST['academ'];
$social = $_POST['social'];
$upacadem = $_POST['upacadem'];
$upsocial = $_POST['upsocial']; 
$military = $_POST['military'];
$namestep = $_POST['namestep'];
$president = $_POST['president'];
$needhelp = $_POST['needhelp'];


    $sql = "INSERT INTO `students` (`student_id`, `course_number`, `education_degree`, `academ`, `id`, `social`, `upacadem`, `upsocial`, `military`, `namestep`, `president`, `needhelp`)
            VALUES 
            ('$student_id', '$course_number','$education_degree','$academ', NULL,'$social','$upacadem','$upsocial', '$military', '$namestep', '$president', '$needhelp')
    ";
    mysqli_query($mysqli, $sql);
    $_SESSION['message'] = 'Registration was successful!';
    header('Location: ../reg2.php');

