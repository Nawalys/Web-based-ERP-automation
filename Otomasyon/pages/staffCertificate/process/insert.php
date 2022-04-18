<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/classes/staff.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/classes/staffCertificates.php");
//Personele Sertifika ekleme
if (isset($_POST["btnAddStaffCertificates"])) {
    //gelen verileri alıyorum
    $tc = isset($_POST["txtTc"]) ? $_POST["txtTc"] : null;
    $certificates = isset($_POST["slctCertificates"]) ? $_POST["slctCertificates"] : null;

    if ($tc == "" || $certificates == "") {
        header("Location:/Otomasyon/pages/staffCertificate/pserekle.php?pserekle=hata2");
    } else {
        //girilen tcnin personel idsini alıyorum
        $cStaff->tc = $tc;
        $id = $cStaff->getStaffId();
        if ($id == "") {
            header("Location:/Otomasyon/pages/staffCertificate/pserekle.php?pserekle=hata1");
        } else {
            //aynı id ye seçilen sertifikaları ekliyorum
            $cStaffCertificates->staffId = $id;
            $cStaffCertificates->certificateId = $certificates;
            $cStaffCertificates->addPersonalCertificate();
            header("Location:/Otomasyon/pages/staffCertificate/pserekle.php?pserekle=basarili");
        }
    }
}

?>