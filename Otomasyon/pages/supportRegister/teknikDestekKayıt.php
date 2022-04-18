<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/header.php");
?>

<div class="d-flex justify-content-center">
    <div class="card w-50 ">
        <form action="process/insert.php" method="post" name="kayıtolustur" id="form">
            <label>Teknik destek talebi oluşturmak için:</label>
            <div class="form-group">
                <label>Konu:</label>
                <input name="txtSubject" type="text" class="form-control x" id="konu" placeholder="Konuyu giriniz">
            </div>
            <div class="form-group">
                <label>Açıklama:</label>
                <textarea class="form-control x" name="txtExplanation" rows="3" id="açıklama"></textarea>
            </div>
            <div class="form-group">
                <label>Email şifreniz:</label>
                <input name="txtPassword" type="password" class="form-control x" id="sifre" placeholder="Şifrenizi girin">
            </div>
            <button type="submit" class="btn btn-primary" name="btnSendMail">Oluştur</button>
        </form>
    </div>
</div>
<hr>

<div id="result">
    <?php require_once("process/select.php"); ?>
</div>



<script src="/Otomasyon/pages/supportRegister/js/ajax.js"></script>



<?php require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/footer.php"); ?>