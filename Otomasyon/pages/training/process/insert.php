<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/classes/trainingProcess.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/classes/trainings.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/classes/certificates.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/classes/staffCertificates.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/classes/staff.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/vendor/autoload.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST["btnAddTraining"])) {
    $cTrainingProcess->trainingId = isset($_POST["slctTrainings"]) ? $_POST["slctTrainings"] : null;
    $cTrainingProcess->engineerStaffId = isset($_POST["slctEngineer"]) ? $_POST["slctEngineer"] : null;
    $cTrainingProcess->welderStaffId = isset($_POST["slctStaff"]) ? $_POST["slctStaff"] : null;
    $cTrainingProcess->time = isset($_POST["dateTime"]) ? $_POST["dateTime"] : null;
    $cTrainingProcess->situation = "Bekleniyor";

    if ($cTrainingProcess->time == "" || $cTrainingProcess->welderStaffId == "") {
        header("Location:/Otomasyon/pages/training/egitimolustur.php?egitimolustur=hata1");
    } else {
        $cTrainingProcess->addTrainingProcess();
        /* For mail send

        session_start();
        $cStaff->tc = $_SESSION["tc"];
        $result = $cStaff->sessionCheck();
        $userMail = $result["email"];
        $userName = $result["name"];
        $userSurname = $result ["surname"];

        $time = $_POST["dateTime"];

        $trainingId = $_POST["slctTrainings"];
        $cTrainings->id = $trainingId;
        $result = $cTrainings->getTrainingName();
        $trainingName = $result["name"];

        $engineerId = $_POST["slctEngineer"];
        $cStaff->id = $engineerId;
        $result = $cStaff->getStaffName();
        $name = $result["name"];
        $surname = $result ["surname"];

        try {
            //Server ayarları
            //mail gönderme işlemi
            $mail = new PHPMailer(true);
            $mail->SMTPDebug = 2;
            $mail->isSMTP();
            $mail->Host = "ssl://smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->Username = "bekirhan.bulut2@.com";
            $mail->Password = ""; 
            $mail->CharSet = "utf8";
            $mail->SMTPSecure = "tls";
            $mail->Port = 465;

            //alıcı ayarları
            $mail->setFrom("bekirhan.bulut2@gmail.com", "Teknik destek");
            $mail->addAddress($userMail, "");

            //gönderi ayarları
            $mail->isHTML();
            $mail->Subject = "Adınıza eğitim oluşturuldu.";
            $mail->Body = "Sayın $userName $userSurname ; $time tarihinde $name $surname tarafından $trainingName eğitiminiz oluşturuldu.";

            if ($mail->send()) {
                header("Location:/Otomasyon/pages/training/egitimolustur.php?egitimolustur=basarili");
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        } 
        */
        header("Location:/Otomasyon/pages/training/egitimolustur.php?egitimolustur=basarili");
    }
}


//başarısız
if (isset($_POST["unSucces"])) {
    $wid = $_POST["unSucces"];
    $tid = $_POST["trainingId"];
    $cTrainingProcess->welderStaffId = $wid;
    $cTrainingProcess->id = $tid;
    $cTrainingProcess->situation = "Başarısız";
    $cTrainingProcess->updateTrainingStatus();
}
//başarılı
if (isset($_POST["succes"])) {
    $wid = $_POST["succes"];
    $tid = $_POST["trainingId"];
    $certificate = $_POST["cerName"];
    //durumu başarılı yap
    $cTrainingProcess->welderStaffId = $wid;
    $cTrainingProcess->id = $tid;
    $cTrainingProcess->situation = "Başarılı";
    $cTrainingProcess->updateTrainingStatus();
    //sertifikası varmı yok mu kontrol et
    $cCertificates->name = $certificate;
    $result = $cCertificates->certificateCheck();
    $cerId = $result["id"];
    //sertifikası varsa sertifika ekle
    if ($cerId > 0) {
        $cStaffCertificates->staffId = $wid;
        $cStaffCertificates->certificateId = $cerId;
        $cStaffCertificates->addPersonalOneCertificate();
    }
}
