<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/header.php");
?>

<div class="d-flex justify-content-center">
    <div class="card w-50 ">
        <form action="process/update.php" method="post" id="form">
            <div class="form-group">
                <label>Tc:</label>
                <input name="txtUserTc" type="text" class="form-control" placeholder="Tc girin" id="tc">
            </div>
            <div class="form-group">
                <label>Yeni Şifre:</label>
                <input name="txtUserPassword" type="password" class="form-control" placeholder="Şifre girin" id="sifre">
            </div>
            <div class="form-group">
                <label>Yeni Şifre tekrar:</label>
                <input name="txtUserPassword2" type="password" class="form-control" placeholder="Şifre tekrarı girin" id="sifre2">
            </div>
            <button type="submit" class="btn btn-primary" name="btnChangePassword" id="button">Kaydet</button>
        </form>
    </div>
</div>
<?php
if (!isset($_GET["sifredegis"])) {
    $_GET["sifredegis"] = "index";
}

if ($_GET["sifredegis"] == "basarili") { ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Şifre',
            text: 'Şifre değiştirme başarılı!',
        })
    </script>
<?php }elseif  ($_GET["sifredegis"] == "hata1") { ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Şifre',
            text: 'Tc veya Şifre boş bırakılamaz',
        })
    </script>
<?php } elseif ($_GET["sifredegis"] == "hata2") { ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Şifre',
            text: 'Girilen şifreler aynı değil lütfen kontrol ediniz',
        })
    </script>
<?php } elseif ($_GET["sifredegis"] == "hata3") { ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Şifre',
            text: 'Girilen Tc hatalı lütfen kontrolediniz',
        })
    </script>
<?php } ?>
<?php require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/footer.php"); ?>