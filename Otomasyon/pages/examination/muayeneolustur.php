<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/header.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/classes/staff.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/classes/examinations.php");


//muayene takipten geliniyorsa
$tc = isset($_POST["tc"]) ? $_POST["tc"] : null;
?>
<form action="process/insert.php" method="post">
    <div class="d-flex justify-content-center">
        <div class="card w-50 ">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Doktor ismi:</label>
                <select class="form-control" name="slctDoctor">
                    <?php
                    $doctor = $cStaff->getAll();
                    while ($value = $doctor->fetch_assoc()) {
                        if ($value["position"] == "Doktor") { ?>
                            <option value='<?php echo $value["id"] ?>'><?php echo $value["name"] . " " . $value["surname"] ?></option>
                    <?php }
                    } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Muayene Olan Tc:</label>
                <input type="text" class="form-control" id="search" autocomplete="off" name="txtExaminationStaffTc" placeholder="Personel ismini veya tc sini yazın" value="<?php echo $tc ?>">
                <ul class="list-group liveresult" id="result"></ul>
            </div>
            <div class="form-group">
                <label>Muayene Tarihi:</label>
                <input name="dateExamination" type="date" class="form-control">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Amaci:</label>
                <select class="form-control" name="slctExaminationId">
                    <?php
                    $examinations = $cExaminations->getAll();
                    while ($value = $examinations->fetch_assoc()) { ?>
                        <option value='<?php echo $value["id"] ?>'><?php echo $value["name"] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Açıklama:</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="txtComment" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary" name="btnAddExamination">Kaydet</button>
        </div>
    </div>
</form>
<?php
if (!isset($_GET["muayeneolustur"])) {
    $_GET["muayeneolustur"] = "index";
}
if ($_GET["muayeneolustur"] == "hata1") { ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Hataa...',
            text: 'Tc veya Tarih kısmı boş bırakılamaz.',
        })
    </script>
<?php } elseif ($_GET["muayeneolustur"] == "hata2") { ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Hataa...',
            text: 'Girilen Tc ye ait bir personel bulunamadı.',
        })
    </script>
<?php } elseif ($_GET["muayeneolustur"] == "basarili") { ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Başarılı',
            text: 'Muayene kaydı başarıyla oluşturuldu.',
        })
    </script>
<?php } ?>

<script src="/Otomasyon/pages/examination/js/staffSearch.js"></script>
<?php require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/footer.php"); ?>