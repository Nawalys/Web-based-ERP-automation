<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/classes/departments.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/classes/positions.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/classes/certificates.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/classes/examinations.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/classes/trainings.php");
if (isset($_POST["btnAddData"])) {
    $value = isset($_POST["txtDataName"]) ? $_POST["txtDataName"] : null;
    $tablename = isset($_POST["slctTable"]) ? $_POST["slctTable"] : null;

    if ($value == "") {
        header("location:/Otomasyon/pages/addData/verikayit.php?verikayit=hata1");
    } else {
        if ($tablename == "departments") {
            $cDepartments->InsertData($value);
        } elseif ($tablename == "positions") {
            $cPositions->InsertData($value);
        } elseif ($tablename == "certificates") {
            $cCertificates->InsertData($value);
        } elseif ($tablename == "examinations") {
            $cExaminations->InsertData($value);
        } elseif ($tablename == "trainings") {
            $cTrainings->InsertData($value);
        }
    }
}
