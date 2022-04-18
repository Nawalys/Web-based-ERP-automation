<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/classes/staff.php");

if (isset($_POST["btnUpdateStaff"])) {
    $cStaff->id = isset($_POST["txtId"]) ? $_POST["txtId"] : null;
    $cStaff->tc = isset($_POST["txtTc"]) ? $_POST["txtTc"] : null;
    $cStaff->name = isset($_POST["txtName"]) ? $_POST["txtName"] : null;
    $cStaff->surname = isset($_POST["txtSurname"]) ? $_POST["txtSurname"] : null;
    $cStaff->birthday = isset($_POST["dateBirthday"]) ? $_POST["dateBirthday"] : null;
    $cStaff->gender = isset($_POST["radGender"]) ? $_POST["radGender"] : null;
    $cStaff->phoneNumber = isset($_POST["txtPhoneNumber"]) ? $_POST["txtPhoneNumber"] : null;
    $cStaff->email = isset($_POST["txtEmail"]) ? $_POST["txtEmail"] : null;
    $cStaff->adrress = isset($_POST["txtAddress"]) ? $_POST["txtAddress"] : null;
    $cStaff->startDate = isset($_POST["dateStartWork"]) ? $_POST["dateStartWork"] : null;
    $cStaff->department = isset($_POST["slctDepartment"]) ? $_POST["slctDepartment"] : null;
    $cStaff->position = isset($_POST["slctPosition"]) ? $_POST["slctPosition"] : null;

    if (
        $cStaff->tc == "" ||
        $cStaff->name == "" ||
        $cStaff->surname == "" ||
        $cStaff->birthday == "" ||
        $cStaff->phoneNumber == "" ||
        $cStaff->email == "" ||
        $cStaff->adrress == "" ||
        $cStaff->startDate == ""
    ) {
        header("location:/Otomasyon/pages/staff/plistele.php?plistele=hata1");
    } else {
        $cStaff->updateStaff();
        header("location:/Otomasyon/pages/staff/plistele.php?plistele=basarili2");
    }
}
//Personel silme
if (isset($_POST["btnDeleteStaff"])) {
    $id = isset($_POST["txtId"]) ? $_POST["txtId"] : null;
    $cStaff->id = $id;
    $cStaff->deleteStaff();

    header("Location:/Otomasyon/pages/staff/plistele.php?plistele=basarili");
}

?>