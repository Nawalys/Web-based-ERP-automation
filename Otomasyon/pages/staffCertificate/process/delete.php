<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/classes/staffCertificates.php");

if (isset($_POST["staffCertificateDelete"])) {
    $id = $_POST["staffCertificateDelete"];
    $cStaffCertificates->id = $id;
    $cStaffCertificates->deletePersonalCertificate();
    
}

?>