<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/classes/staff.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/pages/login/process/login.php");

if (isset($_POST["btnChangePassword"])) {
    //gelen verileri alıyorum
    $tc = isset($_POST["txtUserTc"]) ? $_POST["txtUserTc"] : null;
    $password = isset($_POST["txtUserPassword"]) ? $_POST["txtUserPassword"] : null;
    $password2 = isset($_POST["txtUserPassword2"]) ? $_POST["txtUserPassword2"] : null;
    $selfTc = $_SESSION["tc"];
    //gerekli kontroller
    if ($tc == "" || $password == "" || $password2 == "") {
        header("Location:/Otomasyon/pages/changePassword/sifredegis.php?sifredegis=hata1");
    } elseif ($password != $password2) {
        header("Location:/Otomasyon/pages/changePassword/sifredegis.php?sifredegis=hata2");
    } elseif ($tc != $selfTc) {
        header("Location:/Otomasyon/pages/changePassword/sifredegis.php?sifredegis=hata3");
    } else {
        //girilen tcnin personel idsini alıyorum
        $cStaff->tc = $tc;
        $cStaff->password = $password;
        $cStaff->changePassword();
        header("Location:/Otomasyon/pages/changePassword/sifredegis.php?sifredegis=basarili");
    }
}
?>