<?php

session_start();
date_default_timezone_set('Asia/Tokyo');
$_SESSION['time'] = date("Y/m/d H:i:s");
$_SESSION['name'] = $_POST['name'];
$_SESSION['furigana'] = $_POST['furigana'];
$_SESSION['email'] = $_POST['email'];
$_SESSION['tel'] = $_POST['tel'];
$_SESSION['address_num'] = $_POST['address_num'];
$_SESSION['address'] = $_POST['address'];
$_SESSION['relation'] = $_POST['relation'];
$_SESSION['attendance'] = $_POST['attendance'];
$_SESSION['message'] = $_POST['message'];
$_SESSION['nijikai'] = $_POST['nijikai'];

    $time = date("Y/m/d H:i:s");
    $name = $_POST['name'];
    $furigana = $_POST['furigana'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $address_num = $_POST['address_num'];
    $address = $_POST['address'];
    $relation = $_POST['relation'];
    $attendance = $_POST['attendance'];
    $message = $_POST['message'];
    $nijikai = $_POST['nijikai'];

 // confirm.html 読み込み
 require("confirm.html");
