<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/classes/staff.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/classes/examinationFollowUp.php");


if (isset($_POST["btnAddStaff"])) {
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

    //girilen değerler boş olup olmadığı kontrol ediliyor
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
        header("location:/Otomasyon/pages/staff/kayit.php?kayit=hata2");
    } else {
        //girilen tc nin id si alınıyor
        $id = $cStaff->getStaffId();
        //eğer id yoksa ekleme işlemi yap
        if ($id == 0) {
            //personel ekliyorum
            $cStaff->addNewStaff();
            // id yi bidaha alıyoruz giriş muayenesi oluşturmak için
            $id = $cStaff->getStaffId();
            //Revir muayenetakipe ise giriş muayenesi kaydı
            $cExaminationFollowUp->staffId = $id;
            $cExaminationFollowUp->addNewEmploymentExamination();
            //işlemlerden sonra geri yönlendirme
            header("location:/Otomasyon/pages/staff/kayit.php?kayit=basarili");
        } else {
            header("location:/Otomasyon/pages/staff/kayit.php?kayit=hata");
        }
    }
}

?>