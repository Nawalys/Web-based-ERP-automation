<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/header.php");
?>

<div class="d-flex justify-content-center">
    <div class="card w-75 ">
        <div class="card-body">
            <form action="process/insert.php" method="post">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Eklenecek yer:</label>
                    <select class="form-control" name="slctTable">
                        <option value="departments">Departman</option>
                        <option value="positions">Pozisyon</option>
                        <option value="certificates">Sertifika</option>
                        <option value="examinations">Muayene</option>
                        <option value="trainings">Eğitim</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Eklenecek ad:</label>
                    <input name="txtDataName" type="text" class="form-control" placeholder="Eklemek istediğiniz veriyi girin">
                </div>
                <button type="submit" name="btnAddData" class="btn btn-primary">Kaydet</button>
            </form>
        </div>
    </div>
</div>
<?php
if (!isset($_GET["verikayit"])) {
    $_GET["verikayit"] = "index";
}

if ($_GET["verikayit"] == "hata1") { ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Hataa...',
            text: 'Eklenecek veri boş bırakılamaz',
        })
    </script>
<?php } elseif ($_GET["verikayit"] == "basarili") { ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Veri Kaydı',
            text: 'Veyi kaydı başarıyla oluşturuldu',
        })
    </script>
<?php } ?>
<?php require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/footer.php"); ?>