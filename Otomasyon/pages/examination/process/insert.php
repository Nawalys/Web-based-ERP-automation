<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/classes/staff.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/classes/examinationProcess.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/classes/examinationFollowUp.php");

if (isset($_POST["btnAddExamination"])) {
    $doctorId = isset($_POST["slctDoctor"]) ? $_POST["slctDoctor"] : null;
    $staffTc = isset($_POST["txtExaminationStaffTc"]) ? $_POST["txtExaminationStaffTc"] : null;
    $date = isset($_POST["dateExamination"]) ? $_POST["dateExamination"] : null;
    $examinationId = isset($_POST["slctExaminationId"]) ? $_POST["slctExaminationId"] : null;
    $comment = isset($_POST["txtComment"]) ? $_POST["txtComment"] : null;

    if ($staffTc == "" || $date == "") {
        header("Location:/Otomasyon/pages/examination/muayeneolustur.php?muayeneolustur=hata1");
    } else {
        //tcsi girilen kişinin idsini alıyorum
        $cStaff->tc = $staffTc;
        $id = $cStaff->getStaffId();
        if ($id == 0) {
            header("Location:/Otomasyon/pages/examination/muayeneolustur.php?muayeneolustur=hata2");
        } else {
            //muayene kaydı
            $cExaminationProcess->doctorId = $doctorId;
            $cExaminationProcess->staffId = $id;
            $cExaminationProcess->time = $date;
            $cExaminationProcess->examinationId = $examinationId;
            $cExaminationProcess->comment = $comment;
            $cExaminationProcess->createExamination();
            // takipten düşme işlemi için sorgu
            $cExaminationFollowUp->staffId = $id;
            $cExaminationFollowUp->deleteExamination();
            header("Location:/Otomasyon/pages/examination/muayeneolustur.php?muayeneolustur=basarili");
        }
    }
}

?>