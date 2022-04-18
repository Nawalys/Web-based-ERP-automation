<?php
/*
require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/vendor/autoload.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/classes/staff.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start();
$cStaff->tc = $_SESSION["tc"];
$result = $cStaff->sessionCheck();

//formdan gelen veriler
$subject = $_POST["txtSubject"];
$explanation = $_POST["txtExplanation"];
$password = $_POST["txtPassword"];

try {
    //Server ayarları
    $userMail = $result["email"];
    //mail gönderme işlemi
    $mail = new PHPMailer(true);
    $mail->SMTPDebug = 2;
    $mail->isSMTP();
    $mail->Host = "ssl://smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = $userMail;
    $mail->Password = $password;
    $mail->CharSet = "utf8";
    $mail->SMTPSecure = "tls";
    $mail->Port = 465;

    $name = $result["name"];
    $surname = $result["surname"];
    //alıcı ayarları
    $mail->setFrom($userMail, $name . " " . $surname);
    $mail->addAddress("bekirhan.bulut@gmail.com", "");

    //gönderi ayarları
    $mail->isHTML();
    $mail->Subject = $subject;
    $mail->Body = $explanation;

    if ($mail->send()) {
        return true;
    }
} catch (Exception $e) {
    echo $e->getMessage();
}*/