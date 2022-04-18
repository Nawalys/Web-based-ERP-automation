<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/header.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/classes/certificates.php");
?>
<div class="d-flex justify-content-center">
    <div class="card w-50 ">
        <form action="process/insert.php" method="post">
            <div class="form-group">
                <label>Eklenecek personelin tc'si:</label>
                <input name="txtTc" type="text" class="form-control" autocomplete="off" id="search" placeholder="Personel ismini veya tcsini yazın">
            </div>
            <ul class="list-group" id="result"></ul>
            <div class="form-group">
                <label for="exampleFormControlSelect2">Eklenecek sertifikalar:</label>
                <select multiple class="form-control" name="slctCertificates[]" multiple="multiple" size="5">
                    <?php 
                    $certificates =  $cCertificates->getAll();
                    while ($value = $certificates->fetch_assoc()) { ?>
                        <option value='<?php echo $value["id"] ?>'><?php echo $value["name"] ?></option>
                    <?php } ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="btnAddStaffCertificates">Kaydet</button>
        </form>
    </div>
</div>

<?php
if (!isset($_GET["pserekle"])) {
    $_GET["pserekle"] = "index";
}

if ($_GET["pserekle"] == "hata1") { ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Hataa...',
            text: 'Girilen tc ye ait bir kayıt bulunamadı',
        })
    </script>
<?php } elseif ($_GET["pserekle"] == "hata2") { ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Hataa...',
            text: 'Tc veya Sertifikalar boş bırakılamaz',
        })
    </script>
<?php } elseif ($_GET["pserekle"] == "basarili") { ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Başarılı',
            text: 'Sertifikalar başarıyla eklendi',
        })
    </script>
<?php } ?>
<script src="/Otomasyon/pages/staffCertificate/js/staffSearch.js"></script>
<?php require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/footer.php"); ?>