<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/classes/staff.php");
session_start();

if (isset($_POST["btnLogin"])) {
    //Yazılan değerlere göre tc ve şifreyi değişkene atıyorum.
    $tc = $_POST["txtTc"];
    $password = $_POST["txtPassword"];

    if ($tc == "" || $password == "") {
        header("location:/Otomasyon/pages/login/giris.php?giris=hata1");
    } else {
        $cStaff->tc = $tc;
        $cStaff->password = $password;
        $result = $cStaff->matchCheck();
        
        //girilen değerler doğrumu yanlışmı kontrolü
        if (mysqli_num_rows($result) == true) {
            $_SESSION["tc"] = $cStaff->tc;
            header("location:/Otomasyon");
        } else {
            header("location:/Otomasyon/pages/login/giris.php?giris=hata2");
        }
    }
}

//Oturum çıkışı
if (isset($_POST["btnLogout"])) {
    session_start();
    session_destroy();
    header("location:/Otomasyon/pages/login/giris.php");
}

?>